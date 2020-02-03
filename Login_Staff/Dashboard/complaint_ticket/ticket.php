<!doctype html>
<html lang="en">
<?php 
require "../../../database/config.php";
include "../../../database/conn.php";

if (!isset($_SESSION['pegawai'])) {
    header('Location: ../login.html');
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
        #tabel-detail tbody tr {
            height: 3rem;
        }

        #tabel-detail tbody tr td {
            font-size: 14px;
        }
        .card-footer{
            background-color: rgba(0,0,0,.03);
        }
    </style>
</head>

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
                <a class="navbar-brand" href="dashboard_home.php"><img src="../assets/images/hijack_sandals_web_logo.png"
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION['pegawai']; ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="../../logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
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
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="../dashboard_home.php"><i
                                        class="fa fa-fw fa-home"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="../customer_data/customer_data.php"><i
                                        class="fa fa-fw fa-database"></i>Customer Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="../customer_group/customer_group.php"><i
                                        class="fa fa-fw fa-users"></i>Customer Group</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons active" href="../complaint_ticket/ticket.php"><i
                                        class="fa fa-fw fa-ticket-alt"></i>Complaint Ticket</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="../mail_marketing/mail_marketing.php"><i
                                        class="fa fa-fw fa-paper-plane"></i>Mail Marketing</a>
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
                            <h2 class="pageheader-title">Complaint Ticket </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce
                                sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Complaint
                                                Ticket</a></li>
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
                    <!-- ============================================================== -->
                    <!-- data table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Complaint Ticket Table</h5>
                                <p>Include all information regarding customer's complaint</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID Ticket</th>
                                                <th>Issued Date</th>
                                                <th>Issuer</th>
                                                <th width="30%">Complain Message</th>
                                                <th>Complaint Category</th>
                                                <th width="13%">PIC</th>
                                                <th>Status</th>
                                                <th width="2%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $complaint_sql = "SELECT t.id_ticket, t.comp_date, c.nama,
                                                    CONCAT(left(t.isi_complaint, 30), '...') as isi_complaint,
                                                    t.cat_complaint, IFNULL(pg.nama, 'None') as pg_name, t.status
                                                FROM complaint t
                                                INNER JOIN customer c
                                                ON t.id_cust = c.id_customer
                                                LEFT JOIN pegawai pg
                                                ON pg.id_pegawai = t.id_pegawai
                                                ";
                                                $complaint_query = mysqli_query($koneksi, $complaint_sql);
                                            ?>

                                            <?php 
                                            while($complaint_object = mysqli_fetch_assoc($complaint_query)){
                                            ?>
                                            <tr>
                                                <td><?php echo $complaint_object['id_ticket'] ?></td>
                                                <td><?php echo $complaint_object['comp_date'] ?></td>
                                                <td><?php echo $complaint_object['nama'] ?></td>
                                                <td><?php echo $complaint_object['isi_complaint'] ?></td>
                                                <td><?php echo $complaint_object['cat_complaint'] ?></td>
                                                <td><?php echo $complaint_object['pg_name'] ?></td>
                                                
                                                <td>
                                                    <?php 
                                                        $status = $complaint_object['status'];
                                                        if ($status == "Untouched"){
                                                            $badge = 'badge-danger';
                                                        }
                                                        elseif($status == "Inprogress"){
                                                            $badge = 'badge-brand';
                                                        }
                                                        else{
                                                            $badge = 'badge-success';
                                                        }
                                                        echo ("<span class='badge-dot $badge mr-1'></span>$status");
                                                    ?>
                                                    
                                                </td>
                                                <td>
                                                <?php

                                                    echo ("
                                                    <a href='ticket_detail.php?id_ticket=$complaint_object[id_ticket]'>
                                                        <i class='fa fa-fw fa-search'></i>
                                                    </a>");
                                                ?>
                                                </td>
                                            </tr>
                                            <?php 

                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>ID Ticket</th>
                                                <th>Issued Date</th>
                                                <th>Issuer</th>
                                                <th width="30%">Complain Message</th>
                                                <th>Complaint Category</th>
                                                <th width="13%">PIC</th>
                                                <th>Status</th>
                                                <th width="2%"></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
                </div>
            </div>

            <!-- Start Modal -->
            <div class="modal fade" id="ticket-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="detail-ticket-label">Ticket Detail</h5>
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <div class="modal-body">
                                <div class="card card-fluid">
                                    <div class="card-body">
                                        <h1 class="card-title mb-4">Issuer information</h1>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table id="tabel-detail"> 
                                                    <tbody>
                                                        <tr>
                                                            <td width="50%">Nama</td>
                                                            <td>Dary</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td>darytamvan@gmail.com</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Telepon </td>
                                                        </tr>
                                                        <td>+6285815045012 </td>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->
                
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

