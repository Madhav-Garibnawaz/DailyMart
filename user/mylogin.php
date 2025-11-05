<?php
// --- register.php ---

// Start session
session_start();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm'];

    if ($password !== $confirm) {
        $error = "Passwords do not match!";
    } else {
        // 👉 Normally here you’d save the data into a database
        // Example only (not secure):
        $_SESSION['user'] = $email;
        $success = "Registration successful! You can now <a href='login.php'>login</a>.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign Up</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: linear-gradient(135deg, #ff512f 0%, #dd2476 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .signup-card {
      width: 100%;
      max-width: 450px;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
      background-color: #fff;
    }
    .signup-card h3 {
      text-align: center;
      margin-bottom: 1.5rem;
      font-weight: bold;
      color: #333;
    }
    .form-control:focus {
      border-color: #dd2476;
      box-shadow: 0 0 0 0.2rem rgba(221,36,118,0.25);
    }
    .btn-primary {
      background-color: #dd2476;
      border: none;
    }
    .btn-primary:hover {
      background-color: #c2185b;
    }
    .extra-links {
      text-align: center;
      margin-top: 1rem;
    }
    .extra-links a {
      text-decoration: none;
      color: #dd2476;
    }
  </style>
</head>
<body>
  <div class="signup-card">
    <h3>Create Account</h3>

    <!-- Show Messages -->
    <?php if (!empty($error)) { ?>
      <div class="alert alert-danger text-center"><?php echo $error; ?></div>
    <?php } ?>
    <?php if (!empty($success)) { ?>
      <div class="alert alert-success text-center"><?php echo $success; ?></div>
    <?php } ?>

    <form method="POST" action="">
      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
      </div>
      <div class="mb-3">
        <label for="confirm" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm password" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Sign Up</button>
      <div class="extra-links">
        <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
      </div>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>