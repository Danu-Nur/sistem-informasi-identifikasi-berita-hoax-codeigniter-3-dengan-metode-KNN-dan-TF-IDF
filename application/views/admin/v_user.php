<div class="container-fluid">
<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success'); ?>
		</div>
		<?php endif; ?>
	<div class="row">
		<div class="col-12">
		<div class="card card-dark card-outline">
			<div class="card-header">
			<h3 class="card-title">TABEL <?= $judul; ?></h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
			<a type="button" class="btn bg-dark my-2" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus"></i>
			Tambah Data</a>
			<table id="example1" class="table table-bordered table-striped">
				<thead class="thead-dark">
				<tr>
				<th>No</th>
				<th>Email</th>
				<th>Username</th>
				<th>Password</th>
				<th>Status User</th>
				<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				
				<?php $no=1; foreach ($usr as $p): ?>
				<tr>
				<td>
					<?php echo $no++; ?>
				</td>
				<td>
					<?php echo $p->EMAIL ?>
				</td>
				<td width="150">
					<?php echo $p->USRNAMA ?>
				</td>
				<td>
					<?php echo $p->PASWORD ?>
				</td>
				<td>
					<?php echo $p->STATUS_USER ?>
				</td>
				<td colspan="2">
					<a class="btn btn-small" data-toggle="modal" data-target="#editdata<?= $p->ID_USER ?>"><i class="fas fa-edit"></i> Edit </a>
					<a onclick="deleteConfirm('<?php echo site_url('admin/Data_User/delete/'.$p->ID_USER) ?>')"
					href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus </a>
				</td>
				</tr>
				<?php endforeach; ?>
				</tbody>
				<tfoot>
				<tr>
				<th>No</th>
				<th>Email</th>
				<th>Username</th>
				<th>Password</th>
				<th>Status User</th>
				<th>Aksi</th>
				</tr>
				</tfoot>
			</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	</div>
	<!-- /.container-fluid -->

<!-- Modal Tambah Data -->
	<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel"><?= $sub ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="<?php echo site_url('admin/Data_User') ?>" method="post" enctype="multipart/form-data" >
			<div class="form-group">
			<label for="EMAIL">Email*</label>
			<input class="form-control <?php echo form_error('EMAIL') ? 'is-invalid':'' ?>"
				type="text" name="EMAIL" placeholder="EMAIL" />
			<div class="invalid-feedback">
				<?php echo form_error('EMAIL') ?>
			</div>
			</div>

			<div class="form-group">
			<label for="USRNAMA">Username*</label>
			<input class="form-control <?php echo form_error('USRNAMA') ? 'is-invalid':'' ?>"
				type="text" name="USRNAMA" placeholder="Username" />
			<div class="invalid-feedback">
				<?php echo form_error('USRNAMA') ?>
			</div>
			</div>

			<div class="form-group">
			<label for="PASWORD">Password*</label>
			<input class="form-control <?php echo form_error('PASWORD') ? 'is-invalid':'' ?>"
				name="PASWORD" placeholder="Password"/>
			<div class="invalid-feedback">
				<?php echo form_error('PASWORD') ?>
			</div>
			</div>

			<div class="input-group mb-3">
			<div class="input-group-prepend">
				<label class="input-group-text" for="STATUS_USER">Status User</label>
			</div>
			<select class="custom-select <?php echo form_error('STATUS_USER') ? 'is-invalid':'' ?>" name="STATUS_USER"> 
				<option selected>Pilih...</option>
				<option value="ADMIN">ADMIN</option>
				<option value="USER">USER</option>
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

	<!-- Modal Edit Data -->
	<?php $no=1; foreach ($usr as $p): ?>
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
			<form action="<?php echo site_url('admin/Data_User/edit') ?>" method="post" enctype="multipart/form-data" >
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
