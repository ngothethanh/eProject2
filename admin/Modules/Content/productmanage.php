
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
    <h1>List Products</h1>
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
                        <th>IDproduct</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Img</th>
                        <th>Brand</th>
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
          $request="select * from product where name like '%$search%' or brand like '%$search%'";
            $result=$connect->query($request);          
                    while($row=mysqli_fetch_array($result)){
                ?>
                    <tr>
            <td><?=$row['IDproduct']?></td>
            <td><?=$row['name']?></td>

            <td><?=$row['price']?></td>
            <td><img src="<?=$row['img']?>" ></td>
            <td><?=$row['brand']?></td>
            <td><?php echo date("d/m/Y",strtotime($row['date']))?></td>
            <td>
              <a href="<?=$url?>&edit=update&ID=<?=$row['IDproduct']?>"><button type="button" class="btn btn-xs btn-primary"><span class="fa fa-pencil"></span> Sửa</button></a>
              <a onClick="if(confirm('Bạn muốn xóa Admin này?')) return true; else return false;" href="<?=$url?>&edit=delete&ID=<?=$row['IDproduct']?>"><button type="button" class="btn btn-xs btn-primary"><span class="fa fa-trash"></span> Xóa</button></a>
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
      $price=$_POST['price'];
      $img="../img/".$_POST['img'];
      $brand=$_POST['brand'];
      $request="insert into product(name,price,img,brand,date) value(N'$name','$price','$img','$brand',now())";
      $result = $connect->query($request);
      if (isset($result)) {
        echo "<script>alert('successful!!');location='?navigation=products'</script>";
      }

    }

  ?>
  <a href="?navigation=products" class="btn btn-primary"><i class="fa fa-angle-double-left"></i>GO Back</a>
  <h1>ADD Product</h1>
  <form id="add" method="post">    
    <table>
      <tr>
        <td><label for="name">Name</label></td>
        <td><input type="text" id="name" name="name" value="<?php if(isset($name)) echo $name?>"></td>
      </tr>
      <tr>
        <td><label for="price">price</label></td>
        <td><input type="number" id="price" name="price" value="<?php if(isset($price)) echo $price?>"></td>
      </tr>
      <tr>
        <td><label for="img">Img</label></td>
        <td><input type="file" id="img" name="img" value="<?php if(isset($img)) echo $img?>">
        </td>
      </tr>
      <tr>
        <td><label for="brand">brand</label></td>
        <td>
          <select id="brand" name="brand" >
            <option selected="selected"  hidden="">
            <option value="Samsung">Samsung</option>
            <option value="Sony">Sony</option>
            <option value="TCL">TCL</option>
            <option value="Asanzo">Asanzo</option> 
            <option value="LG">LG</option>
            <option value="Midea">Midea</option>
            <option value="Sharp">Sharp</option>
            <option value="Hitachi">Hitachi</option>
            <option value="Toshiba">Toshiba</option>
            <option value="Electrolux">Electrolux</option>
            <option value="Candy">Candy</option>
            <option value="AQUA">AQUA</option>
            <option value="Iphon">Iphon</option>
            <option value="OPPO">OPPO</option>
            <option value="Huawei">Huawei</option>
            <option value="Cuckoo">Cuckoo</option>
            <option value="Kangaroo">Kangaroo</option>
            <optgroup value="Sunhouse">Sunhouse</optgroup>
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
            notEqualTo:[<?php 
              $request = 'select name from product' ;
              $result = $connect->query($request);
              while ($row=mysqli_fetch_array($result)) { ?>
                "<?=$row['name']?>",
              <?php }
            ?>]
          },
          price:{
            required: true,           
          },
          img:{
            required: true,          
          },
          brand:{
            required: true,
          }         
        },
        messages:{
          name:{
            required:"nothing!!"
          },
          price:{
            required:"nothing!!",          
          },
          img:{
            required:"nothing!!",          
          },
          brand:{
            required: "nothing!!",           
          }         
        }

      });
    }

      );
  </script> 
<?php } ?>

