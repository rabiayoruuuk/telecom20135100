<?php 

	include ("BusinessLayer/Logic_User.php");
	
	function Redirect($url, $statusCode = 303)	/* Hocaya soralým */
	{
				
		if (headers_sent() === false)
		{
			header('Location: ' . $url, true, $statusCode);
		}

		exit();	/*Destruct the this page */
	}
	
	if(!empty($_COOKIE["Name"])){
		
		
	}
	else{
		
		echo '<script language="javascript">';
		echo 'alert("You did not log in!")';
		echo '</script>';
		//die();
		//redirect('http://localhost:8080/project/login.php', false);
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
			include 'head.php';
			echo "<title>Tele.com - Home</title>";
		?>
	</head>
	<body style="position: absolute;  width:100%; height:100%;">
		<?php 
			include 'navbar.php';
		?>
		
		<div class="bgColor" style="position: absolute; left: 0; top: 51px; right: 0;width:100%; height:50%;">
		
			<div style="position = relative; margin-top: 50px;">
				<p align = "middle" style="font-size: 61px; font-weight: bold; color: #fff;"><?php echo $name = $_COOKIE["Name"];?></p>
				<p align = "middle" style="font-size: 30px; font-weight: bold; color: #fff;">Remaining Usage</p>
			</div>
		
			<div class="bgColor" style="position: relative; left: 0; top: 51px; right: 0; bottom: 0;">
				
				<div align="middle" style ="top: 75px; bottom: 0; width:33%; height:100%; float: left;">
					<img src="cellular.png" class="img-rounded"/>
					<p style="color: #fff; font-size: 19px; margin-top: 10px;">Remaining Cellular: 1GB</p>
					<a href="addUsage.php" class="btn" style="color: #fff; font-weight: bold; background: #e7e7e7;">Add Cellular</a>
				</div>			
				<div align="middle" style ="top: 51px; bottom: 0; width:33%; height:100%; float: left;">
					<img src="minute.png" class="img-rounded"/>
					<p style="color: #fff; font-size: 19px; margin-top: 10px;">Remaining Minutes: 100 minutes</p>
					<a href="addUsage.php" class="btn" style="color: #fff; font-weight: bold; background: #e7e7e7;">Add Minute</a>
				</div>
				<div align="middle" style ="top: 51px; bottom: 0; width:33%; height:100%; float: left;">
					<img src="message.png" class="img-rounded"/>
					<p style="color: #fff; font-size: 19px; margin-top: 10px;">Remaining Messages: 100 messages</p>
					<a href="addUsage.php" class="btn" style="color: #fff; font-weight: bold; background: #e7e7e7;">Add Message</a>
				</div>
			</div>
		</div>
		<div style="position: absolute; width:100%; height:40%; bottom: 0; margin-top: 100px;">
		
		<p align = "middle" style="font-size: 35px; font-weight: bold; color: #2eccfa;">Campaigns</p>
		
			<div align="middle" style =" height: 100%; width:33%; float: left;">
				<a href="receipe.php">
				<img src="shop.png" class="img-rounded"/>
				<p style=" font-weight: bold; font-size: 17px;">1000 Packet</p></a>
			</div>			
			<div align="middle" style =" height: 100%; width:33%; height:100%; float: left;">
				<a href="receipe.php">
				<img src="shop.png" class="img-rounded"/>
				<p style=" font-weight: bold; font-size: 17px; margin-top: 10px;">5000 Packet</p></a>
			</div>
			<div align="middle" style =" height: 100%; width:33%; height:100%; float: left;">
				<a href="receipe.php">
				<img src="shop.png" class="img-rounded"/>
				<p style=" font-weight: bold; font-size: 17px; margin-top: 10px;">10000 Packet</p></a>
			</div>
		</div>
		
		<div class ="atBottom" id="legend align="bottom">	<!-- üstteki register yazýsý ortalanmasý -->
			<legend class="col-md-4 col-md-offset-4"><h1><b><font color="#2eccfa">&nbsp</font></b></h1></legend>
		</div>
		<div class="atBottom" style="bottom: 0px;">
			<p><b><h4 class="col-md-offset-5" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTele.Com <?php include 'footer.php'?></h4></b></p>
		</div>
	</body>
</html>