<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$showAlert=false;
	error_reporting(0);
	include 'x.php';
	$email=$_POST["email"];
    $username=$_POST["username"];
	$phone=$_POST["phone"];
	$password=$_POST["password"];
	$sql="INSERT INTO `tbladmin` (`username`, `email`, `phone`, `password`, `dt`) VALUES ('$username', '$email', '$phone', '$password', current_timestamp());";
	$result=mysqli_query($conn, $sql);
	if($result){
		$showAlert= true;
		header("location: z.php");
	}
}


?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <link rel="stylesheet" href="style.css">


<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
<link rel="stylesheet" href="register.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<nav id="navbar">
        <div id="logo">
            <img src="image/logo.png" alt="different courier">
        </div>
        <h1>Different Courier</h1>
        <ul class="ul">
                <li class="item"><a href="index.html">Home</a></li>
                <li class="item"><a href="index.html#footer">About</a></li>
                <li class="item"><a href="index.html#services-container">Services</a></li>
                <li class="item"><a href="contact.html">Contact Us</a></li>
                <li class="item">
                    <a href="#">Admin Panel<i class="fas fa-caret-down"></i></a>
                    <div class="dropdown">
                        <ul>
                            <li><a href="staff.html">Staff Login</a></li>
                            <li><a href="Login.php">Admin Login</a></li>
                            <li><a href="#">Become Our Partner</a></li>
                        </ul>
                    </div>
                </li>

        </ul>
        <div class="btn2"><a href="direct.html">Pickup</a></div>
    </nav>
    <div class="box-form">
	  <div class="left">
		<div class="overlay">
		<h1>Different Courier</h1>
		<p></p>
		<span>
			<p>login with social media</p>
			<a href="https://www.facebook.com/login/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a href="https://twitter.com/i/flow/login"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		</span>
		</div>
	  </div>
	
	
		<div class="right">
		  <form action="y.php" method="post">
		<h5>Admin Sign up</h5>
		<p>Have an account? <a href="Login.html">Log in here.</a></p>
		<div class="inputs">
			<input type="text" placeholder="user name" name="username" required>
			<br>
			<input type="email" placeholder="E-mail Id" name="email" required>
			<br>
			<input type="text" placeholder="phone number" name="phone" required>
			<br>
			<input type="password" placeholder="password" name="password" required>	
		</div>
			
			<br><br>
			
		<div class="remember-me">
				<!-- Angular -->
	<label>
		<input type="checkbox" name="item" checked/>
		<span class="text-checkbox">Remember me</span>
	</label>
		</div>
			
			<br>
			<button class="btn">Register</button>
          </form>
	</div>
	
  </div>
  <footer id="footer">
	<div id="footer1">
		<div class="about">
			<h2>About Us</h2>
			<div class="border"></div>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, quibusdam non voluptatum veniam nobis pariatur! Optio a obcaecati est quia.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, quibusdam non voluptatum veniam nobis pariatur! Optio a obcaecati est quia.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, quibusdam non voluptatum veniam nobis pariatur! Optio a obcaecati est quia.</p>
		</div>
		<div class="questions">
			<h2>Have Questions?</h2>
			<div class="border1"></div>
			<div class="ico1">
				<i class='fas fa-map-marker-alt' style='font-size: 18px'></i>
				<h2>Dhola Bhata, Ajmer, Rajasthan-305001, India</h2>
			</div>
			<div class="ico2">
				<i class="fa fa-phone" style="font-size:18px"></i>
				<h2>9664206852</h2>
			</div>
			<div class="ico1">
				<i class="fa fa-envelope" style="font-size:18px"></i>
				<h2>thedifferentcourier@gmail.com</h2>
			</div>
		</div>
	</div>
	<div class="footer2">
		Copyright &copy; www.differentCourier.com All rights reserved!!
	</div>
  
</footer>
</body>
</html>
