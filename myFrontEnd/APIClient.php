<?php
class APIClient
{
	
	function call($method, $url, $data = '', $auth = '')
	{
		$curl = curl_init($url);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
		
		switch ($method) {
			case "GET":
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
				break;
			case "POST":
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
				break;
			case "PUT":
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
				break;				
			case "DELETE":
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
				break;
		}
		

		curl_close($curl);

        $error_status ="";
        $response ="";
        return array (
		'response' => $response,
		'status' => $error_status
		);
	}
}
?>