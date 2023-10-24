<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
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
        <a href="<?= base_url('user/'.$user['id'])?>" type="button" ><img src="https://raw.githubusercontent.com/NaufallHilal/test/main/show.png" width="20" height="18" alt="Detail"/></a>
      <a href="<?= base_url('/user/'.$user['id'].'/edit') ?>" type="button" class="btn btn-info ms-1 me-1">Edit</a>
      <form action="<?= base_url('/user/'.$user['id'])?>" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <?= csrf_field()?>
          <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
    </td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>
     </div>
    </div>
    <div class="col">
      <div class="p-3 border bg-light">
      <a href="<?=base_url('user/create')?>">
  Tambah Data
</a>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection()?>