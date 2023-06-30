<?php session_start();

/*if(isset($_POST["btnOrder"]))
{
	$PID = $_POST["btnOrder"];*/
	
	$CID = $_GET["CartID"];
	//echo $DID;
	
	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");
	
	if(!$con)
	{
		die("Sorry, We are facing technical issue.");
	}
	if($CID!=0)
	{
		$sql = "DELETE FROM `tblcart` WHERE `tblcart`.`CartID` = ".$CID;
	}
	
	mysqli_query($con,$sql);

		$sqlCartCount = "SELECT * FROM `tblcounts` WHERE `CartRefer`='CartR'";
		$resultCartCount =mysqli_query($con,$sqlCartCount);
		$rowCartCount = mysqli_fetch_assoc($resultCartCount);
		$CartC = $rowCartCount["CartCount"];
		$CartC2 = $CartC;
		if($CartC>0)
		{
			$CartC2 = $CartC-1;
			$sqlCartCount2 = "UPDATE `tblcounts` SET `CartCount` = '".$CartC2."' WHERE `tblcounts`.`CartCount` = '".$CartC."';";
			$resultCartCount2 =mysqli_query($con,$sqlCartCount2);
		}

		for($T=$CID; $T<=$CartC; $T++)
		{
			if($T!=1){
			$T2 = $T - 1;
			$sqlCartUpdate = "UPDATE `tblcart` SET `CartID` = '".$T2."' WHERE `tblcart`.`CartID` = '".$T."';";
			$resultCartCount2 =mysqli_query($con,$sqlCartUpdate);
			//echo $sqlCartUpdate;
			//echo '<br>';
			}
		}


		header("Location:Cart - BaratieBakery.php?CartID=".$CartC2);
		
	
//}

?>
