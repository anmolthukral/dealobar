<!DOCTYPE html>
<?php
session_start();
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
$getuser="SELECT name from _dealobarusers.userproperties where usertoken='".$_SESSION['user']."';";
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
	</header>
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>   
					</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-12">
	    			<div class="contact-form">
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
	
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