<?php

include("../templates/header.php");

?>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="side-bar col-auto col-md-3 col-xl-2 px-sm-2 px-0">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                <div class="logo mt-4 mb-4">
                    <img src="../../assets/img/side-logo.svg" alt="">
                    <p>Perpustakaan Terpadu</p>
                </div>

                <div class="dashboar w-100 mb-2">
                    <a href="../dashboard">
                        <div id="dashboard" class="side-link row d-flex align-items-center justify-content-center">
                            <div class="col-3">
                                <img src="../../assets/img/dashboard-icon.svg" alt="">
                            </div>
                            <div class="col-9">
                                Dashboard
                            </div>
                        </div>
                    </a>
                </div>

                <div class="siswa w-100 mb-2">
                    <a href="../siswa">
                        <div id="siswa" class="side-link row d-flex align-items-center justify-content-center">
                            <div class="col-3">
                                <img src="../../assets/img/siswa-icon.svg" alt="">
                            </div>
                            <div class="col-9">
                                Siswa
                            </div>
                        </div>
                    </a>
                </div>

                <div class="data-buku w-100 mb-2">
                    <a href="../buku">
                        <div id="data-buku" class="side-link row d-flex align-items-center justify-content-center">
                            <div class="col-3">
                                <img src="../../assets/img/buku-icon.svg" alt="">
                            </div>
                            <div class="col-9">
                                Data Buku
                            </div>
                        </div>
                    </a>
                </div>

                <div class="peminjaman w-100 mb-2">
                    <a href="../peminjaman/">
                        <div id="pinjam" class="side-link row d-flex align-items-center justify-content-center">
                            <div class="col-3">
                                <img src="../../assets/img/peminjaman-icon.svg" alt="">
                            </div>
                            <div class="col-9">
                                Peminjaman
                            </div>
                        </div>
                    </a>
                </div>

                <div class="pengembalian w-100 mb-2">
                    <a href="../pengembalian/">
                        <div id="kembali" class="side-link row d-flex align-items-center justify-content-center">
                            <div class="col-3">
                                <img src="../../assets/img/pengembalian-iconn.svg" alt="">
                            </div>
                            <div class="col-9">
                                Pengembalian
                            </div>
                        </div>
                    </a>
                </div>

                <div class="w-100 mb-2 mt-3">
                    <a href="../../logout.php">
                        <div class="d-flex justify-content-center">
                            <div class="logout row d-flex align-items-center justify-content-center">
                                <div class="col-3">
                                    <img src="../../assets/img/logout-icon.svg" alt="">
                                </div>
                                <div class="text-log col-9">
                                    Log out
                                </div>
                            </div>
                        </div>

                    </a>
                </div>

            </div>
        </div>