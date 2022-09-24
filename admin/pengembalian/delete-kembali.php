<?php

require_once '../../core/app.php';

$id = $user->selectPinjamId(Input::get('id_kembali'));

if (Input::get('id_kembali')) {
    $del = $user->deleteKembali(Input::get('id_kembali'));
    $upt = $user->updatePinjam($id, array(
        'status' => 'dipinjam'
    ));

    if ($del && $upt) {
        header('Location: index.php');
    }
}
