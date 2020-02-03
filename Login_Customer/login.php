<?php
require '../database/config.php';
include '../database/conn.php';

$page_title = 'Login';
$err = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['email'] = $_POST['email'];


    $email = $_POST['email'];
    $ambil = mysqli_query($koneksi,"SELECT * FROM customer where email='$email'");
    $data = mysqli_fetch_array($ambil);
    $hasil = $data['password'];
    $idCustomer = $data['id_customer'];

    if ($data1 = password_hash($hasil, PASSWORD_DEFAULT)) {
        if (password_verify($_POST['password'], $data1)) {
                $_SESSION['customer'] = $data['nama'] ;
                $_SESSION['id_customer'] = $idCustomer;
                header('Location: Complaint_form/complaint_tampilan.php');
                exit;
            
        }
        header('Location: login.html');
    }

    $err = true;
}
?>