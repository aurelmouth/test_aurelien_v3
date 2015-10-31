

var Event = function () {

	var handleLogin = function() {
		$('.event-form').validate({
				ignore: "input[type='hidden']",
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
					
					LIEU_Id: {
	                    required: true
	                },
					
					MODE_EVENEMENT_Id: {
	                    required: true
	                },
					
					MOTIF_EVENEMENT_Id: {
	                    required: true
	                },
					
					RESULTAT_EVENEMENT_Id: {
	                    required: function(element) {
									return $('select[name="MOTIF_EVENEMENT_Id"]').val() == 1 || $('select[name="MOTIF_EVENEMENT_Id"]').val() == 3 || $('select[name="MOTIF_EVENEMENT_Id"]').val() == 7 || $('select[name="MOTIF_EVENEMENT_Id"]').val() == 17;
								}
	                }
					
	            },

	            messages: {
					
					LIEU_Id: {
	                    required: "Lieu d'événement manquant"
	                },
					
					MODE_EVENEMENT_Id: {
	                    required: "Mode d'événement manquant"
	                },
					
					MOTIF_EVENEMENT_Id: {
	                    required: "Motif d'événement manquant"
	                },
					
					RESULTAT_EVENEMENT_Id: {
	                    required: "Résultat d'événement manquant"
	                }
					
	            },

	            invalidHandler: function (event, validator) { //display error alert on form submit 
	                $('.alert-danger', $('.event-form')).show();
	            },



	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },


	            submitHandler: function (form) {
					form.submit();
					
	            }
	        });

	        $('.event-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.event-form').validate().form()) {
	                    $('.event-form').submit();
	                }
	                return false;
	            }
	        });
	}

	

	
    
    return {
        init: function () {
        	
            handleLogin();        
	       
        }

    };

}();