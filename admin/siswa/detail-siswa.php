<?php

require_once '../../core/app.php';
if (!Session::exists('username')) {
    header('Location: ../../');
}

// $data = $user->detailView('tb_buku', 'id_buku', Input::get('id_buku'));


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
                    <h4>Data Buku</h4>
                    <form class="mt-4" enctype="multipart/form-data">
                        <?php

                        $data = $user->getJoinTwoWhere('tb_siswa', 'tb_kelas', 'id_kelas', 'nis', Input::get('nis'));

                        ?>

                        <div class="d-flex justify-content-around">
                            <div class="col-7">


                                <div class="form-group mb-3">
                                    <label for="buku">Nama Siswa</label>
                                    <input readonly type="text" name="judul" class="form-control" value="<?php echo $data["nama_siswa"] ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="jumlah">Kelas</label>
                                    <input readonly name="jumlah" class="form-control" value="<?php echo $data["nama_kelas"] ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="buku">Wali Kelas</label>
                                    <input readonly name="isbn" class="form-control" value="<?php echo $data["wali_kelas"] ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="buku">Jenis Kelamin</label>
                                    <input readonly name="pengarang" class="form-control" value="<?php echo $data["jk_siswa"] ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="buku">Nomor Telepon</label>
                                    <input readonly name="penerbit" class="form-control" value="<?php echo $data["telp_siswa"] ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="buku">Alamat</label>
                                    <input readonly name="tahun" class="form-control" value="<?php echo $data["alamat_siswa"] ?>">
                                </div>

                            </div>

                            <div class="col-4">
                                <div class="mt-4 text-center">
                                    <img class="border" src="../../assets/img/pas-foto/<?php echo $data['foto_siswa'] ?>" style="max-width: 300px;">
                                </div>

                            </div>
                        </div>

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