<?php session_start();

if(isset($_POST["btnSubmitSave"]))
{
	
	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");
	
	if(!$con)
	{
		die("Sorry, We are facing technical issue.");
	}
	
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

	
	if($_POST["EditName"]!=null){
		$EditedName = $_POST["EditName"];}
	else{
		$EditedName = "No Name";
		}
	
	//echo $EditedName;
	//echo "<br>";
	
	if($_POST["EditPrice"]!=null){
		$EditedPrice = $_POST["EditPrice"];}
	else{
		$EditedPrice = "00";
		}
	
	//echo $EditedPrice;
	//echo "<br>";
	
	if($_POST["EditDesc"]!=null){
		$EditedProdDesc = $_POST["EditDesc"];}
	else{
		$EditedProdDesc = "No Description";}
	
	//echo $EditedProdDesc;
	//echo "<br>";
	
	//$ImageP = $_GET["ImgPath"];
	
	if($_POST["imageFile"]!=null)
	{
		$_FILES["imageFile"] = $_POST["imageFile"];
		$image = "Images/".$_FILES["imageFile"];
			//echo $image;
			//echo "<br>";
		//move_uploaded_file($_FILES["imageFile"],$image);
	}
	
	$sql = "INSERT INTO `tblproduct` (`ProdCategory`, `ProductID`, `ProductName`, `Price`, `OrderID`, `ProdImg`, `ProdDesc`, `Availability`) VALUES ('".$Categor2."', '".$ContentC2."', '".$EditedName."', '".$EditedPrice."', '".$OrderID2."', '".$image."', '".$EditedProdDesc."', '1');";
	
	//echo $sql;
	//echo "<br>";
	
	$result =mysqli_query($con,$sql);
	
		
		$sqlUpdateContentCount = "UPDATE `tblcounts` SET `ContentCount` = '".$ContentC2."' WHERE `tblcounts`.`ContentCount` = '".$ContentC."';";
		$resultUpdateContentCount =mysqli_query($con,$sqlUpdateContentCount);

	//echo $sqlUpdateContentCount;
	
	header('Location:Content - BaratieBakery.php#'.$ContentC2);
}


?>