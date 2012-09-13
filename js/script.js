
$(document).ready(function(){

	// Validate
	// http://bassistance.de/jquery-plugins/jquery-plugin-validation/
	// http://docs.jquery.com/Plugins/Validation/
	// http://docs.jquery.com/Plugins/Validation/validate#toptions
	
		$('#contact-form').validate({
	    rules: {
	      fullname: {
	        minlength: 8,
	        required: true
	      },
		  username: {
	        minlength: 4,
	        required: true
	      },
		  password: {
	        minlength: 5,
	        required: true
	      },
		  confirmpassword: {
	        required: true
	      },
		  fileField: {
		    required: true
		  },
		  street: {
	        minlength: 2,
	        required: true
	      },
		  city: {
	        minlength: 2,
	        required: true
	      },
		  province: {
	        minlength: 2,
	        required: true
	      },
		  cnum: {
		    minlength: 11,
		    required: true
		  },
		  gender: {
		    required: true
		  },
		  status: {
		    required: true
		  },
		  nationality: {
	        minlength: 2,
	        required: true
	      },
		  bio: {
	        required: true
	      }
	    },
		messages:{
					fullname:"Enter your first and last name.",
					username:"Enter your username.",
					bio:"About Yourself.",
					password:{
						required:"Enter your password.",
						minlength:"Password must be minimum of 5 characters."
					},
					confirmpassword:{
						required:"Confirm your password.",
					},
					cnum:{
						required:"Enter your contact number.",
						minlength:"Must be minimum of 11 digit."
					}
				},
	    highlight: function(label) {
	    	$(label).closest('.control-group').addClass('error');
	    },
	    success: function(label) {
	    	label
	    		.text('OK!').addClass('valid')
	    		.closest('.control-group').addClass('success');
	    }
	  });
	  
}); // end document.ready