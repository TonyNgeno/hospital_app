<?php 
	require_once 'includes/core.inc.php';
	require_once 'includes/doctorSession.inc.php';
	
	$output = '';
	$msg = '';
	
	if(isset($_GET['id']) && !empty($_GET['id'])){
		$id = htmlentities($_GET['id']);
	}else{
		redirectTo('jobs.php');
	}
	
	if(isset($_POST['updateJob'])){
		foreach($_POST as $key => $value){
			${$key} = htmlentities($value);
		}
		
		
		$title = strtoupper($title);
		
		if($job->updateJob($id, $title, $body)){
			$msg = toSuccessText('Job updated successfully');
		}else{
			$msg = toDangerText($job->error());
		}
		
	}
	
	if(!$r = $job->fetchJob($id)){
		redirectTo('jobs.php');
	}
	
	
	require_once 'includes/header.inc.php';
?>

<div class = "container">
	<div class = "row mine">
		<div class= "col-lg-12">
			<h2>EDIT JOB -- <strong><?php echo $r->title?></strong></h2>
			<p><?php echo $msg?> &nbsp;</p>
			<form action = "" method = "POST">
				<div class = "form-group">
					<label>POSITION</label>
					<input type = "text" name = "title" value = "<?php echo $r->title;?>" class = "form-control text-uppercase" placeholder = "position" required />
				</div>
				
				<div class = "form-group">
					<label>DESCRIPTION</label>
					<textarea name = "body" class = "form-control" placeholder = "description" required> <?php echo $r->body;?> </textarea>
				</div>
				
				<button class = "btn btn-success" name = "updateJob" type = "submit">UPDATE JOB</button>
				<a class="btn btn-default" href = "jobs.php">CANCEL</a>
				<a class="btn btn-default" href = "jobs.php?id=<?php echo $r->id;?>">DELETE JOB</a>
			</form>			
		</div>
	</div>
</div>

<?php require_once 'includes/plainFooter.inc.php';?>