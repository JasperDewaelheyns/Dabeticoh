<?php
	session_start();
	
	if (isset($_POST["inlogbutton"])) {
					$con = mysqli_connect("localhost", "root","","dabeticohdb" ) or die ("Kan niet verbinden: ".mysqli_error());
						
					$email = $_POST['email'];
					$pass = $_POST['password'];
					
					$sql = "SELECT *  
							FROM users
							WHERE email ='".$email."'
							AND wachtwoord ='".$pass."';";
									
					if (!mysqli_query($con,$sql)) 
					{
						echo mysqli_error($con);
					}
					elseif(mysqli_fetch_array(mysqli_query($con,$sql))>0) 
					{
						$_SESSION['email'] = $_POST['email'];						
					}
					else 
					{
						echo "<h3 class='text-danger'>You tried...</h3>";
					}
					mysqli_close($con);
				}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Jeugdfuiven</title>
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/signin.css" rel="stylesheet">
		<link href="css/manual.css" rel="stylesheet">
	</head>
	
	<body>
		<header id="header">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<img class="logo" src="images/logo.png" alt="logo"/>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><a href="index.html">Home</a></li>
							<li><a href="events.html">Evenementen</a></li>
							<li><a href="faq.html">FAQ</a></li>
							<li><a href="overons.html">Over ons</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="actief"><a href="login.php">Login<span class="sr-only">(current)</span></a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</header>
		
		<div class="row">
			<h1>Login</h1>
		</div>
		
		<?php
			if(!isset($_SESSION["email"])) {
		?>
		
		<div class="container">
			<form class="form-signin" role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				<h2 class="form-signin-heading text-primary">Please sign in</h2>
				<label for="inputEmail" class="sr-only">Email address</label>
				<input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
				<!-- <div class="checkbox">
					<label><input type="checkbox" value="remember-me"><p style="color:white;">Remember me</p></label>
				</div> -->
				<button class="btn btn-lg btn-primary btn-block" type="submit" name="inlogbutton">Sign in</button>
			</form>
		</div> <!-- /container -->
		
		<?php	
			}
			else {
				echo "<h3 class='text-primary'>Welkom ".$_SESSION["email"]."</h3>";	
			}
		?>
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>