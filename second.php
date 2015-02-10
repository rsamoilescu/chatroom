<?php
	
	require_once('mysqlClass.php');
	session_start();
	header('Content-type: text/xml');
	
	$mysql =  new DataBase();
	$finalResponse = "";
	
	$userName = $_SESSION['user'];
	
	if($_POST['initPage'] == 1){
		$finalResponse = $mysql->getInitResponse();
	}else{
			//adaug mesajul in baza de date;
		if(isset($_POST['message']) && !empty($_POST['message'])){
			$mysql->addTextIntoDatabase($userName, $_POST['message']);
			$finalResponse = $mysql->getNewResponse($_POST['firstId']);
			
		}else if(isset($_POST['deleteId']) && !empty($_POST['deleteId']) && $_POST['deleteId'] != 0 ){///Sterg randul din baza de date cu id = $deleteId
			$mysql->deleteRow($_POST['deleteId']);
			
		}else if($_POST['lastId'] !=0){ // altfel daca a fost apasat butonul de loadmore
			$finalResponse = $mysql->getOldResponse($_POST['lastId']);
			
		}else { // altfel reimprospatez pagina
			$finalResponse = $mysql->getNewResponse($_POST['firstId']);
		}
		
		
	}
	echo $finalResponse;
	
	
	
	
	//primesc raspunsul xml si il afisez
	/*if(isset($_POST['numMessages']) && !empty($_POST['numMessages'])){
		$finalResponse = $mysql->getResponse($_POST['numMessages']);
		echo $finalResponse;
	}*/
	
	
?>