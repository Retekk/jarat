<html>
  <head>
    <?php 
    if(isset($css_files)){
      foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php 
      endforeach;
     }
    ?>
    <?php 
    if(isset($js_files)){
      foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php 
      endforeach; 
    } else {
    ?>
      <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <?php
    }
    ?>
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-theme.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url(); ?>assets/imgs/favicon.png" type="image/x-icon" />
  </head>
  <body>