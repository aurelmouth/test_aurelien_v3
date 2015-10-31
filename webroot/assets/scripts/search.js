var Search = function () {
	
	var handleLogin = function() {
		$('.search-form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
					tsBirth: {
	                    date: true
	                }			
	            },

	            messages: {
						
					tsBirth: {
	                    date: "Date de naissance invalide"
	                }
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit 
	                $('.alert-danger', $('.login-form')).show();
	            },

	            submitHandler: function (form) {
					var empty = true;
					$('.search-form input').each(function(){
						if($(this).val())
							empty = false;
					});
					
					if(empty){
						$('#critere_recherche').show();
						return false;
					}else{
						form.submit();
					}
	            }
	        });

	        $('.search-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.search-form').validate().form()) {
	                    $('.search-form').submit();
	                }
	                return false;
	            }
	        });
	}

	

	
    
    return {
        //main function to initiate the module
        init: function () {
        	
            handleLogin();        
	       
        }

    };
	
	

}();