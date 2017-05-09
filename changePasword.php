<!DOCTYPE html>
<html>
	<head>
		<?php 
			include 'head.php';
			echo "<title>Tele.com - Change Password</title>";
		?>
	</head>
	<body class="bgColor">
		<?php 
			include 'navbar.php';
		?>

		<div class = "container col-md-4 col-md-offset-4" style="background-color : #fff; border-radius : 5px;">
			<form class="form-horizontal" action='action.php' method="POST">
			
				<fieldset>	<!-- İleride form üzerinde ki etkileri barındıracak-->
					<div  align="center" id="legend">	<!-- üstteki register yazısı ortalanması -->
					  <legend class="telecomMavisi" style="margin-top:60px;><h1><b><font color="#2eccfa">Change Password?</font></b></h1></legend>
					</div>
					
					<div class="control-group" >
					  <!-- ID -->
					  <!-- When used together with the <label> element, the for attribute specifies which form element a label is bound to. -->
					  <div class="controls" style="margin-top:30px;">
						<input  pattern=".{6,}" type="password" id="oldPassword" name="Old Password" placeholder="Please Enter Old Password"  class="input-xlarge col-md-12"  required title="Please Password. Its length exactly 6."> <!-- Uzunluk kısıtlaması -->
					  </div>
					 </div>
					<div class="control-group" >
					  <!-- ID -->
					  <!-- When used together with the <label> element, the for attribute specifies which form element a label is bound to. -->
					  <div class="controls" style="margin-top:70px;">
						<input  pattern=".{6,}" type="password" id="newPassword" name="New Password" placeholder="Please Enter New Password " class="input-xlarge col-md-12"  required title="Please Password. Its length exactly 6."> <!-- Uzunluk kısıtlaması -->
					  </div>
					</div>
					<div class="control-group" >
					  <!-- ID -->
					  <!-- When used together with the <label> element, the for attribute specifies which form element a label is bound to. -->
					  <div class="controls" style="margin-top:110px;">
						<input pattern=".{6,}" type="password" id="newPasswordAgain" name="New Password Again" placeholder="Please Enter New Password Again" class="input-xlarge col-md-12 min"  required title="Please Password. Its length exactly 6."> <!-- Uzunluk kısıtlaması -->
					  </div>
					</div>
					<div class="control-group">
					  <!-- Button -->
					  <div class="controls" style="margin-top:170px; ">
						<button class="btn btn-info col-md-12" style ="margin-bottom:60px; ">Submit</button>
					  </div>
					</div>
				</fieldset>

			</form>
		</div>
		
		
		<div  align="center" id="legend" style =" margin-top: 240px;">	<!-- üstteki register yazısı ortalanması -->
			<legend class="col-md-4 col-md-offset-4"><h1><b><font color="#2eccfa">&nbsp</font></b></h1></legend>
		</div>
		<div class="container col-md-4 col-md-offset-5"><!-- footer -->
			<p><b><h4>Tele.Com <?php include 'footer.php'?></h4></b></p>
		</div>
	</body>
</html>