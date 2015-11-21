<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseFile;
use parse\ParseClient;
use Parse\ParseQuery;
use Parse\ParseException;
use Parse\ParseSessionStorage;

class Topics extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('query/Imagequery_model', 'imagequery');
		ParseClient::setStorage( new ParseSessionStorage() );
		//$this->output->enable_profiler(TRUE);
		//ParseUser::enableRevocableSession();
	}

	public function index()
	{
		

		// $image = ParseUser::getCurrentUser();
		// $relation = $image->getRelation("gamesFollowing");
		// $relation->add(new ParseObject("Images", 'S9BBETlaGR'));
		// try{
		// 	$image->save();
		// 	echo 'true';
		// 	exit;
		// }catch(ParseException $ex){
		// 	echo 'false';
		// 	exit;
		// }

		// $countryQuery = new ParseQuery("Categories");
	 //    $countryQuery->equalTo("name", "ArtAndDesign");
	 //    $object = $countryQuery->first();
		// $img = new ParseObject("Images", 'XEDFuHzUHv');
		
		// $localFilePath = site_url('assets/Art%20and%20design/arts/7.png');
		// $file = ParseFile::createFromFile($localFilePath, "Artlil7.png");
		// //$file->save();
		// $img->set("lilImage", $file);
		// //$img->set("category", $object);
		// try {
		// 	$img->save();
		// 	echo 'Done that Nigga! :(';
		// 	exit;
		// } catch (ParseException $e) {
		// 	echo 'Something went wrong Nigga! :(, they said ---- '.$e->getMessage().' ----With this error code---- '. $e->getCode();
		// 	exit;
		// }


		// $image = new ParseQuery("Images", 'S9BBETlaGR');
		// //$image->equalTo("users");
		// //$relation->get('users');
		// try{
		// 	$answer = $image->first();
		// 	//$image->save();
		// 	// $userIn = $answer->getRelation('users');
		// 	// $realUser = ParseUser::getCurrentUser();
		// 	// $containsAllValues = !array_diff($realUser, $userIn);
		// 	$print_r = print_r(ParseUser::getCurrentUser(), true);
		// 	$final = $answer->get('users')->getQuery()->select($print_r)->first();
		// 	if(!empty($final)){
		// 		//exit;
		// 	}else{
		// 		//exit;
		// 	}
		// 	// var_dump($answer->get('users')->getQuery()->select((print_r(ParseUser::getCurrentUser())))->first());
		// 	// exit;
		// }catch(ParseException $ex){
		// 	echo 'false';
		// 	exit;
		// }

		$currentUser = ParseUser::getCurrentUser();
		// var_dump($currentUser);
		// exit;
		if($currentUser){
			$viewData = $this->header();
			$this->load->view('topics', $viewData, false);
		}else{
			redirect('Main/Main','refresh');
		}

	}

	public function header()
	{
		session_write_close();
		return ['artimages' => $this->imagequery->genQuery(),
				// 'busimages' => $this->imagequery->busQuery(),
				// 'eduimages' => $this->imagequery->eduQuery(),
				// 'entimages' => $this->imagequery->entQuery(),
				// 'foodimages' => $this->imagequery->foodQuery(),
				// 'gameimages' => $this->imagequery->gameQuery(),
				// 'genimages' => $this->imagequery->genQuery(),
				// 'histimages' => $this->imagequery->histQuery(),
				// 'litimages' => $this->imagequery->litQuery(),
				// 'movimages' => $this->imagequery->movQuery(),
				// 'musimages' => $this->imagequery->musQuery(),
				// 'natimages' => $this->imagequery->natQuery(),
				// 'sciimages' => $this->imagequery->sciQuery(),
				// 'spoimages' => $this->imagequery->spoQuery(),
				// 'tvimages' => $this->imagequery->tvQuery(),
				// 'worldimages' => $this->imagequery->worldQuery(),
				];
	}

	public function check()
	{
    	echo json_encode('Done');
	}

	public function getIsFollow()
	{
		$followId = $_GET['val'];
		$user = ParseUser::getCurrentUser();
		$image = new ParseObject("Images", $followId);
		$userArray = [$user->getObjectId()];
		$image->addUnique('followers', $userArray);
		// $relation = ParseUser::getCurrentUser()->getRelation("gamesFollowing");
		// $relation->add($image);
		// echo $followId;
		try{
			$image->save();
			$result = ['result' => 'true'
    			  ];
			echo json_encode($result);
		}catch(ParseException $ex){
			$result = ['result' => 'false'
    			  ];
			echo json_encode($result);
		}
	}

	public function removeFollow()
	{
		$followId = $_GET['val'];
		$user = ParseUser::getCurrentUser();
		$image = new ParseObject("Images", $followId);
		$userArray = [$user->getObjectId()];
		$image->remove('followers', $userArray);
		// $relation = ParseUser::getCurrentUser()->getRelation("gamesFollowing");
		// $relation->remove($image);
		// echo $followId;
		try{
			$image->save();
			$result = ['result' => 'true'
    			  ];
			echo json_encode($result);
		}catch(ParseException $ex){
			$result = ['result' => 'false'
    			  ];
			echo json_encode($result);
		}
	}

	public function fetchAll(){
		(array) $this->imagequery->fetchAll();
		//var_dump($results); exit;
		// if (!empty($results)){
		// 	foreach ($results as $result) {
		// 		// var_dump($result);
		// 		var_dump($result->image->name);
		// 		// var_dump($result->image->url);
		// 		var_dump($result->name);
		// 		exit;
		// 	}
		// }
		// var_dump();
		// echo json_encode( (array) $this->imagequery->fetchAll());
		// exit;
	}

	public function artQuery()
	{
		session_write_close();
		echo json_encode($this->imagequery->artQuery());
	}

	public function busQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->busQuery());
    }

    public function eduQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->eduQuery());
    }

    public function entQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->entQuery());
    }

    public function foodQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->foodQuery());
    }

    public function gameQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->gameQuery());
    }

    public function genQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->genQuery());
    }

    public function histQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->histQuery());
    }

    public function litQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->litQuery());
    }

    public function movQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->movQuery());
    }

    public function musQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->musQuery());
    }

    public function natQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->natQuery());
    }

    public function sciQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->sciQuery());
    }

    public function spoQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->spoQuery());
    }

    public function tvQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->tvQuery());
    }

    public function worldQuery()
    {
    	session_write_close();
        echo json_encode($this->imagequery->worldQuery());
    }

}