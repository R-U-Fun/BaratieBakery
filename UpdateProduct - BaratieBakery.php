<?php session_start();

echo "AAAAAAAAAAAA<br>";

//if(isset($_POST["btnSubmitSave"]))
//{
	
	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");
	
	if(!$con)
	{
		die("Sorry, We are facing technical issue.");
	}
	$sqlP = "SELECT * FROM `tblproduct` WHERE `ProductID` = '".$_GET["ProductID"]."'";
	
	$resultP =mysqli_query($con,$sqlP);
	
	if(mysqli_num_rows($resultP) == 0)
	{
		header('location:Content - BaratieBakery.php');
	}
	
	$rowP = mysqli_fetch_assoc($resultP);
	
	if($_POST["EditName"]!=null){
		$EditedName = $_POST["EditName"];}
	else{
		$EditedName = $rowP["ProductName"];}
	
	//echo $EditedName;
	//echo "<br>";
	
	if(isset($_POST["EditPrice"])){
		$EditedPrice = $_POST["EditPrice"];}
	else{
		$EditedPrice = $rowP["Price"];}

	if($_POST["EditPrice"]!=null){
		$EditedPrice = $_POST["EditPrice"];}
	else{
		$EditedPrice = $rowP["Price"];}
	
	//echo $EditedPrice;
	//echo "<br>";
	
	if($_POST["EditDesc"]!=null){
		$EditedProdDesc = $_POST["EditDesc"];}
	else{
		$EditedProdDesc = $rowP["ProdDesc"];}
	
	//echo $EditedProdDesc;
	//echo "<br>";
	
	
	if($_POST["imageFile"]!=null)
	{
		$_FILES["imageFile"] = $_POST["imageFile"];
		$image = "Images/".$_FILES["imageFile"];
			//echo $image;
			//echo "<br>";
		//move_uploaded_file($_FILES["imageFile"],$image);
	}
	else{
		$image = $rowP["ProdImg"];
	}
	
	//echo $image;
	//echo "<br>";
	
	//$sql = "UPDATE `tbluser` SET `Email` = '".$EditedEmail."', `Username` = '".$EditedName."', `Password` = '".$rowP["Password"]."', `Phone` = '".$EditedPhone."' WHERE `tbluser`.`Email` = '".$_SESSION['Username']."';";
	
	$sql = "UPDATE `tblproduct` SET `ProductName` = '".$EditedName."', `Price` = '".$EditedPrice."', `ProdImg` = '".$image."', `ProdDesc` = '".$EditedProdDesc."' WHERE `tblproduct`.`ProductID` = ".$_GET["ProductID"].";";
	
	//echo $sql;
	$result =mysqli_query($con,$sql);
	
	header('Location:Content - BaratieBakery.php#'.$rowP["ProductID"]);
//}


?>
