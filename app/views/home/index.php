        <a class="nav-item nav-link active" href="<?= BASEURL;?>">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" href="<?= BASEURL;?>/mahasiswa">Mahasiswa</a>
        <a class="nav-item nav-link" href="<?= BASEURL;?>/about">About</a>
      </div>
    </div>
  </div>
</nav>

<div class="container">
  <div class="jumbotron m-2">
    <h1 class="display-4">Selamat Datang Di Web Data mahasiswa</h1>
    <p class="lead">Hallo, Nama Saya <?= $data['nama']; ?></p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </p>
  </div>
</div>