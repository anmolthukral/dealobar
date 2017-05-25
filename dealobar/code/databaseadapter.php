<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
//connection make
$conn=mysql_connect("localhost","u256030158_user","");
if(!$conn)
{
	die('oops connection problem ! --> '.mysql_error());
}	

//selecting database users
$users=mysql_select_db("u256030158_data");
//selecting database products
if(!$users)
{
	die('oops database selection problem ! --> '.mysql_error());
}

/*
$products=mysql_select_db("_dealobarproducts");
if(!$products)
{
	die('oops database selection problem ! --> '.mysql_error());
}
*/
?>