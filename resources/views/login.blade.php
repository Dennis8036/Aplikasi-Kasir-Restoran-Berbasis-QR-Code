<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RoyalUI Admin</title>
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="shortcut icon" href="../../images/" />
  
  <!-- Google reCAPTCHA -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <style>
    #offline-captcha {
      display: none;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
         <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">

              <div class="d-flex flex-column align-items-center justify-content-center mb-3">
                                                    <?php if (!empty($setting->logo_login)): ?>
<img src="{{ asset('images/img/' . $setting->logo_login) }}" alt="Login Icon"
     class="img-fluid mb-3 logo-login" style="max-width: 105px;">

                                    <?php endif; ?>
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="post" action="{{ asset('Home/aksilogin') }}">
                 @csrf
                <div class="form-group">
                  <input type="username" class="form-control form-control-lg" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                </div>
                
                <!-- Online CAPTCHA -->
                <div id="online-captcha" class="g-recaptcha" data-sitekey="6LdTGyEqAAAAAGjNpTsgDaXlfPsHLdzinrmy9vOw"></div>

                <!-- Offline CAPTCHA -->
                <div id="offline-captcha">
                  <label for="offline-captcha-answer">What is <span id="captcha-question"></span>?</label>
                  <input type="text" name="captcha_answer" id="offline-captcha-answer" class="form-control">
                  <input type="hidden" name="correct_captcha_answer" id="correct-captcha-answer">
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                   
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="{{ asset('Home/register') }}" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/todolist.js"></script>

  <script>
    function isOnline() {
      return window.navigator.onLine;
    }

    function generateOfflineCaptcha() {
      const num1 = Math.floor(Math.random() * 10) + 1;
      const num2 = Math.floor(Math.random() * 10) + 1;
      document.getElementById('captcha-question').innerText = num1 + " + " + num2;
      document.getElementById('correct-captcha-answer').value = num1 + num2;
    }

    if (isOnline()) {
      document.getElementById('offline-captcha').style.display = 'none';
      document.getElementById('online-captcha').style.display = 'block';
    } else {
      document.getElementById('offline-captcha').style.display = 'block';
      document.getElementById('online-captcha').style.display = 'none';
      generateOfflineCaptcha();
    }

    document.querySelector('form').addEventListener('submit', function (event) {
      if (isOnline()) {
        var recaptchaResponse = grecaptcha.getResponse();
        if (recaptchaResponse.length === 0) {
          event.preventDefault();
          alert('Please complete the CAPTCHA.');
        }
      } else {
        const userAnswer = document.getElementById('offline-captcha-answer').value;
        const correctAnswer = document.getElementById('correct-captcha-answer').value;
        if (parseInt(userAnswer) !== parseInt(correctAnswer)) {
          event.preventDefault();
          alert('Incorrect CAPTCHA answer.');
        }
      }
    });
  </script>
</body>

</html>
