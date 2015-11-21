<?php
		$countryQuery = new ParseQuery("Categories");
	    $countryQuery->equalTo("name", "Tv");
	    $object = $countryQuery->first();
		 $img = new ParseObject("Images");
		// $cat->set("name", "ArtAndDesign");
		// $cat->set("name", "Business");
		// $cat->set("name", "Educational");
		// $cat->set("name", "Entertainment");
		// $cat->set("name", "FoodAndDrink");
		// $cat->set("name", "Games");
		// $cat->set("name", "General");
		// $cat->set("name", "History");
		// $cat->set("name", "Literature");
		// $cat->set("name", "Movies");
		// $cat->set("name", "Music");
		// $cat->set("name", "Nature");
		// $cat->set("name", "Science");
		// $cat->set("name", "Sports");
		//$cat->set("name", "Tv");
		//$cat->set("name", "TheWorld");
		//$localFilePath = "/tmp/myFile.txt";
		$localFilePath = site_url('assets/Tv/9.jpg');
		$file = ParseFile::createFromFile($localFilePath, "Tv9.jpg");
		//$file->save();
		$img->set("image", $file);
		$img->set("category", $object);
		$img->save();




		$countryQuery = new ParseQuery("Categories");
	    $countryQuery->equalTo("name", "Tv");
	    $object = $countryQuery->first();
		$img = new ParseObject("Images");
		// $cat->set("name", "ArtAndDesign");
		// $cat->set("name", "Business");
		// $cat->set("name", "Educational");
		// $cat->set("name", "Entertainment");
		// $cat->set("name", "FoodAndDrink");
		// $cat->set("name", "Games");
		// $cat->set("name", "General");
		// $cat->set("name", "History");
		// $cat->set("name", "Literature");
		// $cat->set("name", "Movies");
		// $cat->set("name", "Music");
		// $cat->set("name", "Nature");
		// $cat->set("name", "Science");
		// $cat->set("name", "Sports");
		//$cat->set("name", "Tv");
		//$cat->set("name", "TheWorld");
		//$localFilePath = "/tmp/myFile.txt";
		$localFilePath = site_url('assets/Tv/9.png');
		$file = ParseFile::createFromFile($localFilePath, "Tv9.png");
		//$file->save();
		$img->set("image", $file);
		$img->set("category", $object);
		try {
			$img->save();
			echo 'Done that Nigga! :(';
			exit;
		} catch (ParseException $e) {
			echo 'Something went wrong Nigga! :(, they said ---- '.$e->getMessage().' ----With this error code---- '. $e->getCode();
			exit;
		}