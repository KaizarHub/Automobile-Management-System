<?php
ob_start();
require_once('includes/load.php');
if ($session->isUserLoggedIn(true)) redirect('home.php', false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign In | KDAMS</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="libs/css/main.css">
  <style>body{min-height:100vh;background:radial-gradient(circle at 15% 15%,rgba(37,99,235,.18),transparent 32%),linear-gradient(135deg,#0f172a,#172554);display:flex;align-items:center}.login-shell{width:100%}.login-page{margin:0 auto}.login-brand{display:flex;justify-content:center;align-items:center;gap:12px;color:#2563eb;font-weight:800;font-size:22px}.login-brand i{font-size:28px}</style>
</head>
<body>
<div class="login-shell">
  <div class="login-page">
    <div class="text-center">
      <div class="login-brand"><i class="fa-solid fa-car-side"></i> KDAMS</div>
      <h1>Welcome back</h1>
      <p class="text-muted">Sign in to manage your automobile business.</p>
    </div>
    <div style="padding:0 35px"><?php echo display_msg($msg); ?></div>
    <form method="post" action="auth.php">
      <div class="form-group">
        <label for="username">Username</label>
        <div class="input-group"><span class="input-group-addon"><i class="fa-regular fa-user"></i></span><input id="username" type="text" class="form-control" name="username" placeholder="Enter username" autocomplete="username" required></div>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <div class="input-group"><span class="input-group-addon"><i class="fa-solid fa-lock"></i></span><input id="password" type="password" name="password" class="form-control" placeholder="Enter password" autocomplete="current-password" required></div>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-right-to-bracket"></i> Sign in securely</button>
    </form>
  </div>
</div>
</body>
</html>
