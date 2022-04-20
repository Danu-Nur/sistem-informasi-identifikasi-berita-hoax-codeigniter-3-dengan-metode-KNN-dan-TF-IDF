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
			<a type="button" class="btn bg-dark my-2" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus"></i> Tambah Data</a>
			<table id="example1" class="table table-bordered table-striped">
				<thead class="thead-dark">
				<tr>
				<th>No</th>
				<th>KEYWORDS</th>
				<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				
				<?php $no=1; foreach ($keyw as $p): ?>
				<tr>
				<td>
					<?php echo $no++; ?>
				</td>
				<td>
					<?php echo $p->KEYWORDS ?>
				</td>
				<td colspan="2">
					
					<a class="btn btn-small" data-toggle="modal" data-target="#editdata<?= $p->ID_KEYWORD ?>"><i class="fas fa-edit"></i> Edit </a>
					<a onclick="deleteConfirm('<?php echo site_url('admin/Data_Keyword/delete/'.$p->ID_KEYWORD) ?>')"
					href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus </a>
				</td>
				</tr>
				<?php endforeach; ?>
				</tbody>
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
			<form action="<?php echo site_url('admin/Data_Keyword') ?>" method="post" enctype="multipart/form-data" >

			<div class="form-group">
			<label for="KEYWORDS">KEYWORDS*</label>
			<input class="form-control <?php echo form_error('KEYWORDS') ? 'is-invalid':'' ?>"
				type="text" name="KEYWORDS" placeholder="KEYWORDS" />
			<div class="invalid-feedback">
				<?php echo form_error('KEYWORDS') ?>
			</div>
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
	<?php $no=1; foreach ($keyw as $p): ?>
	<div class="modal fade" id="editdata<?= $p->ID_KEYWORD ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel"><?= $sub2 ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="<?php echo site_url('admin/Data_Keyword/edit') ?>" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="ID_KEYWORD" value="<?php echo $p->ID_KEYWORD?>" />

			<div class="form-group">
				<label for="KEYWORDS">KEYWORDS*</label>
				<input class="form-control <?php echo form_error('KEYWORDS') ? 'is-invalid':'' ?>"
				type="text" name="KEYWORDS" placeholder="KEYWORDS" value="<?php echo $p->KEYWORDS ?>" />
				<div class="invalid-feedback">
				<?php echo form_error('KEYWORDS') ?>
				</div>
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
