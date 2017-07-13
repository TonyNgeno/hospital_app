<!doctype html>
<html>
	<head>
		<title class = "no-print">NYAMBENE CLINICAL SERVICES HOME</title>
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
		<nav class = "navbar navbar-inverse navbar-fixed-top">
			<div class = "container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="admin.php" title = "">ADMIN</a>
				</div>
				
				<div class="collapse navbar-collapse" id="collapse1">
					<ul class="nav navbar-nav navbar-right" style = "margin-right:0">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class = "fa fa-user"></i> <?php echo $adminDetails['username']?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="doctorHome.php"><i class = "fa fa-dashboard"></i> DASHBOARD</a></li>
								<li><a href="logout.php"><i class = "fa fa-sign-out"></i> LOGOUT</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		