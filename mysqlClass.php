<?php
	
	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PASSWORD','');
	define('DB_DATABASE','forum');
	define('numRows', 10);

	
	class DataBase {
		private $mysqli;
		private $con;
		
		
		// CONSTRUCTOR
		function __construct(){
			$this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
			$this->con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		}
		
		//DECONSTRUCTOR
		function __destruct(){
			$this->mysqli->close();
		}
		
		// introduce un nou utilizator in baza de date
		public function insertUserIntoDatabase($fName, $lName, $mail ,$pword){
			$query = 'INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `Password`, `Email`) VALUES (
			"",
			"'.$this->mysqli->real_escape_string($fName).'",
			"'.$this->mysqli->real_escape_string($lName).'",
			"'.$this->mysqli->real_escape_string($pword).'",
			"'.$this->mysqli->real_escape_string($mail).'")';
			
			$result = $this->mysqli->query($query);
		}
		
		// verifica daca mailul exista; Daca da, returneaza false, altfel returneaza true;
		public function mailExists($mail){
			$query = 'SELECT id FROM `users` WHERE `Email` = "'.$this->mysqli->real_escape_string($mail).'"';
			$result = mysqli_query($this->con, $query);
			
			if(mysqli_num_rows($result) > 0 ) return true;
			return false;
		}
		
		//verifica daca utilizatorul se afla in baza de date; returneaza numele daca se afla, altfel returneaza false;
		public function signInValidation ($mail, $pword){
			$query = 'SELECT `FirstName`, `LastName` FROM `users` WHERE `email` = "'.$this->mysqli->real_escape_string($mail).'" AND
			`password` = "'.$this->mysqli->real_escape_string($pword).'"';
			
			$result = mysqli_query($this->con, $query);
			
			if(mysqli_num_rows($result) == 1){
				while($row =  $result->fetch_assoc()){
					$fullName =  $row['FirstName'].' '.$row['LastName'];
				}
				
				return $fullName;
			}
			
			return false;
		}
		
		// adauga textul in baza de date
		public function addTextIntoDatabase($user, $text){
			$query = 'INSERT INTO `text`(`ID`, `Text`, `User`, `email`) VALUES ('.
			'"", "'.
			$this->mysqli->real_escape_string($text).'", "'.
			$this->mysqli->real_escape_string($user).'", "'.
			$this->mysqli->real_escape_string($_SESSION['mail']).'")';
			
			$this->mysqli->query($query);
		}
		
		//returneaza cate randuri sunt in baza de date
		public function numberRows(){
			$query = "SELECT COUNT(*) FROM text";
			$result = mysqli_query($this->con, $query);
			
			while($row = $result->fetch_array()){
				$numRows = $row[0];
			}
			
			return $numRows;
		}
		
		
		// functie care sterge randul cu id-ul $id;
		public function deleteRow($id){
			$query = 'DELETE FROM `text` WHERE ID ='.$id;
			$this->mysqli->query($query);
		}
		
		public function formatResponse($result, $newResult){
		// XML Response
			$response = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
			$response .='<root>';
			if(mysqli_num_rows($result) > 0){
				while($row = $result->fetch_assoc()){
					$response .= '<response>
									<id>'.$row['ID'].'</id>
									<user>'.$row['User'].'</user>
									<text>'.$row['Text'].'</text>
									<email>'.$row['email'].'</email>
								 </response>';
				}
			}
			$numRows =  $this->numberRows();
			$response .='<numRows>'.$numRows.'</numRows>';
			$response .='<mail>'.$_SESSION['mail'].'</mail>';
			if($newResult){ // newResult e 1 daca este transmis de la getNewResponse
				$response.='<newResult>'. 1 .'</newResult>';
			}else{
				$response.='<newResult>'. 0 .'</newResult>';
			}
			
			$response .='</root>';
			return $response;
		
		}
		
		// functie care returneaza raspunsul la deschiderea paginii;
		public function getInitResponse(){
			$query = $query = 'SELECT `ID`,`Text`, `User`, `email` FROM `text` ORDER BY ID DESC LIMIT '.numRows;
			$result = mysqli_query($this->con,$query);
			$response = $this->formatResponse($result, 0);
			return $response;
		
		}
		
		// functie care returneaza randurile cu id-uri mai mai ca $firstId;
		public function getNewResponse($firstId){
			$query = "SELECT `ID`,`Text`, `User`, `email` FROM `text` WHERE `id` >".$firstId." ORDER BY `id` DESC";
			$result = mysqli_query($this->con, $query);
			$response = $this->formatResponse($result, 1);
			
			return $response;
		}
		
		//functie care returneaza randurile mai vechi, mai exact cu id < $lastId
		public function getOldResponse($lastId){
			$query = "SELECT * FROM `text` WHERE `id` <". $lastId." ORDER BY `id` DESC LIMIT 10";
			$result = mysqli_query($this->con, $query);
			$response = $this->formatResponse($result, 0);
			
			return $response;
		}
	
	
	
	
	
	}
	



?>