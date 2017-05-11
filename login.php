<?php
	
	require_once("K:\PHP\htdocs\project\BusinessLayer\Logic_Login.php");
	require_once("K:\PHP\htdocs\project\BusinessLayer\Logic_User.php");
	require_once("K:\PHP\htdocs\project\BusinessLayer\User.php");
	
	function Redirect($url, $statusCode = 303)
	{
				
		if (headers_sent() === false)
		{
			header('Location: ' . $url, true, $statusCode);
		}

		exit();	/*Destruct the this page */
	}
	
	$errorMeesage = "";
	
	if(isset($_POST["PhoneNumber"])&& isset($_POST["Password"])) {

		$phoneNumber = trim($_POST["PhoneNumber"]);
		$password = trim($_POST["Password"]);
					
		$errorMeesage = "";
		
		$result = Logic_Login::login($phoneNumber, $password);
		$name = Logic_Login::getName($phoneNumber);
		$id = Logic_User::getIDWithPhoneNumber($phoneNumber);
		
		if(!$result) {
		
			$errorMeesage = "Giriş başarısız!";
		}
		else{	/* If user has been logged in and returned success message, user will be redirected to the home page */

			setcookie("Name", $name, time() + (1000), "/");
			setcookie("ID", $id, time() + (1000), "/");
			redirect('http://localhost:8080/project/homePage.php', false);	/* Go to home page */
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
			include 'head.php';
			echo "<title>Tele.com - Login</title>";
		?>
	</head>
	<body class="bgColor">
		<?php 
			//include 'navbar.php';
		?>
		<div class = "container col-md-4 col-md-offset-4" style="background-color: #fff; border-radius: 5px; margin-top: 240px;">
			<form class="form-horizontal" action="<?php $_PHP_SELF ?>" method="POST">
			
				<fieldset>	<!-- İleride form üzerinde ki etkileri barındıracak-->
					<div  align="center" id="legend">	<!-- üstteki register yazısı ortalanması -->
					  <legend class="telecomMavisi" style="margin-top:60px;><h1><b><font color="#2eccfa">LOGIN</font></h1></legend>
					</div>
					
					<div class="control-group" >
					  <!-- ID -->
					  <!-- When used together with the <label> element, the for attribute specifies which form element a label is bound to. -->
					  <div class="controls" style="margin-top:50px;">
						<input type="number" id="PhoneNumber" name="PhoneNumber" placeholder="Phone Number" class="input-xlarge col-md-12" min = "05000000000" max = "05999999999" required title="Please enter Phone Number. Its length must be 11 digits."> <!-- Uzunluk kısıtlaması -->
					  </div>
					</div>
				 
					<div class="control-group">
					  <!-- name -->
					  <div class="controls" style="margin-top:100px;">
						<input  pattern=".{6,}" type="password" id="password" name="Password" placeholder="Password" class="input-xlarge col-md-12"  required title="Please Password. Its length exactly 6."> <!-- Uzunluk kısıtlaması -->
			
					  </div>
					</div>
					<div class="control-group">
					  <!-- Button -->
					  <div class="controls" style="margin-top:150px;">
						<button class="btn btn-info col-md-12" style="margin-bottom: 60px;">Login</button>
					  </div>
					</div>
				</fieldset>
			</form>
		</div>
		<div class="container col-md-6 col-md-offset-5">
			<p style="color: #fff; margin-top: 10px;"><b>Do not you have an account?&nbsp </b><span><a href="register.php" style="font-size: 17px;"><b>Register</b></a></span></p>
		</div>
		<div class ="atBottom" id="legend align="bottom">	<!-- üstteki register yazısı ortalanması -->
			<legend class="col-md-4 col-md-offset-4"><h1><b><font color="#2eccfa">&nbsp</font></b></h1></legend>
		</div>
		<div class="atBottom" style="bottom: 0px;">
			<p><b><h4 class="col-md-offset-5" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTele.Com <?php include 'footer.php'?></h4></b></p>
		</div>
	</body>
</html>