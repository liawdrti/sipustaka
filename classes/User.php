<?php

//membuat class dengan nama User
class User
{
    //variabel
    private $db;

    //membuat function construct
    public function __construct()
    {
        //mengambil koneksi database
        $this->db = Database::getInstance();
    }

    /*-------------------- FUNGSI LOGIN --------------------*/

    //membuat function login_user untuk mengecek login
    public function login_user($username, $password)
    {
        //kirim parameter ke get_info di class Database
        $data = $this->db->get_info('tb_petugas', 'username', $username);
        //convert password ke enkripsi md5
        $pw = md5($password);

        //cek apakah ada username
        if (!$data) {
            //return false jika tidak ada data username
            return false;
        } else {
            //Jika ada data username, cek apakah data password benar
            if ($pw === $data['password']) {
                //return true jika ada
                return true;
            } else {
                //return false jika tidak ada
                return false;
            }
        }
    }

    /*-------------------- FUNGSI INSERT --------------------*/

    public function insert_buku($field = array())
    {
        if ($this->db->insert('tb_buku', $field)) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_siswa($field = array())
    {
        if ($this->db->insert('tb_siswa', $field)) {
            return true;
        } else {
            return false;
        }
    }

    public function insertPinjam($field = array())
    {
        if ($this->db->insert('tb_pinjam', $field)) {
            return true;
        } else {
            return false;
        }
    }

    public function bukuKembali($field = array())
    {
        if ($this->db->insert('tb_kembali', $field)) {
            return true;
        } else {
            return false;
        }
    }

    /*-------------------- FUNGSI UPDATE --------------------*/

    public function updateBuku($id, $field = array())
    {
        if ($this->db->update('tb_buku', 'id_buku', $id, $field)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateSiswa($id, $field = array())
    {
        if ($this->db->update('tb_siswa', 'nis', $id, $field)) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePinjam($id, $field = array())
    {
        if ($this->db->update('tb_pinjam', 'id_pinjam', $id, $field)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateKembali($id, $field = array())
    {
        if ($this->db->update('tb_kembali', 'id_kembali', $id, $field)) {
            return true;
        } else {
            return false;
        }
    }

    public function statusPinjam($id, $field = array())
    {
        if ($this->db->update('tb_pinjam', 'id_pinjam', $id, $field)) {
            return true;
        } else {
            return false;
        }
    }

    /*-------------------- FUNGSI DELETE --------------------*/

    public function deleteBuku($colvalue)
    {
        if ($this->db->delete('tb_buku', 'id_buku', $colvalue)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteSiswa($colvalue)
    {
        if ($this->db->delete('tb_siswa', 'nis', $colvalue)) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePinjam($colvalue)
    {
        if ($this->db->delete('tb_pinjam', 'id_pinjam', $colvalue)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteKembali($colvalue)
    {
        if ($this->db->delete('tb_kembali', 'id_kembali', $colvalue)) {
            return true;
        } else {
            return false;
        }
    }

    /*-------------------- FUNGSI READ / SELECT --------------------*/

    public function readEdit($table, $colname, $colvalue)
    {
        return $this->db->selectWhere($table, $colname, $colvalue);
    }

    public function detailView($table, $colname, $colvalue)
    {
        return $this->db->selectWhere($table, $colname, $colvalue);
    }

    public function readKembali()
    {
        return $this->db->StoredProcedure('SelectAllForKembali');
    }

    public function selectKelasId($colvalue)
    {
        return $this->db->getId('id_kelas', 'tb_siswa', 'nis', $colvalue);
    }

    public function selectSiswaId($colvalue)
    {
        return $this->db->getId('nis', 'tb_pinjam', 'id_pinjam', $colvalue);
    }

    public function selectBukuId($colvalue)
    {
        return $this->db->getId('id_buku', 'tb_pinjam', 'id_pinjam', $colvalue);
    }

    public function selectJk($colvalue)
    {
        return $this->db->getId('jk_siswa', 'tb_siswa', 'nis', $colvalue);
    }

    public function selectPinjamId($colvalue)
    {
        return $this->db->getId('id_pinjam', 'tb_kembali', 'id_kembali', $colvalue);
    }

    public function getTable($table)
    {
        return $this->db->selectAll($table);
    }

    public function getTableOrder($table, $order)
    {
        return $this->db->selectAllOrder($table, $order);
    }

    /*-------------------- FUNGSI JOIN --------------------*/

    public function getJoinTwo($table, $jtable, $id)
    {
        return $this->db->selectAllJoin($table, $jtable, $id);
    }

    public function getJoinTwoWhere($table, $jtable, $id, $where, $value)
    {
        return $this->db->selectJoinWhere($table, $jtable, $id, $where, $value);
    }

    public function getJoinThree($table, $tjoinOne, $idOne, $tjoinTwo, $idTwo, $where, $whereValues)
    {
        return $this->db->selectAllJoinT($table, $tjoinOne, $idOne, $tjoinTwo, $idTwo, $where, $whereValues);
    }
}
