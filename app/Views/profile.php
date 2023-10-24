<?= $this->extend('layouts/app')?>
<?= $this->section('content')?>
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
      <div class="p-3 border bg-light"><?=$user['npm']?></div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light"><button>Kembali</button></div>
    </div>
  </div>
</div>
    
<?= $this->endSection()?>
