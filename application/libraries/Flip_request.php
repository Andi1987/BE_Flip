<?php
 
class Flip_request {
		
	public function __construct() {
		
    }
	
	
	public function flip_post($post_data){
		return $this->post_request_curl('disburse', $post_data);
	}

	public function flip_get($url){
		return $this->get_request_curl('https://nextar.flip.id/disburse/'.$url);
	}
	
	private function post_request_curl($path, $post_data){
		
		$curl = curl_init();
		
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_data));

        curl_setopt($curl, CURLOPT_URL, 'https://nextar.flip.id/'.$path);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic ' . base64_encode('HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41' . ':'),
            'Content-Type: application/x-www-form-urlencoded',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($curl);

        if(!$response) {
			die("Connection Failed");
		}

        curl_close($curl);

        return json_decode($response, true);

	}
	
	public static function get_request_curl($url){
	
        $curl = curl_init();
	
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Authorization: Basic ' . base64_encode('HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41' . ':'),
            'Content-Type: application/x-www-form-urlencoded',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

        $response = curl_exec($curl);

        if(!$response) {
			die("Connection Failed");
		}

        curl_close($curl);

        return json_decode($response, true);
    }
    
}
