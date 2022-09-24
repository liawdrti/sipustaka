<?php

require_once '../../core/app.php';

if (Input::get('id_pinjam')) {
    if ($user->deletePinjam(Input::get('id_pinjam'))) {
        header('Location: index.php');
    }
}
