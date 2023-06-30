<?php session_start();

if(isset($_POST["btnSubmitEdit"]))
{
	
	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");
	
	if(!$con)
	{
		die("Sorry, We are facing technical issue.");
	}
	$sqlP = "SELECT * FROM `tbluser` WHERE `Email` = '".$_SESSION["Username"]."'";
	
	$resultP =mysqli_query($con,$sqlP);
	
	if(mysqli_num_rows($resultP) == 0)
	{
		header('location:Account - BaratieBakery.php');
	}
	
	$rowP = mysqli_fetch_assoc($resultP);
	
	if($_POST["EditName"]!=null){
		$EditedName = $_POST["EditName"];}
	else{
		$EditedName = $rowP["Username"];}
	
	if($_POST["EditEmail"]!=null){
		$EditedEmail = $_POST["EditEmail"];}
	else{
		$EditedEmail = $rowP["Email"];}
	
	if($_POST["EditPhone"]!=null){
		$EditedPhone = $_POST["EditPhone"];}
	else{
		$EditedPhone = $rowP["Phone"];}
	
	if($_POST["EditCurrPassword"]!=null){
		$OldPassword = $_POST["EditCurrPassword"];}
	
	if($_POST["EditNewPassword"]!=null){
		$NewPassword = $_POST["EditNewPassword"];}
	
	
	if($_POST["imageFile"]!=null)
	{
		$_FILES["imageFile"] = $_POST["imageFile"];
		$image = "Images/".$_FILES["imageFile"];
			//echo $image;
			//echo "<br>";
		//move_uploaded_file($_FILES["imageFile"],$image);
	}
	else{
		$image = $rowP["UserImg"];
	}
	
	//echo $image;
	//echo "<br>";
	
	
	
	if($OldPassword==$rowP["Password"])
	{
		if(isset($_POST["EditNewPassword"]))
		{
			$sql = "UPDATE `tbluser` SET `Email` = '".$EditedEmail."', `Username` = '".$EditedName."', `Password` = '".$NewPassword."', `Phone` = '".$EditedPhone."', `UserImg` = '".$image."' WHERE `tbluser`.`Email` = '".$_SESSION['Username']."';";
		}
		else
		{
			$sql = "UPDATE `tbluser` SET `Email` = '".$EditedEmail."', `Username` = '".$EditedName."', `Password` = '".$NewPassword."', `Phone` = '".$EditedPhone."', `UserImg` = '".$image."' WHERE `tbluser`.`Email` = '".$_SESSION['Username']."';";
		}
	}
	//echo $sql;
	
	$result =mysqli_query($con,$sql);
	
	
		//unset($_SESSION["Username"]);
		//session_destroy();
	
		//$_SESSION["Username"] = $EditedEmail;
	
		header('Location:AccountHandler - BaratieBakery.php');
	
}


?>
