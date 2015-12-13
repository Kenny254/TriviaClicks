<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseQuery;
use Parse\ParseClient;
use Parse\ParseException;
use Parse\ParseSessionStorage;
use Abraham\TwitterOAuth\TwitterOAuth;

class Callback extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		//Do your magic here
		ParseClient::setStorage( new ParseSessionStorage() );
	}

	public function index()
	{
		$fb = new Facebook\Facebook([
		  'app_id' => '1630991853823416',
		  'app_secret' => '5970b129fe7f15f55534e060aef703a7',
		  'default_graph_version' => 'v2.2',
		  ]);

		$helper = $fb->getRedirectLoginHelper();

		try {
		  $accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		if (isset($accessToken)) {
		  // Logged in!
		  //$fb->setDefaultAccessToken($accessToken);

		  $_SESSION['facebook_access_token'] = (string) $accessToken;
		  try {
			  $response = $fb->get('/me?fields=id,email,gender,name,cover,picture.width(100).height(100)', $accessToken);
			  //$response = $fb->get('/me/picture', $accessToken);
			  
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  // When Graph returns an error
			  echo 'Graph returned an error: ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  exit;
			}

			//echo 'Logged in as ' . $userNode->getName();
		  $user = $response->getGraphUser();
		  		 
		  $pic = $user['picture'];
		  $cover = $user['cover'];

		  	$parseUser = new ParseUser();
			$parseUser->set("username", $user['email']);
			$parseUser->set("password", $user['id']);
			$parseUser->set("email", $user['email']);
			$parseUser->set("fullName", $user['name']);
			$parseUser->set("picture", $pic['url']);
			$parseUser->set("cover", $cover['source']);
			$parseUser->set("difficulty", "beginner");

			try {
				//$accessToken = "";
			    $parseUser->signUp();
			    // Hooray! Let them use the app now.
			    $username = $user['email'];
			    $password = $user['id'];
			    $session_var = ['Parseusername' => $username,
			    				'Parsepassword' => $password,
			    				];

			    $this->session->set_userdata($session_var);
			    
		 		redirect('Main/Profile', 'refresh');
			} catch (ParseException $ex) {
			  // Show the error message somewhere and let the user try again.
			  // var_dump($ex->getCode().$ex->getMessage());
			  // exit;
			  if($ex->getCode() == 202){
			  	$username = $user['email'];
			    $password = $user['id'];
			    // $session_var = ['Parseusername' => $username,
			    // 				'Parsepassword' => $password,
			    // 				];
			    
			    // $this->session->set_userdata($session_var);
			    // var_dump('Got here, Yay!');
		    	// exit;
		    	$user = ParseUser::logIn($username, $password);
			  	redirect('Main/Profile', 'refresh');
			  }
			  //echo "Error: " . $ex->getCode() . " " . $ex->getMessage();
			}
		  
		  // $userStuff = $this->header($user['name'], $pic['url'], $cover['source']);
		  // $this->load->view('profile', $userStuff, false);
		  // Now you can redirect to another page and use the
		  // access token from $_SESSION['facebook_access_token']
		}
			
	}

	public function twitter()
	{
		$consumerKey = "3pYslO0IESqXMShvzDtyPKJck"; // Consumer Key
		$consumerSecret = "5Avys4ft8XejhgFl1Qqe6YUCMDgukdoVVFMeuGPZ5GGt4fpLhO"; // Consumer Secret
		// The TwitterOAuth instance
		$twitteroauth = new TwitterOAuth($consumerKey, $consumerSecret);

		// Requesting authentication tokens, the parameter is the URL we will be redirected to
		$callback = (string)site_url('Main/Callback/twCallback');
		$request_token = $twitteroauth->oauth('oauth/request_token', array('oauth_callback' => $callback));
		 // var_dump($request_token);
		 // exit;
		// Saving them into the session
		$_SESSION['oauth_token'] = $request_token['oauth_token'];
		$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
		 
		// If everything goes well..
		if($twitteroauth->getLastHttpCode()==200){
		    // Let's generate the URL and redirect
		    //$url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
		    $url = $twitteroauth->url("oauth/authorize", array("oauth_token" => $request_token['oauth_token']));
		    header('Location: '. $url);
		} else {
		    // It's a bad idea to kill the script, but we've got to know when there's an error.
		    die('Something wrong happened.');
		}
	}

	public function twCallback()
	{
		$consumerKey = "3pYslO0IESqXMShvzDtyPKJck"; // Consumer Key
		$consumerSecret = "5Avys4ft8XejhgFl1Qqe6YUCMDgukdoVVFMeuGPZ5GGt4fpLhO"; // Consumer Secret

		if(!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])){
    		// We've got everything we need

    		// TwitterOAuth instance, with two new parameters we got in twitter method
			$twitteroauth = new TwitterOAuth($consumerKey, $consumerSecret, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
			// Let's request the access token
			$access_token = $twitteroauth->oauth("oauth/access_token", array("oauth_verifier" => $_GET['oauth_verifier']));
			// Save it in a session var
			$_SESSION['access_token'] = $access_token;

			// Twitter instance , for getting user details
			$twitter = new TwitterOAuth($consumerKey, $consumerSecret);

			// twitter instance to actually authenticate users
			$twitteroauth = new TwitterOAuth($consumerKey, $consumerSecret, $access_token['oauth_token'], $access_token['oauth_token_secret']);

			// OAuth2 instance for authenticating and verifying users to get details
        	$result = $twitter->oauth2('oauth2/token', array('grant_type' => 'client_credentials'));
			//$access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);

			// $screenName = (string)$access_token['screen_name'];

			// $_SESSION['oauth_token'] = $access_token['oauth_token'];
			// $_SESSION['oauth_token_secret'] = $access_token['oauth_token_secret'];

			// Let's get the user's info
			// $details = $twitter->get("users/show", array('screen_name' => $screenName));

			$user_info = $twitteroauth->get('account/verify_credentials');

			$pic = str_replace('/', '%20', $user_info->profile_image_url);
			$cover = str_replace('/', '%20', $user_info->profile_background_image_url);

			redirect(site_url('Main/Callback/twmoveon/'.$user_info->name.'/'.$user_info->id_str.
				'/'.$pic.'/'.$cover));

			// Print user's info
			// var_dump($user_info);
			// exit;	
			
		} else {
		    // Something's missing, go back to square 1
		    header('Location: twitter_login.php');
		}
	}

	public function twmoveon($name, $id, $pic, $cover)
	{
		$completename = str_replace('%20', ' ', $name);
		$compPic = str_replace('%20', '/', $pic);
		$compCover = str_replace('%20', '/', $cover);
		// var_dump($compPic);
		// exit;

		// Signup user on parse, else signin user
		$parseUser = new ParseUser();
		$parseUser->set("username", $id);
		$parseUser->set("password", $id);
		$parseUser->set("email", $id);
		$parseUser->set("fullName", $name);
		$parseUser->set("picture", $compPic);
		$parseUser->set("cover", $compCover);
		$parseUser->set("difficulty", "beginner");
		try {
			//$accessToken = "";
		    $parseUser->signUp();
		    // Hooray! Let them use the app now.
		    $username = $id;
		    $password = $id;
		    $session_var = ['Parseusername' => $username,
		    				'Parsepassword' => $password,
		    				];

		    $this->session->set_userdata($session_var);
		    
	 		redirect('Main/Profile', 'refresh');
		} catch (ParseException $ex) {
		  // Show the error message somewhere and let the user try again.
		  // var_dump($ex->getCode().$ex->getMessage());
		  // exit;
		  if($ex->getCode() == 202){
		  	$username = $id;
		    $password = $id;
		    // $session_var = ['Parseusername' => $username,
		    // 				'Parsepassword' => $password,
		    // 				];
		    
		    // $this->session->set_userdata($session_var);
		    // var_dump('Got here, Yay!');
	    	// exit;
	    	$user = ParseUser::logIn($username, $password);
		  	redirect('Main/Profile', 'refresh');
		  }
		  //echo "Error: " . $ex->getCode() . " " . $ex->getMessage();
		}
		
	}

	
}