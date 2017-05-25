<?php
session_start();
if(isset($_SESSION['user'])&&isset($_SESSION['pid'])){
$user=$_SESSION['user'];
$id=$_SESSION['pid'];
$name=$_POST['name'];
$review=$_POST['review'];
$reviewid=hash("md5", $review);

$insert="INSERT INTO reviews(name,usertoken,id,review,review_id,date)VALUES('".$name."','".$user."',".$id.",'".$review."','".$reviewid."',now());";
$result=mysql_query($insert);
if($result){echo '<div class="col-sm-12">
									<ul>
										<li><i class="fa fa-user"></i>'.$revres["name"].'</li>
													<li><i class="fa fa-calendar-o"></i>'.date("Y/m/d").'</li>
									</ul>
									<p>'.$review.'</p>';
								}
}else{
	header('location:prod?pid='.$_SESSION['pid']);
}

?>