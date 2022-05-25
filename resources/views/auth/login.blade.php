<head>
    <title>reCAPTCHA demo: Explicit render after an onload callback</title>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
       async defer>
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
       var onloadCallback = function() {
         grecaptcha.render('google_recaptcha', {
           'sitekey' : '6Lfca-AfAAAAAJnsACL9kSQABa0aHh45w5pdxr1x'
         });
       };
    </script>
 </head>
<x-guest-layout>
  <x-jet-authentication-card>
      <x-slot name="logo">
          <x-jet-authentication-card-logo />
      </x-slot>
      <x-jet-validation-errors class="mb-4" />

      @if (session('status'))
          <div class="mb-4 font-medium text-sm text-green-600" >
              {{ session('status') }}
          </div>
      @endif

      <form method="POST" action="{{ route('login') }}" id="loginForm">
          @csrf

                 
          <div>
              <x-jet-label for="email" value="{{ __('Email') }}" />
              <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus  />
          </div>

          <div class="mt-4">
              <x-jet-label for="password" value="{{ __('Password') }}" />
              <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
          </div>

          <div class="block mt-4">
              <label for="remember_me" class="flex items-center">
                  <x-jet-checkbox id="remember_me" name="remember" />
                  <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
              </label>
          </div>

          <div class="flex items-center justify-end mt-4">
              @if (Route::has('password.request'))
                  <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                      {{ __('Forgot your password?') }}
                  </a>
              @endif
       
              <x-jet-button class="ml-4">
                  {{ __('Log in') }}
              </x-jet-button>
              
          </div>
          <div class="block mt-4">
              <div id="google_recaptcha"></div>
          </div>
      </form>
  </x-jet-authentication-card>
</x-guest-layout>

  <script type="text/javascript">
      var a="no";
      $("#loginForm").validate({
          submitHandler: function(form) {
              if (grecaptcha.getResponse()) {
                  form.submit();
              } 
              else {
                  if(a=="no"){
                      $("#email").css("border","solid red 4px");
                      a="yes";
                  }
              }
         
          }
       });          
    </script>


