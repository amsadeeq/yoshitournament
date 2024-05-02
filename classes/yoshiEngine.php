<?php
//Yoshi Tournament Engine for signup, registration, and all

	class yoshiEngine extends yoshiDatabaseConn {

		//selecting all record from the database
		public function selectUserPlaceorder(){
			$sql = "SELECT * FROM order_tbl";
			$result = $this->connect()->query($sql);
			if($result ->rowCount() > 0){
				while($row = $result ->fetch()){
					$data [] = $row;
				}
				return $data;
			}
		}

		//function for inserting user new member record into a table "yoshi_signup_tbl" in Yoshi_database with generated user reference number
		public function membershipAccount($fields){
			try{
				//using implode funtion and array keys to insert data into the table
			$impoldeColumn = implode(',', array_keys($fields)); //for the table fields(column) like (id,AppNum,...)

			$implodePlaceholders = implode(", :", array_keys($fields));//for the attribute (id='1',AppNum='123456',..)

			$create = "INSERT INTO yoshi_signup_tbl ($impoldeColumn) VALUES(:".$implodePlaceholders.")";//(id,AppNum,...) VALUES (id='1',AppNum='123456',..)

			$statment = $this->connect()-> prepare($create);//creating connection to the database using prepare function
			foreach ($fields as $key => $value) {
			 	$statment -> bindValue(':'.$key,$value);
			 }
			 $statmentExec = $statment-> execute();//executing statements
			 if($statmentExec){
			 	
			 	//header("Location:order_pay.php");
			 }
			 return $statmentExec;

			}
			catch(PDOException $e){
			echo "Connection failed: ". $e->getMessage();
		}
			
		}

		//function for inserting user new member record into a table "member_record_tbl" in ubifcs_database with generated account number, user_key
		public function memberrecord($fields){
			try{
				//using implode funtion and array keys to insert data into the table
			$impoldeColumn = implode(',', array_keys($fields)); //for the table fields(column) like (id,AppNum,...)

			$implodePlaceholders = implode(", :", array_keys($fields));//for the attribute (id='1',AppNum='123456',..)

			$create = "INSERT INTO member_record_tbl ($impoldeColumn) VALUES(:".$implodePlaceholders.")";//(id,AppNum,...) VALUES (id='1',AppNum='123456',..)

			$statment = $this->connect()-> prepare($create);//creating connection to the database using prepare function
			foreach ($fields as $key => $value) {
			 	$statment -> bindValue(':'.$key,$value);
			 }
			 $statmentExec = $statment-> execute();//executing statements
			 if($statmentExec){
			 	
			 	//header("Location:order_pay.php");
			 }
			 return $statmentExec;

			}
			catch(PDOException $e){
			echo "Connection failed: ". $e->getMessage();
		}
			
		}

		//function for inserting user new member record into a table "members_complain_tbl" in ubifcs_database with generated account number, user_key
		public function complain($fields){
			try{
				//using implode funtion and array keys to insert data into the table
			$impoldeColumn = implode(',', array_keys($fields)); //for the table fields(column) like (id,user_key,...)

			$implodePlaceholders = implode(", :", array_keys($fields));//for the attribute (id='1',user_key='123456',..)

			$create = "INSERT INTO members_complain_tbl ($impoldeColumn) VALUES(:".$implodePlaceholders.")";//(id,user_key,...) VALUES (id='1',user_key='123456',..)

			$statment = $this->connect()-> prepare($create);//creating connection to the database using prepare function
			foreach ($fields as $key => $value) {
			 	$statment -> bindValue(':'.$key,$value);
			 }
			 $statmentExec = $statment-> execute();//executing statements
			 if($statmentExec){
			 	
			 	//header("Location:order_pay.php");
			 }
			 return $statmentExec;

			}
			catch(PDOException $e){
			echo "Connection failed: ". $e->getMessage();
		}
			
		}

		//function for inserting user new member record into a table "login_logbook_tbl" in ubifcs_database with generated account number, user_key
		public function logBook($fields){
			try{
				//using implode funtion and array keys to insert data into the table
			$impoldeColumn = implode(',', array_keys($fields)); //for the table fields(column) like (id,user_key,...)

			$implodePlaceholders = implode(", :", array_keys($fields));//for the attribute (id='1',user_key='123456',..)

			$create = "INSERT INTO login_logbook_tbl ($impoldeColumn) VALUES(:".$implodePlaceholders.")";//(id,user_key,...) VALUES (id='1',user_key='123456',..)

			$statment = $this->connect()-> prepare($create);//creating connection to the database using prepare function
			foreach ($fields as $key => $value) {
			 	$statment -> bindValue(':'.$key,$value);
			 }
			 $statmentExec = $statment-> execute();//executing statements
			 if($statmentExec){
			 	
			 	//header("Location:order_pay.php");
			 }
			 return $statmentExec;

			}
			catch(PDOException $e){
			echo "Connection failed: ". $e->getMessage();
		}
			
		}


		//function for inserting user new member record into a table "login_account_tbl" in ubifcs_database with generated account number
		public function applyLoan($fields){
			try{
				//using implode funtion and array keys to insert data into the table
			$impoldeColumn = implode(',', array_keys($fields)); //for the table fields(column) like (id,AppNum,...)

			$implodePlaceholders = implode(", :", array_keys($fields));//for the attribute (id='1',AppNum='123456',..)

			$create = "INSERT INTO loan_request_tbl ($impoldeColumn) VALUES(:".$implodePlaceholders.")";//(id,AppNum,...) VALUES (id='1',AppNum='123456',..)

			$statment = $this->connect()-> prepare($create);//creating connection to the database using prepare function
			foreach ($fields as $key => $value) {
			 	$statment -> bindValue(':'.$key,$value);
			 }
			 $statmentExec = $statment-> execute();//executing statements
			 if($statmentExec){
			 	
			 	//header("Location:order_pay.php");
			 }
			 return $statmentExec;

			}
			catch(PDOException $e){
			echo "Connection failed: ". $e->getMessage();
		}
			
		}

		//function for inserting user new member record into a table "item_loan_tbl" in ubifcs_database with generated account number
		public function apply_Item_Loan($fields){
			try{
				//using implode funtion and array keys to insert data into the table
			$impoldeColumn = implode(',', array_keys($fields)); //for the table fields(column) like (id,AppNum,...)

			$implodePlaceholders = implode(", :", array_keys($fields));//for the attribute (id='1',AppNum='123456',..)

			$create = "INSERT INTO item_loan_tbl ($impoldeColumn) VALUES(:".$implodePlaceholders.")";//(id,AppNum,...) VALUES (id='1',AppNum='123456',..)

			$statment = $this->connect()-> prepare($create);//creating connection to the database using prepare function
			foreach ($fields as $key => $value) {
			 	$statment -> bindValue(':'.$key,$value);
			 }
			 $statmentExec = $statment-> execute();//executing statements
			 if($statmentExec){
			 	
			 	//header("Location:order_pay.php");
			 }
			 return $statmentExec;

			}
			catch(PDOException $e){
			echo "Connection failed: ". $e->getMessage();
		}
			
		}




		//function for inserting user new member record into a table "item_loan_tbl" in ubifcs_database with generated account number
		public function buy_shares($fields){
			try{
				//using implode funtion and array keys to insert data into the table
			$impoldeColumn = implode(',', array_keys($fields)); //for the table fields(column) like (id,AppNum,...)

			$implodePlaceholders = implode(", :", array_keys($fields));//for the attribute (id='1',AppNum='123456',..)

			$create = "INSERT INTO shares_account_tbl ($impoldeColumn) VALUES(:".$implodePlaceholders.")";//(id,AppNum,...) VALUES (id='1',AppNum='123456',..)

			$statment = $this->connect()-> prepare($create);//creating connection to the database using prepare function
			foreach ($fields as $key => $value) {
			 	$statment -> bindValue(':'.$key,$value);
			 }
			 $statmentExec = $statment-> execute();//executing statements
			 if($statmentExec){
			 	
			 	//header("Location:order_pay.php");
			 }
			 return $statmentExec;

			}
			catch(PDOException $e){
			echo "Connection failed: ". $e->getMessage();
		}
			
		}






		

		
		//function for inserting user placeoreder details into order table with invoice number generated instantly
		public function itemOrdered($itemfields){
			try{
				//using implode funtion and array keys to insert data into the table
			$impoldeColumn = implode(',', array_keys($itemfields)); //for the table fields(column) like (id,AppNum,...)

			$implodePlaceholders = implode(", :", array_keys($itemfields));//for the attribute (id='1',AppNum='123456',..)

			$create = "INSERT INTO item_ordered_tbl ($impoldeColumn) VALUES(:".$implodePlaceholders.")";//(id,AppNum,...) VALUES (id='1',AppNum='123456',..)

			$statment = $this->connect()-> prepare($create);//creating connection to the database using prepare function
			foreach ($itemfields as $key => $value) {
			 	$statment -> bindValue(':'.$key,$value);
			 }
			 $statmentExec = $statment-> execute();//executing statements
			 if($statmentExec){
			 	
			 	header("Location:order_pay.php");
			 }
			 return $statmentExec;

			}
			catch(PDOException $e){
			echo "Connection failed: ". $e->getMessage();
		}
			
		}

		//function for inserting new product into products table
		public function newProduct($fields){
			//using implode funtion and array keys to insert data into the table
			$impoldeColumn = implode(',', array_keys($fields)); //for the table fields(column) like (id,AppNum,...)

			$implodePlaceholders = implode(", :", array_keys($fields));//for the attribute (id='1',AppNum='123456',..)

			$create = "INSERT INTO products ($impoldeColumn) VALUES(:".$implodePlaceholders.")";//(id,AppNum,...) VALUES (id='1',AppNum='123456',..)

			$statment = $this->connect()-> prepare($create);//creating connection to the database using prepare function
			foreach ($fields as $key => $value) {
			 	$statment -> bindValue(':'.$key,$value);
			 }
			 $statmentExec = $statment-> execute();//executing statements
			 if($statmentExec){
			 	
			 	header("Location:new.php");
			 }
		}
		//function for inserting users account record
		public function usersAccount($fields){
			//using implode funtion and array keys to insert data into the table
			$impoldeColumn = implode(',', array_keys($fields)); //for the table fields(column) like (id,AppNum,...)

			$implodePlaceholders = implode(", :", array_keys($fields));//for the attribute (id='1',AppNum='123456',..)

			$create = "INSERT INTO users_account_tbl ($impoldeColumn) VALUES(:".$implodePlaceholders.")";//(id,AppNum,...) VALUES (id='1',AppNum='123456',..)

			$statment = $this->connect()-> prepare($create);//creating connection to the database using prepare function
			foreach ($fields as $key => $value) {
			 	$statment -> bindValue(':'.$key,$value);
			 }
			 $statmentExec = $statment-> execute();//executing statements
			 if($statmentExec){
			 	
			 	//header("Location:new.php");
			 }
		}
		//selecting all record from the database
		public function selectUsersAccount(){
			$sql = "SELECT * FROM users_account_tbl";
			$result = $this->connect()->query($sql);
			if($result ->rowCount() > 0){
				while($row = $result ->fetch()){
					$data [] = $row;
				}
				return $data;
			}
		}
		function runQuery($query) {
		$result1 = $this->connect()->query($query);
		while($row=$result1->fetch()) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result2  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result2);
		return $rowcount;	
	}


	}
	
?>