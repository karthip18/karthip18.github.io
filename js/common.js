jQuery(document).ready(function(e){
	jQuery("#register").on('submit',(function(e) {
		jQuery('.msg').html('');
		e.preventDefault();
		var name 		= jQuery('#name').val();
		var email 		= jQuery('#email').val();
		var jobtitle 	= jQuery('#jobtitle').val();
		var organization = jQuery('#organization').val();
		var phone 		= jQuery('#phone').val();
		var formData = {name:name, email:email, jobtitle:jobtitle, organization:organization, phone:phone, type:'get_in_touch' }; //Array 
		jQuery.ajax({
			url : 'ajax.php',
			type: 'POST',
			data : formData,
			success: function(data, textStatus, jqXHR) {
				jQuery(".responce_msg").css("display","block");
				if(data=='1') {
					jQuery('#name').val('');
					jQuery('#email').val('');
					jQuery('#jobtitle').val('');
					jQuery('#organization').val('');
					jQuery('#phone').val('');
					window.location.href = "thankyou.html";
					/*jQuery('#contact_response').html('<font color="white"><strong>Thank you for submitting your request.</strong></font>');
					jQuery("#contact_response").fadeOut(5000);*/
				}
				else {
					alert('Sorry! There is an error while submitting your request')
					//jQuery(".responce_msg").css("display","none");
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
		 
			}
		});
	}));
});