   <?php 
// core
require_once $_SERVER['DOCUMENT_ROOT'] . '/opticalState/core/function.php';
?>
   
   <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?=URL('dashboard/')?>">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <!-- End Dashboard Nav -->

        <li class="nav-item">
          <a
            class="nav-link collapsed"
            data-bs-target="#properties"
            data-bs-toggle="collapse"
            href="#">
            <i class="bi bi-menu-button-wide"></i><span>Properties</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="properties"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?=URL('dashboard/properties/list.php')?>">
                <i class="bi bi-circle"></i><span>All Properties</span>
              </a>
            </li>
            <li>
              <a href="<?=URL('dashboard/properties/add.php')?>">
                <i class="bi bi-circle"></i><span>add Properties</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- End Properties Nav -->
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            data-bs-target="#Services"
            data-bs-toggle="collapse"
            href="#">
            <i class="bi bi-menu-button-wide"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="Services"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?=URL('dashboard/services/list.php')?>">
                <i class="bi bi-circle"></i><span>All Services</span>
              </a>
            </li>
            <li>
              <a href="<?=URL('dashboard/services/add.php')?>">
                <i class="bi bi-circle"></i><span>add Services</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- End Services Nav -->
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            data-bs-target="#Agents"
            data-bs-toggle="collapse"
            href="#">
            <i class="bi bi-menu-button-wide"></i><span>Agents</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="Agents"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?=URL('dashboard/agents/list.php')?>">
                <i class="bi bi-circle"></i><span>All Agents</span>
              </a>
            </li>
            <li>
              <a href="<?=URL('dashboard/agents/add.php')?>">
                <i class="bi bi-circle"></i><span>add Agents</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- End Agents Nav -->
        <li class="nav-item">
          <a
            class="nav-link collapsed"
            data-bs-target="#Messages"
            data-bs-toggle="collapse"
            href="#">
            <i class="bi bi-menu-button-wide"></i><span>Messages</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul
            id="Messages"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav">
            <li>
              <a href="<?=URL('dashboard/messages/list.php')?>">
                <i class="bi bi-circle"></i><span>All Messages</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="<?=URL('dashboard/users-profile.php')?>">
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li>
        <!-- End Profile Page Nav -->
      </ul>
    </aside>
    <!-- End Sidebar-->

