<!doctype html>
<html lang="en">
<?php
require "../../database/config.php";
include "../../database/conn.php";

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
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
                <a class="navbar-brand" href="dashboard_home.html"><img src="../../static/hijack_sandals_web_logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
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
                                <a class="nav-link nav-icons active" href="dashboard_home.php"><i class="fa fa-fw fa-home"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="customer_data/customer_data.php"><i class="fa fa-fw fa-database"></i>Customer Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="customer_group/customer_group.php"><i class="fa fa-fw fa-users"></i>Customer Group</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="complaint_ticket/ticket.php"><i class="fa fa-fw fa-ticket-alt"></i>Complaint Ticket</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="mail_marketing/mail_marketing.php"><i class="fa fa-fw fa-paper-plane"></i>Mail Marketing</a>
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
                            <h2 class="pageheader-title">Dashboard </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Sales</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">
                                        <?php
                                        $sales_count = "SELECT SUM(dp.kuantitas * pd.harga) as s
                                            FROM det_pemesanan dp
                                            INNER JOIN produk pd
                                            ON dp.id_produk = pd.id_produk";
                                        $sales_query = mysqli_query($koneksi, $sales_count);
                                        $sales_object = mysqli_fetch_assoc($sales_query);
                                        echo "Rp." . number_format($sales_object['s']);
                                        ?>
                                    </h1>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Customer</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">
                                        <?php
                                        $cust_count = "SELECT COUNT(*) as c FROM customer";
                                        $cust_query = mysqli_query($koneksi, $cust_count);
                                        $cust_object = mysqli_fetch_assoc($cust_query);
                                        echo $cust_object['c'];
                                        ?>
                                    </h1>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Order</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">
                                        <?php
                                        $sql_order = "SELECT COUNT(*) as c FROM pemesanan";
                                        $order_query = mysqli_query($koneksi, $sql_order);
                                        $order_object = mysqli_fetch_assoc($order_query);
                                        echo $order_object['c'];
                                        ?>
                                    </h1>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Complaint</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">
                                        <?php
                                        $sql_complaint = "SELECT COUNT(*) as c FROM complaint";
                                        $complaint_query = mysqli_query($koneksi, $sql_complaint);
                                        $complaint_object = mysqli_fetch_assoc($complaint_query);
                                        echo $complaint_object['c'];
                                        ?>
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <h5 class="card-header">Recent Orders</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">ID Pembelian</th>
                                                <th class="border-0">User</th>
                                                <th class="border-0">Tanggal Transaksi</th>
                                                <th class="border-0">Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_rec_order = 'SELECT p.id_pemesanan, c.nama, DATE_FORMAT(p.tgl_pesan, "%d %b %Y") as tgl, SUM(pd.harga * dp.kuantitas) as total FROM pemesanan p 
                                                INNER JOIN det_pemesanan dp
                                                ON p.id_pemesanan = dp.id_pemesanan
                                                INNER JOIN produk pd 
                                                ON pd.id_produk = dp.id_produk
                                                INNER JOIN customer c 
                                                ON c.id_customer = p.id_customer
                                                GROUP BY p.id_pemesanan  
                                                ORDER BY `p`.`id_pemesanan`  DESC
                                                LIMIT 10';
                                            $rec_order_query = mysqli_query($koneksi, $sql_rec_order);
                                            while ($d = mysqli_fetch_assoc($rec_order_query)) {

                                                ?>
                                                <tr>
                                                    <td><?php echo $d['id_pemesanan']; ?></td>
                                                    <td><?php echo $d['nama']; ?></td>
                                                    <td><?php echo $d['tgl']; ?></td>
                                                    <td><?php echo "Rp." . number_format($d['total']); ?></td>
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

                    <?php
                        $sql_complaint = mysqli_query($koneksi, "SELECT `status`, IFNULL(COUNT(*), 0) jumlah FROM `complaint` GROUP BY status ORDER BY `status` "); 
                        $comp = [
                            "Resolved" => 0,
                            "Untouched" => 0,
                            "Inprogress"=> 0
                        ];
                        while($complaint_object = mysqli_fetch_assoc($sql_complaint)){
                            // array_push($comp, $complaint_object['jumlah']);
                            $comp["$complaint_object[status]"] = $complaint_object["jumlah"] ;
                        }
                    ?>


                    <div class="col-4">
                        <div class="card">
                            <h5 class="card-header">Resolved Complaints</h5>
                            <div class="card-body">
                                <canvas id="complaint" height="250" class="mt-2 mb-2"></canvas>
                                <div class="chart-widget-list">
                                    <p>
                                        <span class="fa-xs text-primary mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                                        <span class="legend-text">Resolved</span>
                                        <span class="float-right"><?php echo $comp["Resolved"] ?></span>
                                    </p>
                                    <p>
                                        <span class="fa-xs text-brand mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                                        <span class="legend-text">Inprogress</span>
                                        <span class="float-right"><?php echo $comp["Untouched"] ?></span>
                                    </p>
                                    <p>
                                        <span class="fa-xs text-secondary mr-1 legend-title"><i class="fa fa-fw fa-square-full"></i></span>
                                        <span class="legend-text">Untouched</span>
                                        <span class="float-right"><?php echo $comp["Inprogress"] ?></span>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <h5 class="card-header">Top Campaign</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="bg-light">
                                                <th class="border-0">ID Campaign</th>
                                                <th class="border-0">Campaign Name</th>
                                                <th class="border-0">Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_top_camp = "SELECT cg.id_campaign, cg.nama_campaign, SUM(dp.kuantitas * pd.harga) as nilai
                                                FROM det_pemesanan dp
                                                INNER JOIN produk pd
                                                ON dp.id_produk = pd.id_produk
                                                INNER JOIN pemesanan p 
                                                ON p.id_pemesanan = dp.id_pemesanan
                                                INNER JOIN campaign cg
                                                ON cg.id_campaign = p.id_campaign
                                                GROUP BY p.id_campaign
                                                ORDER BY nilai DESC
                                                LIMIT 5;
                                                ";
                                            $top_camp_query = mysqli_query($koneksi, $sql_top_camp);
                                            while ($top_camp_object = mysqli_fetch_assoc($top_camp_query)) {


                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $top_camp_object['id_campaign'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $top_camp_object['nama_campaign'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo "Rp." . number_format($top_camp_object['nilai']) ?>
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
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <h5 class="card-header">Most Valuable Group</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="bg-light">
                                                <th class="border-0">ID Group</th>
                                                <th class="border-0">Group Name</th>
                                                <th class="border-0">Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $top_group_sql = "SELECT g.id_group, g.nama_group, SUM(dp.kuantitas * pd.harga) as nilai
                                                FROM `group` g
                                                INNER JOIN det_group dg
                                                ON g.id_group = dg.id_group
                                                INNER JOIN customer c
                                                ON c.id_customer = dg.id_cust
                                                INNER JOIN pemesanan p
                                                ON p.id_customer = c.id_customer
                                                INNER JOIN det_pemesanan dp
                                                ON dp.id_pemesanan = p.id_pemesanan
                                                INNER JOIN produk pd
                                                ON pd.id_produk = dp.id_produk
                                                GROUP BY g.id_group
                                                ORDER BY nilai DESC
                                                LIMIT 5";
                                            $top_group_query = mysqli_query($koneksi, $top_group_sql);
                                            while ($top_group_object = mysqli_fetch_assoc($top_group_query)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $top_group_object['id_group'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $top_group_object['nama_group'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo "Rp." . number_format($top_group_object['nilai']) ?>
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
                    </div>
                </div>

                <!-- ============>================================================= -->
                <!-- end pagehead>r -->
                <!-- ============================================================== -->
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
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script>
        var ctx = document.getElementById("complaint").getContext('2d');
        var myChart = new Chart(ctx, {
                type: 'doughnut',
                
                data: {
                    labels: ["Resolved", "Inprogress", "Untouched"],
                    datasets: [{
                        backgroundColor: [
                            "#5969ff", 
                            "#ffc750", 
                            "#ff407b",
                        ],
                        data: [<?php echo "$comp[Resolved],$comp[Inprogress],$comp[Untouched]"?>]
                    }]
                },
                options: {
                    legend: {
                        display: false

                    }
                }

            });
    </script>
</body>

</html>