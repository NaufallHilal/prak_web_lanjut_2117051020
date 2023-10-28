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
          <a class="nav-link "  href="<?= base_url('/user')?>">Users</a>
        </li>
        <li class="nav-item ms-3 me-3">
          <a class="nav-link active" aria-current="page" href="#">Kelas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="heroe">

        <h1>Tambah Data Kelas</h1>

        <h2>Masukkan data Kelas Nama</h2>

    </div>

</header>

<!-- CONTENT -->

<section>

<?php if(session()->getFlashdata('errors')):?>
    <div class="row">
      <div class="col md-5">
        <div class="alert alert-danger" role="alert">
          <?=session()->getFlashdata('errors')?>
        </div>
      </div>
    </div>
    <?php endif; ?>
<form action="<?= base_url('/kelas/store')?>" method="POST" enctype="multipart/form-data">
<?= csrf_field() ?>
<div class="mb-3 ms-3 me-3 mt-3">
    <label for="nama" class="form-label">nama</label>
    <input type="text" class="form-control" id="nama" name="namaKelas" value="<?= old('namaKelas')?>">
  </div>
  <button type="submit" class="btn btn-primary ms-3 me-3">Submit</button>
  <a href="<?= base_url('/kelas')?>" type="button" class="btn btn-info ms-1 me-1">Kembali</a>
</form>


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