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
		
		
		ParseClient::initialize('0hLdfJbYiaNkyd1ZOtWnfTyFgkVsGltsjj80WcK8', 'E3aSKwVbcXlI9CY9bjugz1qO0JhX87OzB0MQSmCE', 'YROitDMLUABWCLIOeDx5nZh67FYAHpZFCnyEko59');
		//ParseClient::setStorage( new ParseSessionStorage() );

	}

}