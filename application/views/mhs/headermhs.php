<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title><?php echo $title ?></title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semanticui/dist/semantic.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/calendar/calendar.css'); ?>">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css"/>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
  <script src="<?php echo base_url('assets/semanticui/dist/semantic.js'); ?>"></script>
  <script src="<?php echo base_url('assets/calendar/calendar.min.js'); ?>"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    });
  </script>
  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
  </style>
</head>
<body>
  <div class="ui large top fixed menu transition visible" style="background-color: teal; display: flex !important;" ">
    <div class="ui container">
      <a href="<?php echo base_url('beranda'); ?>" class="item" style="color:white;">Home</a>
      <div class="ui simple dropdown item">
        <div style="color:white;">myTA</div>
        <i class="dropdown icon"></i>
        <div class="menu">
          <a href="<?php echo base_url('mahasiswa/info'); ?>" class="item">Informasi TA</a>
          <a href="<?php echo base_url('mahasiswa/list'); ?>" class="item">List Proposal TA</a>
          <a href="<?php echo base_url('mahasiswa/proposal'); ?>" class="item">Submit Proposal TA</a>
          <a href="<?php echo base_url('mahasiswa/edit'); ?>" class="item">Manage Proposal TA</a>
        </div>
      </div>
      <div class="ui simple dropdown item">
        <div style="color:white;">Seminar</div>
        <i class="dropdown icon"></i>
        <div class="menu">
          <a href="<?php echo base_url('mahasiswa/jadwal'); ?>" class="item">Informasi Seminar TA</a>
          <!-- <a href="<?php //echo base_url('mahasiswa/list'); ?>" class="item">List Proposal TA</a> -->
          <a href="<?php echo base_url('mahasiswa/seminar'); ?>" class="item">Submit Seminar TA</a>
          <a href="<?php echo base_url('mahasiswa/change'); ?>" class="item">Manage Seminar TA</a>
        </div>
      </div>
      <div class="right menu">
        <div class="ui simple dropdown item">
          <div style="color:white;">My Account</div>
          <i class="dropdown icon"></i>
          <div class="menu">
            <a class="item">Ubah Password</a>
            <a href="<?php echo base_url('user/logout'); ?>"class="item"><div style="color:red">Logout</div></a>
          </div>
        </div>
      </div>
    </div>
</div>