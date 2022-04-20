<aside class="main-sidebar sidebar-dark-light elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin/Profil') ?>"
    class="brand-link bg-dark">
    <?php if ($this->session->userdata('ID_USER')) { ?>
    <img src="<?= base_url() ?>/templates/dist/img/AdminLTELogo.png"
      alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light "><?php echo $this->session->userdata('USRNAMA'); ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
      </div>
      <div class="nav nav-treeview nav-sidebar">
        <li>
          <button href="" class="btn btn-small bg-danger">
            <?php echo anchor('Welcome/logout', '<i class="nav-icon fas fa-sign-out-alt"></i> Logout'); ?>
          </button>
          <?php } else { ?>
          <?php echo anchor('Welcome', 'Login'); ?>
          <?php } ?>
        </li>

      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url('admin/Admin')?>"
            class="nav-link <?=$this->uri->segment(2) == 'Admin' || $this->uri->segment(2) == '' ? 'active' : ' ' ?>">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>

        <li
          class="nav-item <?=$this->uri->segment(2) == 'Dataset'
                    || $this->uri->segment(2) == 'Data_Uji'
                    || $this->uri->segment(2) == 'Data_Keyword'
                    // || $this->uri->segment(2) == 'Kata_Uji'
                    // || $this->uri->segment(2) == 'Kata_Dataset'
                    || $this->uri->segment(2) == 'Data_User' ? 'menu-open' : '' ?> ">

          <a href="#"
            class="nav-link <?=$this->uri->segment(2) == 'Dataset'
                        || $this->uri->segment(2) == 'Data_Uji'
                        || $this->uri->segment(2) == 'Data_Keyword'
                        // || $this->uri->segment(2) == 'Kata_Uji'
                        // || $this->uri->segment(2) == 'Kata_Dataset'
                        || $this->uri->segment(2) == 'Data_User' ? 'active' : '' ?>">

            <i class="nav-icon fas fa-th"></i>
            <p>
              Data Master
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/Data_Keyword') ?>"
                class="nav-link <?=$this->uri->segment(2) == 'Data_Keyword' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Keyword</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/Dataset') ?>"
                class="nav-link <?=$this->uri->segment(2) == 'Dataset' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Dataset Berita</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/Data_Uji') ?>"
                class="nav-link <?=$this->uri->segment(2) == 'Data_Uji' || $this->uri->segment(2) == '' ? 'active' : '' ?> ">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Uji</p>
              </a>
            </li>
            <!-- <li class="nav-item">
                <a href="<?= base_url('admin/Kata_Dataset') ?>"
            class="nav-link <?=$this->uri->segment(2) == 'Kata_Dataset' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Bobot Kata Dataset</p>
            </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin/Kata_Uji') ?>"
            class="nav-link <?=$this->uri->segment(2) == 'Kata_Uji' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Bobot Kata Uji</p>
          </a>
        </li> -->
        <li class="nav-item">
          <a href="<?= base_url('admin/Data_User') ?>"
            class="nav-link <?=$this->uri->segment(2) == 'Data_User' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
            <i class="far fa-circle nav-icon"></i>
            <p>Data User</p>
          </a>
        </li>
      </ul>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('admin/Identifikasi')?>"
          class="nav-link <?=$this->uri->segment(2) == 'Identifikasi' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Hasil Identifikasi
            <!-- <span class="right badge badge-danger">New</span> -->
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= base_url('admin/Saran')?>"
          class="nav-link <?=$this->uri->segment(2) == 'Saran' || $this->uri->segment(2) == '' ? 'active' : '' ?>">
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