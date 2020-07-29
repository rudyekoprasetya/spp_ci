<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" href="<?php echo base_url()."/assets/"; ?>favicon.ico">

    <title><?php echo $judul; ?></title>
<?php if(isset($output)) {?>
    <!-- CSS Grocery CRUD -->
    <?php foreach ($output->css_files as $file) { ?>
         <link href="<?php echo $file; ?>" rel="stylesheet">
    <?php    } ?>
<?php } ?>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()."/assets/"; ?>css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?php echo base_url()."/assets/"; ?>css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()."/assets/"; ?>font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <!-- <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css"> -->
    
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
	  
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
		<!--Header-->
        <?php echo $_header; ?>
		<!--endHeader-->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
		<!--sidebar-->
		<?php echo $_sidebar; ?>          
		<!--endsidebar-->
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
		<div class="col-lg-12">
		<div class="panel panel-primary">      
		<!--content-->
		<?php echo $_content; ?>          
        <!--endcontent-->
		</div>
		</div>
		</div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
<?php if(isset($output)) {?>
    <!-- JS grocery CRUD -->
    <?php foreach ($output->js_files as $file) { ?>
         <script src="<?php echo $file; ?>"></script>
    <?php    } ?>
<?php } else { ?>
    <!-- JavaScript -->
    <script src="<?php echo base_url()."/assets/"; ?>js/jquery-1.10.2.js"></script>
<?php } ?>
    <script src="<?php echo base_url()."/assets/"; ?>js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <!-- <script src="<?php echo base_url()."/assets/"; ?>js/morris/chart-data-morris.js"></script> -->
    <script src="<?php echo base_url()."/assets/"; ?>js/tablesorter/jquery.tablesorter.js"></script>
    <script src="<?php echo base_url()."/assets/"; ?>js/tablesorter/tables.js"></script>

  </body>
</html>
