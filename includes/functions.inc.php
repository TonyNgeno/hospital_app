<?php
	function redirectTo($url){
		header("Location: $url");
		exit;
	}
	
	function toSuccessText($text){
		return '<span class = "text-success">' . $text . '</span>';
	}
	
	function toWarningText($text){
		return '<span class = "text-warning">' . $text . '</span>';
	}
	
	function toInfoText($text){
		return '<span class = "text-info">' . $text . '</span>';
	}
	
	function toDangerText($text){
		return '<span class = "text-danger">' . $text . '</span>';
	}
	
	function loggedInDoctor(){
		if(isset($_SESSION['doctorDetails']) && !empty($_SESSION['doctorDetails'])){
			return true;
		}
	}
	
	function loggedInPatient(){
		if(isset($_SESSION['patientDetails']) && !empty($_SESSION['patientDetails'])){
			return true;
		}
	}
	
	function loggedInAdmin(){
		if(isset($_SESSION['adminDetails']) && !empty($_SESSION['adminDetails'])){
			return true;
		}
	}
	
	function niceFormat($timestamp){
		$date = date('l, F jS Y', strtotime($timestamp)) . ', ';
		$time = $date . date('g:iA', strtotime($timestamp));
		return $time;
	}
	
?>