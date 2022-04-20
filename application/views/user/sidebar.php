<aside class="main-sidebar sidebar-light-dark elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('user/User_profil') ?>" class="brand-link bg-light">
		<?php if($this->session->userdata('ID_USER')){ ?>
      <img src="<?= base_url() ?>/templates/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light "><?php echo $this->session->userdata('USRNAMA'); ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
				</div>
        <div class="nav nav-treeview">
					<button href="" class="btn btn-small bg-dark">
					<?php echo anchor('Welcome/logout', '<i class="nav-icon fas fa-sign-out-alt"></i> Logout'); ?>  </button>
					<?php } else { ?>
						<?php echo anchor('Welcome', 'Login'); ?>
						<?php } ?> 
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
					<li class="nav-item" >
            <a href="<?= base_url('user/User')?>" class="nav-link <?=$this->uri->segment(2) == 'User' || $this->uri->segment(2) == '' ? 'active' : ' ' ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item" >
            <a href="<?= base_url('user/User_idntifikasi')?>" class="nav-link <?=$this->uri->segment(2) == 'User_idntifikasi' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Hasil Identifikasi
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
					<li class="nav-item" >
            <a href="<?= base_url('user/User_saran')?>" class="nav-link <?=$this->uri->segment(2) == 'User_saran' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Feedback
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
