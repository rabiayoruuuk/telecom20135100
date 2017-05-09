<!DOCTYPE html>
<html>
	<head>
		<?php 
			include 'head.php';
			echo "<title>Tele.com - About</title>";
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
			<form class="form-horizontal" action='action.php' method="POST">
			
				<fieldset>	<!-- İleride form üzerinde ki etkileri barındıracak-->
					<div  id="legend">	<!-- üstteki register yazısı ortalanması -->
					  <legend class=""><h1><b><font color="#2eccfa">About</font></b></h1></legend>
					</div>
					<p> Phone: 01258547429</p>
					<p>Address: Kuruçeşme Street No: 1 Buca/ İzmir</p>
					<p>Tele.com has been established at 1995 by Oğuzhan DURMUŞ and Rabia YÖRÜK</p>

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