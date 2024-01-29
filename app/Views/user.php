    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <div class="layout-page">
          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              <li class="nav-item lh-1 me-3">
                <a class="github-button" href="" data-icon="octicon-star" data-size="large" data-show-count="true"><?php
                                                                                                                    if (session()->get('level') == 1) {
                                                                                                                      echo 'admin';
                                                                                                                    } else {
                                                                                                                      echo 'adminstrator';
                                                                                                                    } ?></a>
              </li>
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                  <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <li class="nav-item lh-1 me-3">
                    </li>
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                          <a class="dropdown-item" href="#">
                            <div class="d-flex">
                              <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                  <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <span class="fw-semibold d-block">John Doe</span>
                                <small class="text-muted">Admin</small>
                              </div>
                            </div>
                          </a>
                        </li>
                        <li>
                          <div class="dropdown-divider"></div>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">Settings</span>
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="#">
                            <span class="d-flex align-items-center align-middle">
                              <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                              <span class="flex-grow-1 align-middle">Billing</span>
                              <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                            </span>
                          </a>
                        </li>
                        <li>
                          <div class="dropdown-divider"></div>
                        </li>
                        <li>
                          <a class="dropdown-item" href="auth-login-basic.html">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
          </nav>
          <div>
          </div>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="<?= base_url('home/dashboard') ?>">
                    Dashboard <span>/</span>
                  </a></span> Table User</h4>
              <a>
                <i class="menu-icon tf-icons bx bx-add"></i>
              </a>
              <div style="padding-bottom : 10px;">
                <a href="<?= base_url('home/tambah_user') ?>">
                  <button class="btn btn-primary d-grid w-10"><i class="menu-icon tf-icons bx bx-box"></i>
                  </button>
                </a>
              </div>
              <div class="card">
                <h5 class="card-header">Table User</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>level</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                      $no = 1;
                      foreach ($dt as $table) {

                      ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $table->username ?></td>
                          <td><?php if (session()->get('level') == 1) {
                                echo 'admin';
                              } else {
                                echo 'adminstrator';
                              } ?></td>
                          <td>
                            <a href="<?= base_url('home/edit_user' . $table->id_user) ?>"><button class="btn btn-primary"><i class="menu-icon tf-icons bx bx-box"></i></button></a>
                            <a href="<?= base_url('home/delete_user' . $table->id_user) ?>"><button class="btn btn-danger"><i class="menu-icon tf-icons bx bx-exit"></i></button></a>

                          </td>
                </div>
              </div>
              </td>
              </tr>
            <?php } ?>
            </tbody>
            </table>
            </div>
          </div>