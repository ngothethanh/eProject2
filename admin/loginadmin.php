<?php function loginadmin(){?>
	<div class="container">
		<form method="post" id="loginadminform">
		  <div class="form-group">
		    <label for="username">Username</label>
		    <input type="text" name="username" class="form-control" id="username" placeholder="Enter username"> 
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
		  </div>		  
		  <button type="submit" class="btn btn-primary" name="loginadmin">LoginAdmin</button>
		</form>
	</div>	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#loginadminform").validate({
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
		if (isset($_POST["loginadmin"])) {
			$username = $_POST["username"];
			$password = $_POST["password"];
			$request = "select * from admin where username='$username' and password='$password'";
			GLOBAL $connect;
			$result = $connect->query($request);
			if (mysqli_num_rows($result)==0) {
				echo "<script>alert('Sai ten dang nhap hoac mat khau !!')</script>";
			}
			else{
				$_SESSION['admin']=$username;
				header("Location: .");
			}
		}
	?>		
<?php  } ?>