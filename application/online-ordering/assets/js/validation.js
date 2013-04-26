function isSubmittable(formObj) {
	formObj.find();
	//check if any of the other textboxes are filled
	submittable = false;
	if(formObj.find('.submit-enabler').length == 0) {
		return true;
	}
	formObj.find('.submit-enabler').each(function(){
		if($(this).hasClass('numeric-only')) {
			this.value = this.value.replace(/[^0-9\.]/g,'');
		}
		if($.trim($(this).val()) != "" && $.trim($(this).val()) != 0) {
        	submittable = true; // we found one no need to continue searching
        	return false; // break by returning false
        };	            
    });
	return submittable;
}

$(function() {
	$('.numeric-only').ForceNumericOnly();
	
	$('body').bind('enable-submit', function(e, data){
	     data.find('input[type="submit"]').removeAttr('disabled');
	});
	

	$('body').bind('disable-submit', function(e, data){
		 data.find('input[type="submit"]').attr('disabled', 'disabled');
	});
	
	// just enable the submit button on mouseup
	// so users can use autofill
	// of they cut the value then the onsubmit handler will do the validation
	$('.submit-enabler').on('mouseup', function(e) {
		frmObj = $(this).closest('form');
		$(this).trigger('enable-submit', [frmObj]);
	});
	
	$('.submit-enabler').on('keyup blur', function(e){
		frmObj = $(this).closest('form');
		
		if($(this).hasClass('numeric-only')) {
			this.value = this.value.replace(/[^0-9\.]/g,'');
		}
		if($.trim($(this).val()) != "" && $.trim($(this).val()) != 0) {
			$(this).trigger('enable-submit', [frmObj]);			
		} else {
			submitable = isSubmittable(frmObj);			
			if(submittable) {
				$(this).trigger('enable-submit', [frmObj]);
			} else {
				$(this).trigger('disable-submit', [frmObj]);				
			}
		}
	});
	
	$('form.check-submittable').on('submit', function(){
		if(!isSubmittable($(this))) {
			alert('Please fill in all the required fields');
			return false;
		}
	});
});