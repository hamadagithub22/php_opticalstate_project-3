   <?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
?>

<header id="header" class="header d-flex align-items-center fixed-top">
  <div
    class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
      <h1 class="sitename">Abo Hamada <span>State</span></h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="<?=URL()?>" class="active">Home</a></li>
        <li><a href="<?=URL('about.php')?>">About</a></li>
        <li><a href="<?=URL('services.php')?>">Services</a></li>
        <li><a href="<?=URL('properties.php')?>">Properties</a></li>
        <li><a href="<?=URL('agents.php')?>">Agents</a></li>
        <li><a href="<?=URL('contact.php')?>">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
  </div>
</header>