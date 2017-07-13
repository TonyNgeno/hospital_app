<?php
	class Appointment extends DB{
		protected $table = 'appointments';
		protected $table_patients = 'patients';
		
		public function fetchAppointments(){
			$query = "SELECT appointments.id as appointment_id, appointments.description, appointments.appointment_date, appointments.date_posted,
							 patients.* FROM appointments  
					  LEFT JOIN patients 
					  ON appointments.patient_id = patients.id
					  
					  ORDER BY appointments.date_posted DESC";
			
			$statement = $this->_conn->prepare($query);
			
			try{
				$statement->execute();
				if($statement->rowCount()){
					return $statement->fetchAll();
				}else{
					$this->_error = 'No appointments yet';
				}
				
			}catch(PDOException $e){
				$this->_error = $e->getMessage();
			}
		}
		
		public function fetchMyAppointments($id){
			$data = [$id];
			$query = "SELECT appointments.id as appointment_id, appointments.description, appointments.appointment_date, appointments.date_posted,
							 patients.* FROM appointments  
					  LEFT JOIN patients 
					  ON appointments.patient_id = patients.id
					  WHERE appointments.patient_id = ?
					  
					  ORDER BY appointments.date_posted DESC";
			
			$statement = $this->_conn->prepare($query);
			
			try{
				$statement->execute($data);
				if($statement->rowCount()){
					return $statement->fetchAll();
				}else{
					$this->_error = 'No appointments yet';
				}
				
			}catch(PDOException $e){
				$this->_error = $e->getMessage();
			}
		}
		
		public function fetchAppointment($id){
			$data = [$id];
			
			$query = "SELECT appointments.id as appointment_id, appointments.description, appointments.appointment_date, appointments.date_posted,
							 patients.* FROM appointments  
					  LEFT JOIN patients 
					  ON appointments.patient_id = patients.id
					  
					  WHERE appointments.id = ?
					  
					  ORDER BY appointments.date_posted DESC";
			
			$statement = $this->_conn->prepare($query);
			
			try{
				$statement->execute($data);
				if($statement->rowCount()){
					return $statement->fetch();
				}else{
					$this->_error = 'Appointment not found';
				}
				
			}catch(PDOException $e){
				$this->_error = $e->getMessage();
			}
		}
		
		public function addAppointment($patient_id, $description, $appointment_date){
			$data = [$patient_id, $description, $appointment_date];
			
			$query = "INSERT INTO " . $this->table . "(patient_id, description, appointment_date, date_posted) VALUES(?,?,?,NOW())";
			$statement = $this->_conn->prepare($query);
			
			try{
				$statement->execute($data);
				if($statement->rowCount()){
					return 1;
				}else{
					$this->_error = 'Unable to add appointment, please try again';
				}
			}catch(PDOException $e){
				$this->_error = $e->getMessage();
			}
		}
		
		public function updateAppointment($id, $description, $appointment_date){
			$data = [$description, $appointment_date,$id];
			
			$query = "UPDATE " . $this->table . " SET description = ?,appointment_date = ? WHERE id = ?";
			$statement = $this->_conn->prepare($query);
			
			try{
				$statement->execute($data);
				return 1;
			}catch(PDOException $e){
				$this->_error = $e->getMessage();
			}
		}
		
		public function deleteAppointment($id){
			$data = [$id];
			
			$query = "DELETE FROM " . $this->table . " WHERE id = ?";
			$statement = $this->_conn->prepare($query);
			
			try{
				$statement->execute($data);
				if($statement->rowCount()){
					return 1;
				}else{
					$this->_error = 'Appointment not deleted, make sure you have the sufficient rights';
				}
			}catch(PDOException $e){
				$this->_error = $e->getMessage();
			}
		}
	}
?>