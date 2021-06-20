<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dental | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="src/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">  
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"> </script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
  

</head>
 
 
  <body style="background-color: #6ba1b0 ;margin-top: 50px;">   

    <div class="container-fluid" style="width: 700px; ">
 

    <form class="well form-horizontal text-center" action="register-process.php" method="post"  id="contact_form">  
<fieldset> 
 <center><h3><b><img src="src/dist/img/icon.png" style="width:60px;height: 60px;"> Dental Clinic Appointment System </b></h3></center> 
<!-- Form Name --> <hr style="border: 1px solid black;">
<center><h4>Register a new account</h4></center><br><br>
<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-3 control-label">Full Name</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="fullname" placeholder="Enter your full name" class="form-control"  type="text">
    </div>
  </div>
</div>

  
<!-- Text input-->

<div class="form-group">
  <label class="col-md-3 control-label">Username</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="username" placeholder="Username" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-3 control-label" >Password</label> 
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
       <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="password" id="password" placeholder="Password" class="form-control"  type="password">
    </div>
  </div>
  
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-3 control-label" >Confirm Password</label> 
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon" id="message"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control"  type="password">
    </div>
  </div>
</div>

<!-- Text input-->

<!-- <div class="form-group">
  <label class="col-md-3 control-label">Gender</label>  
  <div class="col-md-8 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <select class="form-control" name="gender">
    <option value="">Select your gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>
  
    </div>
  </div>
</div> -->

<!-- Text input-->

 <div class="form-group">
  <label class="col-md-3 control-label">E-Mail</label>  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="Enter your e-mail address" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-3 control-label">Phone No.</label>  
    <div class="col-md-8 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phoneNo" placeholder="ex: 0123456789" class="form-control" type="text">
    </div>
  </div>
</div>
  
 <!-- <div class="form-group">
    <label class="col-md-3 control-label">Address</label>  
      <div class="col-md-8 inputGroupContainer">
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
        <textarea name="address" placeholder="Enter your home address" class="form-control textarea"  type="text"></textarea>
      </div>
  </div>
</div>  -->

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-info" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspRegister <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>
 <center><a href="login-patient.php" class="text-center">I already have an account</a></center>
</fieldset>
</form>
</div>
    </div>

 



 
 
    </div><!-- /.container -->
      </form>

       

     
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->

</body>

<script>
     $('#password, #confirm_password').on('keyup', function() {

        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Match').css('color', 'green');
        } else
            $('#message').html('Not Match').css('color', 'red');
    });

  $(document).ready(function() {
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
             fullname: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please enter your full name'
                    }
                }
            },
             gender: {
                validators: {
                    notEmpty: {
                        message: 'Please select your gender'
                     }
                    
                    
                }
            },
       username: {
                validators: {
                     
                    notEmpty: {
                        message: 'Please provide your username'
                    }
                }
            },
       password: {
                validators: {
                     
                    notEmpty: {
                        message: 'Please provide your password'
                    }
                }
            },
      confirm_password: {
                validators: {
                    
                    notEmpty: {
                        message: 'Please confirm your password'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please provide your email address'
                    },
                    emailAddress: {
                        message: 'Please enter a valid email address'
                    }
                }
            },
            phoneNo: {
                validators: {
                  stringLength: {
                        min: 10, 
                        max: 11,
                    },
                    notEmpty: {
                        message: 'Please provide your phone number.'
                     }
                }
            },

             address: {
                validators: {
                    notEmpty: {
                        message: 'Please provide your home address'
                     }
                    
                    
                }
            },
      
                
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
</script>

</html>
