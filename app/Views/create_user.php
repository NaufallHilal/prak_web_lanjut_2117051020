<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php if(session()->getFlashdata('errors')):?>
    <div class="row">
      <div class="col md-5">
        <div class="alert alert-danger" role="alert">
          <?=session()->getFlashdata('errors')?>
        </div>
      </div>
    </div>
    <?php endif; ?>
<form action="<?= base_url('/user/store')?>" method="POST" enctype="multipart/form-data">
<?= csrf_field() ?>

<div class="mb-3 ms-3 me-3 mt-3">
    <label for="nama" class="form-label">nama</label>
    <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama')?>">
  </div>
  <div class="mb-3 ms-3 me-3">
    <label for="npm" class="form-label">npm</label>
    <input type="text" class="form-control" id="npm" name="npm" value="<?= old('npm')?>">
  </div>
  <div class="mb-3 ms-3 me-3">
    <label for="kelas" class="form-label">kelas</label>
    <select class="form-select" name="kelas" id="kelas" aria-label="Default select example">
    <option selected value="">Kelas</option>
    <?php
    foreach($kelas as $item){
      ?>
      <option value="<?=$item['id'] . ',' . $item['nama_kelas']?>">
      <?=$item['nama_kelas']?>
      </option>
      <?php
    }
    ?>
  </select>
  </div>
  
  <button type="submit" class="btn btn-primary ms-3 me-3">Submit</button>
</form>
</body>
</html>