<?php 
	require_once 'includes/core.inc.php';
	require_once 'includes/patientSession.inc.php';
	
	$output = '';
	$msg = '';
	
	if(isset($_GET['id']) && !empty($_GET['id'])){
		$id = htmlentities($_GET['id']);
		
		if($appointment->deleteAppointment($id)){
			$msg = toSuccessText('Appointment deleted successfully');
		}
	}
	
	if(isset($_POST['makeAppointment'])){
		foreach($_POST as $key => $value){
			${$key} = htmlentities($value);
		}
		
		if($appointment->addAppointment($patientDetails['id'], $description, $appointment_date)){
			$msg = toSuccessText('Appointment made successfully');
		}else{
			$msg = $toDangerText($appointment->error());
		}
	}
	
	if($appointments = $appointment->fetchMyAppointments($patientDetails['id'])){
		$today = date('l, iS F Y');
		foreach($appointments as $r){
			$d = date('l, iS F Y', strtotime($r->appointment_date));
			
			$class = $today == $d ? 'class = "active"' : '';
			
			$dots = strlen($r->description) > 50 ? '...': '';
			
			$output .= '<tr ' . $class . '>
							<td>#' . $r->appointment_id . '</td>
							<td>' . $r->name . '</td>
							<td class = "desc">' . substr($r->description,0,50) . $dots  . '</td>
							<td class = "app_date">' . niceFormat($r->appointment_date) . '</td>
							<td>' . niceFormat($r->date_posted) . '</td>
							<td><a href = "" data-toggle = "modal" data-target = "#viewAppointmentModal" data-id= "' . $r->appointment_id . '" title = "view appointment" class = "btn btn-success view_btn"><i class = "fa fa-eye"></i></a></td>
							<td><a href = "" data-toggle = "modal" data-target = "#editAppointmentModal" data-id= "' . $r->appointment_id . '" title = "edit appointment" class = "btn btn-info edit_btn"><i class = "fa fa-edit"></i></a></td>
							<td><a href = "patientAppointments.php?id=' . $r->appointment_id . '" title = "delete appointment" class = "btn btn-danger"><i class = "fa fa-trash"></i></a></td>
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
			<h2>APPOINTMENTS BOOKED <button data-toggle = "modal" data-target = "#makeAppointmentModal" class = "pull-right btn btn-primary"> MAKE APPOINTMENT <i class = "fa fa-plus"></i></button></h2>
			<p><?php echo $msg?> &nbsp;</p>
		
			<table class = "table table-border table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>PATIENT</th>
						<th>DESCRIPTION</th>
						<th>APPOINTMENT DATE</th>
						<th>DATE POSTED</th>
						<th>VIEW</th>
						<th>EDIT</th>
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
						<th>EDIT</th>
						<th>DELETE</th>
					</tr>
				</tfoot>
				
				<tbody class = "dynamic_table">
					<?php echo $output;?>
				</tbody>
				
			</table>
			
			
		</div>
	</div>
</div>

<div class="modal fade" id="makeAppointmentModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">MAKE APPOINTMENT</h4>
			</div>
			<div class="modal-body">
				<form action = "" method = "POST">
					<div class = "form-group">
						<label>APPOINTMENT DATE</label>
						<input type = "text" name = "appointment_date" readonly class = "form-control appointment_date" placeholder = "appointment date" required />
					</div>
					
					<div class = "form-group">
						<label>BRIEF DESCRIPTION</label>
						<textarea name = "description" rows = "5" class = "form-control" placeholder = "brief description" required></textarea>
						
					</div>
					
					<button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
					<button class = "btn btn-success" name = "makeAppointment" type = "submit">MAKE APPOINTMENT</button>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="editAppointmentModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">EDIT APPOINTMENT</h4>
			</div>
			<div class="modal-body">
				<form action = "" id = "editAppointment" method = "POST">
					<div class = "form-group">
						<label>APPOINTMENT DATE</label>
						<input type = "text" name = "appointment_date" readonly id = "appointment_date" class = "form-control appointment_date" placeholder = "appointment date" required />
					</div>
					
					<div class = "form-group">
						<label>BRIEF DESCRIPTION</label>
						<textarea name = "description" id = "description" rows = "5" class = "form-control" placeholder = "brief description" required></textarea>
						<input type = "hidden" name = "id" id = "appointmentId" value = "">
						<input type = "hidden" name = "action" value = "EDIT_APPOINTMENT">
					</div>
		
					<button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
					<button class = "btn btn-success" name = "editAppointment" type = "submit">UPDATE APPOINTMENT</button>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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