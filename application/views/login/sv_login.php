
  <form id="loginf" class="login-form" action="<?php echo site_url("login/valida/"); ?>" method="post">
    <h3 class="form-title">Login</h3>
    
    <div  id="submit-error" class="alert alert-danger display-hide">Ingresa Email y Passwoord. </div>
    <div  id="submit-success" class="alert alert-success display-hide">Lorem ipsum salam dolor lorem salam!</div>                      
    
    
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Email</label>
      <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="username" id="username"/>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Password</label>
      <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password"/>
    </div>
    <div class="form-actions">
      <button type="submit" class="btn btn-success uppercase">Login</button>
     
      <a href="javascript:;" id="forget-password" class="forget-password">Recuperar Password?</a>
    </div>
    <div class="login-options">
      <h4>Login con </h4>
      <ul class="social-icons">
        <li> 
          <a class="social-icon-color facebook" data-original-title="facebook"  href="<?php echo $link;?>"></a>           
        </li>
        <li>
          <a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
        </li>
        <li>
          <a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
        </li>       
      </ul>
    </div>
    <div class="create-account">
      <p>
        <a href="javascript:;" id="register-btn" class="uppercase">Registro</a>
      </p>
     Rendered in <strong>{elapsed_time}
    </div>
  </form>
  
  <form class="forget-form" action="index.html" method="post">
    <h3>Reset Password</h3>
    <p>
       Introduce tu correo para resetear el password.
    </p>
    <div class="form-group">
      <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
    </div>
    <div class="form-actions">
      <button type="button" id="back-btn" class="btn btn-default">Regresar</button>
      <button type="submit" class="btn btn-success uppercase pull-right">Enviar</button>
    </div>
  </form>
  
  <form class="register-form" action="index.html" method="post">
    <h3>Registro</h3>
   
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Nombre Completo</label>
      <input class="form-control placeholder-no-fix" type="text" placeholder="Nombre Completo" name="fullname"/>
    </div>
    <div class="form-group">      
      <label class="control-label visible-ie8 visible-ie9">Email</label>
      <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email"/>
    </div>
           
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Password</label>
      <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Otra vez el password</label>
      <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Otra vez el password" name="rpassword"/>
    </div>   
    <div class="form-actions">
      <button type="button" id="register-back-btn" class="btn btn-default">Regresar</button>
      <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Enviar</button>
    </div>
  </form>


  <script>
      
      var Login = function() {

    var handleLogin = function() {

        $('.login-form').validate({
            errorElement: 'span', 
            errorClass: 'help-block',             
            rules: {
                username: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength : 4,
                    maxlength : 15
                }
            },

            messages: {
                username: {
                    required: "Es requerido.",
                    email : "Debe ser Correo"
                },
                password: {
                    required: "Es requerido.",
                    minlength   : 'Debe ser mayor a 4 caracteres.',
                    maxlength   : 'Debe ser menor a 15 caracteres.',
                }
            },

           invalidHandler: function(event, validator) { //display error alert on form submit   
                $('.alert-danger', $('.login-form')).show();
            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
                    
            submitHandler: function(form) {               
               $.ajax({                    
                    type: "POST",
                    url: $(form).attr('action'),
                    dataType: "json",
                    data: {
                        email: $('#username').val(),
                        pass : $('#password').val()
                    },                
                     success: function(response) {                                                  
                          if (response.login_success == true) {                            
                            window.location.href = '<?php echo site_url("login/admin/"); ?>';
                          } else {
                            $('#submit-success').hide();
                            $('#submit-error').html(response.mensaje).show();
                          }
                        },
                        error: function(response) {
                            $('#submit-success').hide();
                            $('#submit-error').html('<?php echo "Hubo en error en la petición"; ?>').show();
                        }
                })
            },
                
        });

        // $('.login-form input').keypress(function(e) {
        //     if (e.which == 13) {
        //         if ($('.login-form').validate().form()) {
        //             $('.login-form').submit(); //form validation success, call ajax form submit
        //         }
        //         return false;
        //     }
        // });
    }

    var handleForgetPassword = function() {
        $('.forget-form').validate({
            errorElement: 'span', 
            errorClass: 'help-block', 
            focusInvalid: false, 
            ignore: "",
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                email: {
                    required: "Email is required."
                }
            },

            invalidHandler: function(event, validator) { //display error alert on form submit   

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                error.insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function(form) {
                form.submit();
            }
        });

        $('.forget-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.forget-form').validate().form()) {
                    $('.forget-form').submit();
                }
                return false;
            }
        });

        jQuery('#forget-password').click(function() {
            jQuery('.login-form').hide();
            jQuery('.forget-form').show();
        });

        jQuery('#back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.forget-form').hide();
        });

    }

    var handleRegister = function() {


        $('.register-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {

                fullname: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },               
                username: {
                    required: true
                },
                password: {
                    required: true
                },
                rpassword: {
                    equalTo: "#register_password"
                },

                tnc: {
                    required: true
                }
            },
           
            invalidHandler: function(event, validator) { //display error alert on form submit   

            },

            highlight: function(element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },

            errorPlacement: function(error, element) {
                if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  
                    error.insertAfter($('#register_tnc_error'));
                } else if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },

            submitHandler: function(form) {
                form.submit();
            }
        });

        $('.register-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.register-form').validate().form()) {
                    $('.register-form').submit();
                }
                return false;
            }
        });

        jQuery('#register-btn').click(function() {
            jQuery('.login-form').hide();
            jQuery('.register-form').show();
        });

        jQuery('#register-back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.register-form').hide();
        });
    }

    return {
        //main function to initiate the module
        init: function() {
            handleLogin();
            handleForgetPassword();
            handleRegister();
        }

    };

}();
  </script>

 <script>
    jQuery(document).ready(function() {                         
    Login.init();        
    });
</script>