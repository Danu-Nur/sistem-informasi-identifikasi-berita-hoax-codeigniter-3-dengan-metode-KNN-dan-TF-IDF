<div class="container-fluid">
<div class="row">
	<div class="col-12">
		<div class="card card-dark card-outline">
			<div class="card-header">
				<h3 class="card-title">Inbox</h3>
				<!-- /.card-tools -->
			</div>
				<!-- /.card-header -->
			<div class="card-body p-0">
			
			<div class="table-responsive mailbox-messages">
				<table class="table table-hover ">
				<thead>
				<tr>
				<th hidden>No</th>
				<th hidden>From</th>
				<th hidden>Saran</th>
				<th hidden>Aksi</th>
				</tr>
				<tbody>
				<?php foreach ($sar as $p): ?>
				<tr>
					<td>
					<div class="btn-group">
						<button type="button" onclick="deleteConfirm('<?php echo site_url('admin/Saran/delete/'.$p->ID_SARAN) ?>')"
						class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
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
			<!-- /.mail-box-messages -->
			</div>
			<!-- /.card-body -->
			
		</div>
		</div>
		</div>

	</div>
	<!-- /.container-fluid -->

			<!-- Modal read Data -->
	<?php $no=1; foreach ($sar as $p): ?>
	<div class="modal fade" id="readdata<?= $p->ID_SARAN ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
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
