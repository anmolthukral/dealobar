<?php
session_start();
if(isset($_SESSION['sessionid'])&&isset($_SESSION['admin'])){


}
else{
header("location:logout");

}
include('databaseadapter.php');

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
</head><!--/head-->
<body>
<center>
<h1>You'r Secret Acess to Add products </h1>
<?php
$secret=hash('md5', rand(0,1000));
$udate="UPDATE secret SET secret='".$secret."'  WHERE weird=0";
mysql_query($udate);


echo "<h2>".$secret."</h2>";

?>
<a href="logoutadmin"><button type="submit" class="btn btn-default">Logout Admin</button></a>


<br/><br/><br/>
<form class="uploadfile" action="uploadcsv" method="post"  enctype="multipart/form-data">
        <input type="file" name="filecsv" id="fileToUpload">
            <br/><br/><br/>
            <input type="submit" class="btn btn-default" value="Upload" name="submit">

</form>
</center>

 <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

</body>
</html>