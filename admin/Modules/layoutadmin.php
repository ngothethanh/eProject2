<?php if (!isset($_SESSION['admin'])) {header("Location:.");}
  $request = "select * from admin where username='".$_SESSION['admin']."'";
  $rowadmin = mysqli_fetch_array($connect->query($request));
?>
<div class="container ">
  <h2><span class="btn btn-outline-success">Admin</span>: <?=$rowadmin['name']?></h2>
  <a href="?navigation=logout" onclick='alert("Bye bye!!<?=$_SESSION['admin']?>")'><button type="button" class="btn btn-xs btn-danger"><span class="fa fa-arrow-circle-o-left"></span>Logout</button></a>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link "  href="?navigation=home" >Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="?navigation=products" >Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="?navigation=orders" >Orders</a>
    </li>
    <?php if ($rowadmin['permission']==1){?>
    <li class="nav-item">
      <a class="nav-link"  href="?navigation=customers" >Customers</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="?navigation=admins">Admin</a>
    </li>
    <?php } ?>
  </ul>
  <div class="tab-content">
    <?php include"navigation.php"?>
  </div>
</div>
