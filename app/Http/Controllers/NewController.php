<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewController extends Controller
{
    //
	// this function to add data to data.json file
	public function save(){
		try{
			request()->validate([     // check for data to be more secure
					'Name' => 'max:20|required',
					'Price' => 'integer|required',
				]);
			$jsonString = file_get_contents(base_path('resources/data.json'));  // get array of jeson data from data.json file and
			$AllData = json_decode($jsonString, true);							// then add new data to array
			array_push($AllData,['data.Name'=>request('Name'),'data.Price'=>request('Price')]);  
			$newJsonString = json_encode($AllData, JSON_PRETTY_PRINT);          // then save the new array to data.json file
			file_put_contents(base_path('resources/data.json'), stripslashes($newJsonString));
			return 'done';
		}
		catch(Exception  $ex){		// handel any exception 
			$AllData=['data.Name'=>request('Name'),'data.Price'=>request('Price')];
			$newJsonString = json_encode($AllData, JSON_PRETTY_PRINT);
			file_put_contents(base_path('resources/data.json'), stripslashes($newJsonString));
			return $ex->getMessage();
		}
	}
	
	// this function to get data from data.json file
	public function get(){ 
		try{
			 $jsonString = file_get_contents(base_path('resources/data.json')); //get data from data.json and send it to client
			 $data = json_decode($jsonString, true);
			return $data;
		}catch(Exception  $ex){
			return $ex->getMessage();
		}
	}
}
