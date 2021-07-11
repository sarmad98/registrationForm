<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Barber | Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('Assets/Admin/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('Assets/Admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('Assets/Admin/dist/css/adminlte.min.css');?>">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('Assets/Admin/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Custom Button -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
  <link rel="icon" href="<?php echo base_url()?>assets/images/logo12.png" sizes="32x32" type="image/png">
  
</head>
<body class="" style="background-color:black;">
<div class="container" style="margin-top:100px;">    
<div class="row">

        <div class="col-sm-2">
        </div>

        <div class="col-sm-4">
            <img src="<?php echo base_url();?>assets/images/logo12.png" style="border-radius:100px;"/>
        </div>
        <div class="col-sm-5">
        <div class="alert alert-danger print-error-msg" style="display:none"></div>
        <div class="alert alert-success print-success-msg" style="display:none"></div>
          <form method="post" id="regForm">
          
            <div class="input-group mb-3">
                  <input type="text" name ="name"class="form-control" placeholder="Name" required/>
                  <div class="input-group-append">
                      <div class="input-group-text">
                      <span class="fas fa-pen"></span>
                      </div>
                  </div>
              </div>
          
              <div class="input-group mb-3">
                <input type="email" name ="email"class="form-control" placeholder="Email" required/>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
    
              <div class="input-group mb-3">
                <input type="number" name ="phone"class="form-control" placeholder="Phone No." required/>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
              </div>
              
              <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required/>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
    
              <div class="input-group mb-3">
                <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password" required/>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
    
              <div class="row">
                <div class="col-2">
                  
                </div>
                <!-- /.col -->
                <div class="col-10">
                  <button type="submit" class="btn btn-secondary btn-block"><b>Register</b></button>

                </div>
                <!-- /.col -->
            </div>
          </form>
          <div class="row">
            <div class="col-2"></div>
              <!-- /.col -->
              <div class="col-10">
                <a href="javascript:void(0);" onclick="myFunction();" type="button" class="btn btn-success btn-block mt-2"><b>Check</b></a>
              </div>
              <!-- /.col -->
          </div> 
        </div>
        <div class="col-sm-1">
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('Assets/Admin/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('Assets/Admin/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('Assets/Admin/dist/js/adminlte.min.js')?>"></script>
</body>
</html>
<script>

  // Registration
    $(document).ready(function(e) {
      $("#regForm").on('submit', (function(e) {
          e.preventDefault();
          
          $.ajax({
              url: "<?php echo base_url(); ?>Registration/registerUser",
              type: "POST",
              data: new FormData(this),
              contentType: false,
              cache: false,
              processData: false,
              dataType: 'json',
              success: function(data) {
                  if($.isEmptyObject(data.error)){
                  $(".print-error-msg").css('display','none');
                  $(".print-success-msg").css('display','block');
                  $(".print-success-msg").html(data.success);
                  $("#regForm")[0].reset();
                }else{
                  $(".print-success-msg").css('display','none');
                  $(".print-error-msg").css('display','block');
                  $(".print-error-msg").html(data.error);
                }
              },
              fail: function() {
                  alert('Fail');
              }
          });
      }));
    });

    // Checking User
    var url = "<?php echo base_url();?>";
    function myFunction() {
      var email = prompt("Please Enter Email");
      if(email == ""){
        alert('Please Enter The Email');
      }
      else{        
        var xhttp;    
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
            }
        };
        email = email.trim();
        xhttp.open("GET", url + "Registration/checkUser?email=" + email , true);
        xhttp.send();
      }
    }


</script>