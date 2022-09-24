<?php

require_once '../../core/app.php';
if (!Session::exists('username')) {
    header('Location: ../../');
}

$data = $user->detailView('tb_buku', 'id_buku', Input::get('id_buku'));


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

                        $data = $user->detailView('tb_buku', 'id_buku', Input::get('id_buku'));

                        ?>
                        <!-- <div class="container"> -->
                        <div class="d-flex justify-content-around">
                            <div class="col-7">


                                <div class="form-group mb-3">
                                    <label for="buku">Judul Buku</label>
                                    <input readonly type="text" name="judul" class="form-control" value="<?php echo $data["judul_buku"] ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="jumlah">Jumlah Buku</label>
                                    <input readonly name="jumlah" class="form-control" value="<?php echo $data["jumlah_buku"] ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="buku">Pengarang</label>
                                    <input readonly name="pengarang" class="form-control" value="<?php echo $data["pengarang"] ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="buku">Penerbit</label>
                                    <input readonly name="penerbit" class="form-control" value="<?php echo $data["penerbit"] ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="buku">Tahun Terbit</label>
                                    <input readonly name="tahun" class="form-control" value="<?php echo $data["tahun_terbit"] ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="buku">ISBN</label>
                                    <input readonly name="isbn" class="form-control" value="<?php echo $data["isbn"] ?>">
                                </div>

                            </div>

                            <div class="col-4">
                                <div class="mt-4 text-center">
                                    <img class="border" src="../../assets/img/cover-buku/<?php echo $data['cover_buku'] ?>" style="max-width: 300px;">
                                </div>

                            </div>
                        </div>
                        <!-- </div> -->

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