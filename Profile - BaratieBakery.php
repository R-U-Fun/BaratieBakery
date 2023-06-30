<?php session_start();
	
	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");
	
	if(!$con)
	{
		die("Sorry, We are facing technical issue.");
	}
	
	mysqli_select_db($con,"baratiebakerydb");
	
	$sql = "SELECT * FROM `tbluser` WHERE `Email` = '".$_SESSION["Username"]."'";
	
	$result =mysqli_query($con,$sql);
	
	if(mysqli_num_rows($result) == 0)
	{
		//header('location:Account - BaratieBakery.php');
	}
	
	$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
    <title>My Profile - BaratieBakery</title>
    <link rel="stylesheet" href="CSS/Profile - BaratieBakery.css">
	<link rel="icon" href="Images/BaratieBakeryIcon.png" type="image/jpg" sizes="16x16">
</head>
<body>
	<div id="HeaderHere"></div>
    <script>
        load("Header - BaratieBakery.php");
        function load(url)
        {
            req = new XMLHttpRequest();
            req.open("GET", url, false);
            req.send(null);
            document.getElementById("HeaderHere").innerHTML = req.responseText;
        }
    </script>
	<br><br><br><br><br><br>
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="Order" href="Account - BaratieBakery.php"><b>Back</b></a>
	
	<!--<form action="AddToCart - BaratieBakery.php?ProductID=<?php echo $row["ProductID"];?>" method="post">-->
	<div id="ProductTable">
		<div id="OuterConentRow">
			<div id="box">
				<!--<img src="<?php echo $row["ProdImg"];?>">-->
				<img src="<?php echo $row["UserImg"];?>">
					<div id="ProductDetails">
						<h2><?php echo $row["Username"];?></h2>
						<h3><?php echo $row["Email"];?></h3>
						<a><?php echo $row["Phone"];?></a>
						<br><br>
						<div align="right">
							<a href="Edit Profile - BaratieBakery.php" id="Checkout" align="right"> Edit </a>
						</div>
						<!--<div align="center">
							<input type="submit" id="Order" name="btnOrder" class="button" value="Add to Cart"/>
						</div>
						<!--<script>
							if(document.getElementById("Order"))
							{
						//window.open(url, 'AddToCart - BaratieBakery.php?ProductID=<?php echo $row["ProductID"];?>');
							}
						</script>
							
						<!--<div align="center">
							<a href="Cart - BaratieBakery.php?ProductID=<?php echo $row["ProductID"];?>" id="btnOrder" name="btnOrder">
								<input type="submit" id="Order" name="btnOrder" class="button" value="Add to Cart"/>
							</a>
						</div>-->
						<!--<a href="AddToCart - BaratieBakery.php?ProductID=<?php echo $row["ProductID"];?>" id="Order" name="btnOrder">Add To Cart</a>
						<!--<a href="Cart - BaratieBakery.php?ProductID=<?php echo $row["ProductID"];?>" id="Order" name="btnOrder">Add To Cart</a>-->
						<br>
					</div>
			</div>
		</div>
    </div>
	</form>
</body>
	<div id="FooterHere"></div>
    <script>
        load("Footer - BaratieBakery.php");
        function load(url)
        {
            req = new XMLHttpRequest();
            req.open("GET", url, false);
            req.send(null);
            document.getElementById("FooterHere").innerHTML = req.responseText;
        }
    </script>
</html>