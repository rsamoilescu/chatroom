<!DOCTYPE html>

<?php
	
	require_once('mysqlClass.php');
	session_start();
	$message = '';
	$mysql = new DataBase(); // creez instanta obiectului $mysql din clasa DataBase
	
	if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confPassword'])){
		if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confPassword'])){
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$confPassword = $_POST['confPassword'];
			
			// verific daca mailul exista
			if($mysql->mailExists($email)){
				$message = 'This mail already exists in the database';
			}
			else if($password == $confPassword){ // daca cele doua parole coincid
				$password = md5($password);
				$mysql->insertUserIntoDatabase($firstName, $lastName, $email ,$password); // introduc in baza de date noul utilizator;
				$fullName = $firstName.' '.$lastName;
				$_SESSION['user'] = $fullName;
				$_SESSION['mail'] = $email;
				header('Location: body.php');
			}else {
				$message =  "The passwords doesn't match ... ";
			}
			
		}else{
			$message = "Complete all rows !!!";
		}
		
	}else if(isset($_POST['email_2']) && isset($_POST['password_2'])){
		if(!empty($_POST['email_2']) && !empty($_POST['password_2'])){
			$email = $_POST['email_2'];
			$password = $_POST['password_2'];
			
			$password = md5($password);
			$password = substr($password, 0, 100);
			$fullName = $mysql->signInValidation($email, $password);
			if($fullName) { 
				//setez session cu fullName;
				$_SESSION['user'] =  $fullName;
				$_SESSION['mail'] = $email;
			}else{ 
				$message = 'Email or passsword incorrect ... ';
			}
		}else{
			$message = 'Acces denied !!!';
		}
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
				
				<div class="center">
					<?php
						if(!empty($message)){
							echo $message;
							echo '<script>
								var timer =  setTimeout(function(){location.href = "index.php";},3000);
								</script>';
						}else{
							echo '<script> location.href="index.php"; </script>';
						}
					?>
				</div>
			</div>
			
		</div>
	</div>
</body>
</html>