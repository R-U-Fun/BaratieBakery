<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Content - BaratieBakery</title>
    <link rel="stylesheet" href="CSS/Content - BaratieBakery.css">
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
	
    <br><br><br><br><br>
	
	<?php 
	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");

	if(!$con)
	{
		die("Cannot Connect to DB server");
	}
	
								
	
		$sqlContentCount = "SELECT * FROM `tblcounts` WHERE `ContentRefer`='ContentR'";
		$resultContentCount =mysqli_query($con,$sqlContentCount);
		$rowContentCount = mysqli_fetch_assoc($resultContentCount);
		$ContentC = $rowContentCount["ContentCount"];
		
	if(isset($_SESSION["Username"]))
	{
		$sqlAdmin = "SELECT * FROM `tbluser` WHERE `Email`='".$_SESSION["Username"]."'";
		$resultAdmin =mysqli_query($con,$sqlAdmin);
		$rowAdmin = mysqli_fetch_assoc($resultAdmin);
		if($rowAdmin["Type"]=="Admin")
		{
			echo "<div align='center'>";
				echo '<br><br><a href="Add ProductPage - BaratieBakery.php" id="Order" align="center"><b>Add New Product</b></a><br>';
			echo "</div>";
		}
	}
	
	echo '<div id="ProductTable">';
	
	for($L=1001; $L<=$ContentC; $L++)
	{
			
	$sqlP0 = "SELECT * FROM `tblproduct` WHERE `ProductID` = ".$L;
	$resultP0 = mysqli_query($con , $sqlP0);
	$rowP0 = mysqli_fetch_assoc($resultP0);
		
								if(isset($_POST["btnSaveAvb".$rowP0["ProductID"]]))
								{
									if($rowP0["Availability"]==1){$stat = 0;}else{$stat = 1;}
									$sqlUpdateAvb = 'UPDATE `tblproduct` SET `Availability` = '.$stat.' WHERE `tblproduct`.`ProductID` = '.$rowP0["ProductID"].';';
									$resultUpdateAvb =mysqli_query($con,$sqlUpdateAvb);
								}
	
	$sqlP = "SELECT * FROM `tblproduct` WHERE `ProductID` = ".$L;
	$resultP = mysqli_query($con , $sqlP);
	$rowP = mysqli_fetch_assoc($resultP);
	
        if($rowP["ProdCategory"]==101){
			echo '<h1 id="Bread"> Bread </h1>';
			echo '<div id="OuterConentRow">';
			}
		elseif($rowP["ProdCategory"]==201){
			echo '</div>';
			echo '<h1 id="Short Eats"> Short Eats </h1>';
			echo '<div id="OuterConentRow">';
			}
		elseif($rowP["ProdCategory"]==301){
			echo '</div>';
			echo '<h1 id="Buns"> Buns </h1>';
			echo '<div id="OuterConentRow">';
			}
		elseif($rowP["ProdCategory"]==401){
			echo '</div>';
			echo '<h1 id="Cakes"> Cakes </h1>';
			echo '<div id="OuterConentRow">';
			}
		elseif($rowP["ProdCategory"]==501){
			echo '</div>';
			echo '<h1 id="Sweets"> Sweets </h1>';
			echo '<div id="OuterConentRow">';
			}
		elseif($rowP["ProdCategory"]==601){
			echo '</div>';
			echo '<h1 id="New"> New </h1>';
			echo '<div id="OuterConentRow">';
			}
		else
			echo '';
	
			echo '<div id="box">';
				if(isset($_SESSION["Username"]))
				{
					$sqlCus = "SELECT * FROM `tbluser` WHERE `Email`='".$_SESSION["Username"]."'";
					$resultCus =mysqli_query($con,$sqlCus);
					$rowCus = mysqli_fetch_assoc($resultCus);
					if($rowCus["Type"]=="Customer" && $rowP["Availability"]==0)
					{
						echo '<a id="'.$rowP["ProductID"].'" >';
					}
					else
					{
						echo '<a id="'.$rowP["ProductID"].'" href="ProductPage - BaratieBakery.php?ProductID='.$rowP["ProductID"].'">';
					}
				}
				elseif($rowP["Availability"]==1)
				{
					echo '<a id="'.$rowP["ProductID"].'" href="ProductPage - BaratieBakery.php?ProductID='.$rowP["ProductID"].'">';
				}
				else null;
					echo '<img src="'.$rowP["ProdImg"].'" height="250px">';
					echo '<div id="ProductDetails">';
						echo '<h3>'.$rowP["ProductName"].'</h3>';
						echo '<h2>LKR '.$rowP["Price"].'</h2>';
						if(isset($_SESSION["Username"]))
						{
							$sqlAdmin = "SELECT * FROM `tbluser` WHERE `Email`='".$_SESSION["Username"]."'";
							$resultAdmin =mysqli_query($con,$sqlAdmin);
							$rowAdmin = mysqli_fetch_assoc($resultAdmin);
							if($rowAdmin["Type"]=="Admin")
							{
								echo '<a href="Edit ProductPage - BaratieBakery.php?ProductID='.$rowP["ProductID"].'" id="Order" align="center"><b>Edit</b></a><br>';
								echo '<a href="DeleteProduct - BaratieBakery.php?ProductID='.$rowP["ProductID"].'" id="Order" align="center"><b>Delete</b></a>';
								echo '<form action="Content - BaratieBakery.php#'.$rowP["ProductID"].'" method="post">';
								/*echo '<label for="chkAvb" id="Order"><b>Available :</b>';
								
									echo '<input type="checkbox" name="chkAvb'.$rowP["ProductID"].'" ';if($rowP["Availability"]==1){echo 'checked';} echo ' readonly >';
								//&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								
								echo '</label>';*/
								echo '<input type="submit" value="';if($rowP["Availability"]==1){echo 'Available';}else{echo 'Unavailable';}
								echo '" name="btnSaveAvb'.$rowP["ProductID"].'" id="Order2" />';
								echo '</form>';
								
							}
								if($rowAdmin["Type"]=="Customer" && $rowP["Availability"]==0)
								{
									echo '<a id="OrderU"><b>Unavailable</b></a>';
								}
							
						}
						elseif($rowP["Availability"]==0)
						{
							echo '<a id="OrderU"><b>Unavailable</b></a>';
						}
						else null;
					echo '</div>';
				echo '</a>';
			echo '</div>';
		if($rowP["ProductID"]==$ContentC)
			echo '</div>';
	}
	echo '</div>';
	?>
	
	<br><br><br>
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