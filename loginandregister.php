
<?php session_start();
include"admin/connect.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->	
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<?php
	if ($_GET['lgandrg']=='login') {
		login();
	}
	else if ($_GET['lgandrg']=='register') {
		register();
	}
?>
</body>
</html>



<?php function login() { ?>
	<a href="." class="btn btn-primary"><i class="fa fa-angle-double-left"></i>GO Back</a>
	<div class="container">
		<form method="post" id="login">
		  <div class="form-group">
		    <label for="username">Username</label>
		    <input type="text" name="username" class="form-control" id="username" placeholder="Enter username"> 
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
		  </div>		  
		  <button type="submit" class="btn btn-primary" name="login">LoginCustomer</button>
		  <a href="?lgandrg=register" class="btn btn-primary">Register</a>
		</form>
	</div>	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#login").validate({
				rules:{
					username: "required",
					password: "required"
				},
				messages: {
					username: "<p class='text-danger'>Required !!</p>",
					password: "<p class='text-danger'>Required !!</p>"
				}
			});
		});			
	</script>
	<?php
		if (isset($_POST["login"])) {
			$username = $_POST["username"];
			$password = $_POST["password"];
			$request = "select * from customer where username='$username' and password='$password'";
			GLOBAL $connect;
			$result = $connect->query($request);
			if (mysqli_num_rows($result)==0) {
				echo "<script>alert('Sai ten dang nhap hoac mat khau !!')</script>";
			}
			else{
				$_SESSION['customer']=$username;
				header("Location: .");
			}
		}
	?>		

<?php } ?>

<?php function register(){ ?>
	<?php
		GLOBAL $connect;
		if (isset($_POST['submit'])) {
			$name=$_POST['name'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$address=$_POST['address'];
			
			$request="insert into customer(name,username,password,date,address) value(N'$name','$username','$password',now(),'$address')";
			$result = $connect->query($request);
			if (isset($result)) {
				echo "<script>alert('successful!!');location='.'</script>";
			}

		}

	?>
	<!-- form them khach hang tu customer -->
	<a href="." class="btn btn-primary"><i class="fa fa-angle-double-left"></i>GO Back</a>
	<h1>ADD Customer</h1>
	<form id="addcustomer" method="post">		
		<table>
			<tr>
				<td><label for="name">Name</label></td>
				<td><input type="text" id="name" name="name" value="<?php if(isset($name)) echo $name?>"></td>
			</tr>
			<tr>
				<td><label for="username">Username</label></td>
				<td><input type="text" id="username" name="username" value="<?php if(isset($username)) echo $username?>"></td>
			</tr>
			<tr>
				<td><label for="password">Password</label></td>
				<td><input type="password" id="password" name="password" value="<?php if(isset($password)) echo $password?>">
				</td>
			</tr>
			<tr>
				<td><label for="repassword">Repassword</label></td>
				<td><input type="password" id="repassword" name="repassword" value="<?php if(isset($repassword)) echo $repassword?>"></td>
			</tr>
			<tr>
				<td><label for="address">Address</label></td>
				<td><input type="text" id="address" name="address" value="<?php if(isset($address)) echo $address?>"></td>
			</tr>			
			<tr>
				<td><input type="reset" name="reset" value="Reset"></td>
				<td><input type="submit" name="submit" value="Register"></td>
			</tr>
		</table>
	</form>

	<script type="text/javascript">
		//bonus validator
		jQuery.validator.addMethod("notEqualTo",
		function(value, element, param) {
		    var notEqual = true;
		    value = $.trim(value);
		    for (i = 0; i < param.length; i++) {
		        if (value == $.trim((param[i]))) { notEqual = false; }
		    }
		    return this.optional(element) || notEqual;
		},
		"This Name already exists!!"
		);

		$(document).ready(function(){
			$("#addcustomer").validate({
				rules:{
					name:{
						required: true,
					},
					username:{
						required: true,
						rangelength: [4,16],						
						notEqualTo:[<?php 
							$request = 'select username from customer' ;
							$result = $connect->query($request);
							while ($row=mysqli_fetch_array($result)) { ?>
								"<?=$row['username']?>",
							<?php }
						?>]						
						
					},
					password:{
						required: true,
						minlength: 6
					},
					repassword:{
						required: true,
						equalTo:"#password"
					},
					level:{
						required: true,
					}					
				},
				messages:{
					name:{
						required:"nothing!!"
					},
					username:{
						required:"nothing!!",
						rangelength:"4-16 charactes!!",
					},
					password:{
						required:"nothing!!",
						minlength:"more than 6 charactes!!"
					},
					repassword:{
						required: "nothing!!",
						equalTo:"must be same the password!!"
					},
					level:{
						required:"nothing!!"
					}
				},

			});
		}

			);
	</script>	
<?php } ?>
