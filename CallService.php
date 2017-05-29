<?php 
	class CallService{
		
		public static function callServices($data, $destination){
			
			if(strcmp($destination, "Civil Registry") == 0){
				
				$fields = array(
					"TCNumber" => $data
				);
				
				$url = "http://civilregistry.webege.com/validatePerson.php/?" . http_build_query($fields);
				
				$headers = array(
					"Content-Type: application/json"
				);
				
				$ch = curl_init();
		
				// set the url, number of GET vars, GET data
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POST, false);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				// TRUE to return the transfer as a string of the return value of curl_exec() 
				// instead of outputting it out directly
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
				// FALSE to stop cURL from verifying the peer's certificate.
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				
				// execute request
				$result = curl_exec($ch);
				
				// close cURL resource, and free up system resources
				curl_close($ch);
				
				$returnResult = json_decode($result, true);

				return $returnResult["persons"];
			}
			else{
				
				
			}
		}
	}
?>