<?php 
// core
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/configdb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
// ui
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/head.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/navbar.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/sidebar.php';
auth();




//delete
if(isset($_GET['delete'])){
  $id = $_GET['delete'];

  $query = "DELETE FROM `services` WHERE id = $id";
  $delete = mysqli_query($con, $query);
  if($delete){
    echo 'done';
  }
  
}


$query="SELECT * FROM `services`";
$list = mysqli_query($con, $query);



?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List Services</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php URL('') ?>">Home</a></li>
        <li class="breadcrumb-item">Services</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">All Services</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Icon</th>
                  <th>Title</th>
                  <th>description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($list as $index =>  $list): ?>
                <tr>
                  <td><?=$index+1 ?></td>
                  <td><?= $list['icon'] ?></td>
                  <td><?= $list['title'] ?></td>
                  <td><?= $list['description'] ?></td>
              
                  <td>
                    <a href="edit.php?id=<?= $list['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="?delete=<?php echo $list['id'] ?>" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                <?php endforeach;?>
            
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
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