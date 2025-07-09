
<?php 
// core
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/configdb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
// ui
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/head.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/navbar.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/sidebar.php';
auth();

$success ='';
$errors = [];

if(isset($_POST['submit'])){
  $created_by = $_SESSION['agent']['id'];
  $title= stringFilter($_POST['title']);
  $description= stringFilter($_POST['description']);
  $address= stringFilter($_POST['address']);
  $property_type= $_POST['property_type'];
  $status= $_POST['status'];
  $price= $_POST['price'];
  $area= $_POST['area'];
  $rooms= $_POST['rooms'];
  $baths= $_POST['baths'];
  // $location= stringFilter($_POST['location']);

  if(stringValidation($title, 10)){
    $errors[] = 'enter a valid title, and it must be at least 5 character';
  }
  if(stringValidation($description, 10)){
    $errors[] = 'enter a valid description, and it must be at least 10 character';
  }
  if(stringValidation($address, 5, 100)){
    $errors[] = 'enter a valid address, and it must be 5 - 100 character';
  }

  if(stringValidation($property_type) && !in_array($property_type, ['House','Apartment'])){
    $errors[] = 'enter a valid propert type';
  }
  if(stringValidation($status) && !in_array($status,['Sale','Rent'])){
    $errors[] = 'enter a valid propert type';
  }
   
  if(!isNumber($price)){
    $errors[] = 'enter a valid property price';
  }
  if(!isNumber($area)){
    $errors[] = 'enter a valid area';
  }
  if(!isNumber($rooms)){
    $errors[] = 'enter a valid rooms';
  }
  if(!isNumber($baths)){
    $errors[] = 'enter a valid baths';
  }


    // ======================== image upload ==================================
  $img = $_FILES['image'];
  $orgImgName = $img['name'];
  $size = $img['size'];
  $tmp_name = $img['tmp_name'];
  $allowed = ['jpg','jpeg','png','svg'];
  $fileExt = strtolower(pathinfo($orgImgName, PATHINFO_EXTENSION));
  $newImgName = 'opticlstatepProperty' . "_" . time() . '_' . rand(1, 5000) . '.' . $fileExt;
  $path = './uploads/' . $newImgName;
  if(imageSizeValidation($size, 5)){
    $errors[] = "image size is too big and it must not exceed 5 MB";

  }

  if(!in_array($fileExt, $allowed)){
    $errors[] = 'image must be in one of the following exension [jpg, jpeg, svg, pngn]';
  }
  
  //============================================================================
 
  if(empty($errors)){
    $query = "INSERT INTO `properties` VALUES (null, '$newImgName','$title','$description','$address','$property_type','$status',$price,$area,$rooms,$baths,$created_by)";
    $insert = mysqli_query($con, $query);
    if($insert){
       move_uploaded_file($tmp_name, $path);
      $success = 'property has been added successfully';
    }
  }

}

?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Add Property</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Properties</a></li>
        <li class="breadcrumb-item active">Add Property</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  <section class="section">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
              <?php if(!empty($errors)): ?>
            <div class="card-header">
              <div class="alert alert-danger">
                <ul class="mb-0">
                  <?php foreach($errors as $error):?>
                    <li><?= $error ?></li>
                    <?php endforeach;?>
                </ul>
              </div>
            </div>
            <?php endif;?>
          <?php if(!empty($success)): ?>
            <div class="card-header">
              <div class="alert alert-success">
                <?= $success ?>
             
              </div>
            </div>
            <?php endif;?>
          <div class="card-body">
            <h5 class="card-title">Add New Property</h5>
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
                  name="title" />
              </div>
              <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <textarea
                  type="text"
                  class="form-control"
                  id="description"
                  name="description"></textarea>
              </div>
              <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <textarea
                  type="text"
                  class="form-control"
                  id="address"
                  name="address"></textarea>
              </div>
              <div class="col-md-6">
                <label for="property_type" class="form-label">Type</label>
                <select
                  class="form-select"
                  id="property_type"
                  name="property_type">
                  <option value="House">House</option>
                  <option value="Apartment">Apartment</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
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
                  name="price" />
              </div>
              <div class="col-md-3">
                <label for="area" class="form-label">Area</label>
                <input
                  type="text"
                  class="form-control"
                  id="area"
                  name="area" />
              </div>
              <div class="col-md-3">
                <label for="rooms" class="form-label">Rooms</label>
                <input
                  type="text"
                  class="form-control"
                  id="rooms"
                  name="rooms" />
              </div>
              <div class="col-md-3">
                <label for="baths" class="form-label">Baths</label>
                <input
                  type="text"
                  class="form-control"
                  id="baths"
                  name="baths" />
              </div>
        
              <div class="col-md-6">
                <label for="property_image" class="form-label">Property Image</label>
                <input
                  type="file"
                  class="form-control"
                  name="image"
                  id="property_image" />
              </div>
     
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">
                  Submit
                </button>
                <button type="reset" class="btn btn-secondary">
                  Reset
                </button>
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

// ============================================================================




?>



