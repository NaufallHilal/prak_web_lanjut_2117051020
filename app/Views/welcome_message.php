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
          <a class="nav-link active" aria-current="page" href="#">Beranda</a>
        </li>
        <li class="nav-item ms-2 me-2">
          <a class="nav-link "  href="<?= base_url('/user')?>">Users</a>
        </li>
        <li class="nav-item ms-3 me-3">
          <a class="nav-link "  href="<?= base_url('/kelas')?>">Kelas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="heroe">

        <h1>UTP Web Lanjut Naufal Hilal</h1>

        <h2>2117051020</h2>

    </div>

</header>

<!-- CONTENT -->

<section>

    <h1>Tentang tugas web ini</h1>

    <p>Halaman ini adalah beranda yang akan menampilkan beberapa menu untuk pengelolaan data mahasiswa</p>

    <p>Anda dapat melihat data Mahasiswa didalam page User. Dapat diakses melalui tab Users di dalam navbar</p>

    <pre><code>Beranda  <b>Users</b>   Kelas</code></pre>

    <p>Anda dapat melihat data kelas didalam page Kelas. Dapat diakses melalui tab Kelas di dalam navbar</p>

    <pre><code>Beranda  Users   <b>Kelas</b></code></pre>

</section>

<div class="further">

    <section>

        <h1>Tentang Saya</h1>

        <h2>
            Nama
        </h2>

        <p>Naufal Hilal</p>

        <h2>
            NPM
        </h2>

        <p>2117051020</p>

        <h2>
             Github
        </h2>

        <p>
             <a href="https://github.com/NaufallHilal/prak_web_lanjut_2117051020" target="_blank">
             Github Project</a></p>

    </section>

</div>

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