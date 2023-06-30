<?php session_start();

/*if(isset($_POST["btnOrder"]))
{
	$PID = $_POST["btnOrder"];*/
	
	$CC = $_GET["CartC"];
	
	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");
	
	if(!$con)
	{
		die("Sorry, We are facing technical issue.");
	}

		/*$sqlHistoryCount = "SELECT * FROM `tblcounts` WHERE `HistoryRefer`='HistoryR'";
		$resultHistoryCount =mysqli_query($con,$sqlHistoryCount);
		$rowHistoryCount = mysqli_fetch_assoc($resultHistoryCount);
		$HistoryC = $rowHistoryCount["HistoryCount"];

		$HistoryC2 = $HistoryC+1;
		$sqlHistoryCount2 = "UPDATE `tblcounts` SET `HistoryCount` = '".$HistoryC2."' WHERE `tblcounts`.`HistoryCount` = '".$HistoryC."';";
		$resultHistoryCount2 =mysqli_query($con,$sqlHistoryCount2);*/
		//$rowHistoryCount2 = mysqli_fetch_assoc($resultHistoryCount2);

		//echo '<p>'.$rowHistoryCount["HistoryCount"].'</p>';

	for($L=1; $L<=$CC; $L++)
	{
		$sqlHistoryCount = "SELECT * FROM `tblcounts` WHERE `HistoryRefer`='HistoryR'";
		$resultHistoryCount =mysqli_query($con,$sqlHistoryCount);
		$rowHistoryCount = mysqli_fetch_assoc($resultHistoryCount);
		$HistoryC = $rowHistoryCount["HistoryCount"];

		$HistoryC2 = $HistoryC+1;
		$sqlHistoryCount2 = "UPDATE `tblcounts` SET `HistoryCount` = '".$HistoryC2."' WHERE `tblcounts`.`HistoryCount` = '".$HistoryC."';";
		$resultHistoryCount2 =mysqli_query($con,$sqlHistoryCount2);
		//$rowHistoryCount2 = mysqli_fetch_assoc($resultHistoryCount2);

		//echo '<p>'.$rowHistoryCount["HistoryCount"].'</p>';
		
		//echo $sqlHistoryCount2;
		//echo '<br>';

		
		$sqlGetCart = "SELECT * FROM `tblcounts` WHERE `CartRefer`='CartR'";
		$resultGetCart =mysqli_query($con,$sqlGetCart);
		$rowGetCart = mysqli_fetch_assoc($resultGetCart);
		$GetCartID = $rowGetCart["CartCount"];
		
		$sqlGetCart = "SELECT * FROM `tblcart` WHERE `CartID`='".$L."'";
		$resultGetCart =mysqli_query($con,$sqlGetCart);
		$rowGetCart = mysqli_fetch_assoc($resultGetCart);
		$GetPID = $rowGetCart["ProductID"];
		
		
		$sql = "INSERT INTO `tblhistory` (`HistoryID`, `ProductID`) VALUES ('".$HistoryC2."', '".$GetPID."');";
	
		mysqli_query($con,$sql);

		//echo $sql;
		//echo '<br>';
		
		$sqlDeleteCart = "DELETE FROM `tblcart` WHERE `tblcart`.`CartID` = '".$L."'";
		$resultDeleteCart =mysqli_query($con,$sqlDeleteCart);
		//$rowDeleteCart = mysqli_fetch_assoc($resultDeleteCart);
		//$DeletePID = $rowDeleteCart["ProductID"];
		

	}
	
	$sqlResetCartCount = "UPDATE `tblcounts` SET `CartCount` = '0' WHERE `tblcounts`.`CartCount` = '".$CC."';";
	$resultResetCartCount =mysqli_query($con,$sqlResetCartCount);
	
	//echo $sqlResetCartCount;
	
	header("Location:Order History - BaratieBakery.php?HistoryID=".$HistoryC2);
?>