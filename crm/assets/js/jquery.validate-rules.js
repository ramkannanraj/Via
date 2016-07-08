	$(document).ready(function() {
			
				jQuery.validator.addMethod("lettersonly", function(value, element) {
					return this.optional(element) || /^[a-z]+$/i.test(value);
					}, "Please enter only letters"); 
					
			// validate contact form on keyup and submit
			
			


$("#cardTopup").validate({
			
			 errorElement: "span", 
			 
			 
			//set the rules for the fild names
			rules: {
			
				amnt: {
					required: true,
					digits: true,
					minlength: 3,
					maxlength:7,
					
				},
				
				},
				
				messages: {
			
				amnt: {
					required: "Amount is required",
					digits:"Amount is not valid",
				},
				},

              errorPlacement: function(error, element) {               
					error.appendTo(element.parent());     
				}

		});
		
		
$("#beneTransaction").validate({
			
			 errorElement: "span", 
			 
			 
			//set the rules for the fild names
			rules: {
			
				amount: {
					required: true,
					digits: true,
					minlength: 3,
					maxlength:7,
					
				},
				
				},
				
				messages: {
			
				amount: {
					required: "Amount is required",
					digits:"Amount is not valid",
				},
				},

              errorPlacement: function(error, element) {               
					error.appendTo(element.parent());     
				}

		});
		
		$("#mmidTransaction").validate({
			
			 errorElement: "span", 
			 
			 
			//set the rules for the fild names
			rules: {
			
				amount: {
					required: true,
					digits: true,
					minlength: 3,
					maxlength:7,
					
				},
				
				},
				
				messages: {
			
				amount: {
					required: "Amount is required",
					digits:"Amount is not valid",
				},
				},

              errorPlacement: function(error, element) {               
					error.appendTo(element.parent());     
				}

		});
		
		$("#transAction").validate({
			
			 errorElement: "span", 
			 
			 
			//set the rules for the fild names
			rules: {
			
				amount: {
					required: true,
					digits: true,
					minlength: 3,
					maxlength:7,
					
				},
				
				},
				
				messages: {
			
				amount: {
					required: "Amount is required",
					digits:"Amount is not valid",
				},
				},

              errorPlacement: function(error, element) {               
					error.appendTo(element.parent());     
				}

		});
		
		
	});