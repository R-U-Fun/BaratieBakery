<?php session_start();

//if(isset($_POST["btnOrder"]))
//{
	/*$HID = $_GET["HistoryID"];

	$con = mysqli_connect("localhost","root","","baratiebakerydb","3306");
	
	if(!$con)
	{
		die("Sorry, We are facing technical issue.");
	}


	/*if($CID!=0){	
	
	$sql1 = "SELECT * FROM `tblcart` WHERE `CartID` = ".$CID;
	
	$result1 =mysqli_query($con,$sql1);
	
	/*if(mysqli_num_rows($result1)>0)
	{
		//header('Location:Cart - BaratieBakery.php');
		$row1 = mysqli_fetch_assoc($result1);
	
		$PID2 = $row1["ProductID"];

		$sql2 = "SELECT * FROM `tblproduct` WHERE `ProductID`='".$PID2."'";
		$result2 =mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_assoc($result2);

		$Total = $row2["Price"];
	}
	else
	{
		header('Location:Content - BaratieBakery.php');
	}*/
		/*if($CID!=0){	
	
		$sql1 = "SELECT * FROM `tblcart` WHERE `CartID` = ".$CID;

		$result1 =mysqli_query($con,$sql1);

		$row1 = mysqli_fetch_assoc($result1);
	
		$PID2 = $row1["ProductID"];

		$sql2 = "SELECT * FROM `tblproduct` WHERE `ProductID`=".$PID2;
		$result2 =mysqli_query($con,$sql2);
		$row2 = mysqli_fetch_assoc($result2);

	
	}
	
//}
/*else
{
	$con = mysqli_connect("localhost","root","","baratiebakerydb","3306");
	
	if(!$con)
	{
		die("Sorry, We are facing technical issue.");
	}
	
	$sql = "SELECT * FROM `tblproduct` WHERE `ProductID`=0";
	
	$result =mysqli_query($con,$sql);
	
	/*if(mysqli_num_rows($result)>0)
	{
		header('Location:Cart - BaratieBakery.php');
	}
	else
	{
		header('Location:Content - BaratieBakery.php');
	}

	$row = mysqli_fetch_assoc($result);
	

	$Total = $row["Price"];
}*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title> Order History - BaratieBakery</title>
    <link rel="stylesheet" href="CSS/Order History - BaratieBakery.css">
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
	
        <!-- CART CONTAINER
    <div id="CartMainContainer">
        <h1> Cart </h1>
	</div>
	<div id="CartContainer">
        <h4 id="totalItem"> Total Items: <?php echo $Total;?> </h4>
    </div> -->
	
	
	
	<div id="ProductTable">
		<h1> Order History </h1>
		<?php
		
		$HID = $_GET["HistoryID"];

	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");

		if(!$con)
		{
			die("Sorry, We are facing technical issue.");
		}
		
        echo '<div id="OuterConentRow">';
			
		$sqlHistoryCount = "SELECT * FROM `tblcounts` WHERE `HistoryRefer`='HistoryR'";
		$resultHistoryCount =mysqli_query($con,$sqlHistoryCount);
		$rowHistoryCount = mysqli_fetch_assoc($resultHistoryCount);
		$HistoryC = $rowHistoryCount["HistoryCount"];
		
		$Total = 0.00;
			if($HID!=0){
				
			for($L=1; $L<=$HistoryC; $L++)
			{
			
			$sql1 = "SELECT * FROM `tblhistory` WHERE `HistoryID` = ".$L;

			$result1 =mysqli_query($con,$sql1);

			$row1 = mysqli_fetch_assoc($result1);
				

			$PID2 = $row1["ProductID"];

			$sql2 = "SELECT * FROM `tblproduct` WHERE `ProductID`=".$PID2;
			$result2 =mysqli_query($con,$sql2);
			$row2 = mysqli_fetch_assoc($result2);
			
			$Total = $Total + $row2["Price"];
				
				
			echo '<div id="box">';
				echo '<a href="ProductPage - BaratieBakery.php?ProductID='.$row2["ProductID"].'">';
					echo '<img src="'.$row2["ProdImg"].'">';
					echo '<div id="ProductDetails">';
						echo '<h3>'.$row2["ProductName"].'</h3>';
						echo '<h2>LKR '.$row2["Price"].'</h2>';
						//echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="DeleteFromCart - BaratieBakery.php?CartID='.$row1["CartID"].'&DelID='.$L.'" id="Order" align="center">Delete</a>';
					echo '</div>';
				echo '</a>';
			echo '</div>';
				
				
			
				
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
			
		echo '</div>';
		//echo '<h4 id="totalItem" align="left"> Total Items: '.$Total.'.00 LKR </h4>';
		//echo '<div align="right"><a href="Checkout - BaratieBakery.php?CartID='.$row1["CartID"].'" id="Checkout" align="center">Checkout</a></div>';
				
			}
		?>
		
	</div>
	
	
	
<br><br><br><br><br><br><br><br>
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