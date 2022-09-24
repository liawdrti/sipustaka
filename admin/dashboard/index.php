<?php
require_once '../../core/app.php';
if (!Session::exists('username')) {
    header('Location: ../../');
}

include('../templates/side-bar.php');
?>

<div class="content col m-0 p-0">
    <div class="head text-light d-flex align-items-center justify-content-between p-3" style="background-color: #4675ee; height: 60px; font-size: 18px; font-weight:500;">
        <div>Dashboard</div>
        <div>
            <?php
            $adm = Session::get('username');
            echo 'Hai, ' . $adm;
            ?>
        </div>

    </div>

    <div class="d-flex justify-content-between">
        <div class="col-4">
            <div class="card m-3 border-0" style="height: 150px;">
                <div class="card-body">
                    <div class="text-center mt-3 mb-2">
                        <h5>Jumlah Buku</h5>
                    </div>
                    <div class="c-value d-flex justify-content-center align-items-center">
                        <img src="../../assets/img/buku-icon.svg" alt="" width="40">
                        <div class="c-value-text">
                            <?php
                            $field = $user->getTable('tb_buku');
                            echo count($field);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card m-3 border-0" style="height: 150px;">
                <div class="card-body">
                    <div class="text-center mt-3 mb-2">
                        <h5>Jumlah Siswa</h5>
                    </div>
                    <div class="c-value d-flex justify-content-center align-items-center">
                        <img src="../assets/img/siswa-icon.svg" alt="" width="40">
                        <div class="c-value-text">
                            <?php
                            $field = $user->getTable('tb_siswa');
                            echo count($field);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card m-3 border-0" style="height: 150px;">
                <div class="card-body">
                    <div class="text-center mt-3 mb-2">
                        <h5>Transaksi Peminjaman</h5>
                    </div>
                    <div class="c-value d-flex justify-content-center align-items-center">
                        <img src="../../assets/img/peminjaman-icon.svg" alt="" width="40">
                        <div class="c-value-text">
                            <?php
                            $field = $user->getTable('tb_pinjam');
                            echo count($field);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card m-3 border-0">
        <div class="card-header border-0 bg-primary text-light">
            Buku Terbaru
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <?php

                    $field = $user->getTable('tb_buku');

                    foreach ($field as $data) { ?>
                        <div class="col-2">
                            <div class="img-cover mb-3 border">
                                <img class="img-fluid" src="../../assets/img/cover-buku/<?php echo $data['cover_buku'] ?>" class="img-responsive">
                            </div>
                            <a href="../buku/detail-buku.php?id_buku=<?php echo $data['id_buku'] ?>" class="btn btn-primary w-100">Lihat</a>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    var element = document.getElementById('dashboard');
    element.classList.add("active");
</script>
<?php
include('../templates/footer.php');
?>