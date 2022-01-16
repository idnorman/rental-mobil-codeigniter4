<?= view('web/partials/header', $header) ?>
<?= view('web/partials/topbar') ?>
<?= view('web/partials/navbar') ?>

<?= $this->renderSection('content') ?>

<?= view('web/partials/footer') ?>
