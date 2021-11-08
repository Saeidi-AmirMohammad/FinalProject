<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
      <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../Public//HomeAssist/dist/img/myphoto.jpeg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <?php

              if (isset($_SESSION['user'])){
                  $connect = DBConnection();
                  $user = getLoginUser($connect, $_SESSION['user']);

         echo " <a href=\"#\" class=\"d-block\"><?= $user->fname.' '.$user->lname  ?></a> ";

              }
         ?>
          </div>
        </div>
          <?php
         $url= $_SERVER['PHP_SELF'];
          ?>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active ">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                  داشبورد
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/view/home.php" class="nav-link <?php if ($url=='/view/home.php'){ echo 'active';}else {echo '';} ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>خانه</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/view/user/create.php" class="nav-link <?php if ($url=='/view/user/create.php'){ echo 'active';}else {echo '';} ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>ایجاد کابر</p>
                  </a>
                </li>

              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>