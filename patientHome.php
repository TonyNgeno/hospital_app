<?php 
	require_once 'includes/core.inc.php';
	require_once 'includes/patientSession.inc.php';
	
	require_once 'includes/header.inc.php';
?>

<div class = "container">
	
	<input type = "hidden" value = "none" id = "recepient" />
	<div class = "row mine">
		<div class = "col-lg-12">
			<h2><?php echo $patientDetails['name'];?></h2><br />
		</div>
		<div class= "col-lg-3">
			<div class="panel panel-info">
				<?php
					$count = '0';
					$output = '';
					
					$query = 'SELECT * FROM doctors ORDER BY name ASC';
					$statement = $db->_conn->prepare($query);
					try{
						$statement->execute();
						if($count = $statement->rowCount()){
							while($r = $statement->fetch(PDO::FETCH_OBJ)){
								$output .= '<a href="" data-id = "' . $r->id . '" class="list-group-item user">DR. ' . strtoupper($r->name) . '</a>';
							}
						}else{
							$output = '<p class = "list-group-item">NO PATIENTS REGISTERED</p>';
						}
					}catch(PDOException $e){
						
					}
				?>
				
				<div class="panel-heading"><h4 class = "text-center">ALL DOCTORS (<?php echo $count;?>)</h4></div>
				
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
<?php require_once 'includes/plainFooter.inc.php';?>