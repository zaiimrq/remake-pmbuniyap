<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">PMB UNIYAP</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="<?= BASEURL ?>/admin">
                <i class="fa-solid fa-grip"></i>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="<?= BASEURL ?>/admin/prodi">
                <i class="fa-solid fa-book"></i>
                Program Studi
              </a>
            </li>
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="<?= BASEURL ?>/admin/jadwal">
                <i class="fa-solid fa-square-poll-horizontal"></i>
                Jadwal
              </a>
            </li>
            </li>
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="<?= BASEURL ?>/admin/dokumen">
                <i class="fa-solid fa-square-poll-horizontal"></i>
                Dokumen
              </a>
            </li>
            </li>
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="<?= BASEURL ?>/admin/seleksi">
                <i class="fa-solid fa-square-poll-horizontal"></i>
                Hasil Seleksi
              </a>
            </li>
          </ul>

          <hr class="my-3">

          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2" href="<?= BASEURL ?>/home/logout">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Logout
              </a>
            </li>
          </ul>
        </div>
    </div>
</div>