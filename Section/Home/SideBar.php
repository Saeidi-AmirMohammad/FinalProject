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
              <?php
              if ($_SESSION["user_type"]==1):

              ?>

              <li class="nav-item has-treeview  <?php if ($url=='/view/user/create.php' | $url=='/view/user/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                  <a href="#" class="nav-link  <?php if ($url=='/view/user/create.php' | $url=='/view/user/all.php'){ echo 'active';}else {echo '';} ?>">
                      <i class="nav-icon fa fa-user"></i>
                      <p>
                          اطلاعات شخصی
                          <i class="right fa fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">

                      <li class="nav-item">
                          <a href="/view/user/all.php" class="nav-link <?php if ($url=='/view/user/all.php'){ echo 'active';}else {echo '';} ?>">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>مشاهده</p>
                          </a>
                      </li>
                  </ul>
              </li>






              <li class="nav-item has-treeview  <?php if ($url=='/view/news/create.php' | $url=='/view/news/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                  <a href="#" class="nav-link  <?php if ($url=='/view/news/create.php' | $url=='/view/news/all.php'){ echo 'active';}else {echo '';} ?>">
                      <i class="nav-icon fa fa-user"></i>
                      <p>
                         خبر و اطلاعیه
                          <i class="right fa fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="/view/news/create.php" class="nav-link <?php if ($url=='/view/news/create.php'){ echo 'active';}else {echo '';} ?>">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>ایجاد خبر</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/view/news/all.php" class="nav-link <?php if ($url=='/view/news/all.php'){ echo 'active';}else {echo '';} ?>">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>اخبار</p>
                          </a>
                      </li>
                  </ul>
              </li>







              <li class="nav-item has-treeview  <?php if ($url=='/view/presentation/create.php' | $url=='/view/presentation/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                  <a href="#" class="nav-link  <?php if ($url=='/view/presentation/create.php' | $url=='/view/presentation/all.php'){ echo 'active';}else {echo '';} ?>">
                      <i class="nav-icon fa fa-user"></i>
                      <p>
                          ارائه دروس
                          <i class="right fa fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">

                      <li class="nav-item">
                          <a href="/view/presentation/all.php" class="nav-link <?php if ($url=='/view/presentation/all.php'){ echo 'active';}else {echo '';} ?>">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>دروس ارائه شده</p>
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="nav-item has-treeview  <?php if ($url=='/view/chooselesson/create.php' | $url=='/view/chooselesson/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                  <a href="#" class="nav-link  <?php if ($url=='/view/chooselesson/create.php' | $url=='/view/chooselesson/all.php'){ echo 'active';}else {echo '';} ?>">
                      <i class="nav-icon fa fa-user"></i>
                      <p>
                         واحد درسی
                          <i class="right fa fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">

                      <li class="nav-item">
                          <a href="/view/chooselesson/all.php" class="nav-link <?php if ($url=='/view/chooselesson/all.php'){ echo 'active';}else {echo '';} ?>">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>واحدهای درسی انتخاب شده</p>
                          </a>
                      </li>
                  </ul>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="/view/grade/all.php" class="nav-link <?php if ($url=='/view/grade/all.php'){ echo 'active';}else {echo '';} ?>">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>نمره نهایی دروس</p>
                          </a>
                      </li>
                  </ul>
              </li>

              <?php

              endif;
              ?>
              <?php
              if ($_SESSION["user_type"]==2):

                  ?>

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

                  <li class="nav-item has-treeview  <?php if ($url=='/view/news/create.php' | $url=='/view/news/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/news/create.php' | $url=='/view/news/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              خبر و اطلاعیه
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/news/create.php" class="nav-link <?php if ($url=='/view/news/create.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>ایجاد خبر</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/view/news/all.php" class="nav-link <?php if ($url=='/view/news/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>اخبار</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview  <?php if ($url=='/view/termvorod/create.php' | $url=='/view/termvorod/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/termvorod/create.php' | $url=='/view/termvorod/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              ترم
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/termvorod/create.php" class="nav-link <?php if ($url=='/view/termvorod/create.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>ایجاد ترم</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/view/termvorod/all.php" class="nav-link <?php if ($url=='/view/termvorod/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>مشاهده ترم ها</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview  <?php if ($url=='/view/classroom/create.php' | $url=='/view/classroom/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/classroom/create.php' | $url=='/view/classroom/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              کلاس ها
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/classroom/create.php" class="nav-link <?php if ($url=='/view/classroom/create.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>ایجاد کلاس</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/view/classroom/all.php" class="nav-link <?php if ($url=='/view/classroom/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>مشاهده کلاس ها</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview  <?php if ($url=='/view/educationalgroup/create.php' | $url=='/view/educationalgroup/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/educationalgroup/create.php' | $url=='/view/educationalgroup/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              گروه آموزشی
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/educationalgroup/create.php" class="nav-link <?php if ($url=='/view/educationalgroup/create.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>ایجاد گروه آموزشی</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/view/educationalgroup/all.php" class="nav-link <?php if ($url=='/view/educationalgroup/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>گروهای آموزشی</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview  <?php if ($url=='/view/presentation/create.php' | $url=='/view/presentation/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/presentation/create.php' | $url=='/view/presentation/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              ارائه دروس
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/presentation/create.php" class="nav-link <?php if ($url=='/view/presentation/create.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>ایجاد ارائه درس</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/view/presentation/all.php" class="nav-link <?php if ($url=='/view/presentation/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>دروس ارائه شده</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview  <?php if ($url=='/view/chooselesson/create.php' | $url=='/view/chooselesson/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/chooselesson/create.php' | $url=='/view/chooselesson/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              واحد درسی
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/chooselesson/create.php" class="nav-link <?php if ($url=='/view/chooselesson/create.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>انتخاب واحد درسی</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/view/chooselesson/all.php" class="nav-link <?php if ($url=='/view/chooselesson/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>واحدهای درسی انتخاب شده</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/grade/all.php" class="nav-link <?php if ($url=='/view/grade/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>نمره نهایی دروس</p>
                              </a>
                          </li>
                      </ul>
                  </li>

              <?php

              endif;
              ?>
              <?php
              if ($_SESSION["user_type"]==3):

                  ?>

                  <li class="nav-item has-treeview  <?php if ($url=='/view/user/create.php' | $url=='/view/user/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/user/create.php' | $url=='/view/user/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              اطلاعات شخصی
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/user/all.php" class="nav-link <?php if ($url=='/view/user/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>همه کابران</p>
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
                              <a href="/view/lessoncourse/all.php" class="nav-link <?php if ($url=='/view/lessoncourse/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>درس های رشته</p>
                              </a>
                          </li>
                      </ul>
                  </li>


                  <li class="nav-item has-treeview  <?php if ($url=='/view/news/create.php' | $url=='/view/news/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/news/create.php' | $url=='/view/news/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              خبر و اطلاعیه
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/news/all.php" class="nav-link <?php if ($url=='/view/news/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>اخبار</p>
                              </a>
                          </li>
                      </ul>
                  </li>







                  <li class="nav-item has-treeview  <?php if ($url=='/view/presentation/create.php' | $url=='/view/presentation/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/presentation/create.php' | $url=='/view/presentation/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              ارائه دروس
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/presentation/all.php" class="nav-link <?php if ($url=='/view/presentation/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>دروس ارائه شده</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview  <?php if ($url=='/view/chooselesson/create.php' | $url=='/view/chooselesson/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/chooselesson/create.php' | $url=='/view/chooselesson/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              واحد درسی
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/chooselesson/create.php" class="nav-link <?php if ($url=='/view/chooselesson/create.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>  انتخاب واحد درسی حذف و اضافه </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/view/chooselesson/all.php" class="nav-link <?php if ($url=='/view/chooselesson/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>واحدهای درسی انتخاب شده</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/grade/all.php" class="nav-link <?php if ($url=='/view/grade/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>نمره نهایی دروس</p>
                              </a>
                          </li>
                      </ul>
                  </li>

              <?php

              endif;
              ?>
              <?php
              if ($_SESSION["user_type"]==4):

                  ?>

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

                  <li class="nav-item has-treeview  <?php if ($url=='/view/news/create.php' | $url=='/view/news/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/news/create.php' | $url=='/view/news/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              خبر و اطلاعیه
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/news/create.php" class="nav-link <?php if ($url=='/view/news/create.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>ایجاد خبر</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/view/news/all.php" class="nav-link <?php if ($url=='/view/news/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>اخبار</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview  <?php if ($url=='/view/termvorod/create.php' | $url=='/view/termvorod/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/termvorod/create.php' | $url=='/view/termvorod/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              ترم
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/termvorod/create.php" class="nav-link <?php if ($url=='/view/termvorod/create.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>ایجاد ترم</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/view/termvorod/all.php" class="nav-link <?php if ($url=='/view/termvorod/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>مشاهده ترم ها</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview  <?php if ($url=='/view/classroom/create.php' | $url=='/view/classroom/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/classroom/create.php' | $url=='/view/classroom/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              کلاس ها
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/classroom/create.php" class="nav-link <?php if ($url=='/view/classroom/create.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>ایجاد کلاس</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/view/classroom/all.php" class="nav-link <?php if ($url=='/view/classroom/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>مشاهده کلاس ها</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview  <?php if ($url=='/view/educationalgroup/create.php' | $url=='/view/educationalgroup/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/educationalgroup/create.php' | $url=='/view/educationalgroup/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              گروه آموزشی
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/educationalgroup/create.php" class="nav-link <?php if ($url=='/view/educationalgroup/create.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>ایجاد گروه آموزشی</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/view/educationalgroup/all.php" class="nav-link <?php if ($url=='/view/educationalgroup/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>گروهای آموزشی</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview  <?php if ($url=='/view/presentation/create.php' | $url=='/view/presentation/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/presentation/create.php' | $url=='/view/presentation/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              ارائه دروس
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/presentation/create.php" class="nav-link <?php if ($url=='/view/presentation/create.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>ایجاد ارائه درس</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/view/presentation/all.php" class="nav-link <?php if ($url=='/view/presentation/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>دروس ارائه شده</p>
                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview  <?php if ($url=='/view/chooselesson/create.php' | $url=='/view/chooselesson/all.php'){ echo 'menu-open';}else {echo '';} ?>">
                      <a href="#" class="nav-link  <?php if ($url=='/view/chooselesson/create.php' | $url=='/view/chooselesson/all.php'){ echo 'active';}else {echo '';} ?>">
                          <i class="nav-icon fa fa-user"></i>
                          <p>
                              واحد درسی
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/chooselesson/create.php" class="nav-link <?php if ($url=='/view/chooselesson/create.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>انتخاب واحد درسی</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="/view/chooselesson/all.php" class="nav-link <?php if ($url=='/view/chooselesson/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>واحدهای درسی انتخاب شده</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="/view/grade/all.php" class="nav-link <?php if ($url=='/view/grade/all.php'){ echo 'active';}else {echo '';} ?>">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>نمره نهایی دروس</p>
                              </a>
                          </li>
                      </ul>
                  </li>

              <?php

              endif;
              ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>