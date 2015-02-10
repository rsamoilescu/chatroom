<!DOCTYPE html>
<?php
	// nu perminte accesarea paginii "body.php" daca userul nu e logat;
	session_start();
	if(!isset($_SESSION['user'])){
		header('Location: index.php');
	}
?>

<html>
<head>
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<script type="text/javascript" src="ajax.js"></script>
</head>

<body>
	<div id="wrapper">
		<!--Tab-->
		<div id="tab">CHAT</div>
		
		<div id="container">
			<!--Left Container-->
			<div id="leftContent">
				<!--Navigation bar-->
				<div id="nav">
					<ul>
				
						<li><a href="logout.php"><img src="img/LogOut.png" height="170px" /></a></li>
					
					</ul>
					<span style="clear:both; display:block;"></span>
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
			
				<div id="textArea" class="center">
					<form >
						<textarea rows="5" cols="30" name="textArea" maxlength="300" style="resize: none;" id="message" >Something here</textarea>
						<input class="buttonClass" type="button" value="Send" onclick="buttonOnClick()"/>
					</form>
				</div>
				
				
				<div id="content" class="center" ></div>
				<br />
				<div id="loadMore" style="position:relative;" onclick="increaseNumMessages()">Load More</div>
				
			</div>
			
		</div>
	</div>
</body>
</html>