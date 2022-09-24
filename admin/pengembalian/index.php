<?php

require_once '../../core/app.php';
if (!Session::exists('username')) {
    header('Location: ../../');
}

include('../templates/side-bar.php');
?>

<div class="content col m-0 p-0">
    <div class="head text-light d-flex align-items-center justify-content-between p-3" style="background-color: #4675ee; height: 60px; font-size: 18px; font-weight:500;">
        <div>Pengembalian</div>
        <div>
            <?php
            $adm = Session::get('username');
            echo 'Hai, ' . $adm;
            ?>
        </div>

    </div>
    <div class="card min-vh-100 m-3 border-0">
        <div class="card-body">
            <div class="menu d-flex justify-content-end">
                <!-- <button class="btn btn-primary">+ Tambah Kembali</button> -->
                <input type="search" class="search form-control w-25" id="search_field_input" onkeyup="search_table()" placeholder="Cari data pengembalian">
            </div>
            <div class="mt-4">
                <table class="table table-bordered" id="table_id">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Judul Buku</th>
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $field = $user->readKembali('tb_kembali');

                        if (!$field) {
                            echo "<tr><td colspan='7' align='center'>Belum Ada Data Pengembalian</td></tr>";
                        } else {
                            foreach ($field as $data) { ?>
                                <tr>
                                    <th style="width: 5%;" class="text-center"><?php echo $no; ?></th>
                                    <td><?php echo $data['nama_siswa']; ?></td>
                                    <td><?php echo $data['judul_buku']; ?></td>
                                    <td><?php echo $data['tgl_pinjam']; ?></td>
                                    <td><?php echo $data['tgl_kembali']; ?></td>
                                    <td>
                                        <div class="d-flex justify-content-evenly">
                                            <a href="edit-kembali.php?id_kembali=<?php echo $data['id_kembali']; ?>" class="btn btn-warning text-light"><i class="bi bi-pencil-square"></i></a>
                                            <a href="delete-kembali.php?id_kembali=<?php echo $data['id_kembali']; ?>" class="btn btn-danger" name="hapus" onclick="return confirm('Hapus Data Pengembalian?')"><i class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                                $no++;
                            }
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    var element = document.getElementById('kembali');
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