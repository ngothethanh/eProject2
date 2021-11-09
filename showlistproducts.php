<?php
	$url = $_SERVER['REQUEST_URI'];
	$search='';
	$brand='';
	$page=1;
	if (isset($_GET['search'])) {
		$search = $_GET['search'];
	}
	if (isset($_GET['brand'])) {
		$brand = $_GET['brand'];
	}
	if (isset($_GET['submit'])) {
		$search = $_GET['search'];
		$brand ='';
	}
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	$from = ($page-1)*4;
	$requet="select * from product where name like '%$search%' and brand like '%$brand%' limit $from,4";
	$result = $connect->query($requet);
	while($row=mysqli_fetch_array($result)) { ?>
		<div class=" col-lg-3 col-md-4 col-sm-6 col-12 productForms" style = "margin-top:20px;height:500px">
			<div class="card h-100">
				<a href="#"><img class="card-img-top" src="<?=substr($row['img'],3)?>" alt=""></a>
				<div class="card-body">
					<h4 class="card-title"><a href="order.php?IDproduct=<?=$row['IDproduct']?>"><?=$row['name']?></a>
					</h4>
					<strong><?=$row['price']?>.đ</strong>
					<p class="card-text"></p>
				</div>
				<div class="card-footer">
					<small class="text-muted row justify-content-between">
						<span class="col-4">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
						<span class="col-6"><a href="Detail.rtf" download>download detail</a></span>
					</small>
				</div>
			</div>
		</div>
	<?php } ?>

	<section class="col-lg-12" style="text-align: center; ">
		<nav aria-label="Page navigation example">
			<ul class="pagination" style="margin-top: 0px;">
				<?php $requet2="select * from product where name like '%$search%' and brand like '%$brand%'";$result2 = $connect->query($requet2); for ($i = 1; $i <= mysqli_num_rows($result2)/4+1 ; $i++) { ?> 
					<li class="page-item"><a  class="page-link" href="?search=<?=$search?>&brand=<?=$brand?>&page=<?=$i?>"><?=$i?></a></li>
				<?php } ?>
            </ul>
        </nav>    
   </section>


