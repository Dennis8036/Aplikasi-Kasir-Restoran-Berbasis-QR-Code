<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Ganti Password</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e2e6ea;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .auth-container {
      width: 100%;
      max-width: 400px;
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }

    .auth-container .logo {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .auth-container .logo img {
      max-width: 100px;
    }

    .auth-container h4 {
      text-align: center;
      font-size: 1.5em;
      margin-bottom: 10px;
      font-weight: 600;
    }

    .auth-container h6 {
      text-align: center;
      font-weight: 400;
      color: #6c757d;
      margin-bottom: 30px;
    }

    .form-group input {
      border-radius: 5px;
      padding-right: 40px; /* Make space for the button */
    }

    .input-group .btn {
      border-radius: 0 5px 5px 0;
    }

    .btn-confirm {
      background-color: #007bff;
      color: #fff;
      font-size: 1em;
      font-weight: bold;
      width: 100%;
      border-radius: 5px;
    }

    .btn-confirm:hover {
      background-color: #0056b3;
    }

    .alert {
      margin-top: 20px;
    }

    .footer-links {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="auth-container">
    <div class="logo">
      <?php if (!empty($setting->logo_login)): ?>
        <img src="{{ asset('images/img/' . $setting->logo_login) }}" alt="Login Icon">
      <?php endif; ?>
    </div>
    <h4>Change Password</h4>
    <h6 class="font-weight-light">Please update your password.</h6>

    <?php if (session()->has('error')): ?>
      <div class="alert alert-danger" role="alert">
        <?= session('error') ?>
      </div>
    <?php endif; ?>

    <?php if (session()->has('success')): ?>
      <div class="alert alert-success" role="alert">
        <?= session('success') ?>
      </div>
    <?php endif; ?>

    <form method="post" action="{{ asset('Home/aksi_changepass') }}">
      @csrf
      <div class="form-group mb-3">
        <label for="inputOldPassword" class="form-label">Old Password</label>
        <div class="input-group">
          <input type="password" class="form-control" id="inputOldPassword" name="old" required>
          <button class="btn btn-outline-secondary" type="button" id="toggleOldPassword">
            <i class="fas fa-eye-slash" id="iconOldPassword"></i>
          </button>
        </div>
      </div>

      <div class="form-group mb-3">
        <label for="inputNewPassword" class="form-label">New Password</label>
        <div class="input-group">
          <input type="password" class="form-control" id="inputNewPassword" name="new" required>
          <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
            <i class="fas fa-eye-slash" id="iconNewPassword"></i>
          </button>
        </div>
      </div>

      <button type="submit" class="btn btn-confirm">Confirm</button>
    </form>

    <div class="footer-links">
      <a href="{{ asset('Home/dashboard')}}" class="text-primary">Back to Home</a>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Fungsi untuk toggle visibility password
    function togglePasswordVisibility(inputId, iconId) {
        var passwordField = document.getElementById(inputId);
        var icon = document.getElementById(iconId);

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
    }

    // Event listener untuk tombol toggle password
    document.getElementById('toggleOldPassword').addEventListener('click', function () {
        togglePasswordVisibility('inputOldPassword', 'iconOldPassword');
    });

    document.getElementById('toggleNewPassword').addEventListener('click', function () {
        togglePasswordVisibility('inputNewPassword', 'iconNewPassword');
    });

    // SweetAlert untuk notifikasi
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session('success') }}',
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ session('error') }}',
        });
    @endif
</script>

</body>

</html>
