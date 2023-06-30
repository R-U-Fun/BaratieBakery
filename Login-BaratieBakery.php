
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login - BaratieBakery</title>
	<link rel="stylesheet" type="text/css" href="CSS/Login - BaratieBakery.css"/>
	<link rel="icon" href="Images/BaratieBakeryIcon.png" type="image/jpg" sizes="16x16">
    <script>
		function checkPassword()
		{
			let pw = document.getElementById("txtPassword").value;
			let cpw = document.getElementById("txtConfirmPassword").value;
			if(pw != cpw)
			{
				alert("Confirm password should be the same as Password");
				event.preventDefault();
			}
		}
    </script>
</head>

<body>
	
    <h2>BaratieBakery Customer Sign-Up Form</h2>
	<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="RegistrationHandler - BaratieBakery.php" method="post">
			<h1>Create Account</h1><br>
			
			<input type="text" placeholder="Name" name="txtName" id = "txtName"/>
			<input type="email" placeholder="Email" required name="txtEmail" id="txtEmail"/>
			<input type="password" placeholder="Password" id="txtPassword" name="txtPassword" required/>
            <input type="password" placeholder="Confirm Password" id="txtConfirmPassword" name="txtConfirmPassword"/>
            <input type="number" placeholder="Contact Number" name="txtContactNo" id="txtContactNo" pattern="[0-9]{10}" required /> 
			<input type="submit" value="Sign Up" name="btnSubmit2" onClick="checkPassword()">
            <a href="Home - BaratieBakery.php">BaratieBakery</a>
		</form>
        
	</div>
	<div class="form-container sign-in-container">
		<form action="LoginHandler - BaratieBakery.php" method="post">
			<h1>Sign in</h1><br>
		 
			<input type="email" name="txtEmail" placeholder="Email" />
			<input type="password" name="txtPassword" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<input type="submit" value="Sign In" name="btnSubmit">
            <br>
            <a href="Home - BaratieBakery.php">Back to Bakery</a>
        </form>
         
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login</p>
                
				<input type="submit" class="ghost" id="signIn" value="Sign In">
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello,<br> New Customer!</h1>
				<p>Enter your personal details and register</p>
                 
				<input type="submit" class="ghost" id="signUp" value="Sign Up"> 
			</div>
		</div>
	</div>
</div>
<script> 
    const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>
</body>
</html>
