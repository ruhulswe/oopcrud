<?php 

	class DatabaseConnection{

	 	private $host   = "localhost";
	 	private $user   = "root";
	 	private $pass   = "";
	 	private $dbname = "nurdb";

	 	private $connect;

	 	/* this function will call automatically when this class 
	 	is called.Cause contructor function don't wait for calling :D */
		public function __construct(){
			try{
				$this->connectDB();
			}
			catch(exception $e){
				echo $e->getmessage();
			}
		}

		// database connection creation method
		public function connectDB()
		{
			$this->connect = mysqli_connect($this->host,$this->user,$this->pass);
			if(!$this->connect){
				$this->error = "Connection fail".$this->connect->connect_error;
				echo $this->error;
				return 0;
			}
		}

		// database selection method
		public function selectDb()
		{
			mysqli_select_db($this->connect,$this->dbname);
		}

		// database creation & selection method
		public function dbCreation()
		{
			// database creation
			$create_database_query = "CREATE DATABASE IF NOT EXISTS nurdb";
			$create_database = $this->connect->query($create_database_query);
			if(!$create_database){
				echo "<br>"."Database not created";
			}
		}


		// table creation method
		public function dbtable()
		{
			$db_table_query = "CREATE TABLE IF NOT EXISTS nur(
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				task VARCHAR(30) NOT NULL,
				time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
			)";
			$db_table = $this->connect->query($db_table_query);
			if(!$db_table){
				echo " table not created". mysqli_error($this->connect);
			}
		}


		// drop table method
		public function dropTable($tableName)
		{
			$dropQuery = "drop table nur";
			$tableDroped = $this->connect->query($dropQuery);
			if($tableDroped){
				echo "{$tableName} table dropped ";
			}
		}


		// insertion method
		public function insertion($task)
		{
			$insert_query = "INSERT INTO nur (task) VALUES ('$task')";
			$isInserted = $this->connect->query($insert_query);
			if($isInserted){
				return true;
			}else{
				echo "not inserted ".$this->connect->error;
				return false;
			}
		}


		// SELECTION METHOD 
		public function selection($sql)
		{
			$executeQuery = mysqli_query($this->connect,$sql);
			$result = mysqli_fetch_all($executeQuery,MYSQLI_ASSOC);
			$rowCount = count($result);
			if($rowCount){
				return $result;
			}
		}


		// UPDATING METHOD
		public function updating($sql)
		{
			$executeQuery = mysqli_query($this->connect,$sql);
			return $executeQuery;

		}


		// DELETING METHOD
		public function deleting($sql)
		{
			$executeQuery = mysqli_query($this->connect,$sql);			return $executeQuery;

		}
		

		// this method for getting single data
		public function singleData($sql)
		{
			$executeQuery = mysqli_query($this->connect,$sql);
			$result = $executeQuery->fetch_assoc();
			return $result;
		}


		// mysqli connection closing method
		public function closeConnection()
		{
			mysqli_close($this->connect);
		}


	}












