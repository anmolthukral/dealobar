<?php
if(isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response']){
	


include('databaseadapter.php');
session_start();
if(isset($_SESSION['sessionid'])&&isset($_SESSION['cardio'])&&isset($_SESSION['request_id'])){

if($_SESSION['cardio']==hash('sha256',$_SESSION['request_id'])){
unset($_SESSION['cardio']);
unset($_SESSION['request_id']);

if(!isset($_POST['name'])&&!isset($_POST['email'])&&!isset($_POST['password'])){
	header('location:404.html');
}
$name=$_POST['name'];

$email=$_POST['email'];

$password=$_POST['password'];
$name=mysql_escape_string($name);
$email=mysql_escape_string($email);
$password=hash('sha256', $password);

$usertoken=$password+$email;
$usertoken=hash('md5', $usertoken);

$insert="INSERT INTO userauthentication(email,usertoken,password) VALUES('".$email."','".$usertoken."','".$password."');";
$res=mysql_query($insert);
if($res){
$inserttable="INSERT INTO userproperties(email,usertoken,name,is_login,lastlogin) VALUES('".$email."','".$usertoken."','".$name."',True,now());";
$fin=mysql_query($inserttable,$conn);
	if($fin){	
		session_start();

		$_SESSION['user']=$usertoken;
	header('location:index');
	}

else{
	$delete="DELETE FROM userauthentication WHERE `userauthentication`.`usertoken` = 'ab6439fa2daf0246f92eea433bca5ac4'";
	header('location:register');
}
}
}else{
	$_SESSION['regiseter_msg']="sorry! but we believe that something is wrong, like maybe you already have an account";
	header('location:register');

}
}
else {
	unset($_SESSION['cardio']);
	$_SESSION['regiseter_msg']="sorry! but we believe that something is wrong, like maybe you already have an account";
	header('location:register');

	}
}
else {
	unset($_SESSION['cardio']);
	$_SESSION['regiseter_msg']="Please fill the captcha. All you have to do is click on the box and boo yeah. Your good to go";
	header('location:register');

	}
?>
