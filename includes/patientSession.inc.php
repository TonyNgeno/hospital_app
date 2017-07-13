<?php
	if(isset($_SESSION['patientDetails']) && !empty($_SESSION['patientDetails'])){
		$patientDetails = $_SESSION['patientDetails'];
	}else{
		redirectTo('logout.php');
	}

?>