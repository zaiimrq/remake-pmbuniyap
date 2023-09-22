
<nav class="navbar navbar-expand-lg fixed-top px-3">
    <div class="navbar-brand" href="#">
      <img src="<?= BASEURL ?>/dist/img/logo.webp" alt="Universitas Logo">
      <div class="logo-text">
            <span>UNIVERSITAS</span>
            <span>YAPIS PAPUA</span>
      </div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon white"><i class="fas fa-bars bg-white"></i></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL ?>/dashboard/index/<?= $_SESSION['auth']['login'] ?>">Dashboard</a>
              </li>
              <li class="nav-item mr-3">
                <a class="nav-link" href="<?= BASEURL ?>/dashboard/pengumuman">Pengumuman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL ?>/dashboard/logout" onclick="return confirm('Apakah Anda yakin ingin logout?')"><i class="fas fa-sign-out-alt fa-lg"></i> Logout</a>
              </li>
            </ul>
    </div>
</nav>


