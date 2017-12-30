<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Mr. Laba-Luvah Star System v2">
    <meta name="author" content="Coderthemes">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>public/assets/images/favicon.ico">

    <!-- App title -->
    <title>Star System v2</title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/assets/plugins/morris/morris.css">

    <!-- Switchery css -->
    <link href="<?php echo base_url();?>public/assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
    <!-- Custom box css -->
    <link href="<?php echo base_url();?>public/assets/plugins/custombox/css/custombox.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->

    <link href="<?php echo base_url();?>public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/cs-select.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/css/cs-skin-elastic.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/toastr.css">
    
    <!-- App CSS -->
    <link href="<?php echo base_url();?>public/assets/css/style.css" rel="stylesheet" type="text/css" />     
     <link rel="stylesheet" href="<?php echo base_url();?>public/assets/plugins/jquery-ui/jquery-ui.css">

    <!-- Modernizr js -->                                               
    <script src="<?php echo base_url();?>public/assets/js/modernizr.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>public/assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>public/js/dropdown/classie.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/dropdown/selectFx.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/assets/vendor/select2/custom_select2.full.js"></script>
    <script src="<?php echo base_url();?>public/js/slimscroll.js"></script>

</head>

<body>
<input type="hidden" id="hidBaseUrl" value="<?php echo base_url();?>">
<input type="hidden" id="hidUserId" value="<?php echo $this->session->userdata("user_id");?>">
<!-- Navigation Bar-->
<?php require_once("navigation.php"); ?>
<!-- End Navigation Bar-->
<div class="wrapper">
<div class="container">
