<?= view("partials/header", $header) ?>
  <?= $this->section('customHeader') ?>
    <?= $this->renderSection('customHeader') ?>
  <?= $this->endSection() ?>
<?= view("partials/sidebar") ?>
	<?= $this->renderSection('content') ?>
<?= view("partials/footer") ?>
  <?= $this->section('customFooter') ?>
    <?= $this->renderSection('customFooter') ?>
  <?= $this->endSection() ?>