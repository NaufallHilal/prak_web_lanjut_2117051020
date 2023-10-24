<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>

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
<?= csrf_field() ?>
<div class="mb-3 ms-3 me-3 mt-3">
    <img src="<?= $user['foto'] ?? '<default-foto>'?>" width="100" height="100">
    <label for="foto" class="form-label">foto</label>
    <input type="file" class="form-control" id="foto" name="foto" >
  </div>  
  <div>

</div>
<div class="mb-3 ms-3 me-3 mt-3">
    <label for="nama" class="form-label">nama</label>
    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']?>">
  </div>
  <div class="mb-3 ms-3 me-3">
    <label for="npm" class="form-label">npm</label>
    <input type="text" class="form-control" id="npm" name="npm" value="<?= $user['npm']?>">
  </div>
  <div class="mb-3 ms-3 me-3">
    <label for="kelas" class="form-label">kelas</label>
    <select class="form-select" name="kelas" id="kelas" aria-label="Default select example">
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
</form>

<?= $this->endSection()?>

