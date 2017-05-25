<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['sessionid'])){
$var=rand(100,10000);

$_SESSION['sessionid']=hash('md5', $var);
}
else{
	}
$random=rand(11,900000);	
$_SESSION['cardio']=hash('sha256', $random);
$_SESSION['request_id']=$random;

if(isset($_SESSION['regiseter_msg']))
{
	$errmsg=$_SESSION['regiseter_msg'];
	$check=1;
	unset ($_SESSION['regiseter_msg']);
}else if(isset($_SESSION['regiseter_msg'])){
	$errmsg=$_SESSION['logerr'];
	$check=2;
	unset ($_SESSION['logerr']);
}


else{
	$check=0;
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Deals | daily deals| hot deals| dealobar| products">
    <meta name="author" content="dealobar">
    <title>Login | Registeration</title>

    <link rel="icon" href="images/db_ico.ico"/>
    <link rel="shortcut icon" href="images/db_ico.ico"/>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
     <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
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
						<div class="shop-menu pull-right ">
							<ul class="nav navbar-nav">
								<li><a href="index"><i class="fa fa-shopping-cart"></i> Home</a></li>
								<li><a href="contact"><i class="fa fa-phone"></i> Contact</a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
								<div class="search_box pull-left">
							<form action="#" class="searchform">
								<input type="text" placeholder="Search Anything Here" />
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
										</form>


						</div>
				</div>
				</div>
			
	</header>
	<!-- this section is left for advertisment purpose-->

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="logform">
							<input name="email" type="email" placeholder="Email Address" />
							<input name="password" type="password" placeholder="Password" />
							<br/>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
						<br/>
					<span class="err"><?php if($check==2) echo $errmsg;  ?></span>

					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="adduser" method="POST" >
							<input type="text" name="name" placeholder="Name"/>
							<input type="email" name="email" placeholder="Email Address"/>
							<input type="password" name="password" placeholder="Password"/>
							
							<div class="g-recaptcha" data-sitekey="6LfVeScTAAAAACIO7xekm9xPny-NDdgP5ziXy6Bq"></div>
							
							<button type="submit" class="btn btn-default">Signup</button>
						</form><br/>
					<span class="err"><?php if($check==1) echo $errmsg;  ?></span>
					</div><!--/sign up form-->
				</div>


				
			</div>
		</div>
	</section><!--/form-->
	
	
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