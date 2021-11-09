<?php
	if (isset($_GET["navigation"])) {
		switch($_GET["navigation"]){
			case"logout": 
				unset($_SESSION['admin']);
				header("Location:?");
				break;
			case"home": 
				include"Content/home.php";
				break;
			case"products": 
				include"Content/productmanage.php";
				break;
			case"orders": 
				include"Content/orders.php";
				break;
			case"customers": 
				include"Content/customers.php";
				break;
			case"admins": 
				include"Content/adminmanage.php";
				break;			
		}
	}
	else
		include"Content/home.php";
		