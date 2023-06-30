<?php session_start();?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Header - BaratieBakery</title>
	<link rel="icon" href="Images/BaratieBakeryIcon.png" type="image/jpg" sizes="16x16">
	<link rel="stylesheet" href="CSS/Header - BaratieBakery.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
	<header>
       	<div id="HeadBar">
			<div id="BakeryName">
				<a id="BakeryNameA" href="Home - BaratieBakery.php">	<b>Baratie</b>Bakery&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
			</div>
            	<!--<div id="Category">-->
				<div id="SearchBar">
					<!--<img src="Images/BaratieBakeryIcon.png" height="50px" width="50px">
         	        <!--<div id="Food">-->
						<a href="Content - BaratieBakery.php"><b>📦Products</b></a>
					<!--</div>-->
                </div>
                    
                <div id="SearchBar">
                    <!--<input type="text" id="input" name="searchBox" placeholder="🔍 Search for Food and Drinks" />-->
					<a href="Search - BaratieBakery.php"><b>🔍Search</b></a>
                </div>
                    
                <div id="User">
					<?php
					if(isset($_SESSION["Username"]))
					{
	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");
	
					if(!$con)
					{
						die("Sorry, We are facing technical issue.");
					}

						$sqlCartCount = "SELECT * FROM `tblcounts` WHERE `CartRefer`='CartR'";
						$resultCartCount =mysqli_query($con,$sqlCartCount);
						$rowCartCount = mysqli_fetch_assoc($resultCartCount);
						$CartC = $rowCartCount["CartCount"];
					}
					else
					{
						$CartC = 0;
					}
					?>
					<a href="Cart - BaratieBakery.php?CartID=<?php echo $CartC?>"><img src="Images/CartIcon.png" height="40px" width="40px" id="UserIcon" /></a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php
						if(isset($_SESSION["Username"]))
						{
							$sqlUserIco = "SELECT * FROM `tbluser` WHERE `Email`='".$_SESSION["Username"]."'";
							$resultUserIco =mysqli_query($con,$sqlUserIco);
							$rowUserIco = mysqli_fetch_assoc($resultUserIco);

							if($rowUserIco["UserImg"]!=null)
							{
								$UserIco = $rowUserIco["UserImg"];
							}
							else
							{
								$UserIco = "Images/UserIcon.jpg";
							}
						}
					   	else
						{
							$UserIco = "Images/UserIcon.jpg";
						}
					?>
                    <a href="Account - BaratieBakery.php"><img src="<?php echo $UserIco ?>" height="40px" width="40px" id="UseIcon" /></a>
					<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
					<?php
					if($CartC!=0)
						{
							echo '<a href="Cart - BaratieBakery.php?CartID='.$CartC.'"><i><div id="badge">'.$CartC.'</div></i></a>';
						}
					?>
					<!--<a href="Cart - BaratieBakery.php?CartID=<?php echo $CartC?>"><i><div id="badge"><?php echo $CartC?></div></i></a>-->
                </div>
        </div>
    </header>
</body>
</html>