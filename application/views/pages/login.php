<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Infinity - Bootstrap Admin Template</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Admin, Dashboard, Bootstrap" />
        <link rel="shortcut icon" sizes="196x196" href="<?php echo base_url();?>public/assets/images/logo.png">
            
        <link rel="stylesheet" href="<?php echo base_url();?>public/libs/bower/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>public/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>public/libs/bower/animate.css/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/core.css">
        <link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/misc-pages.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
        <script src="<?php echo base_url();?>public/libs/bower/jquery/dist/jquery.js"></script>
    </head>
    <body class="simple-page">
        <div class="simple-page-wrap">
            <div class="simple-page-logo animated swing">
                <a href="index.html">
                    <span><img class="img-responsive" style="margin: auto;" src="<?php echo base_url();?>public/assets/images/logo.png" /></span>
                   
                </a>
            </div><!-- logo -->
            <div class="simple-page-form animated flipInY" id="login-form">
                <h4 class="form-title m-b-xl text-center">Sign In With Your <br />LaundryLock Account</h4>
                <?php 
                $attributes = array('id' => 'loginForm');
                echo form_open('',$attributes); ?>
                    <div class="form-group">
                        <input id="username" name="username" type="text" class="form-control" placeholder="Username">
                    </div>
                        
                    <div class="form-group">
                        <input id="inputPassword" name="password" class="form-control" placeholder="Password">
                    </div>
                        
                    <div class="form-group m-b-xl">
                        <div class="checkbox checkbox-primary">
                            <input type="checkbox" id="keep_me_logged_in"/>
                            <label for="keep_me_logged_in">Keep me signed in</label>
                        </div>
                    </div>
                    <input type="hidden" id="hidLoginStatus" name="hidLoginStatus" value="" /> 
                    <input type="submit" class="btn btn-primary" value="SING IN">
                <?php echo form_close(); ?>
            </div><!-- #login-form -->
                
            <div class="simple-page-footer">
                <p><a href="password-forget.html">FORGOT YOUR PASSWORD ?</a></p>
                <p>
                    <small>Don't have an account ?</small>
                    <a href="signup.html">CREATE AN ACCOUNT</a>
                </p>
            </div><!-- .simple-page-footer -->
                
                
        </div><!-- .simple-page-wrap -->
        
        <script>
            $(document).ready(function(){/*
                $('#loginForm').on('submit', function(e){
                   if ($('#username').val()=='' || $('#inputPassword').val()==''){
                        $('#errormsg').text('Fill in both fields').show();
                        e.preventDefault();
                    }else{
                        if($('#hidLoginStatus').val() == ""){
                            e.preventDefault();
                            $.ajax({
                               url: "http://biztrack.ph/cms_api/Rest_server/login",
                               type: 'POST',
                               crossOrigin: true,
                               data: "username="+$("#username").val()+"&password="+$("#inputPassword").val(),
                               cache: false,
                               success: function(result) {  
                               $("#hidLoginStatus").val(result);
                               },
                               error: function(result) {
                                   //alert("some error occured, please try again later");
                               }
                               }).done(function(){
                                setTimeout(function() {$("#loginForm").submit();}, 5    00);
                             });
                           
                        }
                    }
              
                });*/
            });
        </script>
    </body>
</html>