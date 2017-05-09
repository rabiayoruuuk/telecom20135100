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
		while ($stmt->fetch()) {
			array_push( $number, array("Yes") );
		}
		
		$stmt->close(); // close statement
		
		$generatedCode = 0;
		if(!empty($number)){
				
			$generatedCode = generateCode();
		}
		else{	/* When user enters wrong number script is stopped with die();*/
			
			die("Wrong number. Please enter a correct number.");
		}
		if($format == 'json') { // JSON output
		
			header('Content-type: application/json');
			echo json_encode(array('code'=> $generatedCode));
		}
		else { // XML output
			header('Content-type: text/xml');
			
			foreach($number as $index => $numberIndex) {
				
				echo '<code>';
				foreach($numberIndex as $key => $value) {
					
					echo htmlentities($generatedCode);
				}
				echo '</code>';
				
			}
		}
		
		$conn->close(); // close DB connection
	}
	
	function generateCode(){
		
		$code;
		
		$code = rand(100000, 999999);
		/* code ile phone number birbirine baðlanmalý*/
		return $code;
	}
?>		