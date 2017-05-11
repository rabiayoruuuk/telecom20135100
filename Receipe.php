<?php 


	require_once("BusinessLayer/Logic_Campaign.php");
	
	if(isset($_POST["ID"])) {

		$id = trim($_POST["ID"]);
		echo '<script>console.log("Your stuff here")</script>';
		$errorMeesage = "";
		$result = Logic_Campaign :: changeCampaign($_COOKIE['ID'], $id);

		if(!$result) {
			$errorMeesage = "Update Failed!";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<?php 
			include 'head.php';
			echo "<title>Tele.com - Recipe</title>";
		?>
	</head>
	<body style="position: absolute;  width:100%; height:100%;">
		<?php 
			//include 'navbar.php';
		?>
		
		<div class="bgColor" style="position: absolute; left: 0; top: 51px; right: 0;width:100%; height:50%;">
		
			<div class="bgColor" style="position: relative; left: 0; top: 41px; right: 0; bottom: 0;">
				
				<div class="col-md-6" style ="top:40px; bottom: 0;  height:100%; margin-top:70px margin-left:50px;">
					<img src="bill_white.png" class="img-rounded" style="float: left; margin-left:180px; margin-top:25px;"/>
					<p style="color: #fff; font-size: 19px; float:left; margin-top:20px;  margin-left:80px;">Invoice Date:</p>
					<p style="color: #fff; font-size: 19px; margin-top:20px;">10.08.2016</p>
					<p style="color: #fff; font-size: 19px; float:left; margin-top:25px; margin-left:80px;">Expired Date:</p>
					<p style="color: #fff; font-size: 19px; margin-top:37px;">11.09.2017</p>
					<p style="color: #fff; font-size: 19px;float:left; margin-top:30px; margin-left:80px;">Add Usage: </p>
					<p style="color: #fff; font-size: 19px; margin-top:40px;">Yess </p>
				</div>	
				<div class="col-md-6" style ="top:40px; bottom: 0; height:100%; margin-top:70px ">
					<p style="color: #fff; font-size: 50px; float:left; margin-left:50px;">&nbsp Amount:  </p>
					<p style="color: #000; font-size: 50px; ">&nbsp&nbsp&nbsp&nbsp 100.75₺</p>
					<a href="billPayment.php" class="btn" style ="background-color: #fff; font-weight:bold; width:450px; margin-left:75px;">&nbsp&nbsp&nbsp&nbsp Pay the Bill</a>
				</div>
			
			</div>
		</div>
		<div style="position: absolute; width:100%; height:40%; bottom: 0; margin-top: 100px;">
		
		<p align = "middle" style="font-size: 35px; font-weight: bold; color: #2eccfa;">Campaigns</p>
		
			<div align="middle" style =" height: 100%; width:33%; float: left;">
				<a href="receipe.php" campaign-id="1" class="campaignLink" id="1">
				<img src="shop.png" class="img-rounded"/>
				<p style=" font-weight: bold; font-size: 17px;">1000 Packet</p></a>
			</div>			
			<div align="middle" style =" height: 100%; width:33%; height:100%; float: left;">
				<a href="receipe.php" campaign-id="2" class="campaignLink" id="2">
				<img src="shop.png" class="img-rounded"/>
				<p style=" font-weight: bold; font-size: 17px; margin-top: 10px;">5000 Packet</p></a>
			</div>
			<div align="middle" style =" height: 100%; width:33%; height:100%; float: left;">
				<a href="receipe.php" campaign-id="3" class="campaignLink" id="2">
				<img src="shop.png" class="img-rounded"/>
				<p style=" font-weight: bold; font-size: 17px; margin-top: 10px;">10000 Packet</p></a>
			</div>
		</div>
		
		<div class ="atBottom" id="legend align="bottom">	<!-- üstteki register yazısı ortalanması -->
			<legend class="col-md-4 col-md-offset-4"><h1><b><font color="#2eccfa">&nbsp</font></b></h1></legend>
		</div>
		<div class="atBottom" style="bottom: 0px;">
			<p><b><h4 class="col-md-offset-5" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTele.Com <?php include 'footer.php'?></h4></b></p>
		</div>
	</body>
</html>

<script>

$(document).ready(function() { // when DOM is ready, this will be executed
			
			
			$(".campaignLink").click(function(e) {
				
				var id = $(this).attr("campaign-id");
	
				if(id == null){
					alert("Error");
				}
								
				$.ajax({ // start an ajax POST 
					type	: "POST",
					url		: "Receipe.php",
					data	:  { 
						"ID" : id,
					},
					success : function(reply) { // when ajax executed successfully	
						console.log(reply);
					},
					error   : function(err) { // some unknown error happened
						console.log(err);
						alert(" There is an error! Please try again. " + err); 
					}
				});
				
			});
			
		});
</script>