<?php session_start();

if(isset($_POST["btnSubmit2"]))
{
	$name = $_POST["txtName"];
	$mail = $_POST["txtEmail"];
	$contact = $_POST["txtContactNo"];
	$passw = $_POST["txtPassword"];
	
	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");
	
	if(!$con)
	{
		die("Sorry, We are facing technical issue.");
	}
	
	$sql = "INSERT INTO `tbluser` (`Email`, `Username`, `Password`, `Phone`, `Type`, `UserImg`) VALUES ('".$mail."', '".$name."', '".$passw."', '".$contact."', 'Customer', 'Images/UserIcon.jpg');";
	//echo $sql;
	
	mysqli_query($con,$sql);
	
	header('Location:Login-BaratieBakery.php');
	
	
}


?>
