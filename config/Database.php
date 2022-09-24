<?php

//membuat class dengan nama Database
class Database
{
    //variabel
    private static $instance = null;
    private $mysqli,
        $host = 'localhost',
        $user = 'root',
        $pass = '',
        $db_name = 'db_sipustaka';

    /*-------------------- CONNECTION --------------------*/
    //membuat function construct
    public function __construct()
    {
        //koneksi database
        try {
            $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
        } catch (Exception $exeption) {
            die($exeption->getMessage());
        }
    }

    //membuat function static getInstance untuk mencegah double koneksi dengan Singleton pattern
    public static function getInstance()
    {
        //jika belum ada koneksi maka buat koneksi
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }

        //jika sudah ada koneksi maka kembalikan nilai
        return self::$instance;
    }

    /*-------------------- INSERT --------------------*/

    public function insert($table, $field = array())
    {
        $column = implode(", ", array_keys($field));

        $arrayValues = array();
        $i = 0;
        foreach ($field as $key => $values) {
            if (!is_int($values)) {
                $arrayValues[$i] = "'" . $values . "'";
            } else {
                $arrayValues[$i] = $values;
            }

            $i++;
        }

        $values = implode(", ", $arrayValues);

        $query = "INSERT INTO $table ($column) VALUES ($values)";

        // print_r($query);
        // die();

        if ($this->mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    /*-------------------- UPDATE --------------------*/

    public function update($table, $colname, $colvalue, $field = array())
    {

        $query = "UPDATE $table SET ";
        foreach ($field as $key => $value) {
            $query .= " $key = '$value',";
        }
        $query = rtrim($query, ',');
        $query .= " WHERE  $colname = $colvalue";

        // print_r($query);
        // die();

        if ($this->mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    /*-------------------- DELETE --------------------*/

    public function delete($table, $colname, $colvalue)
    {
        $query = "DELETE FROM $table WHERE $colname = $colvalue";

        if ($this->mysqli->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    /*-------------------- SELECT --------------------*/

    public function selectAll($table)
    {
        $query = "SELECT * FROM $table";

        $result = $this->mysqli->query($query);

        // var_dump($result);
        // die();

        //cek apakah ada data
        if (!$result->num_rows) {
            return false;
        } else {
            //lakukan perulangan data yang didapatkan
            while ($row = $result->fetch_assoc()) {
                $field[] = $row;
            }

            return $field;
        }
    }

    public function selectAllOrder($table, $order)
    {
        $query = "SELECT * FROM $table ORDER BY $order DESC";

        $result = $this->mysqli->query($query);

        // var_dump($result);
        // die();

        //cek apakah ada data
        if (!$result->num_rows) {
            return false;
        } else {
            //lakukan perulangan data yang didapatkan
            while ($row = $result->fetch_assoc()) {
                $field[] = $row;
            }

            return $field;
        }
    }

    public function selectWhere($table, $colname, $colvalue)
    {
        $query = "SELECT * FROM $table WHERE $colname = $colvalue";

        $result = $this->mysqli->query($query);
        $data = $result->fetch_array();

        return $data;
    }

    //membuat function get_info untuk pengecekan nilai
    public function get_info($table, $column, $value)
    {
        //jika value bukan integer maka jalankan kondisi
        if (!is_int($value))
            $value = "'" . $value . "'";

        //query SELECT
        $query = "SELECT * FROM $table WHERE $column = $value";
        //ambil hasil dari query
        $result = $this->mysqli->query($query);

        //lakukan perulangan data yang didapatkan
        while ($row = $result->fetch_assoc()) {
            //mengembalikan nilai
            return $row;
        }
    }

    public function getId($select, $table, $colname, $colvalue)
    {
        $query = "SELECT $select FROM $table WHERE $colname = $colvalue";

        $result = $this->mysqli->query($query);

        $data = $result->fetch_array();

        return $data[$select];
    }

    /*-------------------- JOIN --------------------*/

    public function selectAllJoin($table, $jtable, $id)
    {
        $query = "SELECT * FROM $table INNER JOIN $jtable ON $table.$id=$jtable.$id";

        $result = $this->mysqli->query($query);

        //cek apakah ada data
        if (!$result->num_rows) {
            return false;
        } else {
            //lakukan perulangan data yang didapatkan
            while ($row = $result->fetch_assoc()) {
                $field[] = $row;
            }

            return $field;
        }
    }

    public function selectJoinWhere($table, $jtable, $id, $where, $value)
    {
        $query = "SELECT * FROM $table INNER JOIN $jtable ON $table.$id=$jtable.$id WHERE $where=$value";

        $result = $this->mysqli->query($query);
        $data = $result->fetch_array();

        return $data;
    }

    public function selectAllJoinT($table, $tjoinOne, $idOne, $tjoinTwo, $idTwo, $where, $whereValues)
    {
        $query = "SELECT * FROM $table INNER JOIN $tjoinOne ON $table.$idOne=$tjoinOne.$idOne 
        INNER JOIN $tjoinTwo ON $table.$idTwo=$tjoinTwo.$idTwo WHERE $where=$whereValues";

        $result = $this->mysqli->query($query);

        // print_r($result);
        // die();

        // //cek apakah ada data
        if (!$result->num_rows) {
            return false;
        } else {
            //lakukan perulangan data yang didapatkan
            while ($row = $result->fetch_assoc()) {
                $field[] = $row;
            }

            return $field;
        }
    }

    /*-------------------- STORED PROCEDURE --------------------*/

    public function StoredProcedure($name)
    {
        $query = "CALL $name()";

        $result = $this->mysqli->query($query);

        // //cek apakah ada data
        if (!$result->num_rows) {
            return false;
        } else {
            //lakukan perulangan data yang didapatkan
            while ($row = $result->fetch_assoc()) {
                $field[] = $row;
            }

            return $field;
        }
    }
}
