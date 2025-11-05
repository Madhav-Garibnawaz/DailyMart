
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Glossary Shop - Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #4CAF50 0%, #ffffff 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .login-card {
      width: 100%;
      max-width: 400px;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      background-color: #fff;
    }
    .login-card h3 {
      text-align: center;
      margin-bottom: 1.5rem;
      font-weight: bold;
      color: #2e7d32;
    }
    .form-control:focus {
      border-color: #4CAF50;
      box-shadow: 0 0 0 0.2rem rgba(76,175,80,0.25);
    }
    .btn-success {
      background-color: #4CAF50;
      border: none;
    }
    .btn-success:hover {
      background-color: #388e3c;
    }
    .extra-links {
      text-align: center;
      margin-top: 1rem;
    }
    .extra-links a {
      text-decoration: none;
      color: #4CAF50;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <h3>Login to Glossary Shop</h3>

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
      <button type="submit" class="btn btn-success w-100">Login</button>
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