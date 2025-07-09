  <?php 
// core
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/configdb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
// ui
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/shared/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/shared/navbar.php';



$query = "SELECT * FROM `properties` ORDER by id DESC";
$properties = mysqli_query($con, $query);



?>
<main class="main">
  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1>Properties</h1>
            <p class="mb-0">
              Odio et unde deleniti. Deserunt numquam exercitationem.
              Officiis quo odio sint voluptas consequatur ut a odio
              voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi
              ratione sint. Sit quaerat ipsum dolorem.
            </p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
          <li class="current">Properties</li>
        </ol>
      </div>
    </nav>
  </div>
  <!-- End Page Title -->

  <!-- Real Estate Section -->
  <section id="real-estate" class="real-estate section">
    <div class="container">
      <div class="row gy-4">
        <?php foreach($properties as $index => $property): ?>
        <div class="col-xl-4 col-md-6"
          data-aos="fade-up"
          data-aos-delay="100">
          <div class="card">
            <img src="<?= URL('dashboard/properties/uploads/' . $property['image']) ?>"  alt=""
              class="img-fluid" />
            <div class="card-body">
              <span class="sale-rent"><?= $property['status'] ?> | $<?= $property['price'] ?></span>
              <h3>
                <a href="property-single.php" class="stretched-link">204 Mount Olive Road Two</a>
              </h3>
              <div
                class="card-content d-flex flex-column justify-content-center text-center">
                <div class="row propery-info">
                  <div class="col">Area</div>
                  <div class="col">Rooms</div>
                  <div class="col">Baths</div>
                  <!-- <div class="col">Garages</div> -->
                </div>
                <div class="row">
                  <div class="col"><?= $property['area'] ?>m2</div>
                  <div class="col"><?= $property['rooms'] ?></div>
                  <div class="col"><?= $property['baths'] ?></div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>
        <!-- End Property Item -->


  </section>
  <!-- /Real Estate Section -->
</main>
<?php
//ui 
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/shared/footer.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/shared/scripts.php';
?>