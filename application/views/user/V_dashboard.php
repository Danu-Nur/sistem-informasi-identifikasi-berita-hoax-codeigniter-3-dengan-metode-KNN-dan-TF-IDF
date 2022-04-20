<div class="container-fluid">
        <div class="row">
		<section class="col-lg-12 mx-auto connectedSortable">
		<div class="card card-dark card-outline bg-white">
			<div class="card-header ">
				<p >
					<b>Masukkan Berita Disini</b>
				</p>
			</div>
			<div class="card-body mx-auto" style="box-sizing: border-box; max-width:100%;">

			<form action="<?php echo site_url('user/User_idntifikasi/play') ?>" method="post" enctype="multipart/form-data" >
			
			<input type="hidden" name="ID_USER" value="<?php echo $this->session->userdata('ID_USER');?>" />

			<div class="form-group">
			<textarea class="form-control <?php echo form_error('DATA_UJI') ? 'is-invalid':'' ?>" 
				rows="12" style="max-width: 100%;" cols="120"
				name="DATA_UJI" autofocus="autofocus" placeholder="Masukkan Teks Berita Disini..."></textarea>
			<div class="invalid-feedback">
				<?php echo form_error('DATA_UJI') ?>
			</div>
			</div>
			
			<button type="submit" class="btn btn-dark"><i class="fa fa-search mr-1"></i> Identifikasi

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
