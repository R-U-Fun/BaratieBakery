<?php session_start();
	
	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");
	
	if(!$con)
	{
		die("Sorry, We are facing technical issue.");
	}
	
	//mysqli_select_db($con,"baratiebakerydb");
	
	$sql = "SELECT * FROM `tbluser` WHERE `Email` = '".$_SESSION["Username"]."'";
	
	$result =mysqli_query($con,$sql);
	
	if(mysqli_num_rows($result) == 0)
	{
		header('location:Account - BaratieBakery.php');
	}
	
	$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title> Checkout - BaratieBakery</title>
    <link rel="stylesheet" href="CSS/Checkout - BaratieBakery.css">
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
	
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id="Order" href="Cart - BaratieBakery.php?CartID=<?php echo $_GET["CartID"];?>"><b>Back</b></a>
	
	<h1 align="center"> Checkout </h1>
	<div id="ProductTable">
		<div id="OuterConentRow">
			<div id="box">
				<!--<img src="<?php echo $row["ProdImg"];?>">-->
				<!--<img src="Images/UserIcon.jpg">-->
					<div id="ProductDetails">
						<h2><?php echo $row["Username"];?></h2>
						<h2><?php echo $row["Email"];?></h2>
						<a><?php echo $row["Phone"];?></a>
					</div>
			</div>
		</div>
    </div>
	
	<div id="ProductTable">
		<?php
		
		$CID = $_GET["CartID"];

	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");

		if(!$con)
		{
			die("Sorry, We are facing technical issue.");
		}

        echo '<div id="OuterConentRow">';
			echo '<div id="box">';
			
		$sqlCartCount = "SELECT * FROM `tblcounts` WHERE `CartRefer`='CartR'";
		$resultCartCount =mysqli_query($con,$sqlCartCount);
		$rowCartCount = mysqli_fetch_assoc($resultCartCount);
		$CartC = $rowCartCount["CartCount"];
		
		$Total = 0.00;
			if($CID!=0){
				
			for($L=1; $L<=$CartC; $L++)
			{
			
				
	
			$sql1 = "SELECT * FROM `tblcart` WHERE `CartID` = ".$L;

			$result1 =mysqli_query($con,$sql1);

			$row1 = mysqli_fetch_assoc($result1);

			$PID2 = $row1["ProductID"];

			$sql2 = "SELECT * FROM `tblproduct` WHERE `ProductID`=".$PID2;
			$result2 =mysqli_query($con,$sql2);
			$row2 = mysqli_fetch_assoc($result2);
			
			$Total = $Total + $row2["Price"];
				
				
			//echo '<div id="box">';
				echo '<a href="ProductPage - BaratieBakery.php?ProductID='.$row2["ProductID"].'">';
					//echo '<img src="'.$row2["ProdImg"].'">';
					echo '<div id="ProductDetails">';
						echo '<h3 align="left">'.$row2["ProductName"].'</h3>';
						echo '<h3 align="right">LKR '.$row2["Price"].'</h3>';
					echo '---------------------------------------------------------------------------------';
						//echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="DeleteFromCart - BaratieBakery.php?CartID='.$row1["CartID"].'" id="Order" align="center">Delete</a>';
					echo '</div>';
				echo '</a>';
			//echo '</div>';
			}
			/*echo '<div id="box">';
				echo '<a href="ProductPage - BaratieBakery.php?ProductID=<?php echo $row2["ProductID"];?>">';
					echo '<img src="<?php echo $row2["ProdImg"];?>">';
					echo '<div id="ProductDetails">';
						echo '<h3><?php echo $row2["ProductName"];?></h3>';
						echo '<h2>LKR <?php echo $row2["Price"];?></h2>';
						echo '<a href="DeleteFromCart - BaratieBakery.php?CartID=<?php echo $row1["CartID"]?>" id="Order">Delete</a>';
					echo '</div>';
				echo '</a>';
			echo '</div>';*/
			
			
			echo '<br><h4 id="totalItem" align="left"> Total Items: <u>LKR '.$Total.'.00</u> </h4>';
			echo '</div>';
		echo '</div>';
		//echo '<h4 id="totalItem" align="left"> Total Items: '.$Total.'.00 LKR </h4>';
		echo '<div align="right"><a href="AddToHistory - BaratieBakery.php?CartC='.$CartC.'" id="Checkout" align="center">Order</a></div>';
				
			}
		?>
		
	</div>

	
	<br><br><br><br><br><br>
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