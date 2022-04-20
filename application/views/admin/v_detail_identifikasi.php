<div class="container-fluid">
	<div class="row">
		<div class="col-12">
		<div class="card card-dark card-outline">
			<div class="card-header">
			<h3 class="card-title">TABEL <?= $berita; ?></h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead class="thead-dark">
				<tr>
				<th>Data Testing</th>
				<th>Status Identifikasi</th>
				</tr>
				</thead>
				<tbody>
				
				<?php foreach ($hsl as $a): ?>
				<tr>
				<td>
					<?php echo $a->DATA_UJI ?>
				</td>
				<td>
					<h1><?php echo $a->LABEL_IDENTIFIKASI ?></h1>
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

	

	<div class="container-fluid">
	<div class="row">
		<div class="col-12">
		<div class="card card-dark card-outline">
			<div class="card-header ">
			<h3 class="card-title">TABEL <?= $tabel; ?></h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead class="thead-dark">
				<tr>
				<th>No</th>
				<th>Trem</th>
				<th>Frekuensi</th>
				<th>Bobot</th>
				</tr>
				</thead>
				
				<tbody>
				<?php $no=1; foreach ($hsl2 as $b): ?>
				<tr>
				<td>
					<?php echo $no++; ?>
				</td>
				<td>
					<?php echo $b->TREM_UJI ?>
				</td>
				<td>
					<?php echo $b->FREK_UJI ?>
				</td>
				<td>
					<?php echo $b->BOBOT_KATA_UJI ?>
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

	<div class="container-fluid">
	<div class="row">
		<div class="col-12">
		<div class="card card-dark card-outline">
			<div class="card-header ">
			<h3 class="card-title">TABEL <?= $jarak; ?></h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
			<table class="table table-bordered table-striped">
				<thead class="thead-dark">
				<tr>
				<th>No</th>
				<th>Data Training</th>
				<th>Status Data</th>
				<th>Euclidean Distance</th>
				</tr>
				</thead>
				
				<tbody>
				<?php $no=1; foreach ($hsl3 as $c): ?>
				<tr>
				<td> 
					<?php echo $no++; ?>
				</td>
				<td>
					<?php echo substr($c->BERITA,0,30).". . . . ." ?>
				</td>
				<td>
					<?php echo $c->STATUS_BERITA ?>
				</td>
				<td>
					<?php echo $c->JARAK_EUCLIDEAN ?>
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
