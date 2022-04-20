
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/templates/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>/templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/templates/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-dark">
    <div class="card-header text-center">
      <b class="h3">Identifikasi Berita Hoax</b>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registrasi Member Baru</p>

      <form action="<?= base_url('Welcome/regis') ?>" method="post">

	  <?php echo form_error('EMAIL','<div class="text-danger small ml-2">','</div>'); ?>
	  <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="EMAIL">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <?php echo form_error('USRNAMA','<div class="text-danger small ml-2">','</div>'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="USRNAMA">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
				
        <?php echo form_error('PASWORD','<div class="text-danger small ml-2">','</div>'); ?>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="PASWORD">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
		  
        </div>
		
        <div class="row">
           <div class="col-8">
					<a href="<?= base_url() ?>" class="btn btn-outline-dark ">Sign In</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-dark btn-block">Registrasi</button>
          </div>
          <!-- /.col -->

		 
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>/templates/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/templates/dist/js/adminlte.min.js"></script>
</body>
</html>
