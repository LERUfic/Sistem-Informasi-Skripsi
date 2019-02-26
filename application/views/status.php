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
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/reset.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/site.css'); ?>">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/container.css'); ?>"">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/grid.css'); ?>"">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/header.css'); ?>"">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/image.css'); ?>"">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/menu.css'); ?>"">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/divider.css'); ?>"">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/segment.css'); ?>"">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/form.css'); ?>"">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/input.css'); ?>"">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/button.css'); ?>"">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/list.css'); ?>"">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/message.css'); ?>"">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/semantic/components/icon.css'); ?>"">

  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="crossorigin="anonymous"></script>
  <script src="<?php echo base_url('assets/semantic/components/form.js'); ?>"></script>
  <script src="<?php echo base_url('assets/semantic/components/transition.js'); ?>"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      window.setTimeout(function(){
        window.location.href = "<?php echo base_url($rdr) ?>";
      }, 3000);
    });
  </script>
  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>
</head>
<body>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <div class="content">
        <?php echo $msg; ?>
      </div>
    </h2>
  </div>
</div>

</body>

</html>

