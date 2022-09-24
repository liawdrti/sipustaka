<?php

require_once '../../core/app.php';
if (!Session::exists('username')) {
    header('Location: ../../');
}

$error = false;

if (Input::get('submit')) {

    $a = $user->insert_buku(array(
        'judul_buku' => Input::get('judul'),
        'cover_buku' => Input::img('cover', '../../assets/img/cover-buku/'),
        'jumlah_buku' => Input::get('jumlah'),
        'pengarang' => Input::get('pengarang'),
        'penerbit' => Input::get('penerbit'),
        'tahun_terbit' => Input::get('tahun'),
        'isbn' => Input::get('isbn')
    ));

    if ($a) {
        header('Location: index.php');
    } else $error = true;
}



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
        <div class="card w-100 h-100 m-5 border-0">
            <div class="card-body p-5">
                <div class="data">
                    <h5 class="text-center">Tambah Data Buku</h5>
                    <form action="" method="POST" class="mt-4" enctype="multipart/form-data">
                        <?php
                        if ($error == true) { ?>
                            <div class="alert alert-danger m-1" role="alert" style="height: auto; font-size: 12px;">
                                <?php echo 'Data tidak Boleh Kosong' ?>
                            </div>
                        <?php } ?>
                        <div class="form-group mb-3">
                            <label for="buku">Judul Buku</label>
                            <input required type="text" name="judul" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="buku">Cover Buku</label>
                            <input required type="file" name="cover" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="jumlah">Jumlah Buku</label>
                            <input required type="number" name="jumlah" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="buku">Pengarang</label>
                            <input required type="text" name="pengarang" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="buku">Penerbit</label>
                            <input required type="text" name="penerbit" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="buku">Tahun Terbit</label>
                            <input required type="number" name="tahun" class="form-control" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="buku">ISBN</label>
                            <input required type="number" name="isbn" class="form-control">
                        </div>

                        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary w-100 mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var element = document.getElementById('data-buku');
    element.classList.add("active");
</script>

<?php
include('../templates/footer.php');
?>