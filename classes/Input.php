<?php

//membuat class dengang nama Input
class Input
{
    //membuat function get untuk menerima input
    public static function get($name)
    {
        //cek methode
        if (isset($_POST[$name])) {
            //jika methode POST maka kembalikan nilai POST
            return $_POST[$name];
        } else if (isset($_GET[$name])) {
            //jika methode POST maka kembalikan nilai POST
            return $_GET[$name];
        }

        //return false jika tidak memenuhi kondisi
        return false;
    }

    public static function img($name, $dir)
    {
        $filename = $_FILES[$name]['name'];
        $dir = move_uploaded_file($_FILES[$name]['tmp_name'], $dir . $filename);
        if ($dir) {
            return $filename;
        } else {
            return false;
        }
    }

    public static function imgName($name)
    {
        $filename = $_FILES[$name]['name'];

        return $filename;
    }
}
