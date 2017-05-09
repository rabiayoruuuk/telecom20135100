<?php
	if(isset($_POST['PhoneNumber'])) {
		// connect DB
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "telecom";

		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if ($conn->connect_error) {
			die("Connection error: " . $conn->connect_error);
		}
		
		$conn->set_charset("utf8");
		
		// read POST variables
		$format = strtolower($_POST['format']) == 'json' ? 'json' : 'xml'; // xml is the default
		
		$phoneNumber = $_POST['PhoneNumber'];
		// prepare, bind and execute SQL statement
		$stmt = $conn->prepare("SELECT phoneNumber FROM user WHERE PhoneNumber = ?");
		$stmt->bind_param("s", $phoneNumber); // si: string integer
		$stmt->execute();
		$stmt->bind_result($phoneNumber);
		
		$number = array();
		$checkIsFılled = 0;	/* While döngüsüne girmediyse elemanı yok demektir */
		while ($stmt->fetch()) {
			array_push( $number, array("Yes") );
			$checkIsFılled = 1;
		}
		
		if($checkIsFılled === 0){
			
			array_push( $number, array("No") );
		}
		
		$stmt->close(); // close statement
		

		if($format == 'json') { // JSON output
			header('Content-type: application/json');
			if($checkIsFılled === 1){
				
					echo json_encode(array('Result'=>"Yes"));
			}
			else{
				
				echo json_encode(array('Result'=>"No"));
			}
		}
		else { // XML output
			header('Content-type: text/xml');
			
			if(!empty($number)){
				
				foreach($number as $index => $numberIndex) {
					
					echo '<result>';
					foreach($numberIndex as $key => $value) {
						echo htmlentities($value);
					}
					echo '</result>';
				}	
			}
		}
		
		$conn->close(); // close DB connection
	}
?>		