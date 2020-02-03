<!doctype html>
<html lang="en">


<?php
require "../../../database/config.php";
include "../../../database/conn.php";

if (!isset($_SESSION['pegawai'])) {
    header('Location: ../../login.html');
    exit;
}
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="../assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
    <style>
        tbody tr {
            height: 3rem;
        }

        tbody tr td {
            font-size: 14px;
        }
    </style>
</head>


<?php
$id = $_GET['id_ticket'];
$ticket_detail_sql = "SELECT c.id_customer, c.nama, c.email, c.alamat, IFNULL(pg.nama, '') as nama_pegawai, cp.* 
FROM complaint cp
INNER JOIN customer c
ON c.id_customer = cp.id_cust
LEFT JOIN pegawai pg
ON pg.id_pegawai = cp.id_pegawai 
where cp.id_ticket = $id";
$ticket_detail_query = mysqli_query($koneksi, $ticket_detail_sql);
$ticket_detail_object = mysqli_fetch_assoc($ticket_detail_query);


?>



<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="dashboard_home.html"><img src="../assets/images/hijack_sandals_web_logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"> <?= $_SESSION["pegawai"] ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="../../logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="../dashboard_home.php"><i class="fa fa-fw fa-home"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="../customer_data/customer_data.php"><i class="fa fa-fw fa-database"></i>Customer Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="../customer_group/customer_group.php"><i class="fa fa-fw fa-users"></i>Customer Group</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons active" href="../complaint_ticket/ticket.php"><i class="fa fa-fw fa-ticket-alt"></i>Complaint Ticket</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="../mail_marketing/mail_marketing.php"><i class="fa fa-fw fa-paper-plane"></i>Mail Marketing</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Ticket Detail</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Complaint</a>
                                        </li>
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Ticket
                                                Detail</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="container">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body">
                                        <h1>No Ticket: <?php echo $ticket_detail_object['id_ticket'] ?></h1>
                                        <?php
                                                                                $status = $ticket_detail_object['status'];
                                                                                if ($status == "Inprogress") {
                                                                                    $badge = "badge-brand";
                                                                                } elseif ($status == "Resolved") {
                                                                                    $badge = "badge-success";
                                                                                } else {
                                                                                    $badge = "badge-danger";
                                                                                }
                                                                                echo ("<p><span class='badge badge-pill $badge'>$status</span></p>");
                                        ?>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <h2>Complaint Message</h2>
                                                            <p class="text-justify">
                                                                <?php echo $ticket_detail_object['isi_complaint'] ?>
                                                            </p>
                                                        </div>
                                                        <div class="col-5">
                                                            <h3>Issuer Information</h3>
                                                            <table>
                                                                <tr>
                                                                    <td>Id Customer</td>
                                                                    <td width="20%">:</td>
                                                                    <td class="text-dark font-medium"><?php echo $ticket_detail_object['id_customer'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama</td>
                                                                    <td width="20%">:</td>
                                                                    <td class="text-dark font-medium"><?php echo $ticket_detail_object['nama'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Email</td>
                                                                    <td>:</td>
                                                                    <td class="text-dark font-medium">
                                                                        <?php echo $ticket_detail_object['email'] ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Alamat</td>
                                                                    <td>:</td>
                                                                    <td class="text-dark font-medium"><?php echo $ticket_detail_object['alamat'] ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>PIC</td>
                                                                    <td>:</td>
                                                                    <td class="text-dark font-medium"><?php echo $ticket_detail_object['nama_pegawai'] ?>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <?php
                                                        $get_reply = "SELECT * FROM complaint_reply WHERE id_ticket=$id";
                                                        $reply_query = mysqli_query($koneksi, $get_reply);
                                                        while ($reply_obj = mysqli_fetch_assoc($reply_query)) {
                                                            $tanggal = date("l, j F Y", strtotime($reply_obj["sent_date"]));


                                                    ?>
                                                        <div class="accrodion-regular">
                                                            <div id="accordion">
                                                                <div class="card">
                                                                    <div class="card-header" id="headingOne">
                                                                        <h5 class="mb-0">
                                                                            <button class="btn btn-link" data-toggle="collapse" aria-expanded="false" data-target="#2" aria-controls="collapseOne">
                                                                                <?= "$reply_obj[id_message] - $reply_obj[reply_subject] - $tanggal" ?></span>
                                                                            </button>
                                                                        </h5>
                                                                    </div>
                                                                    <div id="2" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                                        <div class="card-body">
                                                                            <?= $reply_obj["message"] ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <?php
                                                                                                        }
                                                    ?>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <?php
                                                                                                        $get_idticket_sql = "SELECT * FROM complaint WHERE id_ticket='$id'";
                                                                                                        $get_idticket_query = mysqli_query($koneksi, $ticket_detail_sql);
                                                                                                        $get_idticket_object = mysqli_fetch_assoc($get_idticket_query);

                                                                                                        if ($status == "Resolved") {
                                                    ?>
                                                        <!-- <a href="#" class="btn btn-secondary btn-sm">Resolved</a>
                                                                <a href="#" class="btn btn-primary btn-sm">Forward</a>
                                                                <a href="#" class="btn btn-primary float-right btn-sm">Send Message</a> -->
                                                    <?php
                                                                                                        } else if ($status == "Inprogress") {
                                                    ?>
                                                        <a href="change_status.php?id_ticket=<?php echo $get_idticket_object['id_ticket'] ?>" class="btn btn-success btn-sm">Done !</a>
                                                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary float-right btn-sm">Send
                                                            Message</a>
                                                    <?php
                                                                                                        } else {
                                                    ?>
                                                        <a href="change_status.php?id_ticket=<?php echo $get_idticket_object['id_ticket'] ?>" class="btn btn-secondary btn-sm">Resolved</a>
                                                        <a href="#" class="btn btn-primary btn-sm">Forward</a>
                                                    <?php
                                                                                                        }
                                                    ?>
                                                    <!-- <a href="#" class="btn btn-secondary btn-sm">Resolves</a>
                                                            <a href="#" class="btn btn-primary btn-sm">Forward</a>
                                                            <a href="#" data-toggle="modal" data-target="#exampleModal"
                                                                class="btn btn-primary float-right btn-sm">Send
                                                                Message</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">
                    <?= "<form action='kirim_balasan.php?id_ticket=$id' method='POST'>" ?>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Subject</label>
                        <input class="form-control" id="subject" name="subject" rows="3"></input>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                    </div>
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <button class="btn btn-primary" type="submit">Send</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="text-md-center footer-links d-none d-sm-block">
                        <a href="javascript: void(0);">About</a>
                        <a href="javascript: void(0);">Support</a>
                        <a href="javascript: void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="../assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
    <script src="../assets/vendor/datatables/js/data-table.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
</body>

</html>