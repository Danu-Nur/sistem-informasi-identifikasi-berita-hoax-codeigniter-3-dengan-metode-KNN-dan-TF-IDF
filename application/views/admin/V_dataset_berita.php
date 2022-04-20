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
					<h3 class="card-title">TABEL <?= $judul; ?>
					</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<a type="button" class="btn bg-dark my-2" data-toggle="modal" data-target="#tambahdata"><i
							class="fas fa-plus"></i>
						Tambah Data</a>
					<a href="<?php echo site_url('admin/Dataset/hitungTFIDF') ?>"
						class="btn btn-success"><i class="fa fa-calculator"></i> Hitung Bobot TF.IDF </a>
					<table id="example1" class="table table-bordered table-striped">
						<thead class="thead-dark">
							<tr>
								<th>No</th>
								<th>Berita</th>
								<th>Status Berita</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php $no=1; foreach ($datber as $p): ?>
							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<!-- <td>
					<?php echo $p->USRNAMA ?>
								</td> -->
								<!-- <td>
					<?php echo $p->KEYWORDS ?>
								</td> -->
								<!-- <td>
					<?php echo $p->SUMBER ?>
								</td> -->
								<td>
									<?php echo substr($p->BERITA, 0, 30).". . . . . ." ?>
								</td>
								<td>
									<?php echo $p->STATUS_BERITA ?>
								</td>
								<td colspan="2">
									<a href="<?php echo site_url('admin/Dataset/detailData/'.$p->ID_BERITA) ?>"
										class="btn btn-small text-blue"><i class="fas fa-list"></i> Detail </a>
									<a class="btn btn-small" data-toggle="modal"
										data-target="#editdata<?= $p->ID_BERITA ?>"><i
											class="fas fa-edit"></i> Edit </a>
									<a onclick="deleteConfirm('<?php echo site_url('admin/Dataset/delete/'.$p->ID_BERITA) ?>')"
										href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus
									</a>
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
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><?= $sub ?>
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form
					action="<?php echo site_url('admin/Dataset') ?>"
					method="post" enctype="multipart/form-data">

					<input type="hidden" name="ID_USER"
						value="<?php echo $this->session->userdata('ID_USER');?>" />

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="ID_KEYWORD">Keyword</label>
						</div>
						<select
							class="custom-select <?php echo form_error('ID_KEYWORD') ? 'is-invalid':'' ?>"
							name="ID_KEYWORD">
							<option selected>Pilih...</option>
							<?php foreach ($kw as $s3): ?>
							<option
								value="<?php echo $s3->ID_KEYWORD ?>">
								<?php echo $s3->KEYWORDS?>
							</option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<label for="SUMBER">SUMBER*</label>
						<input
							class="form-control <?php echo form_error('SUMBER') ? 'is-invalid':'' ?>"
							type="text" name="SUMBER" placeholder="SUMBER" />
						<div class="invalid-feedback">
							<?php echo form_error('SUMBER') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="BERITA">BERITA*</label>
						<textarea
							class="form-control <?php echo form_error('BERITA') ? 'is-invalid':'' ?>"
							rows="10" style="max-width: 100%;" name="BERITA"
							placeholder="Masukkan Dataset..."></textarea>
						<div class="invalid-feedback">
							<?php echo form_error('BERITA') ?>
						</div>
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="STATUS_BERITA">Status Berita</label>
						</div>
						<select
							class="custom-select <?php echo form_error('STATUS_BERITA') ? 'is-invalid':'' ?>"
							name="STATUS_BERITA">
							<option selected>Pilih...</option>
							<option value="HOAX">HOAX</option>
							<option value="VALID">VALID</option>
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
<?php $no=1; foreach ($datber as $p): ?>
<div class="modal fade" id="editdata<?= $p->ID_BERITA ?>"
	tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><?= $sub2 ?>
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form
					action="<?php echo site_url('admin/Dataset/edit') ?>"
					method="post" enctype="multipart/form-data">

					<input type="hidden" name="ID_BERITA"
						value="<?php echo $p->ID_BERITA?>" />

					<input type="hidden" name="ID_USER"
						value="<?php echo $this->session->userdata('ID_USER');?>" />

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="ID_KEYWORD">Keyword</label>
						</div>
						<select
							class="custom-select <?php echo form_error('ID_KEYWORD') ? 'is-invalid':'' ?>"
							name="ID_KEYWORD">
							<option selected>Pilih...</option>
							<?php foreach ($kw as $s3): ?>
							<option
								value="<?php echo $s3->ID_KEYWORD ?>"
								<?php if ($p->ID_KEYWORD == $s3->ID_KEYWORD) {
    echo "selected";
} ?>><?php echo $s3->KEYWORDS?>
							</option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group">
						<label for="SUMBER">SUMBER*</label>
						<input
							class="form-control <?php echo form_error('SUMBER') ? 'is-invalid':'' ?>"
							type="text" name="SUMBER" placeholder="SUMBER"
							value="<?php echo $p->SUMBER ?>" />
						<div class="invalid-feedback">
							<?php echo form_error('SUMBER') ?>
						</div>
					</div>

					<div class="form-group">
						<label for="BERITA">BERITA*</label>
						<textarea
							class="form-control <?php echo form_error('BERITA') ? 'is-invalid':'' ?>"
							rows="10" style="max-width: 100%;" name="BERITA"
							placeholder="Masukkan Dataset..."><?php echo $p->BERITA ?></textarea>
						<div class="invalid-feedback">
							<?php echo form_error('BERITA') ?>
						</div>
					</div>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="STATUS_BERITA">Status Berita</label>
						</div>
						<select
							class="custom-select <?php echo form_error('STATUS_BERITA') ? 'is-invalid':'' ?>"
							name="STATUS_BERITA">
							<option selected>Pilih...</option>
							<option value="HOAX" <?php if ($p->STATUS_BERITA == "HOAX") {
    echo "selected";
} ?>>HOAX
							</option>
							<option value="VALID" <?php if ($p->STATUS_BERITA == "VALID") {
    echo "selected";
} ?>>VALID
							</option>
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
<?php endforeach;
