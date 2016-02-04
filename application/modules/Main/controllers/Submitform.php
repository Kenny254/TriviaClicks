<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * undocumented function
 *
 * @return void
 * @author 
 **/
use Parse\ParseUser;
use Parse\ParseObject;
use Parse\ParseClient;
use Parse\ParseSessionStorage;


class Submitform extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		ParseClient::setStorage( new ParseSessionStorage() );

		// Load Parse Initialization Library
		$this->load->library(array('Parseinit'));
	}

	public function index()
	{
		var_dump($_POST);
		exit;
	}

}

/* End of file Logout.php */
/* Location: ./application/modules/dashboard/controllers/Logout.php */