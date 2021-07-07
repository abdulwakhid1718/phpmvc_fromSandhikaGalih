        <a class="nav-item nav-link" href="<?= BASEURL; ?>">Home <span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link active" href="<?= BASEURL; ?>/mahasiswa">Mahasiswa</a>
        <a class="nav-item nav-link" href="<?= BASEURL; ?>/about">About</a>
        </div>
        </div>
        </div>
        </nav>

        <div class="container">
          <div class="row mt-2">
            <div class="col-lg-6">
              <?php Flasher::flash(); ?>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-lg-6">
              <h3 class="mb-3">Daftar Mahasiswa</h3>
              <!-- Button trigger modal -->
              <button data-target="#tambahData" data-toggle="modal" type="button" class="btn btn-primary mb-3 tambah">
                Tambah Data Mahasiswa
              </button>
              <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                  <li class="list-group-item">
                    <?= ucwords($mhs['nama']); ?>
                    <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary float-right ml-2">Detail</a>
                    <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-success float-right ml-2 ubah" data-target="#tambahData" data-toggle="modal" data-id="<?= $mhs['id']; ?>">Ubah</a>
                    <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin Data Mau Dihapus?')">Hapus</a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="judulmodal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="judulmodal">Tambah Data mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post" enctype="multipart/form-data">
                  <input type="hidden" id="id" name="id">
                  <input type="hidden" id="gambar-lama" name="gambar-lama">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                  </div>

                  <div class="form-group">
                    <label for="nrp">NRP</label>
                    <input type="number" class="form-control" id="nrp" name="nrp" placeholder="NRP" required>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email@example.com" required>
                  </div>

                  <div class="form-group gambar">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" placeholder="Masukan Gambar">
                  </div>

                  <div class="form-group">
                    <label for="jurusan">Example select</label>
                    <select class="form-control" id="jurusan" name="jurusan">
                      <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                      <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                      <option value="Busana Butik">Busana Butik</option>
                      <option value="Pemasaran">Pemasaran</option>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                </form>
              </div>
            </div>
          </div>
        </div>