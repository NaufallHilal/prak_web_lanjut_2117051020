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
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-3">
        <li class="nav-item ms-2 me-3">
          <a class="nav-link "  href="<?= base_url('/')?>">Beranda</a>
        </li>
        <li class="nav-item ms-2 me-2">
          <a class="nav-link active" aria-current="page" href="#">Users</a>
        </li>
        <li class="nav-item ms-3 ">
          <a class="nav-link" href="<?= base_url('/kelas')?>">Kelas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="heroe">

        <h1>List Users</h1>

        <h2 class="fst-italic ">nama, npm, kelas, aksi</h2>

    </div>

</header>

<!-- CONTENT -->

<section>

<?php if(session()->getFlashdata('success')):?>
    <div class="row">
      <div class="col md-5">
        <div class="alert alert-success" role="alert">
          <?=session()->getFlashdata('success')?>
        </div>
      </div>
    </div>
    <?php endif; ?>
<div class="container mt-5 px-4 text-center">
  <div class="row gx-5">
    <div class="col-8">
     <div class="p-3 border bg-light">
     <table class="table table-dark table-bordered border-primary">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama</th>
      <th scope="col">NPM</th>
      <th scope="col">Kelas</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($users as $user){
    ?>
    <tr>
      <td><?=$user['id']?></td>
      <td><?=$user['nama']?></td>
      <td><?=$user['npm']?></td>
      <td><?=$user['nama_kelas']?></td>
      <td>
        <a href="<?= base_url('user/'.$user['id'])?>" type="button" class="btn btn-secondary "><img src="https://raw.githubusercontent.com/NaufallHilal/test/main/show.png" width="20" height="20" alt="Detail"/></a>
      <a href="<?= base_url('/user/'.$user['id'].'/edit') ?>" type="button" class="btn btn-info ms-1 me-1">Edit</a>
      <form action="<?= base_url('/user/'.$user['id'])?>" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <?= csrf_field()?>
          <button type="submit" class="btn btn-danger mt-1">Hapus</button>
    </form>
    </td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>
<?php if($users==null):?>
    <tr>Tidak ada data Users</tr>
    <?php endif; ?>
     </div>
    </div>
    <div class="col">
      <div class="p-3 border bg-light">
      <a href="<?=base_url('user/create')?>" type="button" class="btn btn-success ms-1 me-1">
  Tambah User
</a>
<a href="<?=base_url('/')?>" type="button" class="btn btn-danger ms-1 me-1 mt-1">
  Beranda
</a>
      </div>
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