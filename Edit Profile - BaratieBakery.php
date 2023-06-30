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
		header('location:Account - BaratieBakery.php');
	}
	
	$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Edit Profile - BaratieBakery</title>
    <link rel="stylesheet" href="CSS/Edit Profile - BaratieBakery.css">
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
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="Order" href="Profile - BaratieBakery.php"><b>Back</b></a>
	
	<form action="UpdateProfile - BaratieBakery.php" method="post">
	<div id="ProductTable">
		<div id="OuterConentRow">
			<div id="box">
				<!--<img src="<?php echo $row["ProdImg"];?>">-->
				<img src="<?php echo $row["UserImg"];?>">
				<br><br>
				<div align="center">
					<label for="EditImage" id="FileLabel" align="center">Image</label>
					<br><br>
				</div>
				<input type="file" id="EditImage" name="imageFile" placeholder="Upload a Picture" align="right">
					<div id="ProductDetails">&nbsp;&nbsp;
						<input type="text" class="Edits" id="EditName" name="EditName" placeholder="<?php echo $row["Username"];?>" />&nbsp;
						<input type="text" class="Edits" id="EditEmail" name="EditEmail" placeholder="<?php echo $row["Email"];?>" />&nbsp;
						<input type="text" class="Edits" id="EditPhone" name="EditPhone" placeholder="<?php echo $row["Phone"];?>" />&nbsp;
						<input type="password" class="Edits" id="EditCurrPassword" name="EditCurrPassword" placeholder="Current Password" required />&nbsp;
						<input type="password" class="Edits" id="EditNewPassword" name="EditNewPassword" placeholder="New Password" required />&nbsp;
						<br>
						<div align="right">
							<input type="submit" id="btnSubmitEdit" name="btnSubmitEdit" placeholder="Save" />
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