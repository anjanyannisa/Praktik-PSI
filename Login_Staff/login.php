<?php
require '../database/config.php';
include '../database/conn.php';

$page_title = 'Login';
$err = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['email'] = $_POST['email'];


    $email = $_POST['email'];
    $ambil = mysqli_query($koneksi,"SELECT * FROM pegawai where id_pegawai='$email'");
    $data = mysqli_fetch_array($ambil);
    $id_pegawai = $data['id_pegawai']; 
    $hasil = $data['password'];
    $nama = $data['nama'];


    if ($data1 = password_hash($hasil, PASSWORD_DEFAULT)) {
        if (password_verify($_POST['password'], $data1)) {
                $_SESSION['pegawai'] = $nama;
                $_SESSION['id_pegawai'] = $id_pegawai;
                header('Location: Dashboard/dashboard_home.php');
                exit; 
        }
        header('Location: login.html');
    }

    $err = true;
}
?>