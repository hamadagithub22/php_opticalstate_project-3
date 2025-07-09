
<?php 
// core
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/configdb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
// ui
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/head.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/navbar.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/sidebar.php';
auth();


$title= null;
$description = null;
$address  = null;
$type = null;
$status = null;
$price = null;
$area = null;
$rooms = null;
$baths = null;
$img = null;
// edit
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $query="SELECT * FROM `properties` WHERE id =$id";
  $select = mysqli_query($con, $query);
  if(mysqli_num_rows($select)== 1){
    $fecth = mysqli_fetch_assoc($select);
    
  }else{
    redirect('dashboard/properties/list.php');
  }
    if(isset($_POST['submit'])){
      $title=$_POST['title'];
      $description=$_POST['description'];
      $address=$_POST['address'];
      $type=$_POST['type'];
      $status=$_POST['status'];
      $price=$_POST['price'];
      $area=$_POST['area'];
      $rooms=$_POST['rooms'];
      $baths=$_POST['baths'];

      $update_quiry = "UPDATE `properties` SET `title`='$title',`description`='$description',`address`='$address',`type`='$type',`status`='$status',`price`='$price',`area`=$area,`rooms`=$rooms,`baths`=$baths WHERE id = $id";

      $update=mysqli_query($con, $update_quiry);
      if($update){
        redirect('dashboard/properties/list.php');
      }

    }


}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Property</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Properties</a></li>
        <li class="breadcrumb-item active">Edit Property</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  <section class="section">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Property</h5>
            <form
              class="row g-3"
              method="post"
              enctype="multipart/form-data">
              <div class="col-md-12">
                <label for="title" class="form-label">Title</label>
                <input
                  type="text"
                  class="form-control"
                  id="title"
                  name="title" 
                  value="<?= $fecth['title'] ?>"/>
                  
              </div>
              <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <textarea
                  type="text"
                  class="form-control"
                  id="description"
                  name="description"><?= $fecth['description'] ?></textarea>
              </div>
              <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <textarea
                  type="text"
                  class="form-control"
                  id="address"                 
                  name="address"><?=$fecth['address'] ?></textarea>
              </div>
              <div class="col-md-6">
                <label for="property_type" class="form-label">Type</label>
                <select
                  class="form-select"
                  id="property_type"
                  name="type" value="<?= $fecth['type'] ?>">        
                  <option value="House">House</option>
                  <option value="Apartment">Apartment</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" value="<?= $fecth['status'] ?>">
                  <option value="Sale">Sale</option>
                  <option value="Rent">Rent</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="price" class="form-label">Price</label>
                <input
                  type="Number"
                  class="form-control"
                  id="price"
                  value="<?= $price ?>"
                  name="price" />
              </div>
              <div class="col-md-3">
                <label for="area" class="form-label">Area</label>
                <input
                  type="text"
                  class="form-control"
                  id="area"
                  value="<?= $fecth['area'] ?>"
                  name="area" />
              </div>
              <div class="col-md-3">
                <label for="rooms" class="form-label">Rooms</label>
                <input
                  type="text"
                  class="form-control"
                  id="rooms"
                  value="<?= $fecth['rooms'] ?>"
                  name="rooms" />
              </div>
              <div class="col-md-3">
                <label for="baths" class="form-label">Baths</label>
                <input
                  type="text"
                  class="form-control"
                  id="baths"
                  value="<?= $fecth['baths'] ?>"
                  name="baths" />
              </div>
          
              <div class="col-md-6">
                <label for="property_image" class="form-label">Property Image</label>
                <input
                  type="file"
                  class="form-control"
                  id="property_image" />
              </div>
          
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">
                  Submit
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