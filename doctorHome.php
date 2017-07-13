<?php 
	require_once 'includes/core.inc.php';
	require_once 'includes/doctorSession.inc.php';
	
	
	require_once 'includes/header.inc.php';
?>

<div class = "container">
	
	<input type = "hidden" value = "none" id = "recepient" />
	<div class = "row mine">
		<div class = "col-lg-12">
			<h2>DOCTOR CHAT AREA</h2><br />
		</div>
		<div class= "col-lg-3">
			<div class="panel panel-info">
				<?php
					$count = '0';
					$output = '';
					
					$query = 'SELECT * FROM patients ORDER BY name ASC';
					$statement = $db->_conn->prepare($query);
					try{
						$statement->execute();
						if($count = $statement->rowCount()){
							while($r = $statement->fetch(PDO::FETCH_OBJ)){
								$output .= '<a href="" data-id = "' . $r->id . '" class="list-group-item user final">' . strtoupper($r->name) . '</a>';
							}
						}else{
							$output = '<p class = "list-group-item">NO PATIENTS REGISTERED</p>';
						}
					}catch(PDOException $e){
						
					}
				?>
				
				<div class="panel-heading"><h4 class = "text-center">ALL PATIENTS (<?php echo $count;?>)</h4></div>
				
				<div class = "list-group overflow">
					<?php echo $output; ?>
				</div>
			</div>
		</div>
		
		<div class = "col-lg-6">
			<div class="panel panel-primary">
				<div class="panel-heading"><h4 class = "text-center">CONVERSATION <span class = "username"></span></h4></div>
				<div class = "panel-body overflow messages">
					<p>Please select a contact to start a conversation</p>
				</div>
				<div class = "panel-footer formDiv">
					<form action = "" method = "POST" id = "compose">
						<div class = "form-group">
							<textarea name = "message" class = "form-control" placeholder = "message"></textarea>
							<input type = "hidden" value = "SEND_MESSAGE" name = "action" />
						</div>
						<button type = "submit" class = "btn btn-info" name = "sendMessage">SEND</button>
						<button type = "button" name = "makePrescription" id = "makePrescription" data-toggle="modal" data-target="#makePrescriptionModal" class = "btn btn-success pull-right">GIVE PRESCRIPTION</button>
					</form>
				</div>
				
			</div>
		</div>
		
		<div class= "col-lg-3">
			<div class="panel panel-info">
				<div class="panel-heading"><h4 class = "text-center">ONLINE NOW</h4></div>
				<div class = "list-group overflow online-now"></div>	
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="makePrescriptionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<div class="modal-body">
				<h2>PRESCRIPTION</h2>
				<form action = "" method = "POST" id = "prescriptionForm">
					<div class = "form-group">
						<input type = "hidden" name = "action" value = "GIVE_PRESCRIPTION">
						<textarea name = "prescription" placeholder = "prescription" class = "form-control" rows = "8"></textarea>
					</div>
					<button type = "submit" name = "removePatient" class = "btn btn-danger btn-lg"> GIVE </button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once 'includes/plainFooter.inc.php';?>