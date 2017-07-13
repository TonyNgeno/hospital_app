$(document).ready(function(){
	$('.click').on('click',function(){
		var that = $(this);
		var id = that.data('id');
		
		$('.id').val(id);
	
	});
	
	$('#print').on('click', function(){
		window.print();
	});
});