<?php
include("databaseadapter.php");

$target_dir = "uploads/";
session_start();
$target_file = $target_dir . basename($_FILES["filecsv"]["name"]);
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
$file=$_FILES["filecsv"];
if($FileType=='csv'){
if(isset($_POST["submit"])) {
 	 if (move_uploaded_file($_FILES["filecsv"]["tmp_name"], $target_file)){

 	 	$file_handle = fopen($target_file, 'r');
 	 	$var=1;
	while (!feof($file_handle) ) {
		$line = fgets($file_handle);
		if($var==1){
			$var++;
		}else{
		$line=mysql_escape_string($line);
		$array=explode(",",$line);

		$query="INSERT INTO products(name,link,image,parentsite,localimage,price,sellingprice,discount,category,keywords) VALUES('".$array[0]."','".$array[1]."','".$array[2]."','".$array[3]."','".$array[4]."','".$array[6]."','".$array[7]."','".$array[8]."','".$array[9]."','".$array[10]."');";
		$categoryinsert="INSERT INTO category(catergory,items,cathref)VALUES('".$array[10]."',120,'category?name=".$array[9]."');";
		echo "<br/><br/>".$categoryinsert;
		echo $query."<br/> ";
		echo $line."<br/>";
		$execute=mysql_query($categoryinsert);
		$res=mysql_query($query);
		if($res){
			echo "sucess <br/><br/><br/><br/>";
		}
		else{
			echo mysql_error()."<br/><br/><br/><br/>";
		}
	}

	}
	fclose($file_handle);
	header('location:secret');
	}else{
		$_SESSION['secret-msg']="there was some problem uplaoding the file";
		header('location:secret');
		echo "leakage 1";
}
}else{
	$_SESSION['secret-msg']="there was some problem uplaoding the file";
	header('location:secret');
	echo "leakage 2";

}
}else{
	$_SESSION['secret-msg']="there was some problem uplaoding the file";
	header('location:secret');
	echo "leakage 3";
}
?>