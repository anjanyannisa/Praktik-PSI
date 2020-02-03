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
        .user-avatar-xl {
            height: 120px;
            width: 120px;
        }

        #tabel-detail tbody tr {
            height: 3rem;
        }

        #tabel-detail tbody tr td {
            font-size: 14px;
        }

        .card-footer {
            background-color: rgba(0, 0, 0, .03);
        }

        .badge {
            font-size: 12px;
        }

        .campaign-name {
            border-bottom: 1px solid #e6e6f2;
            padding-bottom: 0.5em;
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
                <a class="navbar-brand" href="../dashboard_home.php"><img
                        src="../../../static/hijack_sandals_web_logo.png" alt=""></a>
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
                                    <h5 class="mb-0 text-white nav-user-name"> <?php echo $_SESSION['pegawai'];?></h5>
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
                                <a class="nav-link nav-icons active" href="../customer_data/customer_data.php"><i
                                        class="fa fa-fw fa-database"></i>Customer Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="../customer_group/customer_group.php"><i
                                        class="fa fa-fw fa-users"></i>Customer Group</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="../complaint_ticket/ticket.php"><i
                                        class="fa fa-fw fa-ticket-alt"></i>Complaint Ticket</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="mail_marketing.php"><i
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
                            <h2 class="pageheader-title">Campaign Detail</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../dashboard_home.html"
                                                class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="mail_marketing.html"
                                                class="breadcrumb-link">Mail Marketing</a></li>
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Mail
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
                <?php 
                    $id = $_GET['id_campaign'];
                    $content_sql = "SELECT cp.content, cp.nama_campaign, pg.nama, cp.start_date, cp.end_date
                    FROM campaign cp 
                    INNER JOIN pegawai pg
                    ON cp.id_pegawai = pg.id_pegawai
                    WHERE id_campaign = $id
                    ";
                    $content_query = mysqli_query($koneksi, $content_sql);
                    $content_object = mysqli_fetch_assoc($content_query);
                ?>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="display-3 mb-4 text-center campaign-name">
                                    <?php echo $content_object['nama_campaign'] ?>
                                </h1>
                                <div class="date"></div>
                                <div class="sender mb-2">
                                    <?php 
                                        $tgl_sql = "SELECT DATE_FORMAT(cp.`start_date`, '%d %b %Y') as awal, DATE_FORMAT(cp.end_date, '%d %b %Y') as akhir, pg.nama
                                        from campaign cp 
                                        INNER JOIN pegawai pg
                                        ON pg.id_pegawai = cp.id_pegawai
                                        WHERE id_campaign = $id"; 
                                        $tgl_query = mysqli_query($koneksi, $tgl_sql);
                                        $tgl_object = mysqli_fetch_assoc($tgl_query);
                                    ?>
                                    <h5 class="text-medium"><?php echo $tgl_object['nama'] ?> <span
                                            class="float-right date">
                                            <?php
                                                echo $tgl_object['awal']." to ".$tgl_object['akhir'] ?></span></h5>
                                </div>
                                <div>
                                    <?php 
                                        $group_sql = "SELECT g.nama_group
                                        FROM det_campaign dg
                                        INNER JOIN `group` g
                                        ON g.id_group = dg.id_group
                                        WHERE id_campaign = $id
                                        ";
                                        $group_query = mysqli_query($koneksi, $group_sql);
                                        while($group_object = mysqli_fetch_assoc($group_query)){

                                    
                                    ?>
                                    <span class='badge badge-info'>
                                        <?php echo $group_object['nama_group'] ?>
                                    </span>
                                    <?php 
                                        }
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="tab-regular">
                            <ul class="nav nav-tabs " id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="mail-message-tab" data-toggle="tab"
                                        href="#mail-message" role="tab" aria-controls="home" aria-selected="true">Mail
                                        Message</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="statistik-tab" data-toggle="tab" href="#statistik"
                                        role="tab" aria-controls="profile" aria-selected="false">Statistics</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="mail-message" role="tabpanel"
                                    aria-labelledby="mail-message-tab">
                                    <div class="main-content container-fluid p-0 ml-0">
                                        <?php echo $content_object['content']?>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="statistik" role="tabpanel"
                                    aria-labelledby="statistik-tab">
                                    <h1 class="display-1 text-center">Halo ini Statistik</h1>
                                </div>

                            </div>
                        </div>
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