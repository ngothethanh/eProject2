<?php
    session_start();
    include"admin/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
                <a class="navbar-brand" href=".">
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
                                <a class="dropdown-item" href="?search=TV&brand=samsung" >Samsung</a>
                                <a class="dropdown-item" href="?search=TV&brand=sony"">Sony</a>
                                <a class="dropdown-item" href="?search=TV&brand=tcl">TCL</a>
                                <a class="dropdown-item" href="?search=TV&brand=lg">LG</a>
                                <a class="dropdown-item" href="?search=TV&brand=Asanzo">Asanzo</a>
                                <a class="dropdown-item text-warning" href="?search=TV">All...</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Refrigerator</a>
                            <div class="dropdown-menu bg-darkblue" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="?search=Refrigerator&brand=Samsung">Samsung</a>
                                <a class="dropdown-item" href="?search=Refrigerator&brand=Midea">Midea</a>
                                <a class="dropdown-item" href="?search=Refrigerator&brand=Sharp">Sharp</a>
                                <a class="dropdown-item" href="?search=Refrigerator&brand=LG">LG</a>
                                <a class="dropdown-item" href="?search=Refrigerator&brand=Hitachi">Hitachi</a>
                                <a class="dropdown-item text-warning" href="?search=Refrigerator">All...</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Washer</a>
                            <div class="dropdown-menu bg-darkblue" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item" href="?search=Washer&brand=Samsung">Samsung</a>
                                <a class="dropdown-item" href="?search=Washer&brand=Toshiba">Toshiba</a>
                                <a class="dropdown-item" href="?search=Washer&brand=Electrolux">Electrolux</a>
                                <a class="dropdown-item" href="?search=Washer&brand=Candy">Candy</a>
                                <a class="dropdown-item text-warning" href="?search=Washer">All...</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Air conditioner</a>
                            <div class="dropdown-menu bg-darkblue" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="?search=Air&brand=Samsung">Samsung</a>
                                <a class="dropdown-item" href="?search=Air&brand=Toshiba">Toshiba</a>
                                <a class="dropdown-item" href="?search=Air&brand=AQUA">AQUA</a>
                                <a class="dropdown-item text-warning" href="?search=Air">All...</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Phone</a>
                            <div class="dropdown-menu bg-darkblue" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="?search=Phone&brand=Iphone">Iphone</a>
                                <a class="dropdown-item" href="?search=Phone&brand=Samsung">Samsung</a>
                                <a class="dropdown-item" href="?search=Phone&brand=OPPO">OPPO</a>
                                <a class="dropdown-item" href="?search=Phone&brand=Huawei">Huawei</a>
                                <a class="dropdown-item text-warning" href="?search=Phone">All...</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rice cooker</a>
                            <div class="dropdown-menu bg-darkblue" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="?search=Rice&brand=Toshiba">Toshiba</a>
                                <a class="dropdown-item" href="?search=Rice&brand=Cuckoo">Cuckoo</a>
                                <a class="dropdown-item" href="?search=Rice&brand=Kangaroo">Kangaroo</a>
                                <a class="dropdown-item" href="?search=Rice&brand=Sunhouse">Sunhouse</a>
                                <a class="dropdown-item text-warning" href="?search=Rice">All...</a>
                            </div>
                        </li>
                        <li class="nav-item">
                           <form class="search-form" method="get">     
                                <table>
                                    <tr>
                                        <td><input class="form-control" name="search"  placeholder="Tìm kiếm" type="text"></td>
                                        <td><input type="submit" name="submit" value="search"></input></td> 
                                    </tr>
                                </table>
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
        <div class="row" id="commercical">
            <div class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" style="height: 320px;width: 100%" src="img/carouselExampleIndicators/tivisumsungS.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" style="height: 320px;width: 100%" src="img/carouselExampleIndicators/vi-vn-tu-lanh-panasonic-nr-ba228pkv1.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" style="height: 320px;width: 100%" src="img/carouselExampleIndicators/vi-vn-daikin-ftkq25svmv-thiet-ke.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row bg-secondary text-dark" style="margin-top: 25px;margin-left: 0px">
                    <a class="col-sm-4 btn  tablinks bg-darkblue text-light" onclick="opencommercial(event,'News')">News</a>
                    <a class="col-sm-4 btn tablinks " onclick="opencommercial(event,'Events')">Events</a>
                    <a class="col-sm-4 btn tablinks" onclick="opencommercial(event,'Review')">Review</a>
                </div>
                <div id="News" class="tabcontent">
                    <div class="card">
                        <div class="card-header">
                            <a href="https://www.samsung.com/us/mobile/tablets/buy/s/Specs/"><strong>SAMSUNG</strong></a>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>Introducing the <span class="text-danger">Galaxy Tab 4</span></p>
                            </blockquote>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a href="https://www.apple.com/iphone-xs/"><strong>APPLE</strong></a>
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p><span class="text-danger">IphonX</span><span><small>s</small>-Welcome to the big screens.</span></p>

                            </blockquote>
                        </div>
                    </div>
                </div>
                <div id="Events" class="tabcontent  d-none">
                    <div class="card text-center">
                        <div class="card-header">
                            <strong class="text-primary">Registration-Close customer</strong>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Close customer</h5>
                            <p class="card-text">let become our friend to be able to get more incentives !!</p>
                            <a href="HarvalElectricContact.html" class="btn btn-primary">Go somewhere</a>
                        </div>
                        <div class="card-footer text-muted">
                            <h2 class="text-danger">2 more day</h2>
                        </div>
                    </div>
                </div>
                <div id="Review" class="tabcontent  d-none">
                    <a href="https://www.youtube.com/watch?v=4ScfoU6EB48&t=72s">
                        <h3 class="text-danger">Apple iPhone XS and XS Max Unboxing</h3>
                    </a>
                    <iframe width="350" height="230" src="https://www.youtube.com/embed/4ScfoU6EB48" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>
     
        <!--Showlistproducts-->
        <div class="row" >
            <?php
            include"showlistproducts.php";
            ?>
        </div>
        
        <div class="nav-carousel">
            <footer id="myFooter">
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
        </div>   
    </main>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="jsondata.js"></script> <!-- get data -->
    <script src="vendor/developer/javascriptHE.js"></script> 
</body>

</html>
