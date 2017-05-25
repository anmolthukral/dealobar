<?php
session_start();
unset($_SESSION['admin']);
unset($_SESSION['secret']);
include('databaseadapter.php');
$udate="UPDATE secret SET secret='yada'  WHERE weird=0";
mysql_query($udate);
header("location:index");

?>
