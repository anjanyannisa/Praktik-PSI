<!doctype html>
<?php
require "../../database/config.php";
include "../../database/conn.php";

if (!isset($_SESSION['customer'])) {
    header('Location: ../login.html');
    exit;
}
?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Complaint Form</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="../../static/hijack_sandals_web_logo.png" height="25">
                </a>
            </nav>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Hello, <?php echo $_SESSION['customer'];?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="display-4 text-center" style="margin-top:1em;"> Form Complaint</h1>
        <div class="card" style="margin-top: 2rem;">
            <div class="card-body">
                <div class="container">
                    <form action="complaint.php" method="post" style="padding: 30px 12em;">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="inputNama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="inputEmail4" placeholder="Nama">
                            </div>
                            <div class="form-group col-6">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="exampleFormControlTextarea1">Pesan Komplain</label>
                                <textarea class="form-control" name="pesan_complaint" id="exampleFormControlTextarea1" rows="10"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="inputState">Jenis Komplain</label>
                                <select name="kategori" id="inputState" class="form-control">
                                    <option>Product</option>
                                    <option>Pelayanan</option>
                                    <option>Pengiriman</option>
                                    <option>Lain-lain</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-secondary btn-block" style="margin-top:2em;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div style="margin-bottom: 100px;"></div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>