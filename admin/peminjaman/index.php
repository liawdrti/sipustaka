<?php

require_once '../../core/app.php';
if (!Session::exists('username')) {
    header('Location: ../../');
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
    <div class="card min-vh-100 m-3 border-0">
        <div class="card-body">
            <div class="menu d-flex justify-content-between">
                <button class="btn btn-primary" onclick="window.location.href='tambah-pinjam.php';">+ Tambah Peminjam</button>
                <input type="search" class="search form-control w-25" id="search_field_input" onkeyup="search_table()" placeholder="Cari data peminjaman">
            </div>
            <div class="mt-4">
                <table class="table table-bordered" id="table_id">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Judul Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Jatuh Tempo</th>
                            <th style="width: 25%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $statusVales = "'dipinjam'";
                        $field = $user->getJoinThree('tb_pinjam', 'tb_siswa', 'nis', 'tb_buku', 'id_buku', 'status', $statusVales);

                        if (!$field) {
                            echo "<tr><td colspan='7' align='center'>Belum Ada Data Peminjaman</td></tr>";
                        } else {
                            foreach ($field as $data) {
                                if ($data['status'] === 'dipinjam') { ?>
                                    <tr>
                                        <th style="width: 5%;" class="text-center"><?php echo $no; ?></th>
                                        <td><?php echo $data['nama_siswa']; ?></td>
                                        <td><?php echo $data['judul_buku']; ?></td>
                                        <td><?php echo $data['tgl_pinjam']; ?></td>
                                        <td><?php echo $data['jatuh_tempo']; ?></td>
                                        <td>
                                            <div class="d-flex justify-content-between">
                                                <a href="edit-pinjam.php?id_pinjam=<?php echo $data['id_pinjam']; ?>" class="btn btn-warning text-light"><i class="bi bi-pencil-square"></i></a>
                                                <a href="delete-pinjam.php?id_pinjam=<?php echo $data['id_pinjam']; ?>" class="btn btn-danger" name="hapus" onclick="return confirm('Hapus Data Peminjaman?')"><i class="bi bi-trash-fill"></i></a>
                                                <a href="../pengembalian/kembalikan-buku.php?id_pinjam=<?php echo $data['id_pinjam']; ?>" class="btn btn-success">Kembalikan</i></a>
                                            </div>
                                        </td>
                                    </tr>
                        <?php
                                    $no++;
                                }
                            }
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var element = document.getElementById('pinjam');
    element.classList.add("active");

    function search_table() {
        // Deklarasi variabel
        var input, filter, table, tr, td, i;
        input = document.getElementById("search_field_input");
        filter = input.value.toUpperCase();
        table = document.getElementById("table_id");
        tr = table.getElementsByTagName("tr");

        // Loop row jika memenuhi kondisi, dan sembunyikan jika tidak cocok dengan input search
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td");
            for (j = 0; j < td.length; j++) {
                let tdata = td[j];
                if (tdata) {
                    if (tdata.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    } else {
                        tr[i].style.display = "none"
                    }


                }
            }
        }
    }
</script>
<?php
include('../templates/footer.php');
?>