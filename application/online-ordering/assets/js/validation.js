function isSubmittable() {
	//check if any of the other textboxes are filled
	submittable = false;
	$('.submit-enabler').each(function(){
		this.value = this.value.replace(/[^1-9\.]/g,'');
        if($(this).val() != "") {
        	submittable = true; // we found one no need to continue searching
        	return false; // break by returning false
        };	            
    });
	return submittable;
}

$(function() {
	$('.numeric-only').ForceNumericOnly();
	
	$('body').bind('enable-submit', function(e){
	     $('input[type="submit"]').removeAttr('disabled');
	});
	

	$('body').bind('disable-submit', function(e){
	     $('input[type="submit"]').attr('disabled', 'disabled');
	});
	
	$('.submit-enabler').on('keyup blur mouseleave', function(e){
		this.value = this.value.replace(/[^1-9\.]/g,'');

		if($.trim($(this).val()) != "") {
			$(this).trigger('enable-submit');			
		} else {
			submitable = isSubmittable();			
			if(submittable) {
				$(this).trigger('enable-submit');
			} else {
				$(this).trigger('disable-submit');				
			}
		}
	});
	
	$('form.check-submittable').on('submit', function(){
		if(!isSubmittable()) {
			alert('Please fill in all the required fields');
			return false;
		}
	});
});