  <?php 
// core
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/configdb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
// ui
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/shared/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/shared/navbar.php';

$query = "SELECT image, name, title, linkedinURl as  li, facebookURL	as fa, twitterURl as tw FROM agents";
$agents  = mysqli_query($con, $query);




?>
<main class="main">
  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Agents</h1>
            <p class="mb-0">
              Odio et unde deleniti. Deserunt numquam exercitationem. Officiis
              quo odio sint voluptas consequatur ut a odio voluptatem. Sit
              dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit
              quaerat ipsum dolorem.
            </p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li class="current">Agents</li>
        </ol>
      </div>
    </nav>
  </div>
  <!-- End Page Title -->

  <!-- Agents Section -->
  <section id="agents" class="agents section">
    <div class="container">
      <div class="row gy-5">
        <?php foreach($agents as $index => $agent):?>
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?=($index+1)*100 ?>">
          <div class="member">
            <div class="pic">
              <img src="<?= URL('dashboard/agents/uploads/' .  $agent['image'])?>" class="img-fluid" alt="" />
            </div>
            <div class="member-info">
              <h4><?= $agent['name'] ?> </h4>
              <span><?= $agent['title'] ?></span>
              <div class="social">
                <?php if($agent['tw']):?>
                  <a href="<?= $agent['tw'] ?>"><i class="bi bi-twitter-x"></i></a>
                  <?php endif;?>
                <?php if($agent['fa']):?>
                  <a href="<?= $agent['fa'] ?>"><i class="bi bi-facebook"></i></a>
                  <?php endif;?>
                <?php if($agent['li']):?>
                  <a href="<?= $agent['li'] ?>"><i class="bi bi-linkedin"></i></a>
                  <?php endif;?>
                
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>
        <!-- End Team Member -->


  </section>
  <!-- /Agents Section -->
</main>

<?php
//ui 
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/shared/footer.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/shared/scripts.php';
?>