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
            <h1>Ubah Data <?= $car['type'] ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('mobil') ?>">Data Mobil</a></li>
              <li class="breadcrumb-item active">Ubah Data <?= $car['type'] ?></li>
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

              <form action="/mobil/update" method="post">

                <input type="hidden" name="_method" value="PUT">
              	<?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= $car['id'] ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="type">Tipe Mobil</label>
                    <input type="text" name="type" class="form-control <?= ($validation->hasError('type')) ? 'is-invalid' : ''; ?>" id="type" placeholder="Toyota Avanza 2012 Putih" value="<?= (old('type')) ? old('type') : $car['type']; ?>">
                    <div class="invalid-feedback">
			          <?= $validation->getError('type'); ?>
			        </div>
                  </div>
                  <div class="form-group">
                    <label for="total">Jumlah</label>
                    <input type="number" step="any" name="total" class="form-control <?= ($validation->hasError('total')) ? 'is-invalid' : ''; ?>" id="total" placeholder="1" value="<?= (old('total')) ? old('total') : $car['total']; ?>">
                    <div class="invalid-feedback">
			          <?= $validation->getError('total'); ?>
			        </div>
                  </div>
                  <div class="form-group">
                    <label for="price">Harga sewa/hari</label>
                    <input type="number" step="any" name="price" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : ''; ?>" id="price" placeholder="500000" value="<?= (old('price')) ? old('price') : $car['price']; ?>">
                    <div class="invalid-feedback">
			          <?= $validation->getError('price'); ?>
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