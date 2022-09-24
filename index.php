<?php
//mengambil semua class yang dibutuhkan melalui file init.php
require_once 'core/init.php';

$errors = array();
$errorLogin = false;
//kondisi jika button dengan nama login ditekan
if (Input::get('login')) {

    //melakukan validasi login
    //memanggil objek validasi
    $validation = new Validation();

    //cek validasi
    $validation = $validation->check(array(
        'username' => array(
            'required' => true
        ),
        'password' => array(
            'required' => true
        )
    ));

    //hasil cek
    if ($validation->getPassed()) {
        //kirim nilai input ke function login_user di class User
        if ($user->login_user(Input::get('username'), Input::get('password'))) {
            //kondisi jika return true
            Session::set('username', Input::get('username'));
            header('Location: admin/dashboard/');
        } else {
            //tampilkan error
            $errorLogin = true;
        }
    } else {
        $errors = $validation->getErrors();
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Log In Petugas - SiPustaka</title>
    <link rel="shortcut icon" href="assets/img/logo.svg">
</head>

<body>
    <div class="login min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card w-25">
            <div class="card-body p-4">
                <div class="text-center mt-3">
                    <img src="assets/img/login-logo.svg" alt="">
                    <h5>Log In Petugas</h5>
                </div>

                <?php
                if ($errorLogin == true) { ?>
                    <div class="alert alert-danger m-1" role="alert" style="height: auto; font-size: 12px;">
                        Username atau Password Salah
                    </div>
                <?php } ?>

                <?php
                if (!empty($errors)) { ?>
                    <?php
                    foreach ($errors as $error) { ?>
                        <div class="alert alert-danger m-1" role="alert" style="height: auto; font-size: 12px;">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>
                <?php } ?>
                <form action="" method="POST" class="form-group">
                    <label class="log-label" for="username">Username</label>
                    <input class="log-input form-control" name="username" type="text" placeholder="Masukkan Username">

                    <label class="log-label mt-3" for="password">Password</label>
                    <input class="log-input form-control" name="password" type="password" placeholder="Masukkan Password">

                    <input type="submit" value="Log In" class="btn btn-primary w-100 mt-4 mb-3" name="login">
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>