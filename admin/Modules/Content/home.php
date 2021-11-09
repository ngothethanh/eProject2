<?php
	
	$numadmin=mysqli_num_rows($connect->query("select * from admin"));	
	$numcustomer=mysqli_num_rows($connect->query("select * from customer"));	
	$numproduct=mysqli_num_rows($connect->query("select * from product"));	
	$numorder=mysqli_num_rows($connect->query("select * from orders"));	
?>

<h1>Home</h1>
<h3>Tổng số Admin:<?=$numadmin?></h3>
<br>
<h3>Tổng số Customer:<?=$numcustomer?></h3>
<br>
<h3>Tổng số Product:<?=$numproduct?></h3>
<br>
<h3>Tổng số Order:<?=$numorder?></h3>
