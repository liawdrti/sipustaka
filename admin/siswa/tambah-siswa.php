<?php

require_once '../../core/app.php';
if (!Session::exists('username')) {
    header('Location: ../../');
}

$error = false;

if (Input::get('submit')) {
    if ($user->insert_siswa(array(
        'nis' => Input::get('nis'),
        'nama_siswa' => Input::get('nama'),
        'foto_siswa' => Input::img('foto', '../../assets/img/pas-foto/'),
        'id_kelas' => Input::get('kelas'),
        'jk_siswa' => Input::get('jk'),
        'telp_siswa' => Input::get('telp'),
        'alamat_siswa' => Input::get('alamat')
    ))) {
        header('Location: index.php');
    } else {
        // echo "<script>window.history.go(-1);</script>";
        $error = true;
    }
}

include('../templates/side-bar.php');
?>


<div class="content col m-0 p-0">
    <div class="head text-light d-flex align-items-center justify-content-between p-3" style="background-color: #4675ee; height: 60px; font-size: 18px; font-weight:500;">
        <div>Siswa</div>
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
                    <h5 class="text-center">Tambah Data Siswa</h5>
                    <form action="" method="POST" class="mt-4" enctype="multipart/form-data">
                        <?php
                        if ($error == true) { ?>
                            <div class="alert alert-danger m-1" role="alert" style="height: auto; font-size: 12px;">
                                <?php echo 'Data tidak Boleh Kosong' ?>
                            </div>
                        <?php } ?>
                        <div class="form-group mb-3">
                            <label for="buku">Nomor Induk Siswa</label>
                            <input required type="number" name="nis" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="nama">Nama Lengkap</label>
                            <input required type="text" name="nama" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="foto">Pas Foto</label>
                            <input required type="file" name="foto" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="kelas">Kelas</label>
                            <select required name="kelas" id="kelas" class="form-select">
                                <option disabled selected>Pilih Kelas</option>
                                <?php
                                $field = $user->getTable('tb_kelas');

                                foreach ($field as $data) { ?>
                                    <option value="<?php echo $data['id_kelas'] ?>"><?php echo $data['nama_kelas'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="jk">Jenis Kelamin</label>
                            <select required name="jk" id="jk" class="form-select">
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="telp">Nomor telepon</label>
                            <input required type="number" name="telp" class="form-control" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <input required type="text" name="alamat" class="form-control">
                        </div>

                        <input type="submit" name="submit" value="Simpan Data" class="btn btn-primary w-100 mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var element = document.getElementById('siswa');
    element.classList.add("active");
</script>

<?php
include('../templates/footer.php');
?>