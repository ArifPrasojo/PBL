<?php 
session_start();
include('model/tendik_form_model.php');
include('model/survey_model.php');

$act = $_GET['act'];
$survey = new survey();
$surveyid = $survey -> getSurveyId();

 if($act == 'simpan'){ 
   echo '<pre>';
    $data = [
        'survey_id' => $surveyid,
        'responden_tanggal' => $_POST['responden_tanggal'], 
        'responden_nopeg' => $_POST['responden_nopeg'],
        'responden_nama' => $_POST['responden_nama'],
        'responden_unit' => $_POST['responden_unit']
    ];

    $insert = new tendik_form_model();
    $insert->insertData($data);

    header('location: responden_tendik.php?status=sukses&message=Data berhasil disimpan');
 }

 if($act == 'edit'){
    $id = $_GET['id'];

    $data = [
      'survey_id' => $_POST['survey_id'],
      'responden_tanggal' => $_POST['responden_tanggal'], 
      'responden_nim' => $_POST['responden_nim'],
      'responden_nama' => $_POST['responden__nama'],
      'responden_unit' => $_POST['responden_unit']
  ];

    $update = new tendik_form_model();
    $update->updateData($id, $data);

    header('location: responden_tendik.php?status=sukses&message=Data berhasil diubah');
 }

 if($act == 'hapus'){
    $id = $_GET['id'];

    $hapus = new tendik_form_model();
    $hapus->deleteData($id);

    header('location: responden_tendik.php?status=sukses&message=Data berhasil dihapus');
 }