
<?php session_start();
include"admin/connect.php";
if (isset($_SESSION['customer'])) {
	$customer = $_SESSION['customer'];
	$request = "select * from customer where username = '$customer'";
	$result = $connect->query($request);
	$row = mysqli_fetch_array($result);
	$IDcustomer = $row['IDcustomer'];
}
else
	header("location:loginandregister.php?lgandrg=login");

$IDproduct = $_GET['IDproduct'];
$request = "select * from product where IDproduct = '$IDproduct'";
$result = $connect->query($request);
$row = mysqli_fetch_array($result);


if (isset($_GET['order'])) {
	$IDproduct = $_GET['IDproduct'];
	$number = $_GET['number'];
	$request = "insert into orders (IDcustomer,IDproduct,number,date) value ('$IDcustomer','$IDproduct','$number',now())";
	$result = $connect->query($request);
	if (isset($result)) {
		echo "<script>alert('successful!!');</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head><title>Admin Page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->	
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <title>Harval Electric</title>
    <link rel="icon" href="img/logo/Capture.PNG">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/developer/footer.css">
    <link rel="stylesheet" href="vendor/developer/header.css">
    <link rel="stylesheet" href="vendor/developer/main.css">
    <link rel="stylesheet" href="vendor/bootstrap/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/bootstrap/owlcarousel/assets/owl.theme.default.min.css">
    <script src="vendor/bootstrap/owlcarousel/owl.carousel.js"></script>

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-darkblue fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <div class="row"><img class="d-block img-fluid" src="img/logo/alo.bmp" style="margin-left: 10px" alt=""></div>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ">
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Television</a>
                            <div class="dropdown-menu bg-darkblue " aria-labelledby="dropdownMenuButton0">
                                <a class="dropdown-item" href="?search=samsung" >Samsung</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('TV','Sony')">Sony</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('TV','TCL')">TCL</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('TV','LG')">LG</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('TV','Asanzo')">Asanzo</a>
                                <a class="dropdown-item text-warning" href="#" onclick="navbarsearch('TV','')">All...</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Refrigerator</a>
                            <div class="dropdown-menu bg-darkblue" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Refrigerator','Samsung')">Samsung</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Refrigerator','Midea')">Midea</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Refrigerator','Sharp')">Sharp</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Refrigerator','LG')">LG</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Refrigerator','Hitachi')">Hitachi</a>
                                <a class="dropdown-item text-warning" href="#" onclick="navbarsearch('Refrigerator','')">All...</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Washer</a>
                            <div class="dropdown-menu bg-darkblue" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Washer','Samsung')">Samsung</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Washer','Toshiba')">Toshiba</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Washer','Electrolux')">Electrolux</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Washer','Candy')">Candy</a>
                                <a class="dropdown-item text-warning" href="#" onclick="navbarsearch('Washer','')">All...</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Air conditioner</a>
                            <div class="dropdown-menu bg-darkblue" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Air','Samsung')">Samsung</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Air','Toshiba')">Toshiba</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Air','Aqua')">AQUA</a>
                                <a class="dropdown-item text-warning" href="#" onclick="navbarsearch('Air','')">All...</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Phone</a>
                            <div class="dropdown-menu bg-darkblue" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Phone','iPhone')">iPhone</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Phone','Samsung')">Samsung</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Phone','OPPO')">OPPO</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Phone','Huawei')">Huawei</a>
                                <a class="dropdown-item text-warning" href="#" onclick="navbarsearch('Phone','')">All...</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rice cooker</a>
                            <div class="dropdown-menu bg-darkblue" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Rice cooker','Toshiba')">Toshiba</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Rice cooker','Cuckoo')">Cuckoo</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Rice cooker','Kangaroo')">Kangaroo</a>
                                <a class="dropdown-item" href="#" onclick="navbarsearch('Rice cooker','Sunhouse')">Sunhouse</a>
                                <a class="dropdown-item text-warning" href="#" onclick="navbarsearch('Rice cooker','')">All...</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <form class="navbar-form" method="get" >
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search"  placeholder="Search">
                                    <input type="button" name="submit" class="btn btn-primary btn-sm"  value="Search">
                                </div>
                            </form>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active"><span id="Result"></span></a>
                        </li>
                        <li>
                            <?php 
                            if (isset($_SESSION['customer'])){?>
                                <h2 class="btn btn-outline-success"><?=$_SESSION['customer']?></h2>
                                <br>
                                <a href="logoutandshoworder.php?lgoandso=logout">Logout</a>
                                <a href="logoutandshoworder.php?lgoandso=showorder">ShowOrder</a>
                            <?php }
                            else  { ?>
                                <a class="btn btn-primary btn-sm" href='loginandregister.php?lgandrg=login'>Login</a>
                                <a class="btn btn-primary btn-sm" href='loginandregister.php?lgandrg=register'>Register</a>
                            <?php } ?>
                                
                           
                            
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        
      
        <div class="container">
		<a href="." class="btn btn-primary"><i class="fa fa-angle-double-left"></i>GO Back</a>
		<h1>--Order--</h1>
		<form method="get">
		<label>Username:<?=$customer?></label>
		<br>
		<img class="" height="300px" width="300px" src="<?=substr($row['img'],3)?>" alt="">
		<br>
		<label>IDproduct</label>
		<h1><?=$IDproduct?></h1>
		<input type="text" name="IDproduct" value="<?=$IDproduct?>" style="display: none" >
		<br>
		<input type="number" min="0" name="number">
		<br>
		<input type="submit" name="order" value="order">
	</form>
	</div>
        <div class="nav-carousel">

            
            
    </main><footer id="myFooter">
                <div class="bg-darkblue">
                    <div class="row">
                        <div class="col-sm-3">
                            <h5>HE</h5>
                            <p>
                                Ecommerce sales website created by Aptech group
                            </p>
                            <h5>Download All info of Products</h5>
                            <a href="Price.xls" download><button class="btn productForms"><i class="fa fa-download"></i> Download</button></a>
                        </div>
                        <div class="col-sm-3">
                            <h5>Support</h5>
                            <ul>
                                <li><a href="home.php">FeedBack</a></li>
                           
                            </ul>
                        </div>
                        <div class="col-sm-3">
                            <h5>Liên hệ</h5>
                            <ul>
                                <li>
                                    <a href="mailto:aptech@gmail.com" class="facebook"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="mailto:aptech@gmail.com" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li>
                                    <a href="mailto:aptech@gmail.com" class="google"><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="footer-copyright">
                    <p>© 2018 Aptech.vn - Address:19 Nguyễn Trái, Ngã Tư Sở, Hà Nội , Việt Nam </p>
                </div>            
            </footer>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="jsondata.js"></script> <!-- get data -->
    <script src="vendor/developer/javascriptHE.js"></script> 
</body>

</html>

