<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> Home - BaratieBakery</title>
	<link rel="icon" href="Images/BaratieBakeryIcon.png" type="image/jpg" sizes="16x16">
    <link rel="stylesheet" href="CSS/Home - BaratieBakery.css">
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
	
    <br><br><br><br><br>
    
    <div id="HomeTable">
        <!--<div id="HomeName"><a><img src="Images/BaratieBakeryIcon.png" height="200px" width="200px"/><b>Baratie</b>Bakery</a></div>-->
        <div id="HomeName"><a><b>Baratie</b>Bakery</a></div>
        <br><br>
        <div id="HomeConentRow">
			<div id="box">
				<a href="Content - BaratieBakery.php#Bread"><img src="Images/Home Bread2.jpg">
					<div id="ProductDetails">
						<h1>Bread</h1>
					</div>
				</a>
			</div>
			<div id="box">
				<a href="Content - BaratieBakery.php#Short Eats"><img src="Images/Home Short Eats.jpeg">
					<div id="ProductDetails">
						<h1>Short Eats</h1>
					</div>
				</a>
			</div>
			<div id="box">
				<a href="Content - BaratieBakery.php#Buns"><img src="Images/Home Buns.jpg">
					<div id="ProductDetails">
						<h1>Buns</h1>
					</div>
				</a>
			</div>
			<div id="box">
				<a href="Content - BaratieBakery.php#Cakes"><img src="Images/Home Cakes.jpg">
					<div id="ProductDetails">
						<h1>Cakes</h1>
					</div>
				</a>
			</div>
			<div id="box">
				<a href="Content - BaratieBakery.php#Sweets"><img src="Images/Home Sweets.jpg">
					<div id="ProductDetails">
						<h1>Sweets</h1>
					</div>
				</a>
			</div>
        </div>
    </div>
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