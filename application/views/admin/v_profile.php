
    <div class="container-fluid overcover">
        <div class="card card-dark card-outline profile-box">
            
            <div class="home row my-3">
                <div class="image-box bg-dark">
					<img src="<?= base_url() ?>/templates/dist/img/AdminProfile.png" alt="">
                    <?php if($this->session->userdata('ID_USER')){ ?>
                </div>
				<div class="basic-detail row">
                <div class="col-md-8 detail-col">
                    <h2><?php echo $this->session->userdata('USRNAMA'); ?></h2>
                    <div class="btn-cover my-2">
					<a class="btn btn-small btn-dark" data-toggle="modal" data-target="#editdata<?= $this->session->userdata('ID_USER') ?>"><i class="fas fa-edit"></i> Edit </a>

					<button class="btn bg-dark my-2">
					<?php echo anchor('Welcome/logout', '<i class="nav-icon fas fa-sign-out-alt"></i> Logout'); ?>  </button>
					<?php } else { ?>
						<?php echo anchor('Welcome', 'Login'); ?>
						<?php } ?></button>
                    </div>
                </div>
            </div>
            </div>

            <section id="profile" class="home-dat my-4">
                <div class="row no-margin home-det">

                    <div class="col-md-12 home-dat">
                        
                        <div class="jumbo-address">
                            <div class="row no-margin">
								<?php foreach($prof1 as $p): ?>
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th class="table-dark">Email</th>
                                                <td><b><?php echo $p->EMAIL?></b>
												
												</td>
                                            </tr>
                                            <tr>
                                                <th class="table-dark">Username</th>
                                                <td><b><?php echo $p->USRNAMA?></b>
												
												</td>
                                            </tr>
                                            <tr>
                                                <th class="table-dark">Password</th>
                                                <td><b><?php echo $p->PASWORD?></b>
												
												</td>
                                            </tr>
                                            <tr>
                                                <th class="table-dark">Status User</th>
                                                <td><b><?php echo $p->STATUS_USER?></b>
												
												</td>
                                            </tr>
                                        </tbody>
                                    </table>
									<?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
	<!-- Modal Edit Data -->
	<?php $no=1; foreach ($prof1 as $p): ?>
	<div class="modal fade" id="editdata<?= $p->ID_USER ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel"><?= $sub2 ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="<?php echo site_url('admin/Profil/edit') ?>" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="ID_USER" value="<?php echo $p->ID_USER?>" />

			<div class="form-group">
				<label for="EMAIL">EMAIL*</label>
				<input class="form-control <?php echo form_error('EMAIL') ? 'is-invalid':'' ?>"
				type="text" name="EMAIL" placeholder="EMAIL" value="<?php echo $p->EMAIL ?>" />
				<div class="invalid-feedback">
				<?php echo form_error('EMAIL') ?>
				</div>
			</div>

			<div class="form-group">
			<label for="USRNAMA">Username*</label>
			<input class="form-control <?php echo form_error('USRNAMA') ? 'is-invalid':'' ?>"
				type="text" name="USRNAMA" placeholder="Username" value="<?php echo $p->USRNAMA ?>" />
			<div class="invalid-feedback">
				<?php echo form_error('USRNAMA') ?>
			</div>
			</div>

			<div class="form-group">
			<label for="PASWORD">Password*</label>
			<input class="form-control <?php echo form_error('PASWORD') ? 'is-invalid':'' ?>"
				name="PASWORD" placeholder="Password" value="<?php echo $p->PASWORD ?>"/>
			<div class="invalid-feedback">
				<?php echo form_error('PASWORD') ?>
			</div>
			</div>

			<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="STATUS_USER">Status User</label>
			</div>
			<select class="custom-select <?php echo form_error('STATUS_USER') ? 'is-invalid':'' ?>" name="STATUS_USER"> 
				<option value="ADMIN" <?php if ($p->STATUS_USER == "ADMIN"){echo "selected";} ?>>ADMIN</option>
				<option value="USER" <?php if ($p->STATUS_USER == "USER"){echo "selected";} ?>>USER</option>
			</select>
			</div>
			<button type="submit" class="btn btn-success">Save</button>
			</form>
			</div>
			<div class="modal-footer">
			<div class="card-footer small text-muted">
		<h5>field tanda * Harus Di isi</h5>
		</div>
			</div>
		</div>
		</div>
	</div>
	<?php endforeach; ?>
