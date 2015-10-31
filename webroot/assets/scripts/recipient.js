

var Recipient = function () {

	var handleLogin = function() {
		$('.login-form,.search-form,.create-form, #coupon_fid_form').validate({
	            errorElement: 'span', //default input error message container
	            errorClass: 'help-block', // default input error message class
	            focusInvalid: false, // do not focus the last invalid input
	            rules: {
	                ORIGINE_Id: {
	                    required: (creation) ? true : false
	                },
	                sLastName: {
	                    required: true
	                },
					
					sFirstName: {
	                    required: true
	                },
					
					tsBirth: {
	                    required: true,
						date : true
	                },
					
					Code_Postal: {
	                    required: true,
						minlength : function(element) {
									return ($('#Pays').val() == 'France' || $('#Pays').val() == '') ? 5 : 1;
								},
						maxlength : function(element) {
									return ($('#Pays').val() == 'France' || $('#Pays').val() == '') ? 5 : 99;
								}
	                },
					
					Num_INSEE: {
						digits : true,
						minlength: 13,
						maxlength: 13
	                },

					annee_imposition: {
						number : true,
						min: 1990,
						max: 2050
	                },
					
					sEmailPreAff: {
	                    required: true
	                },
					
					Montant_Versement_Exceptionnel: {
	                    number: true
	                },
					
					Montant_Versement: {
	                    number: true
	                },
					
					montant_versement: {
						number: true
	                },
					
					nom_simulation: {
	                    required: true
	                },
					
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
	                ORIGINE_Id: {
	                    required: "Catégorie d'origine manquante"
	                },
	                sLastName: {
	                    required: "Nom manquant"
	                },
					
					sFirstName: {
	                    required: "Prénom Manquant"
	                },
					
					tsBirth: {
	                    required: "Date de naissance manquante",
						date : "Date de naissance invalide"
	                },
					
					Code_Postal: {
	                    required: "Code postal manquant",
						minlength : function(element) {
									return ($('#Pays').val() == 'France' || $('#Pays').val() == '') ? "Le code postal doit être sur 5 caractères" : "";
								},
						maxlength : function(element) {
									return ($('#Pays').val() == 'France' || $('#Pays').val() == '') ? "Le code postal doit être sur 5 caractères" : "";
								}
	                },
					
					Num_INSEE: {
						digits : "Le n° Sécurité Sociale doit être un nombre",
						minlength: "Le n° Sécurité Sociale doit être sur 13 chiffres",
						maxlength: "Le n° Sécurité Sociale doit être sur 13 chiffres"
	                },
					
					annee_imposition: {
						number : "l'année d'imposition doit être une année ",
						min: "L'année d'imposition semble incorrecte",
						max: "L'année d'imposition semble incorrecte"
	                },
					
					sEmailPreAff: {
	                    required: "L'Email doit être renseigné"
	                },
					
					Montant_Versement_Exceptionnel: {
	                    number: "Saisissez un montant valide. ex : \"100.00\""
	                },
					
					Montant_Versement: {
	                    number: "Saisissez un montant valide. ex : \"100.00\""
	                },
					
					montant_versement: {
						number: "Saisissez un montant valide. ex : \"100.00\""
	                },
					
					nom_simulation: {
	                    required: "Nom de simulation obligatoire"
	                },
					
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
	                $('.alert-danger', $('.login-form')).show();
	            },



	            success: function (label) {
	                label.closest('.form-group').removeClass('has-error');
	                label.remove();
	            },


	            submitHandler: function (form) {
					form.submit();
					
	            }
	        });

	        $('.login-form input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('.login-form').validate().form()) {
	                    $('.login-form').submit();
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