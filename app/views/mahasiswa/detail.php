        <a class="nav-item nav-link" href="<?= BASEURL;?>">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link active" href="<?= BASEURL;?>/mahasiswa">Mahasiswa</a>
        <a class="nav-item nav-link" href="<?= BASEURL;?>/about">About</a>
      </div>
    </div>
  </div>
</nav>

<div class="container">
  <div class="card mt-3" style="width: 20rem;">
    <div class="card-body">
      <img src="<?= BASEURL;?>/img/<?= $data['mhs']['gambar']?>" alt="" class="img-thumbnail mb-2">
      <h5 class="card-title"><?= ucwords($data['mhs']['nama']); ?></h5>
      <h6 class="card-subtitle mb-2 text-muted"><?= $data['mhs']['nrp']; ?></h6>
      <p class="card-text"><?= $data['mhs']['email']; ?></p>
      <p class="card-text"><?= $data['mhs']['jurusan']; ?></p>
      <a href="<?= BASEURL; ?>/mahasiswa">Kembali</a>
    </div>
  </div>
</div>
