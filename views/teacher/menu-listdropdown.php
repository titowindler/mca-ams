         <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block text-capitalize">Hi, <?php echo $test; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal" style="cursor: pointer">
                <i class="fas fa-unlock"></i> Change Password
              </a>
              <a class="dropdown-item has-icon" data-toggle="modal" data-target="#profileModal" style="cursor: pointer">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="settings.php" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="../../logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>