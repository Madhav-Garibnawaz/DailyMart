<?php
// --- login.php ---

// Start session
session_start();

// Example: Check login after form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 👉 Replace this with your DB check (dummy example here)
    $validEmail = "test@example.com";
    $validPassword = "12345";

    if ($email === $validEmail && $password === $validPassword) {
        $_SESSION['user'] = $email;
        header("Location: dashboard.php"); // Redirect to dashboard page
        exit;
    } else {
        $error = "Invalid email or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Form</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .login-card {
      width: 100%;
      max-width: 400px;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      background-color: #fff;
    }
    .login-card h3 {
      text-align: center;
      margin-bottom: 1.5rem;
      font-weight: bold;
      color: #333;
    }
    .form-control:focus {
      border-color: #2575fc;
      box-shadow: 0 0 0 0.2rem rgba(37,117,252,0.25);
    }
    .btn-primary {
      background-color: #2575fc;
      border: none;
    }
    .btn-primary:hover {
      background-color: #1b5ed9;
    }
    .extra-links {
      text-align: center;
      margin-top: 1rem;
    }
    .extra-links a {
      text-decoration: none;
      color: #2575fc;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <h3>Login</h3>
    
    <!-- Error Message -->
    <?php if (!empty($error)) { ?>
      <div class="alert alert-danger text-center"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST" action="">
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">Remember me</label>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>
      <div class="extra-links">
        <p class="mt-3"><a href="#">Forgot Password?</a></p>
        <p>Don't have an account? <a href="register.php">Sign Up</a></p>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>