<?php 
	
	session_start();
	
	require_once 'functions.inc.php';
	
	$classes = ['DB', 'Job', 'Appointment'];
	
	foreach($classes as $class){
		if(file_exists('includes/classes/'. $class . '.php')){
			spl_autoload_register(function ($class) {
				require 'classes/'. $class . '.php';
			});
		}
	}
	
	$msg = "";
	$db = new DB;
	$job = new Job;
	$appointment = new Appointment;
?>