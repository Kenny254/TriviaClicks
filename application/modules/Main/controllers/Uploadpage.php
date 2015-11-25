<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Parse\ParseObject;
use Parse\ParseUser;
use Parse\ParseQuery;
use Parse\ParseSessionStorage;
use Parse\ParseClient;

class Uploadpage extends CI_Controller {

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
	public function __construct()
	{
		parent::__construct();
		$this->load->model('query/Imagequery_model', 'imagequery');
		$this->load->helper(['notification_helper']);
	}
	public function index()
	{ 
		$info = $this->header();	
		$this->load->view('setquestions', $info, false);
	}

	public function header()
	{
		return array('imageinfo' => $this->imagequery->findCategory(), 
					);
	}

	public function gameQuery($categoryId)
	{
		$category = new ParseObject("Categories", $categoryId);
		$query = new ParseQuery("Images");
		$results = $query->equalTo("category", $category)
		->find();
		$imageInfo = [];

        for ($i = 0; $i < count($results); $i++) {
	        $object = $results[$i];
	        $imageInfo[$object->getObjectId()] = $object->get('name');
      	}
      	echo json_encode($imageInfo) ;
	}

	public function upload()
	{
		if ($this->input->post('upload')) {
			$upload = $this->input->post('upload');
			// $upload1 = $_FILES ;
			// $filePath = site_url('assets');
			// $fileToUpload = $filePath . '/'.$_FILES['upload']['name']['file'];
			// $imageId = $upload['image'];
			// //$fileToUpload = $upload['file'];
			// $quesnum = (int)$upload['quesnum'];
			$imageId = $upload['gameId'];
			$fileName = $imageId.'.json';
			$question = $upload['question'];
			$answer = $upload['answer'];
			$optiona = $upload['optiona'];
			$optionb = $upload['optionb'];
			$optionc = $upload['optionc'];
			$optiond = $upload['optiond'];
			$choicesArray;
			//$choices = $upload['choices'];
			$explain = $upload['explain'];
			$tag = $upload['tag'];

			for ($i=0; $i < count($upload['optiona']); $i++) { 
				for ($i=0; $i < count($upload['optionb']); $i++) { 
					for ($i=0; $i < count($upload['optionc']); $i++) { 
						for ($i=0; $i < count($upload['optiond']); $i++) {
							$array = [$upload['optiona'][$i], $upload['optionb'][$i], $upload['optionc'][$i], $upload['optiond'][$i]];
							$choicesArray[] = $array;
							//var_dump($array); 
						 // 	for ($i=0; $i < count($choiceArray); $i++) { 
							// 	$object = $choiceArray[$i];
							// 	$pieces = explode(",", $object);
							// 	$secondArray = ['choices' => $pieces,
							// 				   'correct' => $pieces2[$i],
							// 				   'explanation' => $pieces3[$i],
							// 				   'image' => "http://upload.wikimedia.org/wikipedia/commons",
							// 				   'question' => $pieces1[$i],
							// 				   'tag' => $pieces4[$i]
							// 				  ];
							// 	$finalArray[] = $secondArray;									
							// }
						}
					}
				} 
			}

			// var_dump(json_encode($choicesArray));
			// exit;

			// $pieces = explode("; ", $choices);
			// $pieces1 = explode("; ", $question);
			// $pieces2 = explode("; ", $answer);
			// $pieces3 = explode("; ", $explain);
			// $pieces4 = explode("; ", $tag);
			// $choiceArray = $pieces;
			// $questionArray = $pieces1;
			// $answerArray = $pieces2;
			// $explainArray = $pieces3;
			// $tagArray = $pieces4;
			// $array;
			$finalArray;
			// $secondArray;

			for ($i=0; $i < count($upload['question']); $i++) { 
				for ($i=0; $i < count($upload['answer']); $i++) { 
					for ($i=0; $i < count($upload['explain']); $i++) { 
						for ($i=0; $i < count($upload['tag']); $i++) { 
						 	for ($i=0; $i < count($choicesArray); $i++) { 
							// 	$object = $choiceArray[$i];
							// 	$pieces = explode(",", $object);
								$secondArray = ['choices' => $choicesArray[$i],
											   'correct' => $upload['answer'][$i],
											   'explanation' => $upload['explain'][$i],
											   'image' => "http://upload.wikimedia.org/wikipedia/commons",
											   'question' => $upload['question'][$i],
											   'tag' =>$upload['tag'][$i]
											  ];
								$finalArray[] = $secondArray;									
							}
						}
					}
				} 
			}
			$array = ['quiz' => $finalArray,
				       ];
			$fileToUpload = json_encode($array);
			// var_dump($fileToUpload);
			// exit;

			$status1 = true;

			$assignBeacParse = $this->imagequery->doUpload($imageId, $fileToUpload, $fileName);

			if (!$assignBeacParse['status']){
				$status1 = false;
			}

			if (!$status1){
				//echo "fuck";
				notify('danger', $assignBeacParse['parseMsg'], 'Main/Uploadpage');
			}else{
				echo "Please wait, we'll take you back to the dashboard right away...";
				notify('success', 'Question Uploaded Succesfully', 'Main/Uploadpage');
			}


		}
	}
}
