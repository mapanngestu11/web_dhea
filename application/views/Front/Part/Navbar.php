<nav
class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0"
>
<a href="index.html" class="navbar-brand d-flex align-items-center">
  <h1 class="m-0">
    Kelurahan Karang Timur
  </h1>
</a>
<button
type="button"
class="navbar-toggler"
data-bs-toggle="collapse"
data-bs-target="#navbarCollapse"
>
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarCollapse">
  <div class="navbar-nav ms-auto py-3 py-lg-0">
    <a href="<?php echo base_url('Homepage/') ?>" class="nav-item nav-link active">Home</a>
    <a href="<?php echo base_url('Profil/') ?>" class="nav-item nav-link">Profil</a>

    <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pengajuan Surat</a
        >
        <div class="dropdown-menu bg-light m-0">
          <a href="feature.html" class="dropdown-item">Pembuatan KTP Baru</a>
          <a href="#" class="dropdown-item">Surat Kelahiran</a>
          <a href="#" class="dropdown-item">Surat Pendatang</a>

        </div>
      </div>
      <a href="<?php echo base_url('Contact/') ?>" class="nav-item nav-link">Kontak Kami</a>
    </div>
  </div>
</nav>