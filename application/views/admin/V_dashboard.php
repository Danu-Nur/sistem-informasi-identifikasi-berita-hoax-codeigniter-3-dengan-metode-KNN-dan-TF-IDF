
<div class="container-fluid">
  
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $this->db->count_all('tb_data_berita'); ?></h3>

                <h6>Dataset Berita</h6>
                <!-- <h6><?php echo var_dump($lama) ?></h6> -->
              </div>
              <div class="icon ">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url('admin/Dataset') ?>" class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $this->db->count_all('tb_data_uji'); ?></h3>

                <h6>Data Uji</h6>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url('admin/Data_Uji') ?>" class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-gradient-warning text-light">
              <div class="inner">
                <h3><?= $this->db->count_all('tb_user'); ?></h3>

                <h6>User</h6>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('admin/Data_User') ?>" class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-3">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $this->db->count_all('tb_saran'); ?></h3>

                <h6>Feedback</h6>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?= base_url('admin/Saran') ?>" class="small-box-footer bg-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <section class="col-lg-12 mx-auto connectedSortable">
          <div class="card card-dark card-outline bg-light">
			  		<div class="card-body mx-auto" style="box-sizing: border-box; max-width:100%;">

							<form action="<?php echo site_url('admin/Identifikasi/play') ?>" method="post" enctype="multipart/form-data" >
							
							<input type="hidden" name="ID_USER" value="<?php echo $this->session->userdata('ID_USER');?>" />

							<div class="form-group">
							<textarea class="form-control <?php echo form_error('DATA_UJI') ? 'is-invalid':'' ?>" 
								rows="9" style="max-width: 100%;" cols="120"
								name="DATA_UJI" autofocus="autofocus" placeholder="Masukkan Teks Berita Disini..."></textarea>
							<div class="invalid-feedback">
								<?php echo form_error('DATA_UJI') ?>
							</div>
							</div>
							
							<button type="submit" class="btn btn-warning float-right"><i class="fa fa-search mr-1"></i><b> Identifikasi</b>

						</button>
							</form>
				
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div>
