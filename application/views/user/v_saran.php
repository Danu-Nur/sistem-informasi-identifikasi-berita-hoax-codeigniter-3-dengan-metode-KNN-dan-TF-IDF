<div class="container-fluid">
<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success'); ?>
		</div>
		<?php endif; ?>
		<div class="card card-dark card-outline">
			<div class="card-header">
			<h3 class="card-title">Inbox</h3>
			<div class="float-right ">
				<a type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#tambahdata">
				<i class="fas fa-envelope"></i> Pesan Baru <i class="fas fa-plus"></i></a>
				
			</div>
			</div>
			<div class="card-body p-0">
			
			<div class="table-responsive mailbox-messages">
				<table class="table table-hover table-striped">
				<?php foreach ($sar as $p): ?>
				<tr>
					<td>
					<div class="btn-group">
						<button type="button" onclick="deleteConfirm('<?php echo site_url('admin/Saran/delete/'.$p->ID_SARAN) ?>')"
						class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
					</div>
					<div class="btn-group">
						<button type="button" data-toggle="modal" data-target="#editdata<?= $p->ID_SARAN ?>"
						class="btn btn-default btn-sm"><i class="far fa-edit"></i></button>
					</div>
					</td>
					<td class="mailbox-name"><a href="" data-toggle="modal" data-target="#readdata<?= $p->ID_SARAN ?>"><b><?php echo $p->EMAIL ?></b> </a></td>
					<td class="mailbox-subject"><?php echo substr($p->SARAN,0,10).". . . ." ?>
					</td>
					<td class="mailbox-attachment"></td>
					<td class="mailbox-date"><?php echo $p->TIME ?></td>
				</tr>
				<?php endforeach; ?>
				</tbody>
				</table>
				<!-- /.table -->
			</div>
		</div>
		<div class="card-footer p-0">
		</div>
	</div>
</div>
	<!-- /.container-fluid -->
	
<!-- Modal Tambah Data -->
	<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel"><?= $sub ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="<?php echo site_url('user/User_saran') ?>" method="post" enctype="multipart/form-data" >

			<input type="hidden" name="ID_USER" value="<?php echo $this->session->userdata('ID_USER');?>" />

			<div class="form-group">
			<label for="SARAN">SARAN*</label>
			<input class="form-control <?php echo form_error('SARAN') ? 'is-invalid':'' ?>"
				type="text" name="SARAN" placeholder="SARAN" />
			<div class="invalid-feedback">
				<?php echo form_error('SARAN') ?>
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
	<?php $no=1; foreach ($sar as $p): ?>
	<div class="modal fade" id="editdata<?= $p->ID_SARAN ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			<h4 class="modal-title" id="exampleModalLabel"><?= $sub2 ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
			<form action="<?php echo site_url('user/User_saran/edit') ?>" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="ID_SARAN" value="<?php echo $p->ID_SARAN?>" />
			<input type="hidden" name="ID_USER" value="<?php echo $this->session->userdata('ID_USER');?>" />

			<div class="form-group">
				<label for="SARAN">SARAN*</label>
				<input class="form-control <?php echo form_error('SARAN') ? 'is-invalid':'' ?>"
				type="text" name="SARAN" placeholder="SARAN" value="<?php echo $p->SARAN ?>" />
				<div class="invalid-feedback">
				<?php echo form_error('SARAN') ?>
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

			<!-- Modal read Data -->
	<?php $no=1; foreach ($sar as $p): ?>
	<div class="modal fade" id="readdata<?= $p->ID_SARAN ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="card card-primary card-outline">
			<div class="card-header">
			<h3 class="card-title">Read Mail</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="card-body p-0">
			<div class="mailbox-read-info">
				<h5>From : <?php echo $p->EMAIL ?>
				<span class="mailbox-read-time float-right"><?php echo $p->TIME ?></span></h5>
			</div>
			<div class="mailbox-read-message">
				<p><?php echo $p->SARAN ?></p>
			</div>
			</div>
			<div class="card-footer">
			</div>
		</div>
		</div>
		</div>
	</div>
	<?php endforeach; ?>
