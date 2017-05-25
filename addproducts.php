<?php
session_start();

if(!isset($_POST['secret'])){
	header('location:logoutadmin');
	}
include('databaseadapter.php');
$getsecret="SELECT secret from _dealobarproducts.secret";
$result=mysql_query($getsecret);
$res=mysql_fetch_array($result);
if($res['secret']&&$res['secret']!='yada'){
	if($res['secret']==$_POST['secret']){
		if(isset($_POST['name']))
		$name=$_POST['name'];

		if(isset($_POST['link']))
		$link=$_POST['link'];
	
		if(isset($_POST['image']))
		$image=$_POST['image'];
	
		if(isset($_POST['parent']))
		$parentsite=$_POST['parent'];
	
		if(isset($_POST['costprice']))
		$price=$_POST['costprice'];
	
		if(isset($_POST['sellingprice']))
		$sellingprice=$_POST['sellingprice'];
				
		$ch = curl_init($image);
		$temp=explode("/", $image)[sizeof(explode("/", $image))-1];
		$localimage='/localimages/'+$name+$temp;
		file_put_contents($localimage, file_get_contents($image));
		if(!isset($_POST['category']))
		$category='hot deals';
		else{
			$category=$_POST['category'];
		}

		$insert="INSERT INTO products (name,link,image,parentsite,price,sellingprice,localimage,dateposted,category)VALUES('".$name."','".$link."','".$image."','".$parentsite."','".$price."','".$sellingprice."','".$localimage."',now(),'deals');";
		echo $insert;
		$categoryinsert="INSERT INTO category(catergory,items,cathref)VALUES('".$category."',120,'category?name=".$array[8]."');";
		$resultofcat=mysql_query($categoryinsert);

		$result=mysql_query($insert);
		if($result){
			echo "<br/>Sucess!" ;
		}else{
			echo "<br/>failure";
		}
	}

}else{
	echo "your! lost buddy";
	header("location:logoutadmin");
}

?>