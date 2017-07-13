$(document).ready(function(){
	
	var operationsUrl = 'operations.php';
	
	$('.formDiv').hide();
	
	window.fetchMessages = function (recepient){
		var action = 'FETCH_MESSAGES';
		var data = {recepient:recepient, action:action};
		
		$.ajax({
			url: operationsUrl,
			data : data,
			method : 'POST',
			success : function(data){
				$('.messages').html(data);
			},
			error : function(xhr, status, error){
				console.log(xhr.responseText);
			}
		});
	}
	
	window.fetchList = function (type){
		
		var action = 'FETCH_LIST';
		
		$.ajax({
			url: operationsUrl,
			data : {action:action},
			method : 'POST',
			success : function(data){
				$('.online-now').html(data);
				//console.log('getting');
			},
			error : function(xhr, status, error){
				console.log(xhr.responseText);
			}
			
		});
	}
	
	window.updateTime = function (){
		
		var action = 'UPDATE_TIME';
		
		$.ajax({
			url: operationsUrl,
			data : {action:action},
			method : 'POST',
			success : function(data){
				//console.log(data);
			},
			error : function(xhr, status, error){
				console.log(xhr.responseText);
			}
		});
	}
	
	$('#compose').on('submit', function(e){
		e.preventDefault();
		var that = $(this);
		var recepient = $('#recepient').val();
		
		var messages = $('.messages');
		
		$.ajax({
			url : operationsUrl,
			data : that.serialize() + '&recepient=' + recepient,
			method : that.attr('method'),
			success : function(data){
				messages.append(data);
				that.find('textarea').val('');
			},
			error : function(xhr, status, error){
				console.log(xhr.responseText);
			}
		});
		
	});
	
	$(document.body).on('click', '#makePrescription' , function(e){
		var patientId = $('#recepient').val();
	});
	
	$('#prescriptionForm').on('submit', function(e){
		e.preventDefault();
		
		var recepient = $('#recepient').val();
		var that = $(this);
		
		$.ajax({
			url : operationsUrl,
			data : that.serialize() + '&recepient=' + recepient,
			method : that.attr('method'),
			success : function(data){
				alert(data);
				$('#makePrescriptionModal').modal('hide');
			},
			error : function(xhr, status, error){
				console.log(xhr.responseText);
			}
		});
		
		
		
	});
	
	$(document.body).on('click', '.user' , function(e){
		e.preventDefault();
		
		$('.user').removeClass('active');
		
		var that = $(this);
		that.addClass('active');
		
		
		
		var name = ' WITH <strong>' + that.html() + '</strong>';
		
		$('.username').html(name);
		
		var id = that.data('id');
		$('#recepient').val(id);
		$('.messages').html('');
		$('.formDiv').show();
		
	});
	
	setInterval(function(){
		var recepient = $('#recepient').val();
		
		fetchList();
		updateTime();
		
		if(recepient != 'none'){
			fetchMessages(recepient);
		}
	}, 1000);
	
	$('.appointment_date').datetimepicker({
		format: 'yyyy-mm-dd hh:ii:ss', 
		daysOfWeekDisabled : [0,6],
		todayHighlight : true,
		fontAwesome:true
	});
	
	$(document.body).on('click','.view_btn',function(e){
		e.preventDefault();
		
		var that = $(this);
		var id = that.data('id');
		
		$.ajax({
			url: operationsUrl,
			method : 'POST',
			data : {id:id,action:'GET_APPOINTMENT'},
			dataType: 'JSON',
			success : function(data){
				$(data.items).each(function(key, value){
					$('#appointmentDate').html(value.appointment_date);
					$('#appointmentDescription').html(value.description);
				});
			},
			error : function(xhr, status, error){
				alert(xhr.responseText);
			}
		});
	});
	
	$(document.body).on('click','.edit_btn',function(e){
		e.preventDefault();
		
		var that = $(this);
		var id = that.data('id');
		$('#appointmentId').val(id);
		
		
		$.ajax({
			url: operationsUrl,
			method : 'POST',
			data : {id:id,action:'GET_APPOINTMENT'},
			dataType: 'JSON',
			success : function(data){
				$(data.items).each(function(key, value){
					$('#appointment_date').val(value.appointment_date);
					$('#description').val(value.description);
				});
			},
			error : function(xhr, status, error){
				alert(xhr.responseText);
			}
		});
	});
	
	$('#editAppointment').on('submit', function(e){
		e.preventDefault();
		var that = $(this);
		$.ajax({
			url : operationsUrl,
			method : that.attr('method'),
			data : that.serialize(),
			success: function(data){
				$.snackbar({content:data,htmlAllowed:true});
				
				getAppointments();
				$('#editAppointmentModal').modal('hide');
			},
			error : function(xhr,status,error){
				alert(xhr.responseText);
			}
		});
	});
	
	function getAppointments(){
		$.ajax({
			url : operationsUrl,
			method : 'POST',
			data : {action:'GET_APPOINTMENTS'},
			success: function(data){
				$('.dynamic_table').html(data);
			},
			error : function(xhr,status,error){
				alert(xhr.responseText);
			}
		});
	}
	
});