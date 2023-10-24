<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
<div class="container overflow-hidden ">
  <div class="row gy-3">
    <div class="col-6">
      <div class="p-3 border bg-light"> <?=$nama?></div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light"><?=$kelas?></div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light"><?=$npm?></div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light"><button>Kembali</button></div>
    </div>
  </div>
</div>
    
<?= $this->endSection()?>
