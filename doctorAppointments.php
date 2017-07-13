<?php 
	require_once 'includes/core.inc.php';
	require_once 'includes/doctorSession.inc.php';
	
	$output = '';
	$msg = '';
	
	if(isset($_GET['id']) && !empty($_GET['id'])){
		$id = htmlentities($_GET['id']);
		if($appointment->deleteAppointment($id)){
			$msg = toSuccessText('Appointment deleted successfully');
		}
	}
	
	if($appointments = $appointment->fetchAppointments()){
		$today = date('l, iS F Y');
		foreach($appointments as $r){
			$d = date('l, iS F Y', strtotime($r->appointment_date));
			
			$class = $today == $d ? 'class = "danger"' : '';
			
			$dots = strlen($r->description) > 50 ? '...': '';
			
			$output .= '<tr ' . $class . '>
							<td>#' . $r->appointment_id . '</td>
							<td>' . $r->name . '</td>
							<td>' . substr($r->description,0,50) . $dots  . '</td>
							<td>' . niceFormat($r->appointment_date) . '</td>
							<td>' . niceFormat($r->date_posted) . '</td>
							<td><a href = "" data-toggle = "modal" data-target = "#viewAppointmentModal" data-id= "' . $r->appointment_id . '" title = "view appointment" class = "btn btn-success view_btn"><i class = "fa fa-eye"></i></a></td>
							<td><a href = "doctorAppointments.php?id=' . $r->appointment_id . '" title = "delete appointment" class = "btn btn-danger"><i class = "fa fa-trash"></i></a></td>
						</tr>';
		}
	}else{
		$output = '<tr><td colspan = "6">' . toDangerText($appointment->error()) . '</td></tr>';
	}
	
	
	require_once 'includes/header.inc.php';
?>

<div class = "container">
	
	<div class = "row mine">
		<div class= "col-lg-12">
			<h2>APPOINTMENTS BOOKED</h2>
			<p><?php echo $msg?> &nbsp;</p>
		
			<table class = "table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>PATIENT</th>
						<th>DESCRIPTION</th>
						<th>APPOINTMENT DATE</th>
						<th>DATE POSTED</th>
						<th>VIEW</th>
						<th>DELETE</th>
					</tr>
				</thead>
				
				<tfoot>
					<tr>
						<th>ID</th>
						<th>PATIENT</th>
						<th>DESCRIPTION</th>
						<th>APPOINTMENT DATE</th>
						<th>DATE POSTED</th>
						<th>VIEW</th>
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

<div class="modal fade" id="viewAppointmentModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id = "appointmentDate"></h4>
			</div>
			<div class="modal-body">
				<h5 id = "appointmentDescription"></h5>
				
			</div>
			<div class = "modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php require_once 'includes/plainFooter.inc.php';?>