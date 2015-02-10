<!DOCTYPE html>

<?php
	// daca userul este logat, nu este permis accesul paginii index.php
	session_start();
	if(isset($_SESSION['user'])){
		header('Location: body.php');
	}
?>

<html>
<head>
	<link rel="stylesheet" href="css/main.css" type="text/css" />
</head>

<body>
	<div id="wrapper">
		<!--Tab-->
		<noscript><h2 style="color: red;">Javascript not enabled !!!</h2></noscript>
		<div id="tab">CHAT</div>
		
		<div id="container">
			<!--Left Container-->
			<div id="leftContent">
				<!--Navigation bar-->
				<div id="aboutTitle" >ABOUT</div>
				<div id="about">
					This website is an online social networking service. To be more precise, this is nothing but a chatroom. Hope you`ll enjoy it. Thanks for visiting this website !!!
				</div>
				
				<!--JOKE -->
				<div id="warning">
					<div id="title">Warning</div>
					<div id="joke"><img src="img/rightBack.png" width="210" height="100" style="position: absolute;"><br/> <p>&nbsp;&nbsp; Don't try to RIP anything from this site, `cause I will find you and then you'll pay for it.</p><br/></div>
				</div>
			</div>
			
			<!--Right Container -->
			<div id="rightContent">
				<img src="img/rightBack.png" width="360" height="400" style="position:absolute;"/>
				<div id="logIn" class="center">
					<form action="first.php" method="POST" enctype="multipart/form-data">
						E-mail : <input type="email" name="email_2" /><br/>
						Password : <input type="password" name="password_2" /><br/>
						<input type="submit" value="LogIn" name="logIn" class="buttonClass" /><br/>
					</form>
				</div>
				
				<div id="logUp" class="center">
					<form action="first.php" method="POST" enctype="multipart/form-data" >
						First Name : <input type="text" name="firstName" maxlength="30"/><br/>
						Last Name : <input type="text" name="lastName" maxlength="30"/><br/>
						E-mail : <input type="email" name="email" maxlength="50"/><br/>
						Password : <input type="password" name="password" maxlength="30"/><br/>
						Confirm Password : <input type="password" name="confPassword" maxlength="30"/><br/>
						<input type="submit" value="LogUp" name="logUp" class="buttonClass"/></p>
					</form>
				</div>
			</div>
			
		</div>
	</div>
</body>
</html>