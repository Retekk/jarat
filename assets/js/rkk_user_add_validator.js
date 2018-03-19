$( "#rkk_user_form" ).validate({
					  rules: {
						user_email: {
							required: true,
							emailExist: true
						},
						user_name: {
							required: true,
							userExist: true
						},
						user_pass: {
							required: true
						},
						user_perm: {
							required: true
						}
					  }
					});
					jQuery.validator.addMethod("emailExist", function(value, element){
						console.log(value);
						var isValid;
						$.ajax({
							type: "POST",
							async: false,
							data: {
								user_email: value,
							},
							url: "/rkk_user/checkmail",
							success: function(data)
							{
								if(data === 'EMAIL_EXISTS')
								{
									console.log('EMAIL_EXISTS');
									isValid = false;
								}
								else{
									console.log('EMAIL_OK');
									isValid = true;
								}
							}
						});
						return isValid;
					}, "Ez az email cím már regisztrálva van");
					jQuery.validator.addMethod("userExist", function(value, element){
						var isValid;
						$.ajax({
							type: "POST",
							async: false,
							data: {
								user_name: value,
							},
							url: "/rkk_user/checkuser",
							success: function(data)
							{
								if(data === 'USER_EXISTS')
								{
									isValid = false;
								}
								else{
									isValid = true;
								}
							}
						});
						return isValid;
					}, "Ez a felhasználó már regisztrálva van");