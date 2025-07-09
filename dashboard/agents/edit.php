<?php 
// core
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/configdb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
// ui
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/head.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/navbar.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/sidebar.php';
auth();

// اجعل $fetch متغيرًا مبدئيًا فاضيًا
$fetch = null;
// edit
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $query="SELECT * FROM `agents` WHERE id = $id";
  $select = mysqli_query($con, $query);
  if(mysqli_num_rows($select)== 1){
    $fetch = mysqli_fetch_assoc($select);
    
  }else{
    redirect('dashboard/properties/list.php');
  }



}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Agent</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Agents</a></li>
        <li class="breadcrumb-item active">Edit Agent</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->
  <section class="section">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Agent</h5>
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
                  name="name" value="<?= $fetch['name'] ?>"/>
              </div>
              <div class="col-md-6">
                <label for="email" class="form-label">email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email" 
                  value="<?= $fetch['email'] ?>"/>
              </div>
              <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password" 
                  value="<?= $fetch['password'] ?>"/>
              </div>
              <div class="col-md-6">
                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                <input
                  type="password"
                  class="form-control"
                  id="password_confirmation"
                  name="password_confirmation" 
                  />
              </div>
              <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <textarea
                  type="text"
                  class="form-control"
                  id="address"
                  name="address" rows="1"><?=$fetch['address'] ?></textarea>
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
                  name="title"
                  value="<?= $fetch['title'] ?>" />
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
                <button type="update" class="btn btn-warning">
                  Update
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