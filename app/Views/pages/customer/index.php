<?= $this->extend('app') ?>

<?= $this->section('addStyle') ?>
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pelanggan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
              <li class="breadcrumb-item active">Data Pelanggan</li>
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
          	 <?php
		        if(session()->getFlashData('success')){
		        ?>
      		    <div class="alert alert-success alert-dismissible fade show" role="alert">
      		        <i class="fas fa-check mr-2"></i> <?= session()->getFlashData('success') ?>
      		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      		        <span aria-hidden="true">&times;</span>
      		        </button>
      		    </div>
      		    <?php
		        }
		        ?>

            <?php
            if(session()->getFlashData('danger')){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-times mr-2"></i> <?= session()->getFlashData('danger') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
            }
            ?>

            <?php
            if(session()->getFlashData('info')){
            ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="fas fa-info mr-2"></i> <?= session()->getFlashData('info') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
            }
            ?>

            <div class="card">
              <div class="card-header">
             	<a href="pelanggan/tambah" class="btn btn-primary">Tambah Pelanggan</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabelMobil" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10">No</th>
                    <th>Nama</th>
                    <th>Nomor HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
               	  <?php $i = 1; ?>
                  <?php foreach($customers as $customer) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $customer['name'] ?></td>
                    <td><?= $customer['phone'] ?></td>
                    <td><?= $customer['address'] ?></td>
                    <td>
        
                      <a href="pelanggan/ubah/<?= $customer['id'] ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit fa-1 mr-1"></i>Ubah</a>
                      <button type="button" class="btn btn-sm btn-danger btn-hapus" data-id="<?= $customer['id'] ?>" data-name="<?= $customer['name'] ?>"><i class="fas fa-trash fa-1 mr-1"></i>Hapus</button>
                    </td>
                  </tr>
                  <?php endforeach ?>

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?= $this->endSection() ?>

<?= $this->section('addScript') ?>
  <div class="modal fade" id="modal-hapus">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title modal-hapus-title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin akan menghapus data ini?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times mr-1"></i>Batal</button>
          <form action="pelanggan/delete" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" class="input-hapus-id" name="id" value="">
            <button type="submit" class="btn btn-primary"><i class="fas fa-trash mr-1"></i>Hapus</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

	<!-- DataTables  & Plugins -->

	<script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
	<script src="<?= base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
	<script src="<?= base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
	<script src="<?= base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
	<script src="<?= base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
	<script src="<?= base_url('plugins/jszip/jszip.min.js') ?>"></script>
	<script src="<?= base_url('plugins/pdfmake/pdfmake.min.js') ?>"></script>
	<script src="<?= base_url('plugins/pdfmake/vfs_fonts.js') ?>"></script>
	<script src="<?= base_url('plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
	<script src="<?= base_url('plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
	<script src="<?= base_url('plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>

<?= $this->endSection() ?>

<?= $this->section('addCustomScript') ?>
  <script>
    $(function(){
      $(".btn-hapus").click(function(){
        let id    = $(this).data('id');
        let name  = $(this).data('name');

        $(".modal-hapus-title").text("Hapus data " + name);
        $(".input-hapus-id").val(id);

        $("#modal-hapus").modal("show");
      });
    });
  </script>

  <script>
    $(function () {
      $("#tabelMobil").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": [
            {
                extend: 'copy',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
                extend: 'colvis',
                exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            }
        ]
      }).buttons().container().appendTo('#tabelMobil_wrapper .col-md-6:eq(0)');
    });
  </script>

  <?php if(session()->getFlashData('success') or session()->getFlashData('danger') or session()->getFlashData('info')){ ?>
  <script>
    $(document).ready(function() {
      setTimeout(function() {
          $(".alert").alert('close');
      }, 1200);
    });
  </script>
  <?php } ?>

<?= $this->endSection() ?>