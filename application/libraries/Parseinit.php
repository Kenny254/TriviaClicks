<?php 
defined('BASEPATH') OR exit('No direct script access allowed');



use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseACL;
use Parse\ParseSessionStorage;

class Parseinit
{
	
	public function __construct()
	{
		// if(session_status() !== PHP_SESSION_ACTIVE){
  //          session_start();
  //       }
		$this->init();
	}

	public function init()
	{
		
		
		ParseClient::initialize('nTcvDgCEIcIVXVhd8NWZKbrvlTPkdfiP4p8tZmHr', 'FeUTtA7IJJNA69A3xapE7jsLOwlUqaWgP8YDm3AC', '7fRIrKCLhXtgKVdOvwxXebsfbuHEh2uViP6wS8P5');
		//ParseClient::setStorage( new ParseSessionStorage() );

	}

}