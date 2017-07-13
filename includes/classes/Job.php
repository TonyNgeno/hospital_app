<?php
	class Job extends DB{
		protected $table = 'jobs';
		
		public function fetchJobs(){
			$query = "SELECT * FROM " . $this->table . " ORDER BY date_posted DESC";
			
			$statement = $this->_conn->prepare($query);
			
			try{
				$statement->execute();
				if($statement->rowCount()){
					return $statement->fetchAll();
				}else{
					$this->_error = 'No jobs posted yet';
				}
				
			}catch(PDOException $e){
				$this->_error = $e->getMessage();
			}
		}
		
		public function fetchJob($id){
			$data = [$id];
			
			$query = "SELECT * FROM " . $this->table . " WHERE id = ?";
			
			$statement = $this->_conn->prepare($query);
			
			try{
				$statement->execute($data);
				if($statement->rowCount()){
					return $statement->fetch();
				}else{
					$this->_error = 'Job not found';
				}
				
			}catch(PDOException $e){
				$this->_error = $e->getMessage();
			}
		}
		
		public function addJob($title, $body){
			$data = [$title, $body];
			
			$query = "INSERT INTO " . $this->table . "(title,body, date_posted) VALUES(?,?,NOW())";
			$statement = $this->_conn->prepare($query);
			
			try{
				$statement->execute($data);
				if($statement->rowCount()){
					return 1;
				}else{
					$this->_error = 'Unable to add job, please try again';
				}
			}catch(PDOException $e){
				$this->_error = $e->getMessage();
			}
		}
		
		public function updateJob($id, $title, $body){
			$data = [$title, $body, $id];
			
			$query = "UPDATE " . $this->table . " SET title = ?,body = ? WHERE id = ?";
			$statement = $this->_conn->prepare($query);
			
			try{
				$statement->execute($data);
				return 1;
			}catch(PDOException $e){
				$this->_error = $e->getMessage();
			}
		}
		
		public function deleteJob($id){
			$data = [$id];
			
			$query = "DELETE FROM " . $this->table . " WHERE id = ?";
			$statement = $this->_conn->prepare($query);
			
			try{
				$statement->execute($data);
				if($statement->rowCount()){
					return 1;
				}else{
					$this->_error = 'Job not deleted, make sure you have the sufficient rights';
				}
			}catch(PDOException $e){
				$this->_error = $e->getMessage();
			}
		}
	}
?>