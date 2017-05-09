<?php 
	require_once("BusinessLayer/Admin_User.php");
	require_once("BusinessLayer/Logic_User.php");
	
	$errorMeesage = "";

	if(isset($_POST["Name"]) && isset($_POST["Surname"]) && isset($_POST["PhoneNumber"])) {

		$name = trim($_POST["Name"]);
		$surname = trim($_POST["Surname"]);
		$phoneNumber = trim($_POST["PhoneNumber"]);
		$id = trim($_POST["ID"]);
		
		$errorMeesage = "";
		$result = Admin_User:: updateUser($id, $name, $surname, $phoneNumber);

		if(!$result) {
			$errorMeesage = "Update Failed!";
		}
	}
	else if(isset($_POST["ID"])){
		
		$id = trim($_POST["ID"]);

		$result = Admin_User:: deleteUser($id);
		
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
						<th>Name</th>
						<th>Surname</th>
						<th>Phone Number</th>
						 <th>Edit</th>
						 <th>Delete</th>
					   </thead>
					   
					<tbody>
		
						<?php 
							$userList = Logic_User::getUser();
							
							for($i = 0; $i < count($userList); $i++) {
						?>
							<tr id="asd">
								<td><input type="checkbox" class="checkthis" user-id="<?php echo $userList[$i] -> getID();?>" /></td>
								<td ><?php echo $userList[$i] -> getID();?></td>
								<td><?php echo $userList[$i] -> getName();?></td>
								<td><?php echo $userList[$i] -> getSurname();?></td>
								<td><?php echo $userList[$i] -> getPhoneNumber();?></td>
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
		
		<div class ="atBottom" id="legend align="bottom">	<!-- üstteki register yazýsý ortalanmasý -->
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
			<h4 class="modal-title custom_align" id="Heading">Edit User</h4>
        </div>
        <div class="modal-body">
		
					<div class="control-group" >
					  <div class="controls" style="margin-top:30px;">
						<input type="text" id="Name" name="Name" placeholder="Name" class="input-xlarge col-md-12" required title="Please enter Name. "> <!-- Uzunluk kýsýtlamasý -->
					  </div>
					</div>
				 
					<div class="control-group">
					  <!-- name -->
					  <div class="controls" style="margin-top:80px;">
						<input type="text" id="Surname" name="Surname" placeholder="Surname" class="input-xlarge col-md-12" required title="Please enter Surname. "> <!-- Uzunluk kýsýtlamasý -->
					  </div>
					</div>
					<div class="control-group" > 
					  <div class="controls" style="margin-top:130px;">
						<input type="number" id="PhoneNumber" name="PhoneNumber" placeholder="Phone Number" class="input-xlarge col-md-12" min = "0" max = "1000" required title="Please enter phone number."> <!-- Uzunluk kýsýtlamasý -->
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
        <h4 class="modal-title custom_align" id="Heading">Delete this User</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this User?</div>
       
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
			
			function getID(){
				
				var checkboxes = $(".checkthis");
				var id = null;
				
				for(var i=0; i < checkboxes.length; i++) {
					if($(checkboxes[i]).is(":checked")){
						id = $(checkboxes[i]).attr("user-id");
						break;
					}
				}
				return id;
			}
			
			$("#update").click(function(e) { // click event for "btnCallSrvc"
				
				var id = getID();
						
				if(id == null){
					alert("Check the checkbox");
				}
						
				var name = $("#Name").val(); // get country code
				if(name == "") {
					alert("Enter name!");
					$("#Name").focus();
					return;
				}
								
				var surname = $("#Surname").val();
				var phoneNumber = $("#PhoneNumber").val();
								
				$.ajax({ // start an ajax POST 
					type	: "POST",
					url		: "adminUser.php",
					data	:  { 
						"ID" : id,
						"Name"	: name, 
						"Surname": surname, 
						"PhoneNumber"	: phoneNumber,
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
			
			$("#delete").click(function(e) {
				
				var id = getID();
				
				if(id == null){
					alert("Check the checkbox");
				}
				
				$.ajax({ // start an ajax POST 
					type	: "POST",
					url		: "adminUser.php",
					data	:  { 
						"ID" : id
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
