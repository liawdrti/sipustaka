<?php

require_once '../../core/app.php';
if (!Session::exists('username')) {
    header('Location: ../../');
}

$error = false;

if (Input::get('submit')) {

    if ($user->insertPinjam(array(
        'tgl_pinjam' => Input::get('tgl_pinjam'),
        'jatuh_tempo' => Input::get('jatuh_tempo'),
        'status' => Input::get('status'),
        'nis' => Input::get('siswa'),
        'id_buku' => Input::get('buku'),
    ))) {
        header('Location: index.php');
    } else {
        $error = true;
        // echo "<script>window.history.go(-1);</script>";
    }
}

include('../templates/side-bar.php');
?>

<div class="content col m-0 p-0">
    <div class="head text-light d-flex align-items-center justify-content-between p-3" style="background-color: #4675ee; height: 60px; font-size: 18px; font-weight:500;">
        <div>Peminjaman</div>
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
                    <h5 class="text-center">Tambah Peminjaman</h5>
                    <form action="" method="POST" class="mt-3">
                        <?php
                        if ($error == true) { ?>
                            <div class="alert alert-danger m-1" role="alert" style="height: auto; font-size: 12px;">
                                <?php echo 'Data tidak Boleh Kosong' ?>
                            </div>
                        <?php } ?>
                        <div class="form-group mb-3">
                            <label for="siswa">Nama Siswa</label>
                            <select required name="siswa" id="siswa" class="form-select">
                                <option disabled selected>Pilih Siswa</option>
                                <?php
                                $field = $user->getTable('tb_siswa');

                                foreach ($field as $data) { ?>
                                    <option value="<?php echo $data['nis'] ?>"><?php echo $data['nama_siswa'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="buku">Judul Buku</label>
                            <select required name="buku" id="buku" class="form-select">
                                <option disabled selected>Pilih Buku</option>
                                <?php
                                $field = $user->getTable('tb_buku');

                                foreach ($field as $data) { ?>
                                    <option value="<?php echo $data['id_buku'] ?>"><?php echo $data['judul_buku'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tgl_pinjam">Tanggal Pinjam</label>
                            <input required type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam">
                        </div>

                        <div class="form-group mb-3">
                            <label for="jatuh_tempo">Tanggal Jatuh Tempo</label>
                            <input required type="date" class="form-control" id="jatuh_tempo" name="jatuh_tempo">
                        </div>

                        <input type="hidden" name="status" value="dipinjam">
                        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary w-100 mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    var element = document.getElementById('pinjam');
    element.classList.add("active");
</script>
<?php
include('../templates/footer.php');
?>