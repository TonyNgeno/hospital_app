<?php
	require_once 'includes/core.inc.php';
	
	$conn = $db->_conn;
	
	if(isset($_POST['action']) && $_POST['action'] == 'FETCH_MESSAGES'){
		foreach($_POST as $key => $value){
			${$key} = htmlentities($value);
		}
		
		if(loggedInDoctor()){
			$sender = 'doctor' . $_SESSION['doctorDetails']['id'];
			$recepient = 'patient' . $recepient;
		}
		
		elseif(loggedInPatient()){
			$sender = 'patient' . $_SESSION['patientDetails']['id'];
			$recepient = 'doctor' . $recepient;
		}
		
		$query = "SELECT * FROM messages WHERE (sender = '$recepient' OR recepient = '$recepient')";
		$statement = $conn->prepare($query);
		try{
			$statement->execute();
			if($statement->rowCount()){
				
				$output = '';
				
				while($r = $statement->fetch(PDO::FETCH_OBJ)){
					if($r->sender == $sender && $r->recepient == $recepient){
						$output .= '<p class = "text-info"><strong>ME : </strong>' . $r->message . '</p>';
					}elseif($r->recepient == $sender && $r->sender == $recepient){
						if(loggedInPatient()){
							$output .= '<p class = "text-success"><strong> DOCTOR : </strong>' . $r->message . '</p>';
						}else{
							$output .= '<p class = "text-success"><strong> PATIENT : </strong>' . $r->message . '</p>';
						}
					}
				}
				
				echo $output;
			}else{
				echo 'No messages found';
			}
			
		}catch(PDOException $e){
			echo $e->getMessage;
		}
		
	
	}
	
	if(isset($_POST['action']) && $_POST['action'] == 'SEND_MESSAGE'){
		foreach($_POST as $key => $value){
			${$key} = htmlentities($value);
		}
		
		if($recepient != 'none'){
			if(!empty($message)){
				if(loggedInDoctor()){
					$sender = 'doctor' . $_SESSION['doctorDetails']['id'];
					$recepient = 'patient' . $recepient;
				}
				
				elseif(loggedInPatient()){
					$sender = 'patient' . $_SESSION['patientDetails']['id'];
					$recepient = 'doctor' . $recepient;
				}
				
				if(isset($sender)){
					$query = "INSERT INTO messages(sender, recepient, message, date) VALUES(?,?,?,NOW())";
					$data = [$sender, $recepient, $message];
					
					$statement = $conn->prepare($query);
					
					try{
						$statement->execute($data);
						if($statement->rowCount()){
							echo '<p class = "text-info"><strong>ME : </strong>' . $message . '</p>';
						}else{
							echo '<p class = "text-danger"><strong>SYSTEM : </strong>MESSAGE NOT SENT</p>';
						}
						
						
					}catch(PDOException $e){
						echo '<p class = "text-danger"><strong>SYSTEM: </strong>' . $e->getMessage() . '</p>';
					}
				}
			}else{
				echo '<p class = "text-danger"><strong>SYSTEM: </strong>YOU DID NOT TYPE SOMETHING</p>';
			}
		}else{
			echo '<p class = "text-danger"><strong>SYSTEM: </strong>MESSAGE NOT SENT, PLEASE SELECT RECEPIENT</p>';
		}
		
	}
	
	if(isset($_POST['action']) && $_POST['action'] == 'FETCH_LIST'){
		
		if(loggedInDoctor()){
			$query = 'SELECT * FROM patients WHERE lastActive > NOW() - 60 ';
			$statement = $conn->prepare($query);
			try{
				$statement->execute();
				if($statement->rowCount()){
					while($r = $statement->fetch(PDO::FETCH_OBJ)){
						echo '<a href="" data-id = "' . $r->id . '" class="list-group-item user final">' . strtoupper($r->name) . ' <i class = "glyphicon glyphicon-record text-success"></i></a>';
					}
				}else{
					echo '<p class = "list-group-item">NO PATIENTS ONLINE</p>';
				}
				
			}catch(PDOException $e){
				echo '<p class = "list-group-item">' . $e->getMessage() . '</p>';
			}
			
		}elseif(loggedInPatient()){
			$query = 'SELECT * FROM doctors WHERE lastActive > NOW() - 60 ';
			$statement = $conn->prepare($query);
			try{
				$statement->execute();
				if($statement->rowCount()){
					while($r = $statement->fetch(PDO::FETCH_OBJ)){
						echo '<a href="" data-id = "' . $r->id . '" class="list-group-item user">DR. ' . strtoupper($r->name) . ' <i class = "glyphicon glyphicon-record text-success"></i></a>';
					}
				}else{
					echo '<p class = "list-group-item">NO DOCTORS ONLINE</p>';
				}
				
			}catch(PDOException $e){
				echo '<p class = "list-group-item">' . $e->getMessage() . '</p>';
			}
		}
	}
	
	if(isset($_POST['action']) && $_POST['action'] == 'UPDATE_TIME'){
		
		if(loggedInDoctor()){
			$query = 'UPDATE doctors SET lastActive = NOW() WHERE id = ?';
			$data = [$_SESSION['doctorDetails']['id']];
		}
		
		if(loggedInPatient()){
			$query = 'UPDATE patients SET lastActive = NOW() WHERE id = ?';
			$data = [$_SESSION['patientDetails']['id']];
		}
		
		$statement = $conn->prepare($query);
		try{
			$statement->execute($data);
			if($statement->rowCount()){
				echo 'Time updated';
			}else{
				echo 'Time not updated';
			}
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
	}
	
	if(isset($_POST['action']) && $_POST['action'] == 'GIVE_PRESCRIPTION'){
		foreach($_POST as $key => $value){
			${$key} = htmlentities($value);
		}
		
		$doctorid = $_SESSION['doctorDetails']['id'];
		$patientid = $recepient;
		
		$query = "INSERT INTO prescriptions(patientid, doctorid,prescription) VALUES('$patientid','$doctorid','$prescription')";
		$statement = $conn->prepare($query);
		try{
			$statement->execute();
			if($statement->rowCount()){
				echo 'Prescription Given';
			}else{
				echo 'Prescription failed';
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		
	}
	
	if(isset($_POST['action']) && $_POST['action'] == 'GET_APPOINTMENT'){
		$id = $_POST['id'];
		$data_array = ['items'];
		
		if($data = $appointment->fetchAppointment($id)){
			$data_array['items'][] = ['description' => $data->description , 'appointment_date' => $data->appointment_date];
			echo json_encode($data_array);
		}
	}
	
	if(isset($_POST['action']) && $_POST['action'] == 'EDIT_APPOINTMENT'){
		foreach($_POST as $key => $value){
			${$key} = htmlentities($value);
		}
		
		
		if($data = $appointment->updateAppointment($id, $description, $appointment_date)){
			echo 'Appointment updated successfully';
		}
	}
	
	if(isset($_POST['action']) && $_POST['action'] == 'GET_APPOINTMENTS'){
		if($appointments = $appointment->fetchMyAppointments($_SESSION['patientDetails']['id'])){
			$output = '';
			
			$today = date('l, iS F Y');
			foreach($appointments as $r){
				$d = date('l, iS F Y', strtotime($r->appointment_date));
				
				$class = $today == $d ? 'class = "active"' : '';
				
				$dots = strlen($r->description) > 60 ? '...': '';
				
				$output .= '<tr ' . $class . '>
								<td>#' . $r->appointment_id . '</td>
								<td>' . $r->name . '</td>
								<td class = "desc">' . substr($r->description,0,60) . $dots  . '</td>
								<td class = "app_date">' . $r->appointment_date . '</td>
								<td>' . $r->date_posted . '</td>
								<td><a href = "" data-toggle = "modal" data-target = "#viewAppointmentModal" data-id= "' . $r->appointment_id . '" title = "view appointment" class = "btn btn-success view_btn"><i class = "fa fa-eye"></i></a></td>
								<td><a href = "" data-toggle = "modal" data-target = "#editAppointmentModal" data-id= "' . $r->appointment_id . '" title = "edit appointment" class = "btn btn-info edit_btn"><i class = "fa fa-edit"></i></a></td>
								<td><a href = "patientAppointments.php?id=' . $r->appointment_id . '" title = "delete appointment" class = "btn btn-danger"><i class = "fa fa-trash"></i></a></td>
							</tr>';
			}
		}else{
			$output = '<tr><td colspan = "6">' . toDangerText($appointment->error()) . '</td></tr>';
		}
		
		echo $output;
	}
?>