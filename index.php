<?php 
// core
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/configdb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
// ui
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/shared/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/shared/navbar.php';

$query = "SELECT * FROM `properties` ORDER BY id DESC LIMIT 3";
$properties = mysqli_query($con, $query);

$query = "SELECT image,name,title, linkedinURl as  li, facebookURL	as fa, twitterURl as tw FROM agents LIMIT 3";
$agents  = mysqli_query($con, $query);




// read servese
$query = "SELECT * FROM `services` WHERE 1";
$services = mysqli_query($con, $query);





?>
<main class="main">
  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <div   id="hero-carousel" class="carousel slide"   data-bs-ride="carousel"  data-bs-interval="5000">
 <?php foreach($properties as $index => $property): ?>
  <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
    <img src="<?= URL('dashboard/properties/uploads/' . $property['image']) ?>" alt="" />
    <div class="carousel-container">
      <div>
        <p><?= $property['address'] ?></p>
        <h2><?= $property['title'] ?></h2>
        <a href="property-single.html" class="btn-get-started">
          <?= $property['status'] ?> | <?= $property['price'] ?>
        </a>
      </div>
    </div>
  </div>
<?php endforeach; ?>

     

      <a
        class="carousel-control-prev"
        href="#hero-carousel"
        role="button"
        data-bs-slide="prev">
        <span
          class="carousel-control-prev-icon bi bi-chevron-left"
          aria-hidden="true"></span>
      </a>

      <a
        class="carousel-control-next"
        href="#hero-carousel"
        role="button"
        data-bs-slide="next">
        <span
          class="carousel-control-next-icon bi bi-chevron-right"
          aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators"></ol>
    </div>
  </section>
  <!-- /Hero Section -->

  <!-- Services Section -->
  <section id="services" class="services section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Our Services</h2>
      <p>
        Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
        consectetur velit
      </p>
    </div>
    <!-- End Section Title -->

    <div class="container">
      <div class="row gy-4">
        <?php foreach($services as $services):?>
        <div class="col-lg-4 col-md-6"
          data-aos="fade-up"
          data-aos-delay="100">
          <div class="service-item position-relative">
            <div class="icon">
              <?= $services['icon']?>
            </div>
            <a href="service-details.html" class="stretched-link">
              <h3><?php echo $services['title']?> </h3>
            </a>
            <p>
            <?= $services['description']?>
            </p>
          </div>
        </div>
        <?php endforeach;?>
        <!-- End Service Item -->

       
    </div>
  </section>
  <!-- /Services Section -->





  <!-- Agents Section -->
  <section id="agents" class="agents section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Our Agents</h2>
      <p>
        Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
        consectetur velit
      </p>
    </div>
    <!-- End Section Title -->

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

     
      </div>
    </div>
  </section>
  <!-- /Agents Section -->

  <!-- Testimonials Section -->
  <section id="testimonials" class="testimonials section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Testimonials</h2>
      <p>
        Necessitatibus eius consequatur ex aliquid fuga eum quidem sint
        consectetur velit
      </p>
    </div>
    <!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper init-swiper">
        <script type="application/json" class="swiper-config">
          {
            "loop": true,
            "speed": 600,
            "autoplay": {
              "delay": 5000
            },
            "slidesPerView": "auto",
            "pagination": {
              "el": ".swiper-pagination",
              "type": "bullets",
              "clickable": true
            },
            "breakpoints": {
              "320": {
                "slidesPerView": 1,
                "spaceBetween": 40
              },
              "1200": {
                "slidesPerView": 3,
                "spaceBetween": 1
              }
            }
          }
        </script>
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                Proin iaculis purus consequat sem cure digni ssim donec
                porttitora entum suscipit rhoncus. Accusantium quam,
                ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                risus at semper.
              </p>
              <div class="profile mt-auto">
                <img
                  src="assets/img/testimonials/testimonials-1.jpg"
                  class="testimonial-img"
                  alt="" />
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div>
          </div>
          <!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                Export tempor illum tamen malis malis eram quae irure esse
                labore quem cillum quid cillum eram malis quorum velit fore
                eram velit sunt aliqua noster fugiat irure amet legam anim
                culpa.
              </p>
              <div class="profile mt-auto">
                <img
                  src="assets/img/testimonials/testimonials-2.jpg"
                  class="testimonial-img"
                  alt="" />
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
              </div>
            </div>
          </div>
          <!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                Enim nisi quem export duis labore cillum quae magna enim
                sint quorum nulla quem veniam duis minim tempor labore quem
                eram duis noster aute amet eram fore quis sint minim.
              </p>
              <div class="profile mt-auto">
                <img
                  src="assets/img/testimonials/testimonials-3.jpg"
                  class="testimonial-img"
                  alt="" />
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
              </div>
            </div>
          </div>
          <!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa
                multos export minim fugiat minim velit minim dolor enim duis
                veniam ipsum anim magna sunt elit fore quem dolore labore
                illum veniam.
              </p>
              <div class="profile mt-auto">
                <img
                  src="assets/img/testimonials/testimonials-4.jpg"
                  class="testimonial-img"
                  alt="" />
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
              </div>
            </div>
          </div>
          <!-- End testimonial item -->

          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
              </div>
              <p>
                Quis quorum aliqua sint quem legam fore sunt eram irure
                aliqua veniam tempor noster veniam enim culpa labore duis
                sunt culpa nulla illum cillum fugiat legam esse veniam culpa
                fore nisi cillum quid.
              </p>
              <div class="profile mt-auto">
                <img
                  src="assets/img/testimonials/testimonials-5.jpg"
                  class="testimonial-img"
                  alt="" />
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
              </div>
            </div>
          </div>
          <!-- End testimonial item -->
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>
  <!-- /Testimonials Section -->
</main>

<?php 
//ui 
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/shared/footer.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/shared/scripts.php';
?>