
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
	if ($_GET['lgoandso']=='logout') {
		unset($_SESSION['customer']);
		header("Location:.");
	}
	else if ($_GET['lgoandso']=='showorder') {
		showorder();
	}
?>
</body>
</html>




<?php
  function showorder(){   
    $username = $_SESSION['customer']; 
    GLOBAL $url;
    GLOBAL $connect;
    if (isset($_GET['DeleIDorder'])) {
      $DeleIDorder = $_GET['DeleIDorder'];
      $request ="delete from orders where IDorder = '$DeleIDorder'";
      $result = $connect->query($request);
      if (isset($result)) {
          echo "<script>alert('successful!!');location='?lgoandso=showorder'</script>";
      }
    }
    ?>
    <h1>List orders</h1>
    <a href="." class="btn btn-primary"><i class="fa fa-angle-double-left"></i>GO Back</a>    
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
                        <th>ID Order</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Number</th>
                        <th>Date</th>
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
          $request="select * from orders JOIN customer on customer.IDcustomer=orders.IDcustomer JOIN product on product.IDproduct = orders.IDproduct where customer.username = '$username' and product.name like '%$search%'  ";
            $result=$connect->query($request);          
                    while($row=mysqli_fetch_array($result)){
                ?>
                    <tr>
                <td><?=$row['IDorder']?></td>
                <td><?=$row[6]?></td>
                <td><?=$row[14]?></td>
                <td><?=$row['number']?></td>
                <td><?php echo date("d/m/Y",strtotime($row['date']))?></td>
                <td>
              <a onClick="if(confirm('Bạn muốn xóa đơn này?')) return true; else return false;" href="<?=$url?>?lgoandso=showorder&DeleIDorder=<?=$row['IDorder']?>"><button type="button" class="btn btn-xs btn-primary"><span class="fa fa-trash"></span> Xóa</button></a>
            </td>
            
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </section>
  <?php } 
?>
	