<?php
	if(isset($_SESSION['doctorDetails']) && !empty($_SESSION['doctorDetails'])){
		$doctorDetails = $_SESSION['doctorDetails'];
	}else{
		redirectTo('logout.php');
	}

?>