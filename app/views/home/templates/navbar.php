
<nav class="navbar navbar-expand-lg fixed-top px-3">
      <div class="navbar-brand" href="#">
        <img src="<?= BASEURL ?>/dist/img/logo.webp" alt="Universitas Logo">
      <div class="logo-text">
        <span>UNIVERSITAS</span>
        <span>YAPIS PAPUA</span>
      </div>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fas fa-bars bg-white"></i></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
          <?php if (!(isset($_SESSION['auth']['login']))): ?>
            <a class="nav-link" href="<?= BASEURL ?>/">Pendaftaran</a>
          <?php else : ?>
            <a class="nav-link" href="<?= BASEURL ?>/dashboard">Dashboard</a>
          <?php endif; ?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= BASEURL ?>/home/prodi">Program Studi</a>
          </li>
          <li class="nav-item">
            <?php if (!(isset($_SESSION['auth']['login']))):?>
              <a class="nav-link" href="#agenda">Agenda</a>
            <?php endif; ?>
          </li>
        </ul>
      </div>
</nav>
<?php require_once('heroImage.php') ?>


