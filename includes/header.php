<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$user = isset($_SESSION['user_name']) && !empty($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Travel Guide</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">






</head>

<body data-logged-in="<?php echo isset($_SESSION['user_logged_in']) ? 'true' : 'false'; ?>">
 

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="#">Travel Guide</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">About us</a></li>
        <li class="nav-item"><a class="nav-link" href="destinations.php">Destinations</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="bookingsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Bookings
          </a>
          <div class="dropdown-menu" aria-labelledby="bookingsDropdown">
            <a class="dropdown-item" href="https://www.serenahotels.com">Hotels</a>
            <a class="dropdown-item" href="https://www.careem.com">Transport</a>
            <a class="dropdown-item" href="https://www.piac.com.pk">Flights</a>
          </div>
        </li>


        <?php

        if (isset($_SESSION['username'])): ?>
          <!-- Dropdown for logged-in user -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <?php echo htmlspecialchars($_SESSION['username']); ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
          </li>
        <?php else: ?>
          <!-- Show Login and Signup if not logged in -->
          <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <?php endif; ?>

      </ul>
    </div>
  </nav>

 

  <!-- Body Content -->
  <div class="background-decore"></div>

