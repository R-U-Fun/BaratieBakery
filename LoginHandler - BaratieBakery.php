<?php session_start();

if(isset($_POST["btnSubmit"]))
{
	$username = $_POST["txtEmail"];
	$password = $_POST["txtPassword"];
	
	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");
	
	if(!$con)
	{
		die("Sorry, We are facing technical issue.");
	}
	
	$sql = "SELECT * FROM `tbluser` WHERE `Email`='".$username."' AND `Password`='".$password."'";
	
	$result =mysqli_query($con,$sql);
	
	if(mysqli_num_rows($result)>0)
	{
		$_SESSION["Username"] = $username;
		header('Location:Account - BaratieBakery.php');
	}
	else
	{
		header('Location:Login-BaratieBakery.php');
	}
	
}


?>
