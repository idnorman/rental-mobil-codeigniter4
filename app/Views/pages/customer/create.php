<?= $this->extend('app') ?>

<?= $this->section('addStyle') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
	
	  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data Pelanggan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('pelanggan') ?>">Data Pelanggan</a></li>
              <li class="breadcrumb-item active">Tambah Data Pelanggan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">

              <form action="/pelanggan/store" method="post">
              	<?= csrf_field() ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" placeholder="John Doe" value="<?= old('name'); ?>">
                    <div class="invalid-feedback">
			          <?= $validation->getError('name'); ?>
			        </div>
                  </div>
                  <div class="form-group">
                    <label for="phone">Nomor HP</label>
                    <input type="number" step="any" name="phone" class="form-control <?= ($validation->hasError('phone')) ? 'is-invalid' : ''; ?>" id="phone" placeholder="082200000000" value="<?= old('phone'); ?>">
                    <div class="invalid-feedback">
			          <?= $validation->getError('phone'); ?>
			        </div>
                  </div>
                  <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="textarea" name="address" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" id="address" placeholder="Jl. Soekarno-Hatta, Pekanbaru" value="<?= old('address'); ?>">
                    <div class="invalid-feedback">
			          <?= $validation->getError('address'); ?>
			        </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?= $this->endSection() ?>

<?= $this->section('addScript') ?>

<?= $this->endSection() ?>

<?= $this->section('addCustomScript') ?>

<?= $this->endSection() ?>