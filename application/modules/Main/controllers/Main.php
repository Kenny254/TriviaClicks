<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseQuery;
use Parse\ParseSessionStorage;
use Parse\ParseClient;
use Abraham\TwitterOAuth\TwitterOAuth;

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{ 
		ParseClient::setStorage( new ParseSessionStorage() );


		// $consumerKey = "3pYslO0IESqXMShvzDtyPKJck"; // Consumer Key
		// $consumerSecret = "5Avys4ft8XejhgFl1Qqe6YUCMDgukdoVVFMeuGPZ5GGt4fpLhO"; // Consumer Secret
		// $accessToken = "116684548-d1z5aOleopfr2JLWatkJabAvEIkkAUYl7y8bmBRm"; // Access Token
		// $accessTokenSecret = "Sdti7BnnsDl1NIiUpSyDsxo4DYoMrYrXJfU15MQi7ANTM"; // Access Token Secret

		// $connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
		// $statues = $connection->post("statuses/update", array("status" => "In a few hours I and the @MicrosoftNG #dx team will kick of #HourOfCode in Enugu, NG"));

		// echo 'Status Updated';
		// exit;
		
		// Unset All sessions
		// session_unset($_SESSION['oauth_token']);
		// session_unset($_SESSION['access_token']);
		// session_unset($_SESSION['oauth_token_secret']);

		// This is for facebook
		$fb = new Facebook\Facebook([
		  'app_id' => '1630991853823416',
		  'app_secret' => '5970b129fe7f15f55534e060aef703a7',
		  'default_graph_version' => 'v2.2',
		  ]);
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email', 'user_likes']; // optional
		$loginUrl = $helper->getLoginUrl(site_url('Main/Callback'), $permissions);

		// This is for twitter
		$twloginurl = site_url('Main/Callback/twitter');

		$currentUser = ParseUser::getCurrentUser();
		// var_dump($currentUser);
		// exit;
		if($currentUser){
			redirect('Main/Profile', 'refresh');
		}else{
			$sendLogin = $this->header($loginUrl, $twloginurl);
			$this->load->view('signin_page', $sendLogin, false);
		}
	}

	public function header($loginurl, $twloginurl)
	{
		return array('fbloginUrl' => $loginurl,
					 'twloginUrl' => $twloginurl, 
					);
	}
}
