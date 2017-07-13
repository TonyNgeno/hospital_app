
<?php 
	require_once 'includes/core.inc.php';
	require_once 'includes/adminSession.inc.php';
	$msg = '';
	
	if(isset($_POST['removeDoctor'])){
		$id = $_POST['id'];
		
		$query = 'DELETE FROM doctors WHERE id = ?';
		$statement = $db->_conn->prepare($query);
		
		$data = [$id];
		
		try{
			$statement->execute($data);
			if($statement->rowCount()){
				$msg = 'DOCTOR removed';
			}
		}catch(PDOException $e){
			$msg = $e->getMessage();
		}
	}
	
	if(isset($_POST['removePatient'])){
		$id = $_POST['id'];
		
		$query = 'DELETE FROM patients WHERE id = ?';
		$statement = $db->_conn->prepare($query);
		
		$data = [$id];
		
		try{
			$statement->execute($data);
			if($statement->rowCount()){
				$msg = 'PATIENT removed';
			}
		}catch(PDOException $e){
			$msg = $e->getMessage();
		}
	}
	
	
	require_once 'includes/header.inc.php';
?>

<div class = "container">
	<input type = "hidden" value = "none" id = "recepient" />
	<div class = "row mine">
		<div class= "col-lg-12">
			<h2 class = "no-print">ADMIN DASHBOARD <span class = "pull-right"><button type = "button" class = "btn btn-info no-print" id = "print"> <i class = "fa fa-print"></i> PRINT REPORT</button></span></h2>
			<p><?php echo $msg;?> &nbsp;</p>
			
			<div class="panel panel-danger">
				<?php
					$count = '0';
					$output = '';
					
					$query = 'SELECT * FROM doctors ORDER BY name ASC';
					$statement = $db->_conn->prepare($query);
					try{
						$statement->execute();
						if($count = $statement->rowCount()){
							$output .= '<table class = "table table-bordered">
											<tr>
												<th>DOCTOR ID</th>
												<th>DOCTOR NAME</th>
												<th>SEX</th>
												<th>AGE</th>
												<th>USERNAME</th>
												<th>LAST ACTIVE</th>
												<th></th>
											</tr>';
							
							while($r = $statement->fetch(PDO::FETCH_OBJ)){
								$output .= '<tr>
												<td>#' . $r->id . '</td>
												<td>' . $r->name . '</td>
												<td>' . $r->sex . '</td>
												<td>' . $r->age . '</td>
												<td>' . $r->username . '</td>
												<td>' . $r->lastActive . '</td>
												<td>
													<button class = "btn btn-danger pull-right click no-print" data-id = "' . $r->id . '" data-toggle="modal" data-target="#removeDoctor"><i class = "fa fa-times"></i> REMOVE DOCTOR </button>
												</td>
											</tr>';
							}
							
							$output .= '</table>';
						}else{
							$output = '<p class = "list-group-item">NO DOCTORS REGISTERED</p>';
						}
					}catch(PDOException $e){
						
					}
				?>
					
				<div class="panel-heading"><h4 class = "text-center">REGISTERED DOCTORS  (<?php echo $count;?>)</h4></div>
				<?php echo $output; ?>
				
			</div>
		</div>
		
		
		
		<div class= "col-lg-12">
			<div class="panel panel-primary">
				<?php
					$count = '0';
					$output = '';
					
					$query = 'SELECT * FROM patients ORDER BY name ASC';
					$statement = $db->_conn->prepare($query);
					try{
						$statement->execute();
						if($count = $statement->rowCount()){
							$output .= '<table class = "table table-bordered">
											<tr>
												<th>DOCTOR ID</th>
												<th>DOCTOR NAME</th>
												<th>SEX</th>
												<th>AGE</th>
												<th>USERNAME</th>
												<th>LAST ACTIVE</th>
												<th></th>
											</tr>';
							
							while($r = $statement->fetch(PDO::FETCH_OBJ)){
								$output .= '<tr>
												<td>#' . $r->id . '</td>
												<td>' . $r->name . '</td>
												<td>' . $r->sex . '</td>
												<td>' . $r->age . '</td>
												<td>' . $r->username . '</td>
												<td>' . $r->lastActive . '</td>
												<td>
													<button class = "btn btn-danger pull-right click no-print" data-id = "' . $r->id . '" data-toggle="modal" data-target="#removePatient"><i class = "fa fa-times"></i> REMOVE PATIENT </button>
												</td>
											</tr>';
							}
							
							$output .= '</table>';
						}else{
							$output = '<p class = "list-group-item">NO PATIENTS REGISTERED</p>';
						}
					}catch(PDOException $e){
						
					}
				?>
					
				<div class="panel-heading"><h4 class = "text-center">REGISTERED PATIENTS  (<?php echo $count;?>)</h4></div>
				<?php echo $output; ?>
				
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="removeDoctor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<div class="modal-body text-center">
				<h2>ARE YOU SURE YOU WANT TO REMOVE DOCTOR?</h2>
				<form action = "" method = "POST">
					<div class = "form-group">
						<input type = "hidden" name = "id" class = "id" value = "">
						<button type = "submit" name = "removeDoctor" class = "btn btn-danger btn-lg"> YES </button>
					</div>
					
					<button type="button" class="btn btn-default" data-dismiss="modal"> NO </button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="removePatient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
			<div class="modal-body text-center">
				<h2>ARE YOU SURE YOU WANT TO REMOVE PATIENT?</h2>
				<form action = "" method = "POST">
					<div class = "form-group">
						<input type = "hidden" name = "id" class = "id" value = "">
						<button type = "submit" name = "removePatient" class = "btn btn-danger btn-lg"> YES </button>
					</div>
					
					<button type="button" class="btn btn-default" data-dismiss="modal"> NO </button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require_once 'includes/plainFooter.inc.php';?>