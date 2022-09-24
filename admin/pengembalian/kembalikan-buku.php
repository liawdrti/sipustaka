<?php

require_once '../../core/app.php';
if (!Session::exists('username')) {
    header('Location: ../../');
}

$data = $user->readEdit('tb_pinjam', 'id_pinjam', Input::get('id_pinjam'));

if (Input::get('submit')) {

    $in = $user->bukuKembali(array(
        'tgl_kembali' => Input::get('kembali'),
        'id_pinjam' => Input::get('id_pinjam')
    ));

    $up = $user->updatePinjam(Input::get('id_pinjam'), array(
        'status' => 'dikembalikan'
    ));

    if ($in && $up) {
        header('Location: ../pengembalian/');
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
        <div class="card w-50 h-100 m-5 border-0">
            <div class="card-body p-5">
                <div class="data">
                    <h5 class="text-center">Pengembalian Buku</h5>
                    <form action="" method="POST" class="mt-5" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="id_pinjam">Id Pinjam</label>
                            <input readonly type="text" name="id_pinjam" class="form-control" value="<?php echo $data['id_pinjam'] ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="kembali">Tanggal Kembali</label>
                            <input required type="date" name="kembali" class="form-control">
                        </div>
                        <input type="submit" name="submit" value="Kembalikan Buku" class="btn btn-primary w-100 mt-3">
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