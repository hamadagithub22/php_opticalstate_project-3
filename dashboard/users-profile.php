<?php 
// core
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/configdb.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
// ui
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/head.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/navbar.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/dashboard/shared/sidebar.php';
auth();

?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Agent</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">
        <div class="card">
          <div
            class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img
              src="assets/img/profile-img.jpg"
              alt="Profile"
              class="rounded-circle" />
            <h2>Kevin Anderson</h2>
            <h3>Web Designer</h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-8">
        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                <button
                  class="nav-link active"
                  data-bs-toggle="tab"
                  data-bs-target="#profile-overview">
                  Overview
                </button>
              </li>

              <li class="nav-item">
                <button
                  class="nav-link"
                  data-bs-toggle="tab"
                  data-bs-target="#profile-edit">
                  Edit Profile
                </button>
              </li>

              <li class="nav-item">
                <button
                  class="nav-link"
                  data-bs-toggle="tab"
                  data-bs-target="#profile-change-password">
                  Change Password
                </button>
              </li>
            </ul>
            <div class="tab-content pt-2">
              <div
                class="tab-pane fade show active profile-overview"
                id="profile-overview">
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Full Name</div>
                  <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">
                    k.anderson@example.com
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Title</div>
                  <div class="col-lg-9 col-md-8">Web Designer</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8">
                    A108 Adam Street, New York, NY 535022
                  </div>
                </div>
              </div>

              <div
                class="tab-pane fade profile-edit pt-3"
                id="profile-edit">
                <!-- Profile Edit Form -->
                <form method="post" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label
                      for="profileImage"
                      class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="assets/img/profile-img.jpg" alt="Profile" />
                      <div class="pt-2">
                        <a
                          href="#"
                          class="btn btn-primary btn-sm"
                          title="Upload new profile image"><i class="bi bi-upload"></i></a>
                        <a
                          href="#"
                          class="btn btn-danger btn-sm"
                          title="Remove my profile image"><i class="bi bi-trash"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label
                      for="name"
                      class="col-md-4 col-lg-3 col-form-label">name</label>
                    <div class="col-md-8 col-lg-9">
                      <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        value="Agnet Name" />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label
                      for="email"
                      class="col-md-4 col-lg-3 col-form-label">email</label>
                    <div class="col-md-8 col-lg-9">
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email" />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label
                      for="company"
                      class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea
                        type="text"
                        class="form-control"
                        id="address"
                        name="address"></textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label
                      for="Title"
                      class="col-md-4 col-lg-3 col-form-label">Title</label>
                    <div class="col-md-8 col-lg-9">
                      <input
                        type="text"
                        class="form-control"
                        id="title"
                        name="title"
                        value="Agent" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label
                      for="Twitter"
                      class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input
                        name="twitter"
                        type="text"
                        class="form-control"
                        id="Twitter"
                        value="https://twitter.com/#" />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label
                      for="Facebook"
                      class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input
                        name="facebook"
                        type="text"
                        class="form-control"
                        id="Facebook"
                        value="https://facebook.com/#" />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label
                      for="Linkedin"
                      class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input
                        name="linkedin"
                        type="text"
                        class="form-control"
                        id="Linkedin"
                        value="https://linkedin.com/#" />
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                      Save Changes
                    </button>
                  </div>
                </form>
                <!-- End Profile Edit Form -->
              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form method="post">
                  <div class="row mb-3">
                    <label
                      for="currentPassword"
                      class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input
                        name="password"
                        type="password"
                        class="form-control"
                        id="currentPassword" />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label
                      for="newPassword"
                      class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input
                        name="newpassword"
                        type="password"
                        class="form-control"
                        id="newPassword" />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label
                      for="renewPassword"
                      class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input
                        name="renewpassword"
                        type="password"
                        class="form-control"
                        id="renewPassword" />
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">
                      Change Password
                    </button>
                  </div>
                </form>
                <!-- End Change Password Form -->
              </div>
            </div>
            <!-- End Bordered Tabs -->
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