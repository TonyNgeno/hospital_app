<?php 
	class DB{
		public $_conn, 
				$_error,
				$_server = 'localhost',
				$_username = 'root',
				$_password = '',
				$_database = 'nyambene';
		
		public function error(){
			return $this->_error;
		}
		
		public function validateEmail($email){
			return (preg_match("/(@.*@)|(\.\.)|(@\.)|(^\.)/", $email) || !preg_match("/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $email)) ? false : true;
		}
		
		public function __construct(){
			try{
				$this->_conn = new PDO('mysql:host=' . $this->_server . ';dbname=' . $this->_database, $this->_username, $this->_password);
				$this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->_conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
				return $this->_conn;
			}
			catch(PDOException $e){
				$this->_error = $e->getMessage;
			}
		}
	}
?>