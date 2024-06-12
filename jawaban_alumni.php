<?php
$menu = 'j_alumni';

include_once('model/j_alumni.php');

$status = isset($_GET['status']) ? strtolower($_GET['status']) : null;
$message = isset($_GET['message']) ? strtolower($_GET['message']) : null;

if (session_status() === PHP_SESSION_NONE)
    session_start();

if (empty($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pengguna</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <?php include_once('layouts/header.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include_once('layouts/sidebar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Jawaban alumni</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Jawaban alumni</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Jawaban alumni</h3>
                </div>
                <div class="card-body">

                    <?php
                    if ($status == 'sukses') {
                        echo '<div class="alert alert-success">
                      ' . $message . '
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></div>';
                    }
                    ?>

                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Jawaban alumni</th>
                            <th>Responden alumni</th>
                            <th>Soal</th>
                            <th>Jawaban</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $alumni = new j_alumni();
                        $list = $alumni->getData();

                        $i = 1;
                        while ($row = $list->fetch_assoc()) {
                            echo '<tr>
                                <td>' . $i . '</td>
                                <td>' . $row['jawaban_alumni_id'] . '</td>
                                <td>' . $row['responden_alumni_id'] . '</td>
                                <td>' . $row['soal_id'] . '</td>
                                <td>' . $row['jawaban'] . '</td>
                                <td>
                                    <a title="View Data" href="jawaban_alumni_form.php?act=view&id=' . $row['jawaban_alumni_id'] . '" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                    <a onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')"
                                </td>
                            </tr>';

                            $i++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include_once('layouts/footer.php'); ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>

</body>
</html>