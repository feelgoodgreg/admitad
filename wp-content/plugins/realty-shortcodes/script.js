(function( $ ) {
	
	$(document).ready(function(){
		$('#add-realty-form').submit(function(e){
			e.preventDefault();
			
			var form = $(this);
			var data = form.serialize() + '&action=add_realty';
			
			$.ajax({
				url: realtyajax.url,
				data: data,
				type: 'post',
				dataType: 'json',
				success: function(result){
					form.find("input[type=text], textarea").val("");
					if(result.status){
						form.after('<div class="alert alert-success" role="alert">'+result.message+'</div>');
					}else{
						form.after('<div class="alert alert-error" role="alert">'+result.message+'</div>');
					}
				}
			});
			
		});
	});
	
})(jQuery);
