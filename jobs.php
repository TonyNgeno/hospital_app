<?php 
	require_once 'includes/core.inc.php';
	require_once 'includes/doctorSession.inc.php';
	
	$output = '';
	$msg = '';
	
	if(isset($_GET['id']) && !empty($_GET['id'])){
		$id = htmlentities($_GET['id']);
		if($job->deleteJob($id)){
			$msg = toSuccessText('Job deleted successfully');
		}
	}
	
	if(isset($_POST['addJob'])){
		foreach($_POST as $key => $value){
			${$key} = htmlentities($value);
		}
		
		
		$title = strtoupper($title);
		
		if($job->addJob($title, $body)){
			$msg = toSuccessText('Job added successfully');
		}else{
			$msg = toDangerText($job->error());
		}
		
	}
	
	if($jobs = $job->fetchJobs()){
		foreach($jobs as $r){
			$dots = strlen($r->body) > 80 ? '...': '';
			
			$output .= '<tr>
							<td>#' . $r->id . '</td>
							<td>' . $r->title . '</td>
							<td>' . substr($r->body,0,80) . $dots  . '</td>
							<td>' . $r->date_posted . '</td>
							<td><a href = "editJob.php?id=' . $r->id . '" title = "edit job" class = "btn btn-info"><i class = "fa fa-edit"></i></a></td>
							<td><a href = "jobs.php?id=' . $r->id . '" title = "delete job" class = "btn btn-danger"><i class = "fa fa-trash"></i></a></td>
						</tr>';
		}
	}else{
		$output = '<tr><td colspan = "6">' . toDangerText($job->error()) . '</td></tr>';
	}
	
	
	require_once 'includes/header.inc.php';
?>

<div class = "container">
	<div class = "row mine">
		<div class= "col-lg-12">
			<h2>JOBS <button data-toggle = "modal" data-target = "#addJobModal" class = "pull-right btn btn-primary">ADD JOB <i class = "fa fa-plus"></i></button></h2>
			<p><?php echo $msg?> &nbsp;</p>
		
			<table class = "table table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>POSITION</th>
						<th>DESCRIPTION</th>
						<th>DATE POSTED</th>
						<th>EDIT</th>
						<th>DELETE</th>
					</tr>
				</thead>
				
				<tfoot>
					<tr>
						<th>ID</th>
						<th>POSITION</th>
						<th>DESCRIPTION</th>
						<th>DATE POSTED</th>
						<th>EDIT</th>
						<th>DELETE</th>
					</tr>
				</tfoot>
				
				<tbody>
					<?php echo $output;?>
				</tbody>
				
			</table>
			
			
		</div>
	</div>
</div>

<div class="modal fade" id="addJobModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">ADD JOB</h4>
			</div>
			<div class="modal-body">
				<form action = "" method = "POST">
					<div class = "form-group">
						<label>POSITION</label>
						<input type = "text" name = "title" class = "form-control text-uppercase" placeholder = "position" required />
					</div>
					
					<div class = "form-group">
						<label>DESCRIPTION</label>
						<textarea name = "body" class = "form-control" placeholder = "description" required></textarea>
					</div>
					
					<button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
					<button class = "btn btn-success" name = "addJob" type = "submit">ADD JOB</button>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php require_once 'includes/plainFooter.inc.php';?>