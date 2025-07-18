<?php 
// core
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/configdb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
// ui
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/head.php';



$error = '';
//=================
if(isset($_POST['login'])){
  $email=$_POST['email'];
  $pass=$_POST['password'];

  $query="SELECT *FROM agents WHERE email = '$email'";
  $select =mysqli_query($con, $query);
  if(mysqli_num_rows($select)== 1){
    $fetch = mysqli_fetch_assoc($select);
    if(password_verify($pass, $fetch['password'])){
         $_SESSION['agent'] = [
      'id' => $fetch['id'],
      'name' => $fetch['name'],
      'email' => $fetch['email'],
      'address' => $fetch['address'],
      'title' => $fetch['title'],
      'image' => $fetch['image'],
       'fb' => $fetch['facebookURL'],
       'tw' => $fetch['twitterURl'],
       'li' => $fetch['linkedinURl'],
    ];
    redirect('dashboard');
    }else{
      $error = 'email or password is incorrect';
    }
 
  }else{
    $error = 'email or password is incorrect';
  }


}
if(isset($_SESSION['agent'])){
  redirect('dashboard');
}

?>
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="<?= URL('dashboard/assets/img/logo.png')?>" alt="">
                <span class="d-none d-lg-block">opticalstate</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">
              <div class="card-body">
                <?php if(!empty($error)):?>
                <div class="alert alert-danger my-3">
                    <?= $error ?>                 
                </div>
                <?php endif;?>
              </div>

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your email & password to login</p>
                </div>

                <form class="row g-3 needs-validation" method="post" novalidate>

                  <div class="col-12">
                    <label for="yourEmail" class="form-label">email</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="email" name="email" class="form-control" id="email" required>
                      <div class="invalid-feedback">Please enter your email.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <!-- <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div> -->
                  <div class="col-12">
                    <button class="btn btn-primary w-100" name="login" type="submit">Login</button>
                  </div>
                  <!-- <div class="col-12">
                    <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                  </div> -->
                </form>

              </div>
            </div>

            <div class="credits">
              Designed by <a href="#">hamo-tech</a>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->
<?php 
//ui 
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/footer.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/scripts.php';
?>