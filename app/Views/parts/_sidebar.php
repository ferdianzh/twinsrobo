<div class="outer">
  <?php
  helper('text');
  ?>
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile rounded" onmouseover="addShadow()" onmouseout="removeShadow()">
        <a href="/admin/" class="nav-link">
          <div class="profile-image">
            <img class="img-xs rounded-circle" src="/img/admin/<?= session()->get('foto'); ?>" alt="profile image">
            <div class="dot-indicator bg-success"></div>
          </div>
          <div class="text-wrapper">
            <p class="profile-name"><?= word_limiter(session()->get('nama'), 2); ?></p>
          </div>
        </a>
      </li>
      <li class="nav-item nav-category mb-3">Main Menu</li>
      <li class="nav-item mb-3">
        <a class="nav-link" href="/admin/data_admin">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Admin</span>
        </a>
      </li>
      <li class="nav-item mb-3">
        <a class="nav-link dropdown-list users" data-toggle="collapse" href="" aria-expanded="false" aria-controls="ui-basic" onclick="dropdown()">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Pengguna</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse ui-users" id="ui-front">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item mb-3 pt-3">
              <a class="nav-link" href="/admin/data_users">Users</a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="/admin/data_mentor">Mentor</a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="/admin/data_siswa">Siswa</a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="pages/ui-features/typography.html">Kontak</a>
            </li>
          </ul>
        </div>
      </li>
      <!-- <li class="nav-item mb-3">
        <a class="nav-link dropdown-list front" data-toggle="collapse" href="" aria-expanded="false" aria-controls="ui-basic" onclick="dropdown()">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Front End Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse ui-front" id="ui-front">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item mb-3 pt-3">
              <a class="nav-link" href="pages/ui-features/buttons.html">Banner</a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="pages/ui-features/dropdowns.html">Fitur Image</a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="pages/ui-features/typography.html">Logo</a>
            </li>
          </ul>
        </div>
      </li> -->
      <li class="nav-item mb-3">
        <a class="nav-link dropdown-list belajar" data-toggle="collapse" href="" aria-expanded="false" aria-controls="ui-basic" onclick="dropdown()">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Pembelajaran</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse ui-belajar" id="ui-belajar">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item mb-3 pt-3">
              <a class="nav-link" href="/admin/data_kelas">Kelas</a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="/admin/data_modul">Modul</a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="/admin/data_materi">Materi</a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="/admin/data_video_materi">Video Tutorial</a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="/admin/data_gambar_materi">Gambar Tutorial</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item mb-3">
        <a class="nav-link dropdown-list kategori" data-toggle="collapse" href="" aria-expanded="false" aria-controls="ui-basic" onclick="dropdown()">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Kategori</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse ui-kategori" id="ui-belajar">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item mb-3 pt-3">
              <a class="nav-link" href="/admin/data_kategori">Kategori</a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="/admin/data_kesulitan">Kasulitan</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item mb-3">
        <a class="nav-link dropdown-list blog" data-toggle="collapse" href="" aria-expanded="false" aria-controls="ui-basic" onclick="dropdown()">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Postingan</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse ui-blog" id="ui-belajar">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item mb-3 pt-3">
              <a class="nav-link" href="/admin/data_tips">Tips</a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="/admin/data_video_tips">Video Tips</a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="/admin/data_gambar_tips">Gambar Tips</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item mb-3">
        <a class="nav-link dropdown-list bayar" data-toggle="collapse" href="" aria-expanded="false" aria-controls="ui-basic" onclick="dropdown()">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Pembelian</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse ui-bayar" id="ui-belajar">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item mb-3 pt-3">
              <a class="nav-link" href="/admin/data_pembelian">Riwayat Pebelian</a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="/admin/data_atm">Rekening</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item mb-3">
        <a class="nav-link dropdown-list games" data-toggle="collapse" href="" aria-expanded="false" aria-controls="ui-basic" onclick="dropdown()">
          <i class="menu-icon typcn typcn-coffee"></i>
          <span class="menu-title">Games</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse ui-games" id="ui-belajar">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item mb-3 pt-3">
              <a class="nav-link" href="pages/ui-features/buttons.html">Mini Games</a>
            </li>
            <li class="nav-item mb-3">
              <a class="nav-link" href="pages/ui-features/dropdowns.html">Robot Plan</a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item mb-3">
        <a class="nav-link" href="/data_lomba">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Lomba</span>
        </a>
      </li>
      <li class="nav-item mb-3">
        <a class="nav-link" href="/admin/data_karir">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Karir</span>
        </a>
      </li>
      <li class="nav-item mb-3">
        <a class="nav-link" href="/data_fitur">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Fitur</span>
        </a>
      </li>
      <li class="nav-item mb-3">
        <a class="nav-link" href="/data_testimoni">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Testimoni</span>
        </a>
      </li>
      <li class="nav-item pb-3">
        <a class="nav-link" href="/login/logout">
          <i class="menu-icon typcn typcn-user-outline"></i>
          <span class="menu-title">Logout</span>
        </a>
      </li>
    </ul>
  </nav>
</div>