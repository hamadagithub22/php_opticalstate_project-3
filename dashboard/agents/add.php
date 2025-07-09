<?php
// core
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/configdb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
// ui
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/head.php';
// include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/navbar.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/sidebar.php';
auth();

$errors = [];
$success = '';
if(isset($_POST['submit'])){
  $name= stringFilter($_POST['name']);
  $email=$_POST['email'];
  $password=$_POST['password'];
  $hashedPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $password_confirmation=$_POST['password_confirmation'];
  $address= stringFilter($_POST['address']);
  $title=stringFilter($_POST['title']);
  $facebook=$_POST['facebook'];
  $twitter=$_POST['twitter'];
  $linkedIn=$_POST['linkedIn'];

  if(stringValidation($name, 4, 50)){
    $errors[] = 'enter a valid name , it ut be between 4 - 50 character.';
  }
  if(stringValidation($address, 10)){
    $errors[] = 'enter a valid address , it ut be 10 character.';
  }
  if(stringValidation($title, 4, 200)){
    $errors[] = 'enter a valid title , it ut be between 4 - 200 character.';
  }
  if(!isEmail($email)){
    $errors[] = 'enter a valid email';
  }

  if(strlen($password) < 8){
    $errors[] = 'password most  be at lest 8 character.';
  }

  if($password != $password_confirmation){
    $errors[] = 'password confirmation doesn\'t match';
  }

  // ======================== image upload ==================================
  $img = $_FILES['image'];
  $orgImgName = $img['name'];
  $size = $img['size'];
  $tmp_name = $img['tmp_name'];
  $allowed = ['jpg','jpeg','png','svg'];
  $fileExt = strtolower(pathinfo($orgImgName, PATHINFO_EXTENSION));
  $newImgName = 'opticlstate' . "_" . time() . '_' . rand(1, 5000) . '.' . $fileExt;
  $path = './uploads/' . $newImgName;
  if(imageSizeValidation($size, 3)){
    $errors[] = "image size is too big and it must not exceed 3 MB";

  }

  if(!in_array($fileExt, $allowed)){
    $errors[] = 'image must be in one of the following exension [jpg, jpeg, svg, pngn]';
  }
  
  //============================================================================

  if(empty($errors)){
    move_uploaded_file($tmp_name, $path);
    $query = "INSERT INTO `agents` VALUES (null,'$name','$email','$hashedPassword','$address','$newImgName','$title','$linkedIn','$facebook','$twitter')";

    $insert = mysqli_query($con, $query);
    if($insert){
      $success = 'agent has been added successfully';
    }
  }
  
}


?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Add Agent</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Agents</a></li>
        <li class="breadcrumb-item active">Add Agent</li>
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
            <h5 class="card-title">Add New Agent</h5>
            <form
              class="row g-3"
              method="post"
              enctype="multipart/form-data">
              <div class="col-md-6">
                <label for="name" class="form-label">name</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="name" />
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email" />
              </div>
              <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password" />
              </div>
              <div class="col-md-6">
                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                <input
                  type="password"
                  class="form-control"
                  id="password_confirmation"
                  name="password_confirmation" />
              </div>
              <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <textarea
                  type="text"
                  class="form-control"
                  id="address"
                  name="address" rows="1"></textarea>
              </div>
                <div class="col-md-6">
                <label for="image" class="form-label">image</label>
                <input
                  type="file"
                  class="form-control"
                  id="image"
                  name="image" />
              </div>
              <div class="col-md-6">
                <label for="title" class="form-label">Title</label>
                <input
                  type="text"
                  class="form-control"
                  id="title"
                  name="title" />
              </div>
            
              <div class="col-md-6">
                <label for="facebook" class="form-label">Facebook URL</label>
                <input
                  type="text"
                  class="form-control"
                  id="facebook"
                  name="facebook" />
              </div>
              <div class="col-md-6">
                <label for="twitter" class="form-label">Twitter URL</label>
                <input
                  type="text"
                  class="form-control"
                  id="twitter"
                  name="twitter" />
              </div>
              <div class="col-md-6">
                <label for="linkedIn" class="form-label">LinkedIn URL</label>
                <input
                  type="text"
                  class="form-control"
                  id="linkedIn"
                  name="linkedIn" />
              </div>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">
                  Submit
                </button>
                <button type="reset" name="reset" class="btn btn-secondary">
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
?>