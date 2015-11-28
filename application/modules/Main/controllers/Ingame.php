<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseFile;
use parse\ParseClient;
use Parse\ParseQuery;
use Parse\ParseException;
use Parse\ParseSessionStorage;

class Ingame extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		//$this->load->model('query/Imagequery_model', 'imagequery');
		ParseClient::setStorage( new ParseSessionStorage() );
		//ParseUser::enableRevocableSession();
	}

	public function index()
	{
		// $currentUser = ParseUser::getCurrentUser();
		// // var_dump($currentUser);
		// // exit;
		// if($currentUser){
		// 	$viewData = $this->header();
		// 	$this->load->view('ingame', $viewData, false);
		// }else{
		// 	redirect('Main/Main','refresh');
		// }

	}

	public function play($gameId)
	{
		$currentUser = ParseUser::getCurrentUser();
		// var_dump($currentUser);
		// exit;
		if($currentUser){
			$viewData = $this->header($gameId, $currentUser->get("fullName"), $currentUser->get("cover"), $currentUser->get("picture"));
			$this->load->view('game', $viewData, false);
		}else{
			redirect('Main/Main','refresh');
		}
	}

	public function header($gameId, $userName, $coverPhoto, $profilePic)
	{
		$currentUser = ParseUser::getCurrentUser();
		$gameObj = new ParseQuery("Images");
		$result = $gameObj->equalTo("objectId", $gameId)->first();
		$objectUrl = $result->get('game');
		$gamepicUrl = $result->get('image');
		$gamePic = $gamepicUrl->getUrl();
		// var_dump($objectUrl->getUrl());
		// exit;
		//$url = $objectUrl->fetch();
		return ['name' => $userName,
				'gamePic' => $gamePic,
				'coverPhoto' => $coverPhoto,
				'profilePic' => $profilePic,
				'gameJson' => $objectUrl->getUrl(),
				'difficulty' => $currentUser->get("difficulty"),
				];
	}

	public function givePoints($point)
	{		
		$currentUser = ParseUser::getCurrentUser();
		//$currentUser->set("points", $point);

		$appId = '0hLdfJbYiaNkyd1ZOtWnfTyFgkVsGltsjj80WcK8';
        $restKey = 'YROitDMLUABWCLIOeDx5nZh67FYAHpZFCnyEko59';
        $operation = ['__op' => 'Increment',
        			  'amount' => (int)$point
        			 ];
        $updatedDataArray = ['points' => $operation,
	                        ];
        $updatedData = json_encode($updatedDataArray);
        $ch = curl_init();

        // set a single option...
        //curl_setopt($ch, OPTION, $value);
        // ... or an array of options
        curl_setopt_array($ch, array( 
            CURLOPT_URL => 'https://api.parse.com/1/users/'. $currentUser->getObjectId(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => $updatedData,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => array(
                "X-Parse-Application-Id: " . $appId,
                "X-Parse-Master-Key: " . $restKey,
                "Content-Type: application/json")
        ));

        // free
      $output = curl_exec($ch);
      if($output){
        echo $output;
      }
      else{
        echo 'false';
      }
     
      curl_close($ch);
	}

}