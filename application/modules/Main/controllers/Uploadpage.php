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
		// $testObject = ParseObject::create("TestObject");
		// $testObject->set("foo", "bar");
		// $testObject->save();
		$info = $this->header();	
		$this->load->view('uploadpage', $info, false);
	}

	public function header()
	{
		return array('imageinfo' => $this->imagequery->findImage(), 
					);
	}

	public function upload()
	{
		if ($this->input->post('upload')) {
			$upload = $this->input->post('upload');
			$upload1 = $_FILES ;
			$filePath = site_url('assets');
			$fileToUpload = $filePath . '/'.$_FILES['upload']['name']['file'];
			$imageId = $upload['image'];
			//$fileToUpload = $upload['file'];
			$fileName = $imageId.'.json';
			// $quesnum = (int)$upload['quesnum'];
			// $question = $upload['question'];
			// $answer = $upload['answer'];
			// $choices = $upload['choices'];
			// $explain = $upload['explain'];
			// $tag = $upload['tag'];

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
			// $array = [];
			// $finalArray;
			
			// for ($i=0; $i < count($quesnum); $i++) { 
			// 	# code...
			// 	$pieces5 = explode(",", $pieces);
			// 						$finalArray = ['choices' => $pieces5,
			// 									   'correct' => $pieces2,
			// 									   'explanation' => $pieces3,
			// 									   'image' => "http://upload.wikimedia.org/wikipedia/commons",
			// 									   'question' => $pieces1,
			// 									   'tag' => $pieces4
			// 									  ];
			// 						$array = ['quiz' => [$finalArray]
			// 								 ];
			// 					    var_dump($array);
			// }
				// for ($i=0; $i < count($pieces2); $i++) { 
				// 	for ($i=0; $i < count($pieces3); $i++) { 
				// 		for ($i=0; $i < count($pieces1); $i++) { 
				// 			for ($i=0; $i < count($pieces4); $i++) { 
				// 			 	for ($i=0; $i < count($choiceArray); $i++) { 
				// 					$object = $choiceArray[$i];
				// 					$pieces = explode(",", $object);
				// 					$finalArray = ['choices' => $pieces,
				// 								   'correct' => $pieces2[$i],
				// 								   'explanation' => $pieces3[$i],
				// 								   'image' => "http://upload.wikimedia.org/wikipedia/commons",
				// 								   'question' => $pieces1[$i],
				// 								   'tag' => $pieces4[$i]
				// 								  ];
				// 					$array = ['quiz' => [$finalArray]
				// 							 ];
				// 					// for ($i=0; $i < count($array); $i++) { 
				// 					// 	$array1 = ['quiz' => [$array['quiz']]
				// 					// 		 ];
				// 					// 	var_dump($array1);
				// 					// }
				// 					//$finale = implode(" ", $array);
									
				// 				}
				// 			}
				// 		}
				// 	} 
				// }
			//exit;
			//exit;

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
				notify('success', 'Image Uploaded Succesfully', 'Main/Uploadpage');
			}


		}
	}
}