<!--Function delete-->
<?php
  function delete(){
    GLOBAL $connect;
    $IDproduct = $_GET["ID"];
    $request = "delete from product where IDproduct = $IDproduct";
    $result = $connect->query($request);
    if ($result) {
      echo "<script>alert('successful !!');location='?navigation=products'</script>";

    }
    else
      echo "<script>alert('Fail !!')</script>";
  }
?>

<!--Fuction update-->
<?php function update(){ ?>
  <?php
    GLOBAL $connect;
    $IDproduct=$_GET['ID'];
    $request = "select * from product where IDproduct = $IDproduct";
    $row = mysqli_fetch_array($connect->query($request));
    if (isset($_POST['update'])) {
      $name=$_POST['name'];
      $price=$_POST['price'];
      if($_POST['img']!=NULL){
        $img='../img/'.$_POST['img'];
      }
      else 
        $img=$row['img'];
      
      if($_POST['brand']!=NULL){
        $brand=$_POST['brand'];
      }
      else 
        $brand=$row['brand'];
      $request="update product set name='$name',price='$price',img='$img',brand='$brand' where IDproduct = $IDproduct";
      $result = $connect->query($request);
      if (isset($result)) {
        echo "<script>alert('successful!!');location='?navigation=products'</script>";
      }

    }
    

  ?>
  <a href="?navigation=products" class="btn btn-primary"><i class="fa fa-angle-double-left"></i>GO Back</a>
  <h1>Update Product:<?=$IDproduct?></h1>
  <form id="add" method="post">    
    <table>
      <tr>
        <td><label for="name">Name</label></td>
        <td><input type="text" id="name" name="name" value="<?php if(isset($name)) echo $name; else echo $row['name']?>"></td>
      </tr>
      <tr>
        <td><label for="price">price</label></td>
        <td><input type="number" id="price" name="price" value="<?php if(isset($price)) echo $price; else echo $row['price']?>"></td>
      </tr>
      <tr>
        <td><label for="img">Img</label></td>
        <td><input type="file" id="img" name="img" value="<?php if(isset($img)) echo $img;else echo $row['img']?>" >
          <img src="<?=$row['img']?>">
        </td>
      </tr>
      <tr>
        <td><label for="brand">brand</label></td>
        <td>
          <select id="brand" name="brand" >
            <option selected="selected"  hidden=""><?php echo $row['brand'];?></option>
            <option value="Samsung">Samsung</option>
            <option value="Sony">Sony</option>
            <option value="TCL">TCL</option>
            <option value="LG">LG</option>
            <option value="Asanzo">Asanzo</option> 
            <option value="LG">LG</option>
            <option value="Midea">Midea</option>
            <option value="Sharp">Sharp</option>
            <option value="Hitachi">Hitachi</option>
            <option value="Toshiba">Toshiba</option>
            <option value="Electrolux">Electrolux</option>
            <option value="Candy">Candy</option>
            <option value="AQUA">AQUA</option>
            <option value="Iphon">Iphon</option>
            <option value="OPPO">OPPO</option>
            <option value="Huawei">Huawei</option>
            <option value="Cuckoo">Cuckoo</option>
            <option value="Kangaroo">Kangaroo</option>
            <optgroup value="Sunhouse">Sunhouse</optgroup>
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
            if (value == param[i] && value != "<?=$row['name']?>") { notEqual = false; }
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
            notEqualTo:[<?php 
              $request = 'select name from product' ;
              $result = $connect->query($request);
              while ($row=mysqli_fetch_array($result)) { ?>
                "<?=$row['name']?>",
              <?php }
            ?>]
          },
          price:{
            required: true,           
          },
          img:{
            required: true,          
          },
          brand:{
            required: true,
          }         
        },
        messages:{
          name:{
            required:"nothing!!"
          },
          price:{
            required:"nothing!!",          
          },
          img:{
            required:"nothing!!",          
          },
          brand:{
            required: "nothing!!",           
          }         
        }

      });
    }

      );
  </script> 
<?php } ?>