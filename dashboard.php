<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-primary bg-gradient min-vh-100">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">MyApp</a>
  </div>
</nav>

<!-- Main Content -->
<div class="container d-flex align-items-center justify-content-center" style="min-height: calc(100vh - 72px);">
  <div class="card shadow-lg border-0 rounded-4 p-4 text-center" style="max-width: 600px; width: 100%;">
    
    <h1 class="fw-bold text-primary mb-3">
      Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!
    </h1>

    <p class="text-muted lead mb-4">
      You are now logged in. This is your dashboard.
    </p>

    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      <a href="logout.php" class="btn btn-outline-danger btn-lg px-4">
        Logout
      </a>
    </div>

  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
