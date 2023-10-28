<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
<!-- HEADER: MENU + HEROE SECTION -->
<header>

<nav class="navbar navbar-expand-lg bg-light " 
style="min-height: 12vh; font-weight: 400">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="https://raw.githubusercontent.com/NaufallHilal/test/main/university-of-oxford.png" alt="Logo"
            width="30"
            height="30"
            class="d-inline-block align-text-top ms-5">
      Website Universitas 
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item ms-3 me-3">
          <a class="nav-link "  href="<?= base_url('/')?>">Beranda</a>
        </li>
        <li class="nav-item ms-2 me-2">
          <a class="nav-link active" aria-current="page" href="#">Users</a>
        </li>
        <li class="nav-item ms-3 me-3">
          <a class="nav-link "  href="<?= base_url('/kelas')?>">Kelas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="heroe">

        <h1><?=$user['nama']?></h1>

        <h2><?=$user['npm']?></h2>

    </div>

</header>

<!-- CONTENT -->

<section>

<div class="container overflow-hidden ">
  <div class="row gy-3">
  <div class="col-15">
      <div class="p-5 border bg-light" ><img
          src="<?= $user['foto'] ?? '<default-foto>' ?>"
          alt="naufal hilal"
          class="naufal"
          width="180"
          height="180"
        /></div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light"> <?=$user['nama']?></div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light"><?=$user['nama_kelas']?></div>
    </div>
    <div class="col-6">
      <div class="p-4 border bg-light"><?=$user['npm']?></div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light"><a href="<?= base_url('/user')?>" type="button" class="btn btn-info ms-1 me-1">Kembali</a></div>
    </div>
  </div>
</div>

</section>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
    <div class="environment">

        <p>Ilmu komputer</p>
        <p>Fakultas Matematika dan Ilmu Pengetahuan Alam</p>

    </div>

    <div class="copyrights">

        <p>&copy; <?= date('Y') ?> Universitas Lampung</p>

    </div>

</footer>
<?= $this->endSection()?>