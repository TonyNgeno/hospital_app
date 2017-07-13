
<?php 
	require_once 'includes/core.inc.php';
	require_once 'includes/patientSession.inc.php';
	$msg = '';
	
	require_once 'includes/header.inc.php';
?>

<div class = "container">
	<input type = "hidden" value = "none" id = "recepient" />
	<div class = "row mine">
		<div class= "col-lg-12">
			<h2 class = "no-print"> MY PRESCRIPTIONS <span class = "pull-right"><button type = "button" class = "btn btn-info no-print" id = "print"> <i class = "glyphicon glyphicon-print"></i> PRINT PRESCRIPTIONS</button></span></h2><br />
			<p><?php echo $msg;?> &nbsp;</p>	
			<div class="panel panel-danger">
				<?php
					$count = '0';
					$output = '';
					
					$query = 'SELECT prescriptions.id,prescriptions.prescription, prescriptions.date,
									 doctors.name
									 FROM prescriptions 
									 LEFT JOIN doctors
									 ON doctors.id = prescriptions.doctorid 
									 WHERE prescriptions.patientid = ' . $patientDetails['id'] . '
									 ORDER BY prescriptions.date DESC';
					$statement = $db->_conn->prepare($query);
					try{
						$statement->execute();
						if($count = $statement->rowCount()){
							$output .= '<table class = "table table-bordered">
											<tr>
												<th>PRESCRIPTION ID</th>
												<th>DOCTOR NAME</th>
												<th>PRESCRIPTION</th>
												<th>DATE GIVEN</th>
											</tr>';
							
							while($r = $statement->fetch(PDO::FETCH_OBJ)){
								$output .= '<tr>
												<td>#' . $r->id . '</td>
												<td>' . $r->name . '</td>
												<td>' . $r->prescription . '</td>
												<td>' . niceFormat($r->date) . '</td>
											</tr>';
							}
							
							$output .= '</table>';
						}else{
							$output = '<p class = "list-group-item">NO PRESCRIPTIONS GIVEN</p>';
						}
					}catch(PDOException $e){
						
					}
				?>
					
				<div class="panel-heading"><h4 class = "text-center">PRESCRIPTIONS  (<?php echo $count;?>)</h4></div>
				<?php echo $output; ?>
				
			</div>
		</div>
	</div>
</div>

<?php require_once 'includes/plainFooter.inc.php';?>