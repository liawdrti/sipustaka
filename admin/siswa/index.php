<?php

require_once '../../core/app.php';
if (!Session::exists('username')) {
    header('Location: ../../');
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
    <div class="card min-vh-100 m-3 border-0">
        <div class="card-body">
            <div class="menu d-flex justify-content-between">
                <button class="btn btn-primary" onclick="window.location.href='tambah-siswa.php';">+ Tambah Siswa</button>
                <input type="search" class="search form-control w-25" id="search_field_input" onkeyup="search_table()" placeholder="Cari data siswa">
            </div>

            <div class="mt-4">
                <table class="table table-bordered" id="table_id">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th style="width: 25%;">Foto</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $field = $user->getJoinTwo('tb_siswa', 'tb_kelas', 'id_kelas');

                        if (!$field) {
                            echo "<tr><td colspan='7' align='center'>Belum Ada Data Buku</td></tr>";
                        } else {
                            foreach ($field as $data) { ?>
                                <tr>
                                    <th style="width: 5%;" class="text-center"><?php echo $no; ?></th>
                                    <td class="text-center"><?php echo $data['nis']; ?></td>
                                    <td><?php echo $data['nama_siswa']; ?></td>
                                    <td class="text-center"><?php echo $data['nama_kelas']; ?></td>
                                    <td class="text-center"><img style="width: 50%;" src="../../assets/img/pas-foto/<?php echo $data['foto_siswa']; ?>" alt=""></td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="detail-siswa.php?nis=<?php echo $data['nis']; ?>" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                            <a href="edit-siswa.php?nis=<?php echo $data['nis']; ?>" class="btn btn-warning text-light"><i class="bi bi-pencil-square"></i></a>
                                            <a href="delete-siswa.php?nis=<?php echo $data['nis']; ?>" class="btn btn-danger" name="hapus" onclick="return confirm('Hapus Data Siswa <?php echo $data['nama_siswa'] ?>?')"><i class="bi bi-trash-fill"></i></a>

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
    var element = document.getElementById('siswa');
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