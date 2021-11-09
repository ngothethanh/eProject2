
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
    <h1>List orders</h1>
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
                        <th>ID Order</th>
                        <th>ID Customer</th>
                        <th>ID Product</th>
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
          $request="select * from orders where IDorder like '%$search%' or Idproduct like '%$search%'";
            $result=$connect->query($request);          
                    while($row=mysqli_fetch_array($result)){
                ?>
                    <tr>
            <td><?=$row['IDorder']?></td>
            <td><?=$row['IDcustomer']?></td>
            <td><?=$row['IDproduct']?></td>
            <td><?=$row['number']?></td>
            <td><?php echo date("d/m/Y",strtotime($row['date']))?></td>
            <td>
              <a href="<?=$url?>&edit=update&ID=<?=$row['IDorder']?>"><button type="button" class="btn btn-xs btn-primary"><span class="fa fa-pencil"></span> Sửa</button></a>
              <a onClick="if(confirm('Bạn muốn xóa Order này?')) return true; else return false;" href="<?=$url?>&edit=delete&ID=<?=$row['IDorder']?>"><button type="button" class="btn btn-xs btn-primary"><span class="fa fa-trash"></span> Xóa</button></a>
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
      $IDcustomer=$_POST['IDcustomer'];
      $IDproduct=$_POST['IDproduct'];
      $number=$_POST['number'];
      $request="insert into orders(IDcustomer,IDproduct,number,date) value('$IDcustomer','$IDproduct','$number',now())";
      $result = $connect->query($request);
      if (isset($result)) {
        echo "<script>alert('successful!!');location='?navigation=orders'</script>";
      }
    }
  ?>
  <a href="?navigation=orders" class="btn btn-primary"><i class="fa fa-angle-double-left"></i>GO Back</a>
  <h1>ADD Order</h1>
  <form id="add" method="post">    
    <table>
      <tr>
        <td><label for="IDcustomer">IDcustomer</label></td>
        <td><input type="number" id="IDcustomer" name="IDcustomer" value="<?php if(isset($IDcustomer)) echo $IDcustomer?>"></td>
      </tr>
      <tr>
        <td><label for="IDproduct">IDproduct</label></td>
        <td><input type="number" id="IDproduct" name="IDproduct" value="<?php if(isset($IDproduct)) echo $IDproduct?>"></td>
      </tr>

      <tr>
        <td><label for="number">number</label></td>
        <td><input type="number" id="number" name="number" value="<?php if(isset($number)) echo $number?>">
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
    $(document).ready(function(){
      $("#add").validate({
        rules:{
          IDcustomer:{
            required:true
           
          },
          IDproduct:{
            required:true,            
          },
          number:{
            required:true
          }         
        },
        messages:{
          IDcustomer:{
            required:" nothing!!"
          },
          IDproduct:{
            required:" nothing!!",

          },
          number:{
            required:"nothing!!"
          }
        },

      });
    }

      );
  </script>   

<?php  } ?>

<!--Function delete-->
<?php
  function delete(){
    GLOBAL $connect;
    $IDorder = $_GET["ID"];
    $request = "delete from orders where IDorder = $IDorder";
    $result = $connect->query($request);
    if ($result) {
      echo "<script>alert('successful !!');location='?navigation=orders'</script>";

    }
    else
      echo "<script>alert('Fail !!')</script>;";
  }
?>

<!--Fuction update-->
<?php function update(){ ?>
  <?php
    GLOBAL $connect;
    $IDorder=$_GET['ID'];
    $request = "select * from orders where IDorder = $IDorder";
    $row = mysqli_fetch_array($connect->query($request));
    if (isset($_POST['update'])) {
      $number=$_POST['number'];
      $IDcustomer=$_POST['IDcustomer'];
      $IDproduct=$_POST['IDproduct'];
      $request="update orders set IDcustomer='$IDcustomer',IDproduct='$IDproduct',number='$number', where IDorder = $IDorder";
      $result = $connect->query($request);
      if (isset($result)) {
        echo "<script>alert('successful!!');location='?navigation=orders'</script>";
      }
    }  
  ?>
  <a href="?navigation=orders" class="btn btn-primary"><i class="fa fa-angle-double-left"></i>GO Back</a>
  <h1>Update Orders:<?=$IDorder?></h1>
  <form id="add" method="post">    
    <table>
      <tr>
        <td><label for="IDcustomer">IDcustomer</label></td>
        <td><input type="number" id="IDcustomer" name="IDcustomer" value="<?php if(isset($IDcustomer)) echo $IDcustomer; else echo $row['IDcustomer']?>"></td>
      </tr>
      <tr>
        <td><label for="IDproduct">Name</label></td>
        <td><input type="text" id="IDproduct" name="IDproduct" value="<?php if(isset($IDproduct)) echo $IDproduct; else echo $row['IDproduct']?>"></td>
      </tr>
      <tr>
        <td><label for="number">number</label></td>
        <td><input type="text" id="number" name="number" value="<?php if(isset($number)) echo $number;else echo $row['number']?>" >
          
        </td>
      </tr>
      <tr>
        <td><input type="reset" name="reset" value="Reset"></td>
        <td><input type="submit" name="update" value="Update"></td>
      </tr>
    </table>
  </form>

<?php } ?>


