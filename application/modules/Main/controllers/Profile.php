<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseQuery;
use Parse\ParseException;
use Parse\ParseSessionStorage;
use Parse\ParseFile;
use Parse\ParseClient;

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('query/Imagequery_model', 'imagequery');
		ParseClient::setStorage( new ParseSessionStorage() );
	}

	public function index()
	{
		// $array = ['quiz' => [['choices' => ['sir author', 'something else'],
			// 					  'correct' => 'sir author',
			// 					  'explanation' => 'blah blah blah',
			// 					 ],
			// 					 ['choices' => ['sir author', 'something else'],
			// 					  'correct' => 'sir author',
			// 					  'explanation' => 'blah blah blah',
			// 					  ],
			// 					  ['choices' => ['sir author', 'something else'],
			// 					  'correct' => 'sir author',
			// 					  'explanation' => 'blah blah blah',
			// 					  ]		 
		// 					]
		// 		];
		// $newArray = json_encode($array);
		// var_dump($newArray);
		// exit;

		// $query = new ParseQuery("Images");
		// $result = $query->ascending("updatedAt")->limit(44)->find();
		// for($i = 0; $i < count($result); $i++){
		// 	$object = $result[$i];
		// 	$localFilePath = site_url('assets/1.json');
		// 	$file = ParseFile::createFromFile($localFilePath, $object->getObjectId().".json");
		// 	$object->set("game", $file);
		// 	$object->save();
		// }
		// echo 'All done!';
		// exit;

		// $operation = ['__op' => 'increment',
  //       			  'amount' => 56
  //       			 ];
  //       $updatedDataArray = ['points' => $operation,
	 //                        ];
  //       $updatedData = json_encode($updatedDataArray);
  //       var_dump($updatedData);
  //       exit;

		if(isset($_SESSION['facebook_access_token'])){
			$this->session->unset_userdata('facebook_access_token');
		}
		$username = $this->session->userdata('Parseusername');
		$password = $this->session->userdata('Parsepassword');
		$currentUser = ParseUser::getCurrentUser();

		if($currentUser){
			$name = $currentUser->get("fullName");
		    $picture = $currentUser->get("picture");
		    $coverPhoto = $currentUser->get("cover");
		    $userId = $currentUser->getObjectId();

		    // var_dump($currentUser);
		    // exit;
		    $userStuff = $this->header($userId, $name, $picture, $coverPhoto);
  			$this->load->view('profile', $userStuff, false);

		}else{
			try {
				if(is_null($username) || is_null($password)){
					redirect('Main/Main', 'refresh');
				}else{

				    $user = ParseUser::logIn($username, $password);
				    $recentUser = ParseUser::getCurrentUser();
				    
					if ($recentUser) {
					    // do stuff with the user
					    $name = $recentUser->get("fullName");
					    $picture = $recentUser->get("picture");
					    $coverPhoto = $recentUser->get("cover");
					    $userId = $recentUser->getObjectId();

					    $userStuff = $this->header($userId, $name, $picture, $coverPhoto);
			  			$this->load->view('profile', $userStuff, false);

					} else {
					    // show the signup or login page
					    redirect('Main/Main', 'refresh');
					}
				}
			} catch (ParseException $error) {
			  // The login failed. Check error to see why.
			  echo $error;
			  exit;
			}
		}

	}

	public function header($userId, $userDetails, $pic, $cover)
	{
		$query = ParseUser::query();
		$query->notEqualTo("objectId", $userId); 
		$results = $query->find();
		$personQuery = [];
		for ($i = 0; $i < count($results); $i++) {
          $object = $results[$i];
          $objectUrl = $object->get('image');
          $personQuery[] = ['userId' => $object->getObjectId(),
                             'userPic' => $object->get('picture'),
                             'userName' => $object->get('fullName'),
                            ];
        }
		return array('username' => $userDetails, 
					 'picture' => $pic,
					 'cover' => $cover,
					 'followArray' => $this->imagequery->checkFollow(),
					 'personQuery' => $personQuery,
					);
	}

}