        <a class="nav-item nav-link" href="<?= BASEURL;?>">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="<?= BASEURL;?>/mahasiswa">Mahasiswa</a>
        <a class="nav-item nav-link active" href="<?= BASEURL;?>/about">About</a>
      </div>
    </div>
  </div>
</nav>

<div class="container">
    <h1 class="mt-4">About Me</h1>
    <img src="<?= BASEURL;?>/img/gw.jpeg" alt="" class="rounded-circle m-3 shadow" width="150px">
    <p>Hallo Nama saya <?= $data['nama']; ?> Saya Adalah Seorang <?= $data['kerja']; ?></p>
</div>