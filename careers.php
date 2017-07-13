<?php 
	
	require_once 'includes/core.inc.php';
	$output = '';
	

	if($jobs = $job->fetchJobs()){
		foreach($jobs as $j){
			$output .= '<div class = "panel panel-primary">
							<div class = "panel-heading">
								<h3 class="panel-title"><strong>POSITION</strong> : ' . $j->title . '</h3>
							</div>
							
							<div class = "panel-body">
								<p>' . nl2br($j->body) . '</p>
							</div>
							
							<div class = "panel-footer">
								<p><strong>Date posted :</strong> ' . niceFormat($j->date_posted) . '</p>
							</div>
						</div>';
		}
	}else{
		$output = toDangerText($job->error());
	}
	
	require_once 'includes/header.inc.php';
	
?>

<div class="container">
	<div class="row mine" style = "min-height:500px">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h2>JOB OPPORTUNITIES</h2><br/>
			
			<?php echo $output; ?>
		</div>
	</div>
</div>
  <?php require_once 'includes/footer.inc.php';?>
