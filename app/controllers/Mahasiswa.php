<?php

class mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar mahasiswa';
        $data['mhs'] = $this->model('mahasiswa_model')->getAllMhs();
        $this->view('tampletes/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('tampletes/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail mahasiswa';
        $data['mhs'] = $this->model('mahasiswa_model')->detailmhs($id);
        $this->view('tampletes/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('tampletes/footer');
    }

    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahDatamahasiswa($_POST) > 0) {
            Flasher::setFlash("Data Mahasiswa", "Berhasil", "Disimpan", "success");
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash("Data Mahasiswa", "Gagal", "Disimpan", "danger");
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Mahasiswa_model')->hapusDatamahasiswa($id) > 0) {
            Flasher::setFlash("Data Mahasiswa", "Berhasil", "Dihapus", "success");
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash("Data Mahasiswa", "Gagal", "Dihapus", "danger");
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Mahasiswa_model')->detailmhs($_POST['id']));
    }

    public function ubah()
    {
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash("Data Mahasiswa", "Berhasil", "Diubah", "success");
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash("Data Mahasiswa", "Gagal", "Diubah", "danger");
            header('Location:' . BASEURL . '/mahasiswa');
            exit;
        }
    }
}
