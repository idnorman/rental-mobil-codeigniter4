<!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date('Y') ?>
 <a href="#">Rental Starter</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url("plugins/jquery/jquery.min.js") ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url("plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
<?= $this->renderSection('addScript') ?>
<!-- AdminLTE App -->
<script src="<?= base_url("dist/js/adminlte.min.js") ?>"></script>
<?= $this->renderSection('addCustomScript') ?>
</body>
</html>
