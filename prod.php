<?php

session_start();
if(isset($_SESSION['pid'])){
	unset($_SESSION['pid']);
}

?>

<!DOCTYPE html>
<?php

if(!isset($_SESSION['sessionid'])){
$var=rand(100,10000);

$_SESSION['sessionid']=hash('md5', $var);
}else{
}
$random=rand(11,900000);	
$_SESSION['cardio']=hash('sha256', $random);
$_SESSION['request_id']=$random;

if(isset($_SESSION['user'])){

include('databaseadapter.php');
$usertoken=$_SESSION['user'];
$getuser="SELECT name from userproperties where usertoken='".$_SESSION['user']."';";
$result=mysql_query($getuser);
$res=mysql_fetch_array($result);
if($res){
 $name=$res['name'];

 $login=1;

}else{
	$login=0;
}
}else{
	$login=0;
}

$self=$_SERVER['PHP_SELF'];
$self=explode('.', $self)[0];

$_SESSION['parent']=$self;
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Deals | daily deals| hot deals| dealobar| products">
    <meta name="author" content="dealobar home page">
    <title>Home | DealObar</title>

    <link rel="icon" href="images/db_ico.ico"/>
    <link rel="shortcut icon" href="images/db_ico.ico"/>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript" src="js/xfaad.js"></script>

</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row" id="full-row">
					<div class="bar">
					<div class="col-sm-6">

           
						<div class="social-icons pull-left">
							<ul class="nav navbar-nav">
								<li><a href="https://facebook.com/com.dealobar"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/dealobar"><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-instagram"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
					

					<div class="col-sm-6 " id="padding-down">
						<div class="contactinfo">
							<ul class="nav nav-pills pull-right">
								<li><a href="" class="align-center"><i class="fa fa-envelope"></i> support@dealobar.com</a></li>
							</ul>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="/"><img src="images/db-copy-logo.png" alt="DealObar" height="60" width="180"/></a>
						</div>
											</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right " id="navigation">
							<ul class="nav navbar-nav">
								<li><a href="index"><i class="fa fa-shopping-cart"></i> Home</a></li>
								<li><a href="contact"><i class="fa fa-phone"></i> Contact</a></li>
								<?php 
								if($login==1){
									echo '<li><a href="/me?user='.$name.'"><i class="fa fa-user"></i>  '.$name.'</a></li>
								';
								echo '
								<li><a href="logout"><i class="fa fa-lock"></i> Logout</a></li>';

									}else{
										echo '	<li class="login-container">
									<a id="login" data-target="#text" data-toggle="collapse"><i class="fa fa-lock">
									</i> Login</a>
									
								</li>		
							';
							echo '<li><a href="register"><i class="fa fa-user"></i>Register</a></li>
								';;	
										}
								?>
							</ul>
						</div>
				</div>
				</div>
			</div>
		</div><!--/header-middle-->
		<div class-"row">
						 <?php
						 if($login==0)
						 echo '<div id="text" class="collapse"> 
						 	        <div class="col-md-6 pulled-right pull-right super-fit">

						 	<div class="login-form "><!--login form-->
						<h2>Login to your account</h2>
						<form class="logform" action="logform" method="POST">
							<input name="email" type="email" placeholder="Email Address" />
							<input name="password" type="password" placeholder="Password" />
							
							<br/>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div>
					</div>
						 </div>';

						 ?>
					</div>
		<div class="row">
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
						<div class="search_box pull-left">
							<form action="search" class="searchform" method="GET">
								<input  name="this" type="text" placeholder="Search Anything Here" />
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
										</form>


						</div>
				</div>
				</div>
			</div>
	</header>	<!-- this section is left for advertisment purpose-->
	<section id="advertisement">
		<div class="container">
		</div> 
	</section>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Kids</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Fashion</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Households</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Interiors</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Clothing</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Bags</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div>
						</div><!--/category-productsr-->
					
						
					</div>	
				</div>
				<?php
				include("databaseadapter.php");
				if(isset($_GET['pid'])){
					$go=1;
					$id=$_GET['pid'];
					$id=mysql_escape_string($id);
				
				$querytogetproducts="SELECT * FROM products WHERE id=".$_GET['pid'].";";
				$result=mysql_query($querytogetproducts);
				if($result){
					$res=mysql_fetch_array($result);
				}
				}
			else{
					header('location:notfound');
				}
				
				?>	
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php if($go==1) echo $res['image'];  ?>" alt="<?php if($go==1) echo $res['name'];  ?>" />
							</div>


						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?php if($go==1) echo $res['name'];  ?></h2>
								<p><?php if($go==1) echo $res['parentsite'];  ?></p>
								<span>
									<span><?php if($go==1) echo $res['sellingprice'];  ?></span>
									<a href="<?php if($go==1) echo $res['link'];  ?>"<button type="button" class="btn btn-fefault cart">
										Buy Now
									</button>
								</a>
								</span>
								<p><?php if($go==1) echo $res['category'];  ?></p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<div class="col-sm-12">
								<?php if($go==1) echo $res['details'];  ?>
									</div>
								</div>
							
							
							<div class="tab-pane fade active in" id="reviews" >
								<?php
								$reviews="SELECT * FROM reviews WHERE id=".$id.";";
								$reviewresult=mysql_query($reviews);
								if($reviewresult){
								while ($revres=mysql_fetch_array($reviewresult)) {
									echo 	'<div class="col-sm-12">
									<ul>
										<li><i class="fa fa-user"></i>'.$revres["name"].'</li>
													<li><a href=""><i class="fa fa-calendar-o"></i>'.$revres["date"].'</a></li>
									</ul>
									<p>'.$revres["review"].'</p>';
								

										}
								
								}else{

								}
								?>
							`	<section id="reviewlatest">
							<br/>
									<p><b>Write Your Review</b></p>
									<?php
									$_SESSION['pid']=$id;
									if(isset($_SESSION['user'])&&$_SESSION['user']){
									echo '<form onsubmit="addreview();" method="POST" name="reviews">
										<span>
											<input name="name" type="text" placeholder="The name you wanna show at feeds"/>
=										</span>
										<textarea name="review" placeholder="write your review here" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>';
								}else{
									echo "<h3> Please login to post a Review </h3><br/><p>And yeah we are free, so yes you can signup or join without hesitation<br/>Pleasure.Thankyou.</p>";
								}
									?>
								</section>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend1.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend2.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/recommend3.jpg" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<div class="logo pull-left">
							<a href="/"><img src="images/db-copy-logo.png" alt="DealObar" height="60" width="180"/></a>
							</div>
						
							<p></p>
						</div>
					</div>
					<div class="col-sm-10">
						<div class="single-widget">
							<div style="float:right;">
							<h2>Subscribe now</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
				</div>
					
			</div>
		</div>
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>