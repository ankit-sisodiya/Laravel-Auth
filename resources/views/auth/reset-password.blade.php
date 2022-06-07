<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-pass-reset-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 May 2022 04:46:32 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Reset Password | PHPPOETS - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />


</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="#" class="d-inline-block auth-logo">
                                <img src="{{asset('img/logo.png')}}" alt="" height="60" width="200">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">Admin & Dashboard Template</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Forgot Password?</h5>
                                    <p class="text-muted">Reset password with PHPPOETS</p>

                                    <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#0ab39c" class="avatar-xl"></lord-icon>

                                </div>

                                <div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
                                    Enter your email and instructions will be sent to you!
                                </div>
                                <div class="alert alert-danger mb-xl-0" style="display:none;" role="alert">
                                    <strong>Please Enter Email! </strong>!
                                </div>
                                <div class="alert alert-success" style="display:none;" role="alert">
                                    <strong> OTP Sent On your Email! </strong>!
                                </div>
                                <div class="p-2">
                                    <div class="otp_details">
                                        <div class="mb-4">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email address">
                                            @error('email')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4 otp_verify" style="display:none;">
                                            <label class="form-label">OTP</label>
                                            <input type="number" min='4' max='4' class="form-control" id="otp" placeholder="Enter Valid OTP">
                                        
                                        </div>

                                        <div class="text-center mt-4">
                                            <button class="btn btn-success w-100" id="otp_send" type="button">Send OTP</button>
                                            <button class="btn btn-success w-100" style="display:none;" id="otp_verified" type="button">OTP Verify</button>
                                        </div>
                                    </div>        
                                    <form method="POST" class="needs-validation" style="display:none;" id="changePassword" action="" novalidate enctype="multipart/form-data">
                                    @csrf
                                        <input type="hidden" name="email" value="" id="email_change">
                                        <div class="mb-4">
                                            <label class="form-label">Password</label>                                           
                                            <input type="password" name="password" id="password" class="form-control" required="">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Confirm Password</label>                                           
                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                        </div>

                                        <div class="text-center mt-4">
                                            <button class="btn btn-success w-100" value="1" type="submit" id="submit_password">Update</button>
                                        </div>
                                    </form><!-- end form -->
                                </div>
                            </div>
                            <div class="mt-4 text-center">
                                <p class="mb-0">Wait, I remember my password... <a href="{{ url('/') }}" class="fw-semibold text-primary text-decoration-underline"> Login </a> </p>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->


                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> by PHPPOETS IT SOLUTIONS PVT LTD
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- particles js -->
    <script src="assets/libs/particles.js/particles.js"></script>

    <!-- particles app js -->
    <script src="assets/js/pages/particles.app.js"></script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/default/auth-pass-reset-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 May 2022 04:46:32 GMT -->
</html>


<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/form-validation.init.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).bind("contextmenu",function(e){
  return false;
    });
    function myFunction() {
        var x = document.getElementById("confirm_password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
   $(document).ready(function(){  

        $("input").on("keypress", function(e) {
            if (e.which === 32 && !this.value.length)
                e.preventDefault();
        });

        $("#otp_send").on("click", function(){
            var email = $("#email").val();
            if(email == ''){
                $(".alert-danger").text('Enter Email!'); 
                $(".alert-danger").css('display','block'); 
            }
            $("#otp_send").attr("disabled", true);
            $("#otp_send").text("Please Wait");
            $.ajax({
                url: "{{url('Otp-Send')}}",
                type: "POST",
                data: {
                    email: email,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                   if(result == 1){
                        $(".alert-success").text('OTP Sent!'); 
                        $(".alert-success").css('display','block'); 
                        $(".otp_verify").css('display','block');
                        $("#otp_send").css('display','none');
                        $("#otp_verified").css('display','block'); 
                        $("#email").attr("readonly", true); 
                       
                        
                   }
                   if(result == 0){
                       $(".alert-danger").text('Enter Valid Email'); 
                        $(".alert-danger").css('display','block'); 
                   }
                   if(result == 3){
                       $(".alert-danger").text('Enter Valid Email'); 
                        $(".alert-danger").css('display','block'); 
                   }

                }
            });
        }); 

        $("#otp_verified").on("click", function(){
            var email = $("#email").val();
            var otp = $("#otp").val();
            if(email == ''){
                $(".alert-danger").text('Enter Email!'); 
                $(".alert-danger").css('display','block'); 
            }
            if(otp == ''){
                $(".alert-danger").text('Enter OTP!'); 
                $(".alert-danger").css('display','block'); 
            }
            $("#otp_verified").attr("disabled", true);
            $.ajax({
                url: "{{url('Otp-Verify')}}",
                type: "POST",
                data: {
                    email: email,
                    otp: otp,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                   if(result == 1){
                        $(".alert-success").text('OTP Verified!'); 
                        $(".alert-success").css('display','block'); 
                        $(".otp_verify").css('display','none');
                        $("#otp_send").css('display','none');
                        $("#otp_verified").css('display','none'); 
                        $(".otp_details").css('display','none');  
                        $("#changePassword").css('display','block');  
                        $(".alert-danger").css('display','none'); 
                        $("#email_change").val(email);  
                        
                   }
                   if(result == 0){
                       $(".alert-danger").text('OTP Not Verified ! Try Again.'); 
                        $(".alert-danger").css('display','block'); 
                        $(".alert-success").css('display','none'); 
                        $("#otp_verified").attr("disabled", false);
                   }
                   if(result == 3){
                       $(".alert-danger").text('Enter Valid Email'); 
                        $(".alert-danger").css('display','block'); 
                   }

                }
            });
        }); 


    });
$(document).ready(function(){ 
  $("#changePassword").validate({
      rules: {
      password: {
            required: true,
            minlength: 5
        },
        confirm_password: {
            required: true,
            minlength: 5,
            equalTo: "#password"
        } 
    },    
   // $("#submit_password").attr("disabled", true);
      submitHandler: function(form) {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
        $.ajax({
          type: "POST",
          url: '{{ route('Update-Password') }}',
          data:  new FormData(form),
          contentType: false,
          cache: false,
          processData:false,
          success:function(data)
          {
            if(data == 1){
                $(".alert-success").text('Password Changed Successfully!'); 
                $(".alert-success").css('display','block'); 
                $(".alert-danger").css('display','none'); 
                var delay = 700;
                var url = "{{ url('/') }}";
                setTimeout(function() { $("#load").hide();
                                    window.location = url;
                                }, delay);
            }
            if(data == 0){
                $(".alert-danger").text('Password Not Changed'); 
                $(".alert-danger").css('display','block'); 
                $(".alert-success").css('display','none'); 
            }
          }
        });
      }
    });
});
</script>