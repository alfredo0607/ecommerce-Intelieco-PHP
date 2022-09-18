<?php

class LOGUEADO {

    static function LOGIN($data){
        $logueado = $data;
        return $logueado;
    }


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

    static function DELETE($URL){
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$URL);
		curl_setopt($ch,CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch,CURLOPT_TIMEOUT, 20);
		curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
		$response = curl_exec($ch);
		curl_close ($ch);
		return $response;
	}

}
    
