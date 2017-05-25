<?php
session_start();
	if(isset($_SESSION['count'])){
	}else{
		$_SESSION['count']=1;
	}

						if(isset($_GET['content'])){
							$query=$_GET['content'];
							if($query==0){
								$query=$query-1;
							}
							echo "query=".$query."br/>";
							$count=$_SESSION['count'];
							$count=$count+$query;
							if($count>=0){
								if($count==0){
									$count=1;
									$_SESSION['count']=1;
								}
								$lower=$count*16;
								$upper=$lower+16;
								$_SESSION['count']=$count;
						include("databaseadapter.php");

						echo "lower=".$lower."upper=".$upper."session=".$_SESSION['count']."<br/>";
						$querytogetproducts="SELECT * FROM products ORDER BY dateposted DESC LIMIT ".$lower.",".$upper.";" ;
						$result=mysql_query($querytogetproducts);
						if($result){
						while ($res=mysql_fetch_array($result)) {
						echo '<div class="col-sm-3 marginman">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img class="full-fit" src="'.$res['image'].'" alt="$name" />
			 							<p class="prodtitle">'.$res["name"].'</p>
											<span class="dealprice pull-left">'.$res["sellingprice"].'</span>
											<span class="sellingprice pull-right">'.$res["price"].'</span><br/><br/><br/>
											<span class="comapnylabel">'.$res["parentsite"].'</span><br/> 
											<span class="coupon">'.$res["coupon"].'</span><br/> 
										<a href="prod?pid='.$res['id'].'" class="btn btn-default pull-left">View Deal</a>
										<a href="'.$res["link"].'" class="btn btn-default pull-right">Direct Visit</a>
											
									</div>
								</div>


							</div>
						</div>';
						
						}
					}else{
							echo "<h2>WOW you have reached the infinty. No products found. Yuhu! </h2>";
					
					}
				}else{
						$_SESSION['count']=1;
						echo "<h2>Ah, Please try again.It looks like request is broken.<br/> That usually happens because computers think they are smart but they aren't. </h2>";
					
				}

					}else{
						echo "<h2>Ah, Please try again.It looks like request is broken.<br/> That usually happens because computers think they are smart but they aren't. </h2>";
					}						
					?>