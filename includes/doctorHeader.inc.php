<!doctype html>
<html>
	<head>
		<title>NYAMBENE CLINICAL SERVICES HOME</title>
		<meta charset = "utf-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel = "Shortcut Icon" type = "Image/X-icon" href = "favicon.ico" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/font-awesome.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery-ui.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery-ui.structure.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery-ui.theme.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap-datetimepicker.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/snackbar.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/material.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/me.css" />
		
		<script language = "Javascript" type = "text/javascript" src = "js/jquery-2.1.4.min.js"></script>
	</head>
	<body>
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php" title = "">NYAMBENE</a>
				</div>
				<div class="collapse navbar-collapse" id="collapse1">
					<ul class="nav navbar-nav">
						<li><a href="index.php"><i class = "fa fa-home"></i> HOME</a></li>
						<li><a href="aboutUs.php"><i class = "fa fa-info-circle"></i> ABOUT US</a></li>
						<li><a href="services.php"><i class = "fa fa-gears"></i> SERVICES</a></li>
						<li><a href="careers.php"><i class = "fa fa-pencil"></i> CAREERS</a></li>
						<li><a href="contactUs.php"><i class = "fa fa-phone"></i> CONTACT US</a></li>
					</ul>
						
					<ul class="nav navbar-nav navbar-right" style = "margin-right:0">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class = "fa fa-user"></i> <?php echo strtoupper($doctorDetails['name'])?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="doctorAppointments.php"><i class = "fa fa-calendar"></i> APPOINTMENTS</a></li>
								<li><a href="doctorHome.php"><i class = "fa fa-wechat"></i> CHAT</a></li>
								<li><a href="doctorPrescriptions.php"><i class = "fa fa-list"></i> PRESCRIPTIONS</a></li>
								<li><a href="jobs.php"><i class = "fa fa-suitcase"></i> JOBS</a></li>
								<li><a href="logout.php"><i class = "fa fa-sign-out"></i> LOGOUT</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	