<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseQuery;
use Parse\ParseSessionStorage;
use Parse\ParseClient;

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

		$fb = new Facebook\Facebook([
		  'app_id' => '1630991853823416',
		  'app_secret' => '5970b129fe7f15f55534e060aef703a7',
		  'default_graph_version' => 'v2.2',
		  ]);
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email', 'user_likes']; // optional
		$loginUrl = $helper->getLoginUrl(site_url('Main/Callback'), $permissions);

		$currentUser = ParseUser::getCurrentUser();
		// var_dump($currentUser);
		// exit;
		if($currentUser){
			redirect('Main/Profile', 'refresh');
		}else{
			$sendLogin = $this->header($loginUrl);
			$this->load->view('signin_page', $sendLogin, false);
		}
	}

	public function header($loginurl)
	{
		return array('loginUrl' => $loginurl, 
					);
	}

	public function test()
	{
		echo "hello, it is me :)....(In Adele's voice...)";
	}
}
