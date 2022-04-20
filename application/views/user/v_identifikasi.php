
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
			<table id="example1" class="table table-bordered table-striped" >
				<thead class="thead-dark">
				<tr>
				<th>No</th>
				<th>Berita Identifikasi</th>
				<th>Hasil Identifikasi</th>
				<th>Aksi</th>
				</tr>
				</thead>
				<tbody>
				<?php $no=1; foreach ($hsl as $p) : ?>
				<tr>
				<td>
					<?php echo $no++; ?>
				</td>
				<td>
					<?php echo substr($p->DATA_UJI,0,40).'. . . .' ?>
				</td>
				<td>
					<?php echo $p->LABEL_IDENTIFIKASI ?>
				</td>
				<td colspan="2">
					<a href="<?php echo site_url('user/User_idntifikasi/detailIdentifikasi/'.$p->ID_DATA_UJI) ?>"
					class="btn btn-small text-blue"><i class="fas fa-list"></i> Detail </a>
					<!-- <a class="btn btn-small text-blue" data-toggle="modal" data-target="#editdata<?= $p->ID_IDENTIFIKASI ?>"><i class="fas fa-list"></i> Detail </a> -->
					<a onclick="deleteConfirm('<?php echo site_url('user/User_idntifikasi/delete/'.$p->ID_DATA_UJI) ?>')"
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
