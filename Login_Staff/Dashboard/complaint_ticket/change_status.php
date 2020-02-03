<?php

// include "ticket_detail.php";
require "../../../database/config.php";
include "../../../database/conn.php";

if (!isset($_SESSION['pegawai'])) {
    header('Location: ../../login.html');
    exit;
}
$id = $_GET['id_ticket'];
$get_status_before = "SELECT `status` FROM complaint WHERE id_ticket=$id";
$get_status_query = mysqli_query($koneksi, $get_status_before);
$get_status_object = mysqli_fetch_assoc($get_status_query);
$status = $get_status_object['status'];

echo $status; 
if($status == "Inprogress"){
    $sql_change_status = "UPDATE complaint SET `status`='Resolved' WHERE id_ticket=$id";
}
elseif($status == "Untouched"){
    $sql_change_status = "UPDATE complaint SET `status`='Inprogress' WHERE id_ticket=$id";
    mysqli_query($koneksi, "UPDATE complaint SET id_pegawai = $_SESSION[id_pegawai] WHERE id_ticket = $id");
}

echo $sql_change_status;
if(mysqli_query($koneksi, $sql_change_status)){
    echo"ok";
}
header("Location: ticket_detail.php?id_ticket=$id");
// exit; 
