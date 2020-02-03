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
                <a class="navbar-brand" href="dashboard_home1.php"><img src="../../../static/hijack_sandals_web_logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"> <?php echo $_SESSION['pegawai']; ?></h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="../logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
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
                                <a class="nav-link nav-icons active" href="customer_data.php"><i class="fa fa-fw fa-database"></i>Customer Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="../customer_group/customer_group.php"><i class="fa fa-fw fa-users"></i>Customer Group</a>
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
                            <h2 class="pageheader-title">Customer Detail</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../dashboard_home.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="customer_data.php" class="breadcrumb-link">Customer
                                                Data</a></li>
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Customer
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
                $id = $_GET["id_customer"];
                $sql_value = "SELECT SUM(pd.harga * dp.kuantitas) as total, c.nama
                    FROM customer c
                    INNER JOIN pemesanan p 
                    ON p.id_customer = c.id_customer
                    INNER JOIN det_pemesanan dp
                    ON dp.id_pemesanan = p.id_pemesanan
                    INNER JOIN produk pd
                    ON pd.id_produk = dp.id_produk
                    WHERE c.id_customer = $id";
                $value_query = mysqli_query($koneksi, $sql_value);
                $value_object = mysqli_fetch_assoc($value_query);

                $sql_complaint = "SELECT count(*) as comp
                    FROM complaint cp
                    INNER JOIN customer c 
                    ON c.id_customer = cp.id_cust
                    WHERE c.id_customer = $id";
                $complaint_query = mysqli_query($koneksi, $sql_complaint);
                $complaint_object = mysqli_fetch_assoc($complaint_query);

                $sql_order = "SELECT COUNT(*) as ord
                    FROM pemesanan p
                    INNER JOIN customer c
                    ON c.id_customer = p.id_customer
                    WHERE c.id_customer = $id
                    ";
                $order_query = mysqli_query($koneksi, $sql_order);
                $order_object = mysqli_fetch_assoc($order_query);
                ?>
                <!-- Customer Detail Head -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">


                            <!-- .card-body -->
                            <div class="card-body text-center">
                                <!-- .user-avatar -->
                                <a href="user-profile.html" class="user-avatar user-avatar-floated user-avatar-xl">
                                    <img src="../assets/images/avatar-1.jpg" alt="User Avatar" class="rounded-circle user-avatar-xl">
                                </a>
                                <!-- /.user-avatar -->
                                <h3 class="card-title mb-2">
                                    <a href="user-profile.html"><?php echo $value_object['nama']; ?></a>
                                </h3>
                                <!-- grid row -->
                                <div class="row mt-4">
                                    <!-- grid column -->
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <!-- .metric -->
                                        <div class="metric">
                                            <h4 class="metric-value"> 3 </h4>
                                            <p class="metric-label"> Order </p>
                                        </div>
                                        <!-- /.metric -->
                                    </div>
                                    <!-- /grid column -->
                                    <!-- grid column -->
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <!-- .metric -->
                                        <div class="metric">
                                            <h4 class="metric-value"> <?php echo "Rp." . number_format($value_object['total']); ?> </h4>
                                            <p class="metric-label"> Value </p>
                                        </div>
                                        <!-- /.metric -->
                                    </div>
                                    <!-- /grid column -->
                                    <!-- grid column -->
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                        <!-- .metric -->
                                        <div class="metric">
                                            <h4 class="metric-value"><?php echo $complaint_object['comp'] ?></h4>
                                            <p class="metric-label"> Complaints </p>
                                        </div>
                                        <!-- /.metric -->
                                    </div>
                                    <!-- /grid column -->
                                </div>
                                <!-- /grid row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>



                <!-- End Customer Detail Head -->

                <!-- Start Customer Detail Overview Tabs -->

                <div class="row">
                    <div class="col-12">
                        <div class="tab-regular">
                            <ul class="nav nav-tabs " id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="personal-info-tab" data-toggle="tab" href="#personal-info" role="tab" aria-controls="home" aria-selected="true">Personal Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="purchase-tab" data-toggle="tab" href="#purchase" role="tab" aria-controls="profile" aria-selected="false">Customer Puchase</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false">Overview</a>
                                </li> -->
                            </ul>
                            <?php
                            include '../../../database/conn.php';
                            $id = $_GET['id_customer'];
                            $sql_detailcustomer = "SELECT c.id_customer, c.nama, c.email, c.alamat, c.tgl_lahir, k.nama_kota, p.nama_prov
                                FROM customer c 
                                INNER JOIN kota k 
                                ON k.id_kota = c.id_kota
                                INNER JOIN provinsi p 
                                ON p.id_prov = k.id_prov
                                WHERE id_customer = '$id'";
                            $query_mysql = mysqli_query($koneksi, $sql_detailcustomer);
                            while ($data = mysqli_fetch_array($query_mysql)) {
                                ?>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="personal-info" role="tabpanel" aria-labelledby="personal-info-tab">
                                        <table id="tabel-detail">
                                            <tr>
                                                <td>Nama</td>
                                                <td width="20%">:</td>
                                                <td class="text-dark font-medium"><?php echo $data['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>ID</td>
                                                <td>:</td>
                                                <td class="text-dark font-medium"><?php echo $data['id_customer']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir</td>
                                                <td>:</td>
                                                <td class="text-dark font-medium"><?php echo date('d-F-Y', strtotime($data['tgl_lahir'])); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Provinsi</td>
                                                <td>:</td>
                                                <td class="text-dark font-medium"><?php echo (ucwords(strtolower($data['nama_prov']))); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Kota/Kabupaten</td>
                                                <td>:</td>
                                                <td class="text-dark font-medium"><?php echo (ucwords(strtolower($data['nama_kota']))); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td class="text-dark font-medium"><?php echo $data['alamat']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>User Group</td>
                                                <td>:</td>
                                                <td>
                                                    <?php
                                                        $cust_group_sql = "SELECT g.nama_group
                                                    FROM det_group dg
                                                    INNER JOIN `group` g
                                                    ON dg.id_group = g.id_group
                                                    INNER JOIN customer c
                                                    ON c.id_customer = dg.id_cust
                                                    WHERE c.id_customer = $id";
                                                        $cust_group_query = mysqli_query($koneksi, $cust_group_sql);
                                                        while ($cust_group_object = mysqli_fetch_assoc($cust_group_query)) {
                                                            ?>
                                                        <span class="badge badge-primary mr-1"><?php echo $cust_group_object['nama_group'] ?></span>
                                                    <?php
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>

                                    </div>
                                    <div class="tab-pane fade" id="purchase" role="tabpanel" aria-labelledby="purchase-tab">
                                        <div class="table-rensponsive mt-4">
                                            <h2 class="card-title mb-4">Daftar Transaksi</h2>
                                            <table class="table table-striped table-bordered first">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>ID</th>
                                                        <th>Tanggal Transaksi</th>
                                                        <th>Total Biaya</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $i = 1;
                                                        $sql_cust_pur = "SELECT p.id_pemesanan, DATE_FORMAT(p.tgl_pesan, '%d %b %Y')as tgl , SUM((dp.kuantitas * pd.harga)) as total, p.id_customer
                                                        FROM pemesanan p 
                                                        INNER JOIN det_pemesanan dp ON p.id_pemesanan = dp.id_pemesanan
                                                        INNER JOIN produk pd ON pd.id_produk = dp.id_produk
                                                        WHERE p.id_customer = $id
                                                        GROUP BY p.id_pemesanan
                                                        ";
                                                        $cust_pur_query = mysqli_query($koneksi, $sql_cust_pur);
                                                        while ($d = mysqli_fetch_assoc($cust_pur_query)) {
                                                    ?>

                                                        <tr>
                                                            <td><?php echo $i ?></td>
                                                            <td><?php echo $d['id_pemesanan'] ?></td>
                                                            <td><?php echo $d['tgl'] ?></td>
                                                            <td><?php echo $d['total'] ?></td>
                                                        </tr>
                                                    <?php
                                                            $i = $i + 1;
                                                        }
                                                        ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <h3>Tab Heading Content </h3>
                                        <p>Vivamus pellentesque vestibulum lectus vitae auctor. Maecenas eu sodales arcu.
                                            Fusce lobortis, libero ac cursus feugiat, nibh ex ultricies tortor, id dictum
                                            massa nisl ac nisi. Fusce a eros pellentesque, ultricies urna nec, consectetur
                                            dolor. Nam dapibus scelerisque risus, a commodo mi tempus eu.</p>
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
<?php
}
?>

</html>