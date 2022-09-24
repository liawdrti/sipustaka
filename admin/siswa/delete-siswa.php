<?php

require_once '../../core/app.php';

if (Input::get('nis')) {
    if ($user->deleteSiswa(Input::get('nis'))) {
        header('Location: index.php');
    }
}
