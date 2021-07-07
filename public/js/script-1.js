$(function () {

  $('.tambah').on('click', function () {

    $('#judulmodal').html('Tambah Data Mahasiswa');
    $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/tambah')

    $('#id').val('');
    $('#nama').val('');
    $('#nrp').val('');
    $('#email').val('');
    $('#jurusan').val('Rekayasa Perangkat Lunak');

  });

  $('.ubah').on('click', function () {

    $('#judulmodal').html('Ubah Data Mahasiswa');
    $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah')
    const id = $(this).data('id');

    $.ajax({
      url: 'http://localhost/phpmvc/public/mahasiswa/getUbah',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        console.log(data);
        $('#id').val(data.id);
        $('#nama').val(data.nama);
        $('#nrp').val(data.nrp);
        $('#email').val(data.email);
        $('#jurusan').val(data.jurusan);
        $('#gambar-lama').val(data.gambar);
      }
    });

  });

});

