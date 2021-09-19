<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Askmee - Admin</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url("assets/css/app.min.css");?>"> 
  <?php
   $controller = $this->router->fetch_class();
   $data_table_controller = ['userlist', 'categorylist', 'productlist', 'vendorlist'];
  if(in_array($controller, $data_table_controller)){
    echo('<link rel="stylesheet" href='.base_url("assets/bundles/datatables/datatables.min.css").'>');
    echo('<link rel="stylesheet" href='.base_url("assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css").'>');
  }
  ?>
  <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css");?>"> 
  <!-- app.min.css -->
  <link rel="stylesheet" href="">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url("assets/bundles/bootstrap-social/bootstrap-social.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/components.css"); ?>">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url("assets/css/custom.css"); ?>">
  <link rel="stylesheet" href="<?php echo base_url("assets/img/favicon.ico"); ?>">
  <?php 
    $toazt_controllers = ['login', 'addproduct', 'upload_image', 'adduser']; 
    if(in_array($controller, $toazt_controllers)){
      echo('<link rel="stylesheet" href='.base_url("assets/bundles/izitoast/css/iziToast.min.css").'>');
      //echo('<link rel="stylesheet" href="<?php echo base_url("assets/bundles/izitoast/css/iziToast.min.css");
    }
  ?>
</head>