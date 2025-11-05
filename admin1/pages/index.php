<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login / Register</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome for Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #f5f5f5;
      font-family: "Poppins", sans-serif;
    }
    .auth-box {
      max-width: 450px;
      width: 100%;
      background: #fff;
      border-radius: 10px;
      padding: 35px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      text-align: center;
    }
    .logo {
      font-size: 32px;
      font-weight: 700;
      color: #28a745;
      margin-bottom: 10px;
    }
    .logo span {
      color: #ff6f3c;
    }
    .auth-box p {
      color: #666;
    }
    .nav-pills .nav-link {
      border-radius: 30px;
      color: #333;
      font-weight: 500;
    }
    .nav-pills .nav-link.active {
      background-color: #28a745 !important;
      color: #fff !important;
    }
    .btn-success {
      background-color: #28a745;
      border: none;
    }
    .btn-success:hover {
      background-color: #218838;
    }
    .btn-orange {
      background-color: #ff6f3c;
      color: #fff;
      border: none;
    }
    .btn-orange:hover {
      background-color: #e65a27;
      color: #fff;
    }
    a {
      color: #28a745;
      text-decoration: none;
    }
    a:hover {
      color: #ff6f3c;
    }
    .form-control {
      padding: 12px;
      border-radius: 8px;
    }
  </style>
</head>
<body>

  <div class="auth-box">
    <!-- Logo / Heading -->
    <div class="logo">Dai<span>ly</span>Ma<span>rt</span></div>
    <p class="mb-4">Welcome back to fresh organic goodness!</p>

    <!-- Pills navs -->
    <ul class="nav nav-pills nav-justified mb-3" id="authTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="tab-login" data-bs-toggle="pill" data-bs-target="#pills-login"
          type="button" role="tab" aria-controls="pills-login" aria-selected="true">Sign In</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="tab-register" data-bs-toggle="pill" data-bs-target="#pills-register"
          type="button" role="tab" aria-controls="pills-register" aria-selected="false">Sign Up</button>
      </li>
    </ul>
    <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content">
      <!-- Login -->
      <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <?php
          include('connect.php');
          if(isset($_POST['btnlogin'])){
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $q = mysqli_query($con,"select * from admin_master where email='$email' and password='$pass'");

            $row = mysqli_fetch_array($q);
            $cnt = mysqli_num_rows($q);
                        
            if ($cnt > 0) {
              session_start();
              $_SESSION['aname'] = $row[1];
              $_SESSION['aemail'] = $email;
              echo "<script>
                  Swal.fire('Login Successful', 'Welcome back, Admin!', 'success')
                  .then(function(){
                      window.location.href = 'dashboard.php';
                  });
              </script>";
            } else {
                // Error alert                
                echo "<script>
                    Swal.fire('Login Failed', 'Wrong email or password', 'error');
                </script>";
            }
          }
        ?>
        <form method="post">
          <div class="mb-3">
            <input type="email" id="loginName" class="form-control" name="email" placeholder="Email or Username" required />
          </div>

          <div class="mb-3">
            <input type="password" id="loginPassword" class="form-control" name="pass" placeholder="Password" required />
          </div>

          <div class="row mb-4">
            <div class="col-md-6 d-flex justify-content-center">
              <div class="form-check mb-3 mb-md-0">
                <input class="form-check-input" type="checkbox" id="loginCheck" />
                <label class="form-check-label" for="loginCheck"> Remember me </label>
              </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center">
              <a href="#!">Forgot password?</a>
            </div>
          </div>

          <button type="submit" class="btn btn-success btn-block mb-4 w-100" name="btnlogin">Sign In</button>

          <div class="text-center">
            <p>Not a member? 
              <a href="#" onclick="switchTab('tab-register')">Sign up here</a>
            </p>
          </div>
        </form>
      </div>

      <!-- Register -->
      <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
        <?php
          include('connect.php');
          if(isset($_POST['btnregister'])){
            $fname = $_POST['fullname'];
            $email = $_POST['email'];
            $pass = $_POST['password'];

            $q = mysqli_query($con, "insert into admin_master values('', '$fname', '$email', '$pass', 0)");

            if ($q){
                // Success alert
                echo "<script>
                    Swal.fire('Registration Successful', 'Admin account created!', 'success')
                    .then(function(){
                        window.location.href = 'admin_login.php';
                    });
                </script>";
            } else {
                // Error alert
                echo "<script>
                    Swal.fire('Registration Failed', 'Something went wrong!', 'error');
                </script>";
            }
          }
        ?>
        <form method="post">
          <div class="mb-3">
            <input type="text" id="registerName" class="form-control" name="fullname" placeholder="Full Name" required />
          </div>

          <div class="mb-3">
            <input type="email" id="registerEmail" class="form-control" name="email" placeholder="Email" required />
          </div>

          <div class="mb-3">
            <input type="password" id="registerPassword" class="form-control" name="password" placeholder="Password" required />
          </div>

          <div class="mb-3">
            <input type="password" id="registerRepeatPassword" class="form-control" name="repeat_password" placeholder="Repeat Password" required />
          </div>

          <div class="form-check d-flex justify-content-center mb-4">
            <input class="form-check-input me-2" type="checkbox" id="registerCheck" required />
            <label class="form-check-label" for="registerCheck">
              I agree to the <a href="#">Terms</a>
            </label>
          </div>

          <button type="submit" class="btn btn-orange btn-block mb-3 w-100" name="btnregister">Create Account</button>

          <div class="text-center">
            <p>Already have an account? 
              <a href="#" onclick="switchTab('tab-login')">Sign in here</a>
            </p>
          </div>
        </form>
      </div>
    </div>
    <!-- Pills content -->
  </div>

  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Script to switch tabs -->
  <script>
    function switchTab(tabId) {
      let triggerEl = document.getElementById(tabId);
      let tab = new bootstrap.Tab(triggerEl);
      tab.show();
    }
  </script>
</body>
</html>
