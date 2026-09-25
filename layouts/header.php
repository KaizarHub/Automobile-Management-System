<?php $user = current_user(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#0f172a">
  <meta name="description" content="KD Automobile Management System - inventory, sales and reporting">
  <title><?php
    if (!empty($page_title)) echo remove_junk($page_title) . ' | KDAMS';
    elseif (!empty($user)) echo ucfirst($user['name']) . ' | KDAMS';
    else echo 'KD Automobile Management System';
  ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker3.min.css">
  <link rel="stylesheet" href="libs/css/main.css">
</head>
<body>
<?php if ($session->isUserLoggedIn(true)) : ?>
  <header id="header">
    <button class="mobile-menu-toggle" type="button" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars"></i>
    </button>
    <a class="brand" href="home.php" aria-label="KDAMS Dashboard">
      <span class="brand-mark"><i class="fa-solid fa-car-side"></i></span>
      <span class="brand-copy"><strong>KDAMS</strong><small>Automobile Management</small></span>
    </a>
    <div class="header-content">
      <div class="header-date hidden-xs"><i class="fa-regular fa-calendar"></i> <?php echo date("D, M j, Y · g:i A"); ?></div>
      <div class="profile-wrap">
        <a href="#" data-toggle="dropdown" class="profile-toggle" aria-expanded="false">
          <img src="uploads/users/<?php echo !empty($user['image']) ? $user['image'] : 'no_image.png'; ?>" alt="User profile">
          <span class="hidden-xs"><?php echo remove_junk(ucfirst($user['name'])); ?></span>
          <i class="fa-solid fa-chevron-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-user"><strong><?php echo remove_junk(ucfirst($user['name'])); ?></strong><small>Signed in to KDAMS</small></li>
          <li><a href="profile.php?id=<?php echo (int)$user['id']; ?>"><i class="fa-regular fa-user"></i> Profile</a></li>
          <li><a href="edit_account.php"><i class="fa-solid fa-gear"></i> Settings</a></li>
          <li class="divider"></li>
          <li><a href="logout.php" class="logout-link"><i class="fa-solid fa-right-from-bracket"></i> Sign out</a></li>
        </ul>
      </div>
    </div>
  </header>

  <aside class="sidebar" id="sidebar">
    <div class="sidebar-label">MAIN MENU</div>
    <?php
      if ($user['user_level'] === '1') include_once('admin_menu.php');
      elseif ($user['user_level'] === '2') include_once('special_menu.php');
      elseif ($user['user_level'] === '3') include_once('user_menu.php');
    ?>
    <div class="sidebar-footer"><span class="status-dot"></span> System online</div>
  </aside>
  <div class="sidebar-overlay"></div>
<?php endif; ?>

<main class="page">
  <div class="container-fluid">
