<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseQuery;
use Parse\ParseClient;
use Parse\ParseException;
use Parse\ParseSessionStorage;
//use Parse\ParseSessionStorage;

class Callback extends CI_Controller {

	public function index()
	{
		ParseClient::setStorage( new ParseSessionStorage() );
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

	
}