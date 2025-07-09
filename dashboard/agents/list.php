
<?php 
// core
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/configdb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
// ui
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/head.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/navbar.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/sidebar.php';
auth();

// ============== delee ================
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $select = "SELECT `image` FROM agents WHERE id = $id";
  $result = mysqli_query($con,$select);

  if(mysqli_num_rows($result) == 1){
    $agent = mysqli_fetch_assoc($result);
    $image_path = './uploads/' . $agent['image'];
     $query ="DELETE FROM  agents WHERE id = $id";
    $delete = mysqli_query($con, $query);
    if($delete){
      if(file_exists($image_path)){
        unlink($image_path);
      }
     redirect('dashboard/agents/list.php');
  }
  }

 
}

$query = "SELECT * FROM agents";
$agents = mysqli_query($con, $query);
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>List Services</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
            <h5 class="card-title">All Services
              <a href="<?=URL('/dashboard/agents/add.php')?>" class="btn btn-primary float-end">add agent</a>
            </h5>
            

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>name</th>
                  <th>email</th>
                  <th>title</th>
                  <th>address</th>
                  <th>Social-links</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <?php if(mysqli_num_rows($agents) > 0): ?>
                  <?php foreach($agents as $index => $agent): ?>
                    <tr>              
                  <td><?= $index+1 ?></td>
                  <td><?= $agent['name'] ?></td>
                  <td><?= $agent['email'] ?></td>
                  <td><?= $agent['title'] ?></td>
                  <td><?= $agent['address'] ?></td>
                 
                 
                  <td>
                     <?php if($agent['facebookURL']): ?>
                      <a href="<?= $agent['facebookURL'] ?>"><i class="bi bi-facebook"></i></a>
                      <?php endif;?> 

                     <?php if($agent['twitterURl']): ?>
                      <a href="<?= $agent['twitterURl'] ?>"><i class="bi bi-twitter-x"></i></a>
                      <?php endif;?> 

                     <?php if($agent['linkedinURl']): ?>
                      <a href="<?= $agent['linkedinURl'] ?>"><i class="bi bi-linkedin"></i></a>
                      <?php endif;?> 

                    
                    
                  </td>
                  <td>
                    <a href="edit.php?id=<?= $agent['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="?delete=<?= $agent['id']?>" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                  <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="7">
                        <div class="alert alert-info text-center">
                          No Records Found
                        </div>
                      </td>
                    </tr>
                  <?php endif; ?>
                </tr>
              
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

