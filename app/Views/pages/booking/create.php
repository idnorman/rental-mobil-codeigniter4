<?= $this->extend('app') ?>

<?= $this->section('addStyle') ?>

  <link rel="stylesheet" href="<?= base_url('plugins/select2/css/select2.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('plugins/daterangepicker/daterangepicker.css') ?>">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
	
	  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Data Booking</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('booking') ?>">Data Booking</a></li>
            <li class="breadcrumb-item active">Tambah Data Booking</li>
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
              <form action="/booking/store" method="post">
                <?= csrf_field() ?>
                <div class="card-body">
                  <div class="form-group">
                    <label>Pilih Pelanggan</label>
                    <select class="form-control <?= ($validation->hasError('customers_id')) ? 'is-invalid' : ''; ?> selectJs" name="customers_id">
                      <option <?= (old('customers_id')) ? "" : "selected" ?> disabled>Pilih...</option>
                      <?php foreach($customers as $customer): ?>
                      <option value="<?= $customer['id'] ?>" <?= (old('customers_id') == $customer['id']) ? "selected"  : "" ?> ><?= $customer['name'] ?> &mdash; <?= $customer['phone'] ?></option>
                      <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                      <?= $validation->getError('customers_id'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Pilih Mobil</label>
                    <select class="form-control <?= ($validation->hasError('cars_id')) ? 'is-invalid' : ''; ?> selectJs" name="cars_id" style="width: 100%;">
                      <option <?= (old('cars_id')) ? "" : "selected" ?> disabled>Pilih...</option>
                      <?php foreach($cars as $car): ?>
                      <option value="<?= $car['id'] ?>" <?= (old('cars_id') == $car['id']) ? "selected"  : "" ?> > <?= $car['type'] ?> &mdash; tersedia: <?= $car['total'] ?> mobil &mdash; Rp. <?= $car['price'] ?>/hari</option>
                      <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                      <?= $validation->getError('cars_id'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Tanggal mulai &mdash; selesai</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" name="bookingPeriod" class="form-control float-right bookingPeriod" id="bookingPeriod">
                    </div>
                    <!-- /.input group -->
                  </div>
                  <div class="form-group">
                    <label>Status Booking</label>
                    <select name="status" class="form-control custom-select">
                      <option value="pending" <?= (old('status') == 'pending') ? "selected"  : "" ?> > Menunggu</option>
                      <option value="in_progress" <?= (old('status') == 'in_progress') ? "selected"  : "" ?> >Rental Aktif</option>
                      <option value="done" <?= (old('status') == 'done') ? "selected"  : "" ?> >Selesai</option>
                    </select>
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

<script src="<?= base_url('plugins/select2/js/select2.full.min.js') ?>"></script>
<script src="<?= base_url('plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('plugins/daterangepicker/daterangepicker.js') ?>"></script>

<?= $this->endSection() ?>

<?= $this->section('addCustomScript') ?>
<script>
  
  $(function () {
    $('.selectJs').select2()
    $('.bookingPeriod').daterangepicker({
      locale: {
        format: 'DD-MM-yyyy',
      },
      minDate: new Date()
    });
  });
</script>

<?= $this->endSection() ?>