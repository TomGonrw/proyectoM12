@extends('layouts.loginmaster')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript">
        var onloadCallback = function() {
          grecaptcha.render('google_recaptcha', {
            'sitekey' : '6Lfca-AfAAAAAJnsACL9kSQABa0aHh45w5pdxr1x'
          });
        };
     </script>
</head>
<style>
    .container{
    margin: auto;
  }

  .img3{
    width: 450px;
    height: 200px;
    margin:10px auto;
    display:block;
  }


  .cajaCentral {
    background-color: #1a374d;
    align-content: center;
    padding: 30px;
    color: #f0f0f0;
  }
  
  .text{
      text-align: center;
      color: #f0f0f0;
  }

  .titol{
      text-align: center;
      color: #f0f0f0;

  }
  label {
    text-align: center;
      color: #f0f0f0;
  }

</style>
<body style="background-color: #6ba090;">

    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
       async defer>
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous">
    </script>



    <div class="row" id="primrow" style="margin-left: 0px;margin-right: 0px;">
        <div class="col-md-12 d-flex justify-content-center">
            <a style="margin-top: 50px;">
                <img class="img3" src="http://drive.google.com/uc?export=view&id=1HI1MSYldnQ3HyVUjsYX4W_KI9DLRs4bP">
            </a>       
        </div>
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card" style="margin-top: 2%; margin-bottom:5%;border-color:#1a374d;">
            <div class="card-body shadow-lg" style="padding:30px;background-color: #1a374d;border: 1px solid #1a374d;">
                
                <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
        
                <div class="input-group mb-3">
                    <span class="titol input-group-text border border-0" id="inputGroup-sizing-sm">Email</span>
                    <input name="email" id="email" type="email" class="form-control border border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required autofocus>
                </div>
        
                <div class="input-group mb-3">
                    <span  class="input-group-text border border-0" id="inputGroup-sizing-sm">Password</span>
                    <input name="password" id="password" type="password" class="form-control border border-0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required autofocus>
                </div>
        
                <div class="row form-group text-center" style="display: flex;">
                    <div class="col-md-8">
                        @if (Route::has('password.request'))
                            <a style="color: white;" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Has oblidat la contrasenya?') }}
                            </a>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-secondary shadow-lg" >
                            <span>Log In</span>
                        </button>
                    </div>
                </div>
                
                <div class="block mt-4">
                    <div id="google_recaptcha"></div>
                </div>
                </form>
                    
            <script type="text/javascript">
                var a="no";
                $("#loginForm").validate({
                    submitHandler: function(form) {
                        if (grecaptcha.getResponse()) {
                            form.submit();
                        } 
                        else {
                            if(a=="no"){
                                $(form).append("<p style='color:red'>Por favor completa el captcha!");
                                a="yes";
                            }
                        }
                
                    }
                });          
            </script>
                    
        
                
            </div>
            </div>
        </div>
    </div>
</body>
</html>


