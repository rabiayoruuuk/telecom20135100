<?php 

	function Redirect($url, $statusCode = 303)
	{
				
		if (headers_sent() === false)
		{
			header('Location: ' . $url, true, $statusCode);
		}

		exit();	/*Destruct the this page */
	}

	require_once("BusinessLayer/Logic_User.php");
	
	$errorMeesage = "";
	
	if(isset($_POST["ID"]) && isset($_POST["Name"])&& isset($_POST["Surname"])) {
		
		$userID = trim($_POST["ID"]);
		$name = trim($_POST["Name"]);
		$surname = trim($_POST["Surname"]);

		$errorMeesage = "";
		$result = Logic_User::createUser($userID, $name, $surname);
		
		if(!$result) {
		
			$errorMeesage = "Yeni kullanıcı kaydı başarısız!";
		}
		else{	/* If user has been registred and returned success message, user will be redirected to the home page */
			
			setcookie("Name", $name, time() + (100), "/");
			redirect('http://localhost:8080/project/homePage.php', false);	/* Go to home page */
		}
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<?php 
			include 'head.php';
			echo "<title>Tele.com - Register</title>";
		?>
	</head>
	<body>
		<?php 
			//include 'navbar.php';
		?>
		<div>
		
			<img src="main_photo.jpg" class="img-rounded" height="520" margin-top="100px">
		</div>
		<div class = "container col-md-4 col-md-offset-4">
			<form class="form-horizontal" action="<?php $_PHP_SELF ?>" method="POST">
			
				<fieldset>	<!-- İleride form üzerinde ki etkileri barındıracak-->
					<div  align="center" id="legend">	<!-- üstteki register yazısı ortalanması -->
					  <legend class=""><h1><b><font color="#2eccfa">REGISTRATION</font></b></h1></legend>
					</div>
					
					<div class="control-group" >
					  <!-- ID -->
					  <!-- When used together with the <label> element, the for attribute specifies which form element a label is bound to. -->
					  <div class="controls" style="margin-top:20px;">
						<input type="number" id="idNumber" name="ID" placeholder="ID" class="input-xlarge col-md-12" min = "10000000000" max = "99999999999" required title="Please enter T.C ID. Its length must be 11 digits."> <!-- Uzunluk kısıtlaması -->
					  </div>
					</div>
				 
					<div class="control-group">
					  <!-- name -->
					  <div class="controls" style="margin-top:70px;">
						<input type="text" id="name" name="Name" placeholder="Name" class="input-xlarge col-md-5" pattern="[a-zA-Z]{3,25}" required title="Please enter Name. Its length can be 25 letters."> <!-- Uzunluk kısıtlaması -->
					  </div>
					</div>
				 
					<div class="control-group">
					<!-- surname -->
					  <div class="controls" style="margin-top:70px;">
						<input type="text" id="surname" name="Surname" placeholder="Surname" class="input-xlarge col-md-5 col-md-offset-2" pattern="[a-zA-Z]{3,25}" required title="Please enter Surname. Its length can be 25 letters.">	<!-- Uzunluk kısıtlaması -->
					  </div>
					</div>
				 
					<div class="control-group">
					  <!-- Button -->
					  <div class="controls" style="margin-top:120px;">
						<button type="submit" class="btn btn-info col-md-12">Register</button>
					  </div>
					</div>
				</fieldset>
				<div  align="center" id="legend" style =" margin-top: 120px;">	<!-- üstteki register yazısı ortalanması -->
					  <legend class=""><h1><b><font color="#2eccfa">&nbsp</font></b></h1></legend>
				</div>
				<div class="container col-md-12 col-md-offset-5">
					<p><b><h4>Tele.Com <?php include 'footer.php'?></h4></b></p>
				</div>
			</form>
		</div>
	</body>
</html>