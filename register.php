<?php
include "config.php";

$error = "";
$success = "";

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if user exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Email already exists!";
    } else {
        mysqli_query($conn, "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')");
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-primary bg-gradient d-flex align-items-center justify-content-center min-vh-100">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">

      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">

          <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Create Account</h2>
            <p class="text-muted mb-0">Register to get started</p>
          </div>

          <?php if (!empty($error)): ?>
            <div class="alert alert-danger text-center">
              <?= htmlspecialchars($error); ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($success)): ?>
            <div class="alert alert-success text-center">
              <?= htmlspecialchars($success); ?>
            </div>
          <?php endif; ?>

          <form method="POST">
            <div class="mb-3">
              <input
                type="text"
                name="username"
                class="form-control form-control-lg"
                placeholder="Username"
                required
              >
            </div>

            <div class="mb-3">
              <input
                type="email"
                name="email"
                class="form-control form-control-lg"
                placeholder="Email address"
                required
              >
            </div>

            <div class="mb-3">
              <input
                type="password"
                name="password"
                class="form-control form-control-lg"
                placeholder="Password"
                required
              >
            </div>

            <div class="d-grid">
              <button type="submit" name="register" class="btn btn-primary btn-lg">
                Register
              </button>
            </div>
          </form>

          <hr>

          <p class="text-center mb-0">
            Already have an account?
            <a href="index.php" class="fw-semibold text-primary text-decoration-none">
              Login
            </a>
          </p>

        </div>
      </div>

    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
