<?php session_start();

if(isset($_SESSION["Username"]))
{
	//$PID = $_POST["btnOrder"];*/
	
	$PID = $_GET["ProductID"];
	
	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");
	
	if(!$con)
	{
		die("Sorry, We are facing technical issue.");
	}

		$sqlCartCount = "SELECT * FROM `tblcounts` WHERE `CartRefer`='CartR'";
		$resultCartCount =mysqli_query($con,$sqlCartCount);
		$rowCartCount = mysqli_fetch_assoc($resultCartCount);
		$CartC = $rowCartCount["CartCount"];

		$CartC2 = $CartC+1;
		$sqlCartCount2 = "UPDATE `tblcounts` SET `CartCount` = '".$CartC2."' WHERE `tblcounts`.`CartCount` = '".$CartC."';";
		$resultCartCount2 =mysqli_query($con,$sqlCartCount2);
		//$rowCartCount2 = mysqli_fetch_assoc($resultCartCount2);

		//echo '<p>'.$rowCartCount["CartCount"].'</p>';
	
	$sql = "INSERT INTO `tblcart` (`CartID`, `ProductID`) VALUES ('".$CartC2."', '".$PID."');";
	
	mysqli_query($con,$sql);

	/*
		$sqlCartCount = "SELECT * FROM `tblcounts` WHERE `CartRefer`='CartR'";
		$resultCartCount =mysqli_query($con,$sqlCartCount);
		$rowCartCount = mysqli_fetch_assoc($resultCartCount);
		$CartC = $rowCartCount["CartCount"];*/

	//echo $sqlCartCount2;
	
	header("Location:Cart - BaratieBakery.php?CartID=".$CartC2);
	
}
else
{
	header("Location:Login-BaratieBakery.php");
}

?>
