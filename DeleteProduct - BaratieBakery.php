<?php session_start();

/*if(isset($_POST["btnOrder"]))
{
	$PID = $_POST["btnOrder"];*/
	
	$PID = $_GET["ProductID"];
	
	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");
	
	if(!$con)
	{
		die("Sorry, We are facing technical issue.");
	}
	if($PID!=0)
	{
		$sql = "DELETE FROM `tblproduct` WHERE `tblproduct`.`ProductID` = ".$PID;
	}
	//echo $sql;
			//echo '<br>';
	mysqli_query($con,$sql);

		$sqlContentCount = "SELECT * FROM `tblcounts` WHERE `ContentRefer`='ContentR'";
//echo $sqlContentCount;
			//echo '<br>';
		$resultContentCount =mysqli_query($con,$sqlContentCount);
		$rowContentCount = mysqli_fetch_assoc($resultContentCount);
		$ContentC = $rowContentCount["ContentCount"];
		$ContentC2 = $ContentC;
		if($ContentC>0)
		{
			$ContentC2 = $ContentC-1;
			$sqlContentCount2 = "UPDATE `tblcounts` SET `ContentCount` = '".$ContentC2."' WHERE `tblcounts`.`ContentCount` = '".$ContentC."';";
			$resultContentCount2 =mysqli_query($con,$sqlContentCount2);
			//echo $sqlContentCount2;
		}
			//echo '<br>';

		for($T=$PID; $T<=$ContentC; $T++)
		{
			if($T!=1){
			$T2 = $T - 1;
			$sqlContentUpdate = "UPDATE `tblproduct` SET `ProductID` = '".$T2."' WHERE `tblproduct`.`ProductID` = '".$T."';";
			$resultContentCount2 =mysqli_query($con,$sqlContentUpdate);
			//echo $sqlContentUpdate;
			//echo '<br>';
			}
		}


		header("Location:Content - BaratieBakery.php?#".$ContentC2);
		
	
//}

?>
