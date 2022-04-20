
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $judul; ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/templates/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>/templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/templates/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style type="text/css">
         .bg-utama{
         background: url(http://localhost/tugas-akhir/templates/dist/img/black_hoax.png);
         background-size: cover;
         background-position: center;
         height: 110%;
         width: 110%;
         display: table;
         vertical-align: middle;
         overflow: hidden;

  position: fixed;

}
</style>
</head>
<body class="hold-transition login-page">
<div class="bg-utama"> </div>
<?php if ($this->session->flashdata('success')): ?>
		<div class="alert alert-success" role="alert">
		<?php echo $this->session->flashdata('success'); ?>
		</div>
		<?php endif; ?>
<div class="login-box ">
  <!-- /.login-logo -->
  <div class="card card-outline card-dark">
    <div class="card-header text-center">
      <p class="h3"><b>Identifikasi Berita Hoax</b></p>
    </div>
    <div class="card-body">
		<?php echo $this->session->flashdata('pesan'); ?>
      <p class="login-box-msg h3">Sign in</p>

      <form action="<?= base_url('Welcome') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" id="inputEmail" class="form-control" placeholder="Username" autofocus="autofocus" name="USRNAMA">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
				<?php echo form_error('USRNAMA','<div class="text-danger small ml-2">','</div>'); ?>
				
        <div class="input-group mb-3">
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="PASWORD">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
				<?php echo form_error('PASWORD','<div class="text-danger small ml-2">','</div>'); ?>

        <div class="row">
          <div class="col-8">
					<a href="<?= base_url('Welcome/regis') ?>" class="btn btn-outline-dark ">Registrasi Akun Baru</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-dark btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>/templates/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/templates/dist/js/adminlte.min.js"></script>
</body>
</html>
