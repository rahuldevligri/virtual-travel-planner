<?php
/**
 * Global Header Component
 * Virtual Travel Planner
 */
if (!isset($pageTitle)) {
    $pageTitle = 'Virtual Travel Planner | Car Rental Services in Durgapura, Jaipur';
}
if (!isset($currentPage)) {
    $currentPage = basename($_SERVER['PHP_SELF']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Affordable and reliable car rental services in Durgapura, Jaipur. Local rentals, outstation trips, airport transfers, and corporate travel.">
  <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- Site Header -->
  <header class="site-header">
    <div class="container header-inner">
      <a href="index.php" class="brand-logo" aria-label="Virtual Travel Planner Home">
        <span class="brand-icon">🚗</span>
        <span>Virtual Travel Planner</span>
      </a>

      <!-- Mobile Hamburger Button -->
      <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation menu" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
      </button>

      <!-- Main Navigation Menu -->
      <nav class="main-nav" id="mainNav" aria-label="Primary navigation">
        <ul class="nav-list">
          <li>
            <a href="index.php" class="nav-link <?php echo ($currentPage === 'index.php') ? 'active' : ''; ?>">Home</a>
          </li>
          <li>
            <a href="about.php" class="nav-link <?php echo ($currentPage === 'about.php') ? 'active' : ''; ?>">About Us</a>
          </li>
          <li>
            <a href="services.php" class="nav-link <?php echo ($currentPage === 'services.php') ? 'active' : ''; ?>">Services</a>
          </li>
          <li>
            <a href="contact.php" class="nav-link <?php echo ($currentPage === 'contact.php') ? 'active' : ''; ?>">Contact Us</a>
          </li>
          <li>
            <a href="contact.php" class="btn btn-primary nav-cta">Get a Quote</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <main id="mainContent">
