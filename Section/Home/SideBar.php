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

              if (! is_null($_SESSION['user'])){
                  $connect = DBConnection();
                  $user = getLoginUser($connect, $_SESSION['user']);
         echo " <a href=\"#\" class=\"d-block\">{$user->fname } {$user->lname}</a> ";

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
            <li class="nav-item has-treeview <?php if ($url=='/view/home.php'){ echo 'menu-open';}else {echo '';} ?>">
              <a href="#" class="nav-link  <?php if ($url=='/view/home.php'){ echo 'active';}else {echo '';} ?>">
                <i class="nav-icon fa fa-user"></i>
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

              </ul>
            </li>
              <li class="nav-item has-treeview  <?php if ($url=='/view/user/create.php' | $url=='/view/user/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                  <a href="#" class="nav-link  <?php if ($url=='/view/user/create.php' | $url=='/view/user/all.php'){ echo 'active';}else {echo '';} ?>">
                      <i class="nav-icon fa fa-user"></i>
                      <p>
                          کاربران
                          <i class="right fa fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="/view/user/create.php" class="nav-link <?php if ($url=='/view/user/create.php'){ echo 'active';}else {echo '';} ?>">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>ایجاد کاربر</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/view/user/all.php" class="nav-link <?php if ($url=='/view/user/all.php'){ echo 'active';}else {echo '';} ?>">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>همه کابران</p>
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="nav-item has-treeview  <?php if ($url=='/view/reshtetahsili/create.php' | $url=='/view/reshtetahsili/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                  <a href="#" class="nav-link  <?php if ($url=='/view/reshtetahsili/create.php' | $url=='/view/reshtetahsili/all.php'){ echo 'active';}else {echo '';} ?>">
                      <i class="nav-icon fa fa-user"></i>
                      <p>
                          رشته تحصیلی
                          <i class="right fa fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="/view/reshtetahsili/create.php" class="nav-link <?php if ($url=='/view/reshtetahsili/create.php'){ echo 'active';}else {echo '';} ?>">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>ایجاد رشته تحصیلی</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/view/reshtetahsili/all.php" class="nav-link <?php if ($url=='/view/reshtetahsili/all.php'){ echo 'active';}else {echo '';} ?>">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>رشته های تحصیلی</p>
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="nav-item has-treeview  <?php if ($url=='/view/lessoncourse/create.php' | $url=='/view/lessoncourse/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                  <a href="#" class="nav-link  <?php if ($url=='/view/lessoncourse/create.php' | $url=='/view/lessoncourse/all.php'){ echo 'active';}else {echo '';} ?>">
                      <i class="nav-icon fa fa-user"></i>
                      <p>
                          دروس رشته
                          <i class="right fa fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="/view/lessoncourse/create.php" class="nav-link <?php if ($url=='/view/lessoncourse/create.php'){ echo 'active';}else {echo '';} ?>">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>ایجاد درس</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/view/lessoncourse/all.php" class="nav-link <?php if ($url=='/view/lessoncourse/all.php'){ echo 'active';}else {echo '';} ?>">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>درس های رشته</p>
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