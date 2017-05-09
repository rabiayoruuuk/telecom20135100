<?php 
	require_once("BusinessLayer/Logic_Campaign.php");
	
	$errorMeesage = "";

	if(isset($_POST["Name"]) && isset($_POST["Minute"]) && isset($_POST["Cellular"])&& isset($_POST["Message"])&& isset($_POST["Amount"])) {

		$name = trim($_POST["Name"]);
		$minute = trim($_POST["Minute"]);
		$cellular = trim($_POST["Cellular"]);
		$message = trim($_POST["Message"]);
		$amount = trim($_POST["Amount"]);
		$ID=1;
		$errorMeesage = "";
		$result = Logic_Campaign:: updateCampaign($ID, $name, $minute, $cellular, $message, $amount);
		
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
			echo "<title>Tele.com - Admin</title>";
		?>
	</head>
	<body style="position: absolute;  width:100%; height:100%;">
		<?php 
			//include 'navbar.php';
		?>
		
	<div class="container col-md-12" style="margin: 60px 0px 0px 0px;">
		<div class="row">
		
			<div class="col-md-12">
				<div class="table-responsive">

				<table id="mytable" class="table table-bordred table-striped">
					   
					   <thead>
					   
						<th><input type="checkbox" id="checkall" /></th>
						<th>ID</th>
						<th>Campaign Name</th>
						<th>Minute</th>
						<th>Message</th>
						<th>Cellular</th>
						<th>Amount</th>
						 <th>Edit</th>
						 <th>Delete</th>
					   </thead>
					   
					<tbody>
		
						<?php 
							$campaignList = Logic_Campaign::getCampaigns();
							
							for($i = 0; $i < count($campaignList); $i++) {
						?>
							<tr>
								<td><input type="checkbox" class="checkthis" /></td>
								<td><?php echo $campaignList[$i] -> getID();?></td>
								<td><?php echo $campaignList[$i] -> getName();?></td>
								<td><?php echo $campaignList[$i] -> getMinute();?></td>
								<td><?php echo $campaignList[$i] -> getMessage();?></td>
								<td><?php echo $campaignList[$i] -> getCellular();?></td>
								<td><?php echo $campaignList[$i] -> getAmount();?></td>
								<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
								<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
							</tr>
						<?php
							}
						?>
						
					</tbody>
				</table>					
				</div>
			</div>
		</div>
	</div>
		
		<div class ="atBottom" id="legend align="bottom">	<!-- üstteki register yazısı ortalanması -->
			<legend class="col-md-4 col-md-offset-4"><h1><b><font color="#2eccfa">&nbsp</font></b></h1></legend>
		</div>
		<div class="atBottom" style="bottom: 0px;">
			<p><b><h4 class="col-md-offset-5" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTele.Com <?php include 'footer.php'?></h4></b></p>
		</div>
		
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
			<h4 class="modal-title custom_align" id="Heading">Edit New Data</h4>
        </div>
        <div class="modal-body">
		
					<div class="control-group" >
					  <div class="controls" style="margin-top:30px;">
						<input type="text" id="Name" name="Name" placeholder="Campaign Name" class="input-xlarge col-md-12" required title="Please enter Campaign Name. "> <!-- Uzunluk kısıtlaması -->
					  </div>
					</div>
				 
					<div class="control-group">
					  <!-- name -->
					  <div class="controls" style="margin-top:80px;">
						<input min="0" max="1000"  type="number" id="Amount" name="Amount" placeholder="Amount" class="input-xlarge col-md-12" required title="Please enter Amount. "> <!-- Uzunluk kısıtlaması -->
					  </div>
					</div>
					<div class="control-group" > 
					  <div class="controls" style="margin-top:130px;">
						<input type="number" id="Minute" name="Minute" placeholder="Minute" class="input-xlarge col-md-12" min = "0" max = "1000" required title="Please enter Minutes."> <!-- Uzunluk kısıtlaması -->
					  </div>
					</div>
					<div class="control-group" >
					  <!-- ID -->
					  <!-- When used together with the <label> element, the for attribute specifies which form element a label is bound to. -->
					  <div class="controls" style="margin-top:180px;">
						<input type="number" id="Message" name="Message" placeholder="Message" class="input-xlarge col-md-12" min = "0" max = "10000" required title="Please enter be Message."> <!-- Uzunluk kısıtlaması -->
					  </div>
					</div>
					<div class="control-group" >
					  <div class="controls" style="margin-top:230px;">
						<input type="number" id="Cellular" name="Cellular" placeholder="Cellular" class="input-xlarge col-md-12"  required title="Please enter Cellular."> <!-- Uzunluk kısıtlaması -->
					  </div>
					</div>
	
        </div>
        <div class="modal-footer ">
			<button id="update" type="button" class="btn btn-primary btn-lg" style="width: 100%; margin: 30px 0px 0px 0px;"><span class="glyphicon glyphicon-ok-sign"></span>Update</button>
		</div>
    </div>
    <!-- /.modal-content --> 
	</div>
      <!-- /.modal-dialog --> 
    </div>
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
	</body>
</html>

<script>

$(document).ready(function(){	/* Check all checkbox */
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});

</script>

<script>

$(document).ready(function() { // when DOM is ready, this will be executed
			
			$("#update").click(function(e) { // click event for "btnCallSrvc"
				
				var name = $("#Name").val(); // get country code
				if(name == "") {
					alert("Enter name!");
					$("#Name").focus();
					return;
				}
				
				var minute = $("#Minute").val();
				var cellular = $("#Cellular").val();
				var message = $("#Message").val();
				var amount = $("#Amount").val();
				
				$.ajax({ // start an ajax POST 
					type	: "post",
					url		: "admin.php",
					data	:  { 
						"Name"	: name, 
						"Minute": minute, 
						"Cellular"	: cellular,
						"Message" : message,
						"Amount": amount
					},
					success : function(reply) { // when ajax executed successfully	
						console.log(reply);
						location.reload();
					},
					error   : function(err) { // some unknown error happened
						console.log(err);
						alert(" There is an error! Please try again. " + err); 
					}
				});
				
			});
			
		});
</script>
