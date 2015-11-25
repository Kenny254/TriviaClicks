<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseQuery;
use Parse\ParseSessionStorage;
use Parse\ParseClient;

class Scoreboard extends CI_Controller {

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
		$currentUser = ParseUser::getCurrentUser();
		if($currentUser){
			$scoreboardDetails = $this->header();
			$this->load->view('scoreboard', $scoreboardDetails, false);
		}else{
			redirect('Main/Main','refresh');
		}
	}

	public function header()
	{
		$query = ParseUser::query();
		$query->descending("points"); 
		$results = $query->find();
		$userInfo = [];
		for ($i=0; $i < count($results); $i++) { 
			$object = $results[$i];
			$userInfo[] = ['picture' => $object->get('picture'),
						   'name' => $object->get('fullName'),
						   'points' => $object->get('points'),
						   'difficulty' => $object->get('difficulty'),
						   'cash' => $object->get('cash'),
						  ];
		}
		return ['userInfo' => $userInfo,
		
			   ];
	}
}
