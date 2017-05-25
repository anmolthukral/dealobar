<?php

include('databaseadapter.php');
session_start();
if(isset($_SESSION['sessionid'])&&isset($_SESSION['cardio'])&&isset($_SESSION['request_id'])){

if($_SESSION['cardio']==hash('sha256',$_SESSION['request_id'])){
unset($_SESSION['cardio']);
unset($_SESSION['request_id']);

if(!!isset($_POST['email'])&&!isset($_POST['password'])){
	header('location:notfound');
}

$email=$_POST['email'];
$password=$_POST['password'];
$email=mysql_escape_string($name);

$password=hash("sha256",$password);
$usertoken=$password+$email;
$usertoken=hash('md5', $usertoken);
echo "user token " .$usertoken;

$getuser="SELECT * from userauthentication where usertoken='".$usertoken."';";
$result=mysql_query($getuser);
$res=mysql_fetch_array($result);
echo var_dump($res);
if($res){
	
	echo "<br/>INSIDE LOOPS</br/>";
	echo "<br/>res <br/>".$res['usertoken'];	

	$_SESSION['user']=$res['usertoken'];
	$qrr="UPDATE user is_login=1,lastlogin=now() WHERE email='".$res['email']."';";
	echo $qrr;
	$qrres=mysql_query($qrr);
	if(!$qrres){
		echo mysql_error();
	
	}
	$red=$_SESSION['parent'];
	$red=explode("/", $red)[2];

	header('location:'.$red);

}else{
	$_SESSION['logerr']="ah! something is wrong. Like email or password.";
	header('location:register');
}
}

}
else{
	$_SESSION['logerr']="ah! something is wrong. Like email or password.";
	header('location:register');
}
?>
