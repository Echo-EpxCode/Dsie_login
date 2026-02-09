<?php
session_start();
include "config.php";

$error = "";

if (isset($_POST['login'])) {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "User not found!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

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
            <h2 class="fw-bold text-primary">MyApp</h2>
            <p class="text-muted mb-0">Sign in to continue</p>
          </div>

          <?php if(!empty($error)): ?>
            <div class="alert alert-danger text-center">
              <?= htmlspecialchars($error); ?>
            </div>
          <?php endif; ?>

          <form method="POST">
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

            <div class="d-grid mb-3">
              <button type="submit" name="login" class="btn btn-primary btn-lg">
                Log In
              </button>
            </div>
          </form>

          <hr>

          <p class="text-center mb-0">
            Don’t have an account?
            <a href="register.php" class="fw-semibold text-primary text-decoration-none">
              Create one
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
