
<?php 
	require_once 'includes/core.inc.php';
	
	if(isset($_POST['login'])){
		foreach($_POST as $key => $value){
			${$key} = $value;
		}
		
		$data = array($username, $password);
		$query = "SELECT * FROM patients WHERE username = ? AND password = ? LIMIT 1";
		
		$statement = $db->_conn->prepare($query);
		try{
			$statement->execute($data);
			if($statement->rowCount()){
				while($r = $statement->fetch(PDO::FETCH_OBJ)){
					$_SESSION['patientDetails'] = array(
						'id' => $r->id,
						'name' => strtoupper($r->name),
						'username' => $r->username
					);
				}
				
				$_SESSION['doctorDetails'] = '';
				$_SESSION['adminDetails'] = '';
				
				redirectTo('patientAppointments.php');
				
			}else{
				$msg = "Invalid username / password combination";
			}
		}catch(PDOException $e){
			$msg = $e->getMessage();
		}
	}
	
	
	require_once 'includes/header.inc.php';
?>

<div class = "container">
	<div class = "row mine">
		<div class = "col-lg-6 col-lg-offset-3">
			<h2>PATIENT LOGIN</h2>
			<p><?php echo $msg;?> &nbsp;</p>
			<form class = "" action = "" method = "POST">
				<div class = "form-group">
					<label for = "username">USERNAME</label>
					<input type = "text" id = "username" placeholder = "username" name = "username" class = "form-control" required />
				</div>
				
				<div class = "form-group">
					<label for = "password">PASSWORD</label>
					<input type = "password" id = "password" placeholder = "password" name = "password" class = "form-control" required />
				</div>
				<button type = "submit" class = "btn btn-info" name = "login">LOGIN <i class = "glyphicon glyphicon-log-in"></i></button>
				<a href = "patientRegistration.php" class = "pull-right">don't have an account? sign up here</a>
			</form>

		</div>
	</div>
</div>

<?php require_once 'includes/plainFooter.inc.php';?>