<?php
require "../../database/config.php";
include "../../database/conn.php";

if (!isset($_SESSION['customer'])) {
    header('Location: ../login.html');
    exit;
}

$idCustomer = $_SESSION['id_customer'];
$pesan = $_POST["pesan_complaint"];
$kategori = $_POST["kategori"];

$sql = "insert into complaint (id_cust, isi_complaint, cat_complaint ) values($idCustomer, '$pesan', '$kategori')";

if (mysqli_query($koneksi, $sql)) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

?>