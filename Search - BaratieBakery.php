<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Search - BaratieBakery</title>
    <link rel="stylesheet" href="CSS/Search - BaratieBakery.css">
	<link rel="icon" href="Images/BaratieBakeryIcon.png" type="image/jpg" sizes="16x16">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
	<div id="HeaderHere"></div>
    <script>
        load("Header - BaratieBakery.php");
        function load(url)
        {
            req = new XMLHttpRequest();
            req.open("GET", url, false);
            req.send(null);
            document.getElementById("HeaderHere").innerHTML = req.responseText;
        }
    </script>
	
    <br><br><br><br><br><br><br>
	
	<form action="Search - BaratieBakery.php" method="post">
	<div id="SearchBar" align="center">
		<input type="text" id="SearchID" name="searchID" placeholder="🔍 Search for Products" />
    </div>
	</form>
	<div>
		<!--<a id="Checkout" align="center">Search</a>-->
	</div>
			
			<?php
				//header('location:Search - BaratieBakery.php');
				if(isset($_POST["searchID"]))
				{
					$SID = $_POST["searchID"];

	$con = mysqli_connect("sdb-60.hosting.stackcp.net","BaratieBakery","BaratieBakery33","BaratieBakeryDB-3530323533e4");

					if(!$con)
					{
						die("Sorry, We are facing technical issue.");
					}

					$sql = "SELECT * FROM `tblproduct` WHERE `ProductName`='".$SID."'";

					$result =mysqli_query($con,$sql);
					
					$row2 = mysqli_fetch_assoc($result);
					
					if(mysqli_num_rows($result)>0)
					{
						echo '<div id="OuterConentRow">';
		
						for($L=1; $L<=mysqli_num_rows($result); $L++)
						{
								echo '<div id="box">';
								echo '<a href="ProductPage - BaratieBakery.php?ProductID='.$row2["ProductID"].'">';
									echo '<img src="'.$row2["ProdImg"].'">';
									echo '<div id="ProductDetails">';
										echo '<h3>'.$row2["ProductName"].'</h3>';
										echo '<h2>LKR '.$row2["Price"].'</h2>';
									echo '</div>';
								echo '</a>';
							echo '</div>';
						}
						echo '</div>';
					}
					else
					{
						header('Location:Search - BaratieBakery.php');
					}
				}
	
			
			?>
			
	
	<div id="Results"></div>
	
	<br><br><br><br><br><br><br><br>
			
	
	
</body>
	<div id="FooterHere"></div>
    <script>
        load("Footer - BaratieBakery.php");
        function load(url)
        {
            req = new XMLHttpRequest();
            req.open("GET", url, false);
            req.send(null);
            document.getElementById("FooterHere").innerHTML = req.responseText;
        }
    </script>
</html>
<script>
	$(document).ready(function(){
		var TitleRow =  "'<div id='ProductTable'><h1 id='Search'> From Search </h1><div id='OuterConentRow'><div id='box'><a href='ProductPage - BaratieBakery.php?ProductID=101'><img src='Images/11 Sandwich Bread-Sliced.jpeg'><div id='ProductDetails'><h3>Sandwich Bread-Sliced</h3><h2>LKR 500.00</h2></div></a></div>'";
		
		$('#SSearchID').keyup(function(){
			$('#Results').html(TitleRow);
			$.getJSON('BBDB.json', function(data) {
				$.each(data, function(key, value){
					if (value.ProductID.search(new RegExp($('#SearchID').val(), "i")) != -1)
					{
						$('#Results').append('<div id="box"><a href="ProductPage - BaratieBakery.php?ProductID='+value.ProductID+'"><img src="'+value.ProdImg+'"><div id="ProductDetails"><h3>'+value.ProductName+'</h3><h2>LKR '+value.Price+'</h2></div></a></div></div></div>');
					}
				});
			});
			
		});
	});
</script>
