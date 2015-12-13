<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseQuery;
use Parse\ParseClient;
use Parse\ParseException;
use Parse\ParseSessionStorage;
use Abraham\TwitterOAuth\TwitterOAuth;

class Twcallback extends CI_Controller {

	public function index()
	{
		ParseClient::setStorage( new ParseSessionStorage() );

		$consumerKey = "3pYslO0IESqXMShvzDtyPKJck"; // Consumer Key
		$consumerSecret = "5Avys4ft8XejhgFl1Qqe6YUCMDgukdoVVFMeuGPZ5GGt4fpLhO"; // Consumer Secret
		// The TwitterOAuth instance
		$twitteroauth = new TwitterOAuth($consumerKey, $consumerSecret);

		// Requesting authentication tokens, the parameter is the URL we will be redirected to
		$callback = (string)site_url('Main/Twcallback/callback');
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

	public function callback()
	{
		ParseClient::setStorage( new ParseSessionStorage() );

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
			$twitteroauth1 = new TwitterOAuth($consumerKey, $consumerSecret, $access_token['oauth_token'], $access_token['oauth_token_secret']);

			// OAuth2 instance for authenticating and verifying users to get details
        	// $result = $twitter->oauth2('oauth2/token', array('grant_type' => 'client_credentials'));
			// $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);

			// $screenName = (string)$access_token['screen_name'];

			$_SESSION['oauth_token'] = $access_token['oauth_token'];
			$_SESSION['oauth_token_secret'] = $access_token['oauth_token_secret'];

			// Let's get the user's info
			// $details = $twitter->get("users/show", array('screen_name' => $screenName));

			$user_info = $twitteroauth1->get('account/verify_credentials');

			// $pic = str_replace('/', '%20', $user_info->profile_image_url);
			// $cover = str_replace('/', '%20', $user_info->profile_background_image_url);

			// Signup user on parse, else signin user
			$parseUser = new ParseUser();
			$parseUser->set("username", $user_info->id_str.'@triviatweet.com');
			$parseUser->set("password", $user_info->id_str);
			$parseUser->set("email", $user_info->id_str.'@triviatweet.com');
			$parseUser->set("fullName", $user_info->name);
			$parseUser->set("picture", $user_info->profile_image_url);
			$parseUser->set("cover", $user_info->profile_background_image_url);
			$parseUser->set("difficulty", "beginner");
			try {
				//$accessToken = "";
			    $parseUser->signUp();
			    // var_dump('I am here');
			    // Hooray! Let them use the app now.
			    $username = $user_info->id_str.'@triviatweet.com';
			    $password = $user_info->id_str;
			    $session_var = ['Parseusername' => $username,
			    				'Parsepassword' => $password,
			    				];

			    $this->session->set_userdata($session_var);
			    redirect('Main/Profile', 'refresh');
			} catch (ParseException $ex) {
			  // Show the error message somewhere and let the user try again.
			  // var_dump($ex->getCode().' '.$ex->getMessage());
			  // exit;

			  if($ex->getCode() == 202){
			  	$username = $user_info->id_str.'@triviatweet.com';
			    $password = $user_info->id_str;
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

			// Print user's info
			// var_dump($user_info);
			// exit;	
			
		} else {
		    // Something's missing, go back to square 1
		    header('Location: twitter_login.php');
		}
	}

}