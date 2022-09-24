<?php

require_once '../../core/app.php';
if (!Session::exists('username')) {
    header('Location: ../../');
}

$error = false;

if (Input::get('submit')) {

    if (empty(Input::imgName('cover'))) {
        $a = $user->updateBuku(Input::get('id_buku'), array(
            'judul_buku' => Input::get('judul'),
            'jumlah_buku' => Input::get('jumlah'),
            'pengarang' => Input::get('pengarang'),
            'penerbit' => Input::get('penerbit'),
            'tahun_terbit' => Input::get('tahun'),
            'isbn' => Input::get('isbn')
        ));

        if ($a) {
            header('Location: index.php');
        } else $error = true;
    } else {
        $a = $user->updateBuku(Input::get('id_buku'), array(
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
                    <h5 class="text-center">Edit Data Buku</h5>
                    <?php
                    $data = $user->readEdit('tb_buku', 'id_buku', Input::get('id_buku'));
                    ?>

                    <form action="" method="POST" class="mt-4" enctype="multipart/form-data">
                        <?php
                        if ($error == true) { ?>
                            <div class="alert alert-danger m-1" role="alert" style="height: auto; font-size: 12px;">
                                <?php echo 'Data tidak Boleh Kosong' ?>
                            </div>
                        <?php } ?>
                        <div class="form-group mb-3">
                            <label for="buku">Judul Buku</label>
                            <input required type="text" name="judul" class="form-control" value="<?php echo $data['judul_buku'] ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="buku">Cover Buku</label>
                            <input type="file" name="cover" class="form-control">
                        </div>

                        <div class="form-group mb-3 text-center">
                            <img src="../../assets/img/cover-buku/<?php echo $data['cover_buku'] ?>" width="20%">
                            <p class="mt-2">Sampul saat ini</p>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jumlah">Jumlah Buku</label>
                            <input required type="number" name="jumlah" class="form-control" value="<?php echo $data['jumlah_buku'] ?>">
                        </div>

                        <div class=" form-group mb-3">
                            <label for="buku">Pengarang</label>
                            <input required type="text" name="pengarang" class="form-control" value="<?php echo $data['pengarang'] ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="buku">Penerbit</label>
                            <input required type="text" name="penerbit" class="form-control" value="<?php echo $data['penerbit'] ?>">
                        </div>

                        <div class="form-group mb-3">
                            <label for="buku">Tahun Terbit</label>
                            <input required type="number" name="tahun" class="form-control" value="<?php echo $data['tahun_terbit'] ?>" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="buku">ISBN</label>
                            <input required type="number" name="isbn" class="form-control" value="<?php echo $data['isbn'] ?>">
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