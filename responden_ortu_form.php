<?php
$menu = 'survey';
include_once('model/ortu_form_model.php'); // Updated model include

$status = isset($_GET['status']) ? strtolower($_GET['status']) : null;
$message = isset($_GET['message']) ? strtolower($_GET['message']) : null;

if (session_status() === PHP_SESSION_NONE)
  session_start();

$user = $_GET['bio'];
$_SESSION['user'] = $user;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Survey Kepuasan Pelanggan Polinema</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Custom CSS for Centering and Header Background -->
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Source Sans Pro', sans-serif;
    }
    .centered-form {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 60vh;
    }
    .form-container {
      max-width: 980px;
      width: 100%;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .card-header {
      background-color: #007bff;
      color: white;
      text-align: center;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .content-header {
      background-color: #007bff;
      color: white;
      padding: 20px;
      text-align: center;
      border-radius: 10px;
      margin-bottom: 20px;
    }
    .content-header h1 {
      color: white;
      margin: 0;
      font-size: 24px;
    }
    .form-group label {
      font-weight: bold;
    }
    .form-group input, .form-group select {
      border-radius: 5px;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper" style="padding: 1%;">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 style="font-size:xx-large;">Survey Kepuasan Pelanggan Polinema</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content centered-form">
    <!-- Default box -->
    <div class="card form-container">
      <div class="card-header">
        <h3 class="card-title">Survey Orang tua</h3>
      </div>
      <div class="card-body">
        <form action="responden_ortu_action.php?act=simpan" method="post"> <!-- Updated action URL -->
          <div class="form-group">
            <label for="responden_tanggal">Tanggal</label>
            <input type="datetime-local" class="form-control" id="responden_tanggal" name="responden_tanggal" required readonly>
          </div>

          <div class="form-group">
            <label for="responden_nama">Nama</label> <!-- Updated field name -->
            <input type="text" class="form-control" id="responden_nama" name="responden_nama" required>
          </div>

          <div class="form-group">
            <label for="responden_jk">Jenis Kelamin</label> <!-- Added field for gender -->
            <select class="form-control" id="responden_jk" name="responden_jk" required>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>

          <div class="form-group">
            <label for="responden_umur">Umur</label> <!-- Added field for age -->
            <input type="number" class="form-control" id="responden_umur" name="responden_umur" required>
          </div>

          <div class="form-group">
            <label for="responden_hp">No. HP</label> <!-- Added field for phone number -->
            <input type="text" class="form-control" id="responden_hp" name="responden_hp" required>
          </div>

          <div class="form-group">
            <label for="responden_pendidikan">Pendidikan</label> <!-- Added field for education -->
            <input type="text" class="form-control" id="responden_pendidikan" name="responden_pendidikan" required>
          </div>

          <div class="form-group">
            <label for="responden_pekerjaan">Pekerjaan</label> <!-- Added field for occupation -->
            <input type="text" class="form-control" id="responden_pekerjaan" name="responden_pekerjaan" required>
          </div>

          <div class="form-group">
            <label for="responden_penghasilan">Penghasilan</label> <!-- Added field for income -->
            <input type="text" class="form-control" id="responden_penghasilan" name="responden_penghasilan" required>
          </div>

          <div class="form-group">
            <label for="mahasiswa_nim">NIM Mahasiswa</label> <!-- Added field for student NIM -->
            <input type="text" class="form-control" id="mahasiswa_nim" name="mahasiswa_nim" required>
          </div>

          <div class="form-group">
            <label for="mahasiswa_nama">Nama Mahasiswa</label> <!-- Added field for student name -->
            <input type="text" class="form-control" id="mahasiswa_nama" name="mahasiswa_nama" required>
          </div>

          <div class="form-group">
            <label for="mahasiswa_prodi">Prodi Mahasiswa</label> <!-- Added field for student program -->
            <input type="text" class="form-control" id="mahasiswa_prodi" name="mahasiswa_prodi" required>
          </div>

          <button type="submit" href="responden_ortu_form.php" name="simpan" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <!-- /.card-body -->
      <!-- /.card-footer-->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- Custom JavaScript to Set Current Date and Time -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const dateTimeField = document.getElementById('responden_tanggal');
    const now = new Date();
    now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
    dateTimeField.value = now.toISOString().slice(0,16);
  });
</script>
</body>
</html>
