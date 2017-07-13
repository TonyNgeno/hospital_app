<?php 
	if(loggedInDoctor()){
		$doctorDetails = $_SESSION['doctorDetails'];
		require_once 'doctorHeader.inc.php';
	}elseif(loggedInPatient()){
		$patientDetails = $_SESSION['patientDetails'];
		require_once 'patientHeader.inc.php';
	}elseif(loggedInAdmin()){
		$adminDetails = $_SESSION['adminDetails'];
		require_once 'adminHeader.inc.php';
	}else{
		require_once 'defaultHeader.inc.php';
	}
	
?>