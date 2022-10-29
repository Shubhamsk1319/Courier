<?php
$login="f";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	// error_reporting(0);
	include 'x.php';
	$email=$_POST["email"];
	$password=$_POST["password"];
	$sql="Select * from tbladmin where email='$email' AND password='$password'";
	$result=mysqli_query($conn, $sql);
	$num=mysqli_num_rows($result);
	if($num==1){
	    $login=true;
		session_start();
		$_SESSION['loggedin']=true;
		$_SESSION['email']=$email;
		header("location:admin/index.php");
	}
	else{
		$login=false;
	}
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">


<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
<link rel="stylesheet" href="Login.css">
<link rel="stylesheet" href="style.css">
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
					<a href="#">Admin Panel<i class="fa fa-caret-down"></i></a>
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
	<?php
	if(!$login){
		echo '<div class="al">
		<strong>WARNING!</strong>INVALID CREDENTIALS
		<span aria-hidden="true">&times;</span>
	</div>';

	}
	?>
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
		<form action="Login.php" method="post">
		<h5>Admin Login</h5>
		<p>Don't have an account? <a href="register.php">Create Your Account</a> it takes less than a minute</p>
		<div class="inputs">
			<input type="email" placeholder="email" name="email">
			<br>
			<input type="password" placeholder="password" name="password">
		</div>
			
			<br><br>
			
		<div class="remember-me--forget-password">
				<!-- Angular -->
	<label>
		<input type="checkbox" name="item" checked/>
		<span class="text-checkbox">Remember me</span>
	</label>
			<p><a href="#">forget password?</a></p>
		</div>
			
			<br>
			<button>Login</button>
	</div>
</form>
	
</div>
<!-- partial -->
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
