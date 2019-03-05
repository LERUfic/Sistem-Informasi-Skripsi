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

  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="crossorigin="anonymous"></script>
  <script src="<?php echo base_url('assets/semanticui/dist/semantic.js'); ?>"></script>
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
      <a class="item" style="color:white;">Home</a>
      <div class="ui simple dropdown item">
        <div style="color:white;">myTA</div>
        <i class="dropdown icon"></i>
        <div class="menu">
          <a class="item">Informasi TA</a>
          <a class="item">List Proposal TA</a>
          <a class="item">Submit Proposal TA</a>
          <a class="item">Manage Proposal TA</a>
        </div>
      </div>
      <div class="right menu">
        <div class="ui simple dropdown item">
          <div style="color:white;">My Account</div>
          <i class="dropdown icon"></i>
          <div class="menu">
            <a class="item">Ubah Password</a>
            <a href="<?php echo base_url('user/logout') ?>"class="item"><div style="color:red">Logout</div></a>
          </div>
        </div>
      </div>
    </div>
</div>