<?php 
// core
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/configdb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
// ui
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/head.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/navbar.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/sidebar.php';
auth();


// تعيين مبدئي
$title = null;
$icon = null;
$description = null;

//edit
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $query="SELECT * FROM `services` WHERE id = $id";
  $select=mysqli_query($con, $query);
  if(mysqli_num_rows($select)== 1){
    $fetch = mysqli_fetch_assoc($select);
    $title = $fetch['title'];
    $icon = $fetch['icon'];
    $description = $fetch['description'];
  }
}

?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Service</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Services</a></li>
        <li class="breadcrumb-item active">Edit Service</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  <section class="section">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Service</h5>
            <form
              class="row g-3"
              method="post"
              enctype="multipart/form-data">
              <div class="col-md-6">
                <label for="title" class="form-label">title</label>
                <input
                  type="text"
                  class="form-control"
                  id="title"
                  name="title" 
                  value="<?=$title?>"/>
              </div>
              <div class="col-md-6">
                <label for="icon" class="form-label">Icon</label>
                <input
                  type="text"
                  class="form-control"
                  id="icon"
                  value="<?=$icon ?>"
                  name="icon" />
              </div>
              <div class="col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea
                  type="text"
                  class="form-control"
                  id="description"
                  name="description"><?=$description?></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-warning">
                  update
                </button>
                <a href="#" class="btn btn-secondary">
                  Cancel
                </a>
              </div>
            </form>
            <!-- End Multi Columns Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<!-- End #main -->
   <?php 
//ui 
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/footer.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/scripts.php';
?>