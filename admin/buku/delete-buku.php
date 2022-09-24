<?php

require_once '../../core/app.php';

if (Input::get('id_buku')) {
    if ($user->deleteBuku(Input::get('id_buku'))) {
        header('Location: index.php');
    }
}
