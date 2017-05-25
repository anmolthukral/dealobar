<?php
session_start();
if(!isset($_SESSION['sessionid'])){
$var=rand(100,10000);

$_SESSION['sessionid']=hash('md5', $var);
}else{
}

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
</head><!--/head-->m
<body>
<center>
<h2>Hello admin</h2>

<div class="col-md-7">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="acessadmin" method="POST">
							<input name="name" type="text" placeholder="Name" />
							<input name="email" type="email" placeholder="Email Address" />
							<input name="password" type="password" placeholder="passwords" />
							
							<br/>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
	</center>			
 <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

</body>
</html>