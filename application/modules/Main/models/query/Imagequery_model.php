<?php

/*ImageQuery_model
This model gets images necessary for the topics view
using the various functions for each category.
Database used all through this project is Facebook's Parse.com Platform as a service.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use Parse\ParseUser;
use Parse\ParseException;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParseRole;
use parse\ParseClient;
use Parse\ParseSessionStorage;
use Parse\ParseFile;

class Imagequery_model extends CI_Model {

	public function __construct()
    {
            parent::__construct();
            ParseClient::setStorage( new ParseSessionStorage() );
    }

    public function doUpload($imageId, $fileToUpload, $fileName)
    {
        $localFilePath = $fileToUpload;
        $file = ParseFile::createFromFile($localFilePath, $fileName);

        $image = new ParseObject("Images", $imageId);
        $image->set("game", $file);

        try{
            $image->save();
            return ['status' => true,];
        }catch(ParseException $ex){
            return ['status' => false, 'parseMsg' => $ex->getMessage()];
        }
    }

    public function findCategory()
    {
        $query = new ParseQuery("Categories");
        $results = $query->ascending("name")
        ->find();

        // $query = new ParseQuery("Images");
        // $results = $query->equalTo("category", $result)
        // ->find();
        $imageInfo = [];

        for ($i = 0; $i < count($results); $i++) {
        $object = $results[$i];
        $imageInfo[$object->getObjectId()] = $object->get('name');
      }
      return $imageInfo;

    }

    public function checkFollow()
    {
        $currentUser = ParseUser::getCurrentUser();
        $query = new ParseQuery("Images");
        $followerInfo = [];
        $followfollow = 'Unfollow';
        $result = $query->equalTo("followers", $currentUser->getObjectId())
        ->find();

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $objectUrl = $object->get('image');
          $followerInfo[] = ['objId' => $object->getObjectId(),
                             'objUrl' => $objectUrl->getUrl(),
                             'objName' => $object->get('name'),
                             'objFollow' => $followfollow,
                            ];
        }
        return $followerInfo;
    }

    public function artQuery()
    {
        session_write_close();
        $currentUser = ParseUser::getCurrentUser();
        // var_dump($currentUser->getSessionToken());
        // exit;
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "ArtAndDesign");
        $object = $catQuery->first();

        //$print_r = print_r(ParseUser::getCurrentUser(), true);

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
            $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          $objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;

    }

    public function fetchAll()
    {
        $imgQuery = new ParseQuery("Images");
        //$imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        // var_dump($result); exit;
        $imgInfo = [];

            //$print_r = print_r(ParseUser::getCurrentUser(), true);
        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];

          $objectUrl = $object->get('image');
          $imgInfo[$object->getObjectId()] = array('url' => $objectUrl->getUrl(), 
                                                   'name' => $object->get('name'), 
                                                   'games' => ParseUser::getCurrentUser()->get('gamesFollowing')->getQuery()->select(print_r($object, true))->first(),
                                                   );
          var_dump($imgInfo);
        }

        //return $imgInfo;
    }

    public function busQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "Business");
        $object = $catQuery->first();

        //$print_r = print_r(ParseUser::getCurrentUser(), true);

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
            $object = $result[$i];
            $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          $objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

    public function eduQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "Educational");
        $object = $catQuery->first();

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          $objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

    public function entQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "Entertainment");
        $object = $catQuery->first();

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          //$objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        //'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

    public function foodQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "FoodAndDrink");
        $object = $catQuery->first();

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          $objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

    public function gameQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "Games");
        $object = $catQuery->first();

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          $objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

    public function genQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "General");
        $object = $catQuery->first();

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          //$objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        //'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

    public function histQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "History");
        $object = $catQuery->first();

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          $objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

    public function litQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "Literature");
        $object = $catQuery->first();

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          $objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

    public function movQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "Movies");
        $object = $catQuery->first();

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          $objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

    public function musQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "Music");
        $object = $catQuery->first();

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          $objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

    public function natQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "Nature");
        $object = $catQuery->first();

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          $objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

    public function sciQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "Science");
        $object = $catQuery->first();

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          $objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

    public function spoQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "Sports");
        $object = $catQuery->first();

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          $objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

    public function tvQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "Tv");
        $object = $catQuery->first();

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          $objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

    public function worldQuery()
    {
    	$catQuery = new ParseQuery("Categories");
        $catQuery->equalTo("name", "TheWorld");
        $object = $catQuery->first();

        $imgQuery = new ParseQuery("Images");
        $imgQuery->equalTo("category", $object);
        $result = $imgQuery->find();
        $imgInfo = [];
        $followfollow = '';

        for ($i = 0; $i < count($result); $i++) {
          $object = $result[$i];
          $final = $object->get('followers');
            if(empty($final)){
                $followfollow = 'Follow';
            }else{
                if(in_array(ParseUser::getCurrentUser()->getObjectId(), $final)){
                $followfollow = 'Unfollow';
                }
            }
          $objectUrl = $object->get('image');
          $objectUrl1 = $object->get('lilImage');
          $imgInfo[] = ['objId' => $object->getObjectId(),
                        'objUrl' => $objectUrl->getUrl(),
                        'objName' => $object->get('name'),
                        'objFollow' => $followfollow,
                        'lilImg' => $objectUrl1->getUrl(),
                        ];
        }

        return $imgInfo;
    }

}