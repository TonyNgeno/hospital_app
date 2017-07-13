<?php 
	require_once 'includes/core.inc.php';
	
	if(isset($_POST['register'])){
		foreach($_POST as $key => $value){
			${$key} = $value;
		}
		
		if($password === $cPassword){
			$query = "INSERT INTO patients(name, sex, age, username, password) VALUES(?,?,?,?,?)";
		
			$statement = $db->_conn->prepare($query);
			
			$name = strtoupper($name);
			
			$data = array($name, $sex, $age, $username, $password);
			
			try{
				$statement->execute($data);
				if($statement->rowCount()){
					$_SESSION['patientDetails'] = array(
						'id' => $db->_conn->lastInsertId(),
						'name' => $name ,
						'username' => $username
					);
					
					redirectTo('patientHome.php');
					
				}else{
					$msg = "Patient not added, please try again";
				}
				
			}catch(PDOException $e){
				$msg = $e->getMessage();
			}
		}else{
			$msg = "Password and confirm password must match";
		}
	}
	
	
	require_once 'includes/header.inc.php';
?>

<div class = "container">
	<div class = "row mine">
		<div class = "col-lg-6 col-lg-offset-3">
			<h2>REGISTER PATIENT</h2>
			<p><?php echo $msg;?> &nbsp;</p>
			<form class = "" action = "" method = "POST">
				<div class = "form-group">
					<label for = "name">PATIENT NAME</label>
					<input type = "text" id = "name" placeholder = "patient name" name = "name" class = "form-control text-uppercase" required />
				</div>
				
				<div class = "form-group">
					<label for = "sex">SEX</label>
					<div class = "radio-group">
						<input type = "radio" name = "sex" checked = "chacked" value = "MALE" /> MALE
						<input type = "radio" name = "sex" value = "FEMALE" /> FEMALE
					</div>
					
				</div>
				
				<div class = "form-group">
					<label for = "age">AGE</label>
					<input type = "number" max = "140" min = "0" id = "age" placeholder = "age" name = "age" class = "form-control" required />
				</div>
				
				<div class = "form-group">
					<label for = "username">USERNAME</label>
					<input type = "text" id = "username" placeholder = "username" name = "username" class = "form-control text-lowercase" required />
				</div>
				
				<div class = "form-group">
					<label for = "password">PASSWORD</label>
					<input type = "password" id = "password" placeholder = "password" name = "password" class = "form-control" required />
				</div>
				
				<div class = "form-group">
					<label for = "cPassword">CONFIRM PASSWORD</label>
					<input type = "password" id = "cPassword" placeholder = "confirm password" name = "cPassword" class = "form-control" required />
				</div>
				
				<button type = "submit" class = "btn btn-info" name = "register">REGISTER <i class = "glyphicon glyphicon-log-in"></i></button>
				<a href = "patientLogin.php" class = "pull-right">already have an account? sign in here</a>
			</form>

		</div>
	</div>
</div>

<?php require_once 'includes/footer.inc.php';?>