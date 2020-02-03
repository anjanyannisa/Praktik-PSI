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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/select2/css/select2.css">
    <link rel="stylesheet" href="../assets/vendor/summernote/css/summernote-bs4.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>

    <style>
        .dashboard-main-wrapper .main-content {
            margin-left: 0;

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
                                    <h5 class="mb-0 text-white nav-user-name"> <?php echo $_SESSION['pegawai']; ?></h5>
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
                                <a class="nav-link nav-icons" href="customer_group.php"><i class="fa fa-fw fa-users"></i>Customer Group</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons" href="../complaint_ticket/ticket.php"><i class="fa fa-fw fa-ticket-alt"></i>Complaint Ticket</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-icons active" href="mail_marketing.php"><i class="fa fa-fw fa-paper-plane"></i>Mail Marketing</a>
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
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Campaign Message</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="../dashboard_home.html" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="mail_marketing.html" class="breadcrumb-link">Mail Marketing</a></li>
                                        <li class="breadcrumb-item active"><a href="#" class="breadcrumb-link">Compose Campaign Message</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-content container-fluid p-0">
                    <div class="email-head">
                        <div class="email-head-title">Compose new message<span class="icon mdi mdi-edit"></span></div>
                    </div>
                    <div class="email-compose-fields">
                        <div class="to">
                            <div class="form-group row pt-0">
                                <label class="col-md-1 control-label">To:</label>
                                <div class="col-md-11">
                                    <form action="email_compose_send.php" method="POST">
                                        <div class="row" style="margin-top:0.5em;">
                                            <?php
                                            $nama_group_sql = "SELECT id_group, nama_group FROM `group`";
                                            $nama_group_query = mysqli_query($koneksi, $nama_group_sql);
                                            while ($nama_group_object = mysqli_fetch_assoc($nama_group_query)) {


                                                ?>
                                                <div class="col-md-4">
                                                    <label class="custom-control custom-checkbox pt-0">
                                                        <input type="checkbox" name="grouplist[]" value=<?php echo $nama_group_object["id_group"] ?> class="custom-control-input">
                                                        <span class="custom-control-label">
                                                            <?php echo $nama_group_object['nama_group']; ?>
                                                        </span>
                                                    </label>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="subject">
                            <div class="form-group row pt-2">
                                <label class="col-md-1 control-label">Subject</label>
                                <div class="col-md-11">
                                    <input class="form-control" style="margin-top:0.75em" type="text" name="subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row pt-3">
                            <label class="col-md-1">From: </label>
                            <div class="input-group date col-md-5" id="start_date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#start_date" name="tanggal_start" placeholder="Tanggal mulai Campaign" />
                                <div class="input-group-append" data-target="#start_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                            <label class="col-md-1">To: </label>
                            <div class="input-group date col-md-5" id="end_date" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#end_date" name="tanggal_end" placeholder="Tanggal akhir Campaign" />
                                <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="email editor">
                        <div class="col-md-12 p-0">
                            <div class="form-group">
                                <label class="control-label sr-only" for="summernote">Descriptions </label>
                                <div class="container-fluid">
                                    <textarea class="form-control" id="summernote" name="editordata" rows="6" placeholder="Write Descriptions"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="email action-send">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-space" type="submit"><i class="icon s7-mail"></i> Send</button>
                                    <button class="btn btn-secondary btn-space" type="button"><i class="icon s7-close"></i> Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
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
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/vendor/select2/js/select2.min.js"></script>
    <script src="../assets/vendor/summernote/js/summernote-bs4.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/vendor/datepicker/moment.js"></script>
    <script src="../assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="../assets/vendor/datepicker/datepicker.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
                tags: true
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300

            });
        });
    </script>
</body>

</html>