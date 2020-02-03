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
                <a class="navbar-brand" href="../dashboard_home.php"><img src="../../../static/hijack_sandals_web_logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
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
                                <a class="nav-link nav-icons active" href="customer_group.php"><i class="fa fa-fw fa-users"></i>Customer Group</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="../complaint_ticket/ticket.php"><i class="fa fa-fw fa-ticket-alt"></i>Complaint Ticket</a>
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
                            <h2 class="pageheader-title">Customer Group Detail</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../dashboard_home.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="customer_group.php" class="breadcrumb-link">Customer
                                                Group</a></li>
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Group
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
                <!-- Customer Detail Head -->
                <?php
                $id = $_GET['id_group'];
                $sql_group = "SELECT * FROM `group` WHERE id_group = $id";
                $detail_query = mysqli_query($koneksi, $sql_group);
                $detail_object = mysqli_fetch_assoc($detail_query);
                ?>
                <div class="row">
                    <div class="col-12 card pb-4">
                        <h1 class="display-2 ml-4 mt-4 mb-4">
                            <?php echo $detail_object['nama_group'] ?>
                        </h1>
                        <div class="tab-regular">
                            <ul class="nav nav-tabs " id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="home" aria-selected="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="contact" aria-selected="false">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="customer-list-tab" data-toggle="tab" href="#customer-list" role="tab" aria-controls="profile" aria-selected="false">Customer List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="campaign-list-tab" data-toggle="tab" href="#campaign-list" role="tab" aria-controls="contact" aria-selected="false">Campaign List</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade active show" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <h2>Deskripsi</h2>
                                    <p class="text-justify">
                                        <?php echo $detail_object['des_group'] ?>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-inline-block">
                                                        <h4 class="text-muted">Value</h4>
                                                        <h2 class="mb-0">Rp 11.184.213.000</h2>
                                                    </div>
                                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                                                        <i class="fas fa-fw fa-sm text-success fa-money-bill-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-inline-block">
                                                        <h4 class="text-muted">Value</h4>
                                                        <h2 class="mb-0">Rp 11.184.213.000</h2>
                                                    </div>
                                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                                                        <i class="fas fa-fw fa-sm text-success fa-money-bill-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-inline-block">
                                                        <h4 class="text-muted">Value</h4>
                                                        <h2 class="mb-0">Rp 11.184.213.000</h2>
                                                    </div>
                                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                                                        <i class="fas fa-fw fa-sm text-success fa-money-bill-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-inline-block">
                                                        <h4 class="text-muted">Value</h4>
                                                        <h2 class="mb-0">Rp 11.184.213.000</h2>
                                                    </div>
                                                    <div class="float-right icon-circle-medium  icon-box-lg  bg-success-light mt-1">
                                                        <i class="fas fa-fw fa-sm text-success fa-money-bill-alt"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="customer-list" role="tabpanel" aria-labelledby="customer-list-tab">
                                    <div class="table-rensponsive">
                                        <h2 class="card-title">Customer List</h2>
                                        <div class="table-rensponsive">
                                            <table class="table table-striped table-bordered first">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nama</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $sql_group_member = "SELECT  c.id_customer, c.nama
                                                        FROM det_group dg
                                                        INNER JOIN customer c
                                                        ON c.id_customer = dg.id_cust
                                                        WHERE dg.id_group = $id
                                                        ";
                                                        $group_member_query = mysqli_query($koneksi, $sql_group_member);
                                                        while($group_member_object = mysqli_fetch_assoc($group_member_query)){
                                                    ?>

                                                        <tr>
                                                            <td>
                                                                <?php echo $group_member_object['id_customer'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $group_member_object['nama'] ?>
                                                            </td>
                                                        </tr>

                                                    <?php
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="campaign-list" role="tabpanel" aria-labelledby="campaign-list-tab">
                                    <h2 class="card-title">Campaign List</h2>
                                    <div class="table-rensponsive">
                                        <table class="table table-striped table-bordered first">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nama Campaign</th>
                                                    <th>PIC</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql_camp_member = "SELECT g.id_group, cg.id_campaign,cg.nama_campaign, pg.nama, DATE_FORMAT(cg.`start_date`, '%d %b %Y') as awal, DATE_FORMAT(cg.end_date, '%d %b %Y') as akhir
                                                FROM campaign cg
                                                INNER JOIN det_campaign dc
                                                ON cg.id_campaign = dc.id_campaign
                                                INNER JOIN `group` g
                                                ON g.id_group = dc.id_group
                                                INNER JOIN pegawai pg
                                                ON pg.id_pegawai = cg.id_pegawai
                                                WHERE 
                                                g.id_group = '$id'
                                                GROUP BY cg.id_campaign
                                                
                                                
                                                ";
                                                $group_camp_query = mysqli_query($koneksi, $sql_camp_member);
                                                while ($group_camp_object = mysqli_fetch_assoc($group_camp_query)) {


                                                    ?>
                                                    <tr>
                                                        <td><?php echo $group_camp_object['id_campaign'] ?></td>
                                                        <td><?php echo $group_camp_object['nama_campaign'] ?></td>
                                                        <td><?php echo $group_camp_object['nama'] ?></td>
                                                        <td><?php echo $group_camp_object['awal'] ?></td>
                                                        <td><?php echo $group_camp_object['akhir'] ?></td>
                                                    </tr>

                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!-- End Customer Detail Overview Tabs -->

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