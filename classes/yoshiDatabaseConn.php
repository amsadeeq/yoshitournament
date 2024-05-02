<?php

class yoshiDatabaseConn{
	protected function connect(){
		//connection to the database
		try{
			$conn = new PDO("mysql:host=localhost;dbname=yoshi_tournament_db", 'root','');
			//set the PDO error mode to exception
			$conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			//echo "Message";
			return $conn;
		}
		catch(PDOException $e){
			echo "Connection failed: ". $e->getMessage();
		}
	}
}
?>