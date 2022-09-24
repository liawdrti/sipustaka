<?php

require_once '../../core/app.php';
if (!Session::exists('username')) {
    header('Location: ../../');
}

// if (Input::get('id_pinjam')) {
//     if ($user->bukuKembali(Input::get('status')) && $user->updatePinjam(Input::get('status'), array('status' => 'dikembalikan'))) {
//         header('Location: index.php');
//     }
// }

$errorInsert = false;

$data = $user->readEdit('tb_kembali', 'id_kembali', Input::get('id_kembali'));

// $cekImg = Input::img('cover', '../../assets/img/cover-buku/');

if (Input::get('submit')) {

    $in = $user->updateKembali(Input::get('id_kembali'), array(
        'tgl_kembali' => Input::get('kembali')
    ));

    if ($in) {
        header('Location: index.php');
    } else {
    }
}



// if (Input::get('submit')) {

//     $user->insert_buku(array(
//         'judul_buku' => Input::get('judul'),
//         'cover_buku' => Input::img('cover', '../../assets/img/cover-buku/'),
//         'jumlah_buku' => Input::get('jumlah'),
//         'pengarang' => Input::get('pengarang'),
//         'penerbit' => Input::get('penerbit'),
//         'tahun_terbit' => Input::get('tahun'),
//         'isbn' => Input::get('isbn')
//     ));
// }



include('../templates/side-bar.php');
?>

<div class="content col m-0 p-0">
    <div class="head text-light d-flex align-items-center justify-content-between p-3" style="background-color: #4675ee; height: 60px; font-size: 18px; font-weight:500;">
        <div>Buku</div>
        <div>
            <?php
            $adm = Session::get('username');
            echo 'Hai, ' . $adm;
            ?>
        </div>

    </div>
    <div class="d-flex justify-content-center">
        <div class="card w-50 h-100 m-5 border-0">
            <div class="card-body p-5">
                <div class="data">
                    <h5 class="text-center">Ubah Pengembalian Buku</h5>
                    <form action="" method="POST" class="mt-5" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="id_pinjam">Id Pinjam</label>
                            <input readonly type="text" name="id_pinjam" class="form-control" value="<?php echo $data['id_pinjam'] ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="kembali">Tanggal Kembali</label>
                            <input required type="date" name="kembali" class="form-control" value="<?php echo $data['tgl_kembali'] ?>">
                        </div>
                        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary w-100 mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var element = document.getElementById('kembali');
    element.classList.add("active");
</script>

<?php
include('../templates/footer.php');
?>