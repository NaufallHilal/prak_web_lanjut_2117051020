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
          <a class="nav-link active" aria-current="page" href="<?= base_url('/user')?>">Users</a>
        </li>
        <li class="nav-item ms-3 me-3">
          <a class="nav-link "  href="<?= base_url('/kelas')?>">Kelas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="heroe">

        <h1>Edit Data User</h1>

        <h2>Ubah data user Nama, Npm, Kelas, Foto</h2>

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
<form action="<?= base_url('/user/'.$user['id'])?>" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="id" value="<?= $user['id']?>">
<?= csrf_field() ?>
<div class="mb-3 ms-3 me-3 mt-3">
    <img src="<?= $user['foto'] ?? '<default-foto>'?>" width="100" height="100" class="img mb-3">
    <label for="foto" class="form-label mt-3 ms-3">foto</label>
    <input type="file" class="form-control" id="foto" name="foto" >
  </div>  
  <div>

</div>
<div class="mb-3 ms-3 me-3 mt-3">
    <label for="nama" class="form-label">nama</label>
    <input type="text" class="form-control" id="nama" name="namaEdit" value="<?= $user['nama']?>">
  </div>
  <div class="mb-3 ms-3 me-3">
    <label for="npm" class="form-label">npm</label>
    <input type="text" class="form-control" id="npm" name="npmEdit" value="<?= $user['npm']?>">
  </div>
  <div class="mb-3 ms-3 me-3">
    <label for="kelas" class="form-label">kelas</label>
    <select class="form-select" name="kelasEdit" id="kelas" aria-label="Default select example">
    <option selected value="">Kelas</option>
    <?php
    foreach($kelas as $item){
      ?>
      <option value="<?=$item['id']?>" <?= $user['id_kelas'] == $item['id'] ? 'selected' : '' ?>>
      <?=$item['nama_kelas']?>
      </option>
      <?php
    }
    ?>
  </select>
  </div>
  
  <button type="submit" class="btn btn-primary ms-3 me-3">Submit</button>
  <a href="<?= base_url('/user')?>" type="button" class="btn btn-info ms-1 me-1">Kembali</a>
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