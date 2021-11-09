<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Harval Electric</title>
	<link rel="icon" href="img/logo/Capture.PNG">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="vendor/jquery/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/developer/footer.css">
	<link rel="stylesheet" href="vendor/developer/header.css">
	<link rel="stylesheet" href="vendor/developer/main.css">
	
</head>
<body >
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-darkblue fixed-top">
	      <div class="container">
	        <a class="navbar-brand" href="index.php" ><div class="row" ><img class="d-block img-fluid" src="img/logo/alo.bmp" style="margin-left: 10px" alt=""></div></a>
	        
	        
	             
	            
	      </div>
	    </nav>
	</header>
	<main >
			<div class="container contact-form" id="body">
			<div class="contact-image">
				<img src="https://image.ibb.co/kUagtU/rocket_contact.png" style="height: 200px;width: 260px" alt="rocket_contact"/>
			</div>
			<form method="post">
				<h3>Drop Us a Message</h3>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
								<input type="text" name="txtName" class="form-control" placeholder="Your Name *" required="" />
						</div>
						<div class="form-group">
							<input type="text" name="txtEmail" class="form-control" placeholder="Your Email *"  required="" />
						</div>
						<div class="form-group">
							<input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *"  required="" />
						</div>
						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<textarea name="txtMsg"  required="" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<a href="index.php"   class="btn btn-primary " onclick="comebackhome()">Submit</a>
					<input id="btnReset" type="reset" name="btnReset" class="btn btn-primary" value="Reset" >

				</div>

			</form>
		</div>
		
	    <footer id="myFooter">
			<div class="bg-darkblue">
				<div class="row">
					<div class="col-sm-3">
						<h5>HE</h5>
						<p>
							Ecommerce sales website created by Aptech group
						</p>
						
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
					<div class="col-md-3">
						<iframe id="map-container" width="100%" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJv829v32rNTERT625SnyD2IU&key=AIzaSyBdJm9Amm4KALkKlZObWn40dcpRyH119zg">
						</iframe>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<p>© 2018 Aptech.vn - Address:19 Nguyễn Trái, Ngã Tư Sở, Hà Nội , Việt Nam </p>
			</div>
			<script src="vendor/Script/Script.js"></script>
		</footer>		
	</main>
	
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="jsondata.js"></script>
	<script src="vendor/developer/javascriptHE.js"></script>

	<script>
		function comebackhome(){
			alert("Thanks you !! We will respond as soon as possible");
			
		}
	</script>

</body>
</html>

