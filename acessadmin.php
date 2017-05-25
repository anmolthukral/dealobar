<?php
session_start();
if(!isset($_SESSION['sessionid'])){
header("location:index");

}

if(isset($_POST['name'])&&isset($_POST['password'])&&isset($_POST['email'])){
$admin=$_POST['name'];
$pass=$_POST['password'];
$email=$_POST['email'];
if($admin=='anmolthukral'&&$email=='thukral.anmol21@gmail.com'&&$pass='potatopotato'){
	$_SESSION['admin']='anmolthukral';
	header("location:secret");
}else if($admin=='bhumit'&&$email=='bhumitkathpalia@gmail.com'&&$pass='yadalambada'){
	$_SESSION['admin']='bhumitkathpalia';
	
	header("location:secret");
}
}else{
	header("location:index");
}



?>
