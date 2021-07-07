<?php

class Mahasiswa_model
{
    private $table = 'mahsiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMhs()
    {
        $this->db->query("SELECT * FROM $this->table ORDER BY nama ASC ");
        return $this->db->resultSet();
    }

    public function detailmhs($id)
    {
        $this->db->query("SELECT * FROM $this->table WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function upload()
    {
        $namaFile = str_replace(' ', '-', strtolower($_FILES['gambar']['name'])); //nama gambar

        $ukuranFile = $_FILES['gambar']['size'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // cek apakah ada gambar yang diupload
        $error = $_FILES['gambar']['error'];
        if ($error === 4) {
            return 'default.jpg';
        }


        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $pecahNamaGambar = explode('.', $namaFile);
        $ekstensiGambar = end($pecahNamaGambar);

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "
            <script>
                alert('Yang diupload bukan gambar');
                window.location.href = '" . BASEURL . "/mahasiswa';
            </script>";
            return false;
        }

        // cek jika ukurannya terlalu besar
        if ($ukuranFile > 1000000) {
            echo "
            <script>
                alert('Ukuran gambar terlalu besar');
                window.location.href = '" . BASEURL . "/mahasiswa';
            </script>";
            return false;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

        // lolos pengecekan, gambar siap diupload
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    }

    public function tambahDatamahasiswa($data)
    {
        $gambar = $this->upload();
        if (!$gambar) {
            return false;
        }

        $query = "INSERT INTO mahsiswa
                    VALUES
                    ('', :nama, :nrp, :email, :jurusan, :gambar)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('gambar', $gambar);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusFoto($id)
    {
        $this->db->query('SELECT gambar FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function hapusDataMahasiswa($id)
    {
        $hapusfoto = $this->hapusFoto($id);
        if (!$hapusfoto) {
            return false;
        }

        unlink("img/" . $hapusfoto['gambar']);

        $query = "DELETE FROM mahsiswa WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $gambar = $this->upload();
        if (!$gambar) {
            return false;
        }

        if ($gambar == "default.jpg") {
            $gambar = $data['gambar-lama'];
        }

        if ($gambar != $data['gambar-lama']) {
            unlink("img/" . $data['gambar-lama']);
        }

        $query = "UPDATE mahsiswa SET
                        nama = :nama,
                        nrp = :nrp,
                        email = :email,
                        jurusan = :jurusan,
                        gambar = :gambar 
                    WHERE id = :id";

        $this->db->query($query);

        $this->db->bind('id', $data['id']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('gambar', $gambar);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
