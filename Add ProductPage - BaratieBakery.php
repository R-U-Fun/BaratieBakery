<?php session_start();
	
    //$productID = isset($_GET["ProductID"]) ? intval($_GET["ProductID"]) : 0;
	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");
	
	if(!$con)
	{
		die("Sorry, We are facing technical issue.");
	}
	
	mysqli_select_db($con,"baratiebakerydb");
	
		$sqlContentCount = "SELECT * FROM `tblcounts` WHERE `ContentRefer`='ContentR'";
		$resultContentCount =mysqli_query($con,$sqlContentCount);
		$rowContentCount = mysqli_fetch_assoc($resultContentCount);
		$ContentC = $rowContentCount["ContentCount"];
		$ContentC2 = $ContentC+1;

		$sqlCate = "SELECT * FROM `tblproduct` WHERE `ProductID`='".$ContentC."'";
		$resultCate =mysqli_query($con,$sqlCate);
		$rowCate = mysqli_fetch_assoc($resultCate);
		$Categor = $rowCate["ProdCategory"];
		$Categor2 = $Categor+1;
		$OrderID = $rowCate["OrderID"];
		$OrderID2 = $OrderID+1;  

		$EditedImage = '';
		

?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Add ProductPage - BaratieBakery</title>
    <link rel="stylesheet" href="CSS/Add ProductPage - BaratieBakery.css">
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
	
	<div id="ProductTable">
		<div id="OuterConentRow">
			<div id="box">
				<br><br>
					<div id="ProductDetails">
						
						<div align="center">
							<label for="EditImage" id="FileLabel" align="center">Image</label>
							<br><br>
						</div>
						<form action="AddProduct - BaratieBakery.php" method="post">
							<input type="file" id="EditImage" name="imageFile" placeholder="Upload a Picture" required>&nbsp;
							<input type="text" class="Edits" id="EditName" name="EditName" placeholder="Product Name" required />&nbsp;&nbsp;
							<input type="text" class="Edits" id="EditPrice" name="EditPrice" placeholder="Price" required />&nbsp;&nbsp;
							<input type="text" class="Edits" id="EditDesc" name="EditDesc" placeholder="Description" />&nbsp;&nbsp;
							<input type="text" class="Edits" id="EditPID" name="EditPID" placeholder="Product ID - <?php echo $ContentC2;?>" readonly/>
							<br><br>
							<div align="center">
								<input type="submit" id="btnSubmitSave" name="btnSubmitSave" class="button" value="Save"/>
							</div>
							<br>
						</form>
					</div>
			</div>
		</div>
    </div>
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