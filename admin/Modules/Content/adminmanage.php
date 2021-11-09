
<?php	
	$url = $_SERVER['REQUEST_URI'];
	if (isset($_GET["edit"])) {
		switch ($_GET["edit"]) {
			case 'showlist':
				showlist();
				break;
			case 'newadd' :
				newadd();
				break;
			case 'delete':
				delete();
				break;
			case 'update':
				update();
				break;					
		}
	}
	else
		showlist();
?>


<!-- function showlist -->
<?php
	function showlist(){		
		GLOBAL $url;
		GLOBAL $connect;
		?>
		<h1>Danh Sach ADMIN</h1>
		<a href="<?=$url?>&edit=newadd"><button type="button" class="btn btn-xs btn-primary"><span class="fa fa-pencil"></span>Newadd</button></a>
		<section class="search-box">
			    <form class="search-form" method="post">    	
			     	<table>
			     		<tr>
			     			<td><input class="form-control" name="ipsearch"  placeholder="Tìm kiếm" type="text"></td>
			     			<td><input type="submit" name="search" value="search"></input></td>
			     			<td><input type="submit" name="showall" value="showall"></td>
			     		</tr>
			     	</table>
			    </form>
		</section>
		<section class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>IDadmin</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Date</th>
                        <th>Permission</th>
                        <th>Status</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $search = "";                   
					if(isset($_POST['search'])){
						$search=$_POST['ipsearch'];
					}

					if(isset($_POST['showall'])){
						 $search = "";
					}
					$request="select * from admin where username like '%$search%' or name like '%$search%'";
				    $result=$connect->query($request);					
                    while($rowadmin=mysqli_fetch_array($result)){
                ?>
                    <tr>
						<td><?=$rowadmin['IDadmin']?></td>
						<td><?=$rowadmin['name']?></td>
						<td><?=$rowadmin['username']?></td>
						<td><?php echo date("d/m/Y",strtotime($rowadmin['date']))?></td>
						<td><?php if($rowadmin['permission']==1) echo"SuperAdmin"; else echo"Admin";?></td>
                        <td><?php if($rowadmin['status']==1) echo"Mở"; else echo"Khóa";?></td>
                        <td>
                            <a href="<?=$url?>&edit=update&IDadmin=<?=$rowadmin['IDadmin']?>"><button type="button" class="btn btn-xs btn-primary"><span class="fa fa-pencil"></span> Sửa</button></a>
                            <?php
                                if($rowadmin['permission']!=1){
                            ?>
                            <a onClick="if(confirm('Bạn muốn xóa Admin này?')) return true; else return false;" href="<?=$url?>&edit=delete&IDadmin=<?=$rowadmin['IDadmin']?>"><button type="button" class="btn btn-xs btn-primary"><span class="fa fa-trash"></span> Xóa</button></a>
                            <?php }else{?>
                             <a><button type="button" class="btn btn-xs btn-primary" disabled><span class="fa fa-trash"></span> Xóa</button></a>
                             <?php } ?>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </section>
	<?php } 
?>

<!-- function newadd -->

<?php function newadd(){ ?>
	<?php
		GLOBAL $connect;
		if (isset($_POST['submit'])) {
			$name=$_POST['name'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$permission=$_POST['permission'];
			$request="insert into admin(name,username,password,permission,date) value(N'$name','$username','$password','$permission',now())";
			$result = $connect->query($request);
			if (isset($result)) {
				echo "<script>alert('successful!!');location='?navigation=admins'</script>";
			}

		}

	?>
	<a href="?navigation=admins" class="btn btn-primary"><i class="fa fa-angle-double-left"></i>GO Back</a>
	<h1>ADD ADMIN</h1>
	<form id="addadmin" method="post">		
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
				<td><label for="repassword">rePassword</label></td>
				<td><input type="password" id="repassword" name="repassword" value="<?php if(isset($repassword)) echo $repassword?>"></td>
			</tr>
			<tr>
				<td><label for="permission">Permission</label></td>
				<td>
					<select id="permission" name="permission">
						<option value="0">Admin</option>
						<option value="1">Supper Admin</option>						
					</select>
				</td>
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
			$("#addadmin").validate({
				rules:{
					name:{
						required: true,
					},
					username:{
						required: true,
						rangelength: [4,16],						
						notEqualTo:[<?php 
							$request = 'select username from admin' ;
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
					permission:{
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
					permission:{
						required:"nothing!!"
					}
				},

			});
		}

			);
	</script>	
<?php } ?>

<!--Function delete-->
<?php
	function delete(){
		GLOBAL $connect;
		$IDadmin = $_GET["IDadmin"];
		$request = "delete from admin where IDadmin = $IDadmin";
		$result = $connect->query($request);
		if ($result) {
			echo "<script>alert('successful !!');location='?navigation=admins'</script>";

		}
		else
			echo "<script>alert('Fail !!')</script>";
	}
?>

<!--Fuction update-->
<?php function update(){ ?>
	<?php
		GLOBAL $connect;
		$IDadmin=$_GET['IDadmin'];
		$request = "select * from admin where IDadmin =$IDadmin";
		$rowadmin = mysqli_fetch_array($connect->query($request));
		if (isset($_POST['update'])) {
			$name=$_POST['name'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$permission=$_POST['permission'];
			$request="update admin set name='$name',username='$username',password='$password',permission='$permission' where IDadmin = $IDadmin";
			$result = $connect->query($request);
			if (isset($result)) {
				echo "<script>alert('successful!!');location='?navigation=admins'</script>";
			}

		}

	?>
	<a href="?navigation=admins">GO Back</a>
	<h1>Update ADMIN:<?=$IDadmin?></h1>
	<form id="addadmin" method="post">		
		<table>
			<tr>
				<td><label for="name">Name</label></td>
				<td><input type="text" id="name" name="name" value="<?php if(isset($name)) echo $name; else echo $rowadmin['name'];?>"></td>
			</tr>
			<tr>
				<td><label for="username">Username</label></td>
				<td><input type="text" id="username" name="username" value="<?php if(isset($username)) echo $username; else echo $rowadmin['username']?>"></td>
			</tr>
			<tr>
				<td><label for="password">Password</label></td>
				<td><input type="password" id="password" name="password" value="<?php if(isset($password)) echo $password; else echo $rowadmin['password']?>">
				</td>
			</tr>
			<tr>
				<td><label for="repassword">rePassword</label></td>
				<td><input type="password" id="repassword" name="repassword" value="<?php if(isset($repassword)) echo $repassword; else echo $rowadmin['password']?>"></td>
			</tr>
			<tr>
				<td><label for="permission">Permission</label></td>
				<td>
					<select id="permission" name="permission">
						<option value="0">Admin</option>
						<option value="1">Supper Admin</option>						
					</select>
				</td>
			</tr>
			<tr>
				<td><input type="reset" name="reset" value="Reset"></td>
				<td><input type="submit" name="update" value="Update"></td>
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
		        if (value == param[i] && value != "<?=$rowadmin['username']?>" ) { notEqual = false; }
		    }
		    return this.optional(element) || notEqual;
		},
		"This Name already exists!!"
		);

		$(document).ready(function(){
			$("#addadmin").validate({
				rules:{
					name:{
						required:true
					},
					username:{
						required:true
						rangelength: [4,16],						
						notEqualTo:[<?php 
							$request = 'select username from admin' ;
							$result = $connect->query($request);
							while ($row=mysqli_fetch_array($result)) { ?>
								"<?=$row['username']?>",
							<?php }
						?>]						
						
					},
					password:{
						required:true
						minlength: 6
					},
					repassword:{
						required:true
						equalTo:"#password"
					},
					permission:{
						
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
					permission:{
						required:"nothing!!"
					}
				},

			});
		}

			);
	</script>	
<?php } ?>
