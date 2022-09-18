<?php

class API2 {

    static function GET($URL){
		$ch= curl_init();
		curl_setopt($ch,CURLOPT_URL,$URL);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_TIMEOUT, 20);
		$response = curl_exec($ch);
		curl_close ($ch);
		return $response;
	}

    static function JSON_TO_ARRAY($json){
		return json_decode($json,true);
	}



}

