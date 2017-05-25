<?php
session_start();
if(isset($_SESSION['user'])){
 
$update="UPDATE userproperties SET lastlogout = now(),is_login=0  WHERE usertoken='".$_SESSION['user']."';";
echo $update;
$res=mysql_query($update);
$red=$_SESSION['parent'];
$red=explode("/", $red)[2];
unset( $_SESSION['user']); 
header('location:'.$red);

}	
?>