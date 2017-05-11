<?php

	require_once("BusinessLayer/Logic_User.php");
	
	$errorMeesage = "";
	
	if(isset($_POST["PhoneNumber"]) && isset($_POST["Password"])&& isset($_POST["PasswordAgain"])) {
		
		$phoneNumber = trim($_POST["PhoneNumber"]);
		$password = trim($_POST["Password"]);
		$passwordAgain = trim($_POST["PasswordAgain"]);

		$errorMeesage = "";
		$result = Logic_User::deleteUser($phoneNumber, $password, $passwordAgain);
		
		if(!$result) {
		
			$errorMeesage = "Kullanıcı silinme işlemi başarısız!";
		}
		else{
			
			echo '<script>console.log("User has been deleted successfully.")</script>';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
			include 'head.php';
			echo "<title>Tele.com - Deregister</title>";
		?>
	</head>
	<body>
		<?php 
			include 'navbar.php';
		?>
		<div>
		
			<img src="main_photo.jpg" class="img-rounded" height="520">
		</div>
		
		<div class = "container col-md-4 col-md-offset-4">
			<form class="form-horizontal" action="<?php $_PHP_SELF ?>" method="POST">
			
				<fieldset>	<!-- İleride form üzerinde ki etkileri barındıracak-->
					<div  align="center" id="legend">	<!-- üstteki register yazısı ortalanması -->
					  <legend class=""><h1><b><font color="#2eccfa">DEREGISTRATION</font></b></h1></legend>
					</div>
					
					<div class="control-group" >
					  <!-- ID -->
					  <!-- When used together with the <label> element, the for attribute specifies which form element a label is bound to. -->
					  <div class="controls" style="margin-top:20px;">
						<input pattern=".{11}" type="number" id="PhoneNumber" name="PhoneNumber" placeholder="Phone Number" class="input-xlarge col-md-12" min = "05000000000" max = "05999999999" required title="Please enter Phone Number. Its length must be 11 digits."> <!-- Uzunluk kısıtlaması -->
					  </div>
					</div>
				 
					<div class="control-group">
					  <!-- name -->
					  <div class="controls" style="margin-top:55px;">
						<input  pattern=".{6,}" type="password" id="password" name="Password" placeholder="Please Enter Password" class="input-xlarge col-md-12"  required title="Please Password. Its length exactly 6."> <!-- Uzunluk kısıtlaması -->
					  </div>
					</div>
				 
					<div class="control-group">
					<!-- surname -->
					  <div class="controls" style="margin-top:90px;">
						<input  pattern=".{6,}" type="password" id="passwordAgain" name="PasswordAgain" placeholder="Please Enter Password Again " class="input-xlarge col-md-12"  required title="Please Password. Its length exactly 6."> <!-- Uzunluk kısıtlaması -->
					  </div>
					</div>
				 
					<div class="control-group">
					  <!-- Button -->
					  <div class="controls" style="margin-top:170px;">
						<button type="submit" class="btn btn-info col-md-12">Deregister</button>
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