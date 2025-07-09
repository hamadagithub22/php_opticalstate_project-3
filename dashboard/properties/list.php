
<?php 
// core
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/configdb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
// ui
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/head.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/navbar.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/sidebar.php';
auth();

$quiry="SELECT * FROM `properties` ";
$properties = mysqli_query($con, $quiry);

// ============== delee ================
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $select = "SELECT `image` FROM properties WHERE id = $id";
  $result = mysqli_query($con,$select);

  if(mysqli_num_rows($result) == 1){
    $property = mysqli_fetch_assoc($result);
    $image_path = './uploads/' . $property['image'];
     $query ="DELETE FROM  `properties` WHERE id = $id";
    $delete = mysqli_query($con, $query);
    if($delete){
      if(file_exists($image_path)){
        unlink($image_path);
      }
     redirect('dashboard/properties/list.php');
  }
  }
}



?>



<main id="main" class="main">
  <div class="pagetitle">
    <h1>List Properties</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Properties</li>
        <li class="breadcrumb-item active">List Properties</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
        
             <h5 class="card-title">All Available Properties
              <a href="<?= URL('dashboard/properties/add.php')?> " class="btn btn-primary float-end">add property</a>
               </h5>
          </div>
          <div class="card-body">


            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>description</th>
                  <th>address</th>
                  <th>property type</th>
                  <th>status</th>
                  <th>Price</th>
                  <th>Area</th>
                  <th>Rooms</th>
                  <th>Baths</th>
                  <!-- <th>created_by</th> -->
                  <th>Actions</th>
                </tr>
              </thead>
             <tbody>
  <?php if(mysqli_num_rows($properties) > 0): ?>
    <?php foreach($properties as $index => $property): ?>
      <tr>
        <td><?= $index + 1 ?></td>
        <td>
          <img
            width="50"
            src="<?= URL('dashboard/properties/uploads/' . $property['image'])?>"
            alt="placeholder" />
        </td>
        <td><?= $property['title']?> </td>
        <td><?= $property['description']?> </td>
        <td><?= $property['address']?> </td>
        <td><?= $property['type']?> </td>
        <td><?= $property['status']?> </td>
        <td><?= $property['price']?> $</td>
        <td><?= $property['area']?> </td>
        <td><?= $property['rooms']?> </td>
        <td><?= $property['baths']?> </td>
        <!-- <td><?= $property['created_by']?> </td> -->
        <td>
          <a href="edit.php?id=<?= $property['id'] ?>" class="btn btn-warning">Edit</a>
          <a href="?delete=<?= $property['id'] ?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  <?php else: ?>
    <tr>
      <td colspan="13">
        <div class="alert alert-info text-center">
          No Records Found
        </div>
      </td>
    </tr>
  <?php endif; ?>
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