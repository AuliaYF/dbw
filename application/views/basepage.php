<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Bootstrap Admin Theme</title>

	<!-- Bootstrap Core CSS -->
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="<?= base_url('assets/css/plugins/metisMenu/metisMenu.min.css') ?>" rel="stylesheet">

	<!-- DataTables CSS -->
	<link href="<?= base_url('assets/css/plugins/dataTables.bootstrap.css') ?>" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?= base_url('assets/css/sb-admin-2.css') ?>" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?= base_url('assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet') ?>" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

    	<div id="wrapper">

    		<!-- Navigation -->
    		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    			<div class="navbar-header">
    				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    					<span class="sr-only">Toggle navigation</span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    				</button>
    				<a class="navbar-brand" href="index.html">SB Admin v2.0</a>
    			</div>
    			<!-- /.navbar-header -->

    			<div class="navbar-default sidebar" role="navigation">
    				<div class="sidebar-nav navbar-collapse">
    					<ul class="nav" id="side-menu">
    						<li>
    							<a href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
    						</li>
    						<li class="active">
    							<a href="#"><i class="fa fa-table fa-fw"></i> Tables<span class="fa arrow"></span></a>
    							<ul class="nav nav-second-level">
    								<li>
    									<a <?php if(strtolower($active_table) === 'categories'){echo 'class="active"';} ?> href="#">Categories</a>
    								</li>
    								<li>
    									<a href="morris.html">Morris.js Charts</a>
    								</li>
    							</ul>
    							<!-- /.nav-second-level -->
    						</li>
    					</ul>
    				</div>
    				<!-- /.sidebar-collapse -->
    			</div>
    			<!-- /.navbar-static-side -->
    		</nav>

			<?= $this->load->view($main_view) ?>

    	</div>
    	<!-- /#wrapper -->

    	<!-- jQuery Version 1.11.0 -->
    	<script src="<?= base_url('assets/js/jquery-1.11.0.js') ?>"></script>

    	<!-- Bootstrap Core JavaScript -->
    	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    	<!-- Metis Menu Plugin JavaScript -->
    	<script src="<?= base_url('assets/js/plugins/metisMenu/metisMenu.min.js') ?>"></script>

    	<!-- DataTables JavaScript -->
    	<script src="<?= base_url('assets/js/plugins/dataTables/jquery.dataTables.js') ?>"></script>
    	<script src="<?= base_url('assets/js/plugins/dataTables/dataTables.bootstrap.js') ?>"></script>

    	<!-- Custom Theme JavaScript -->
    	<script src="<?= base_url('assets/js/sb-admin-2.js') ?>"></script>

    	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    	<script>
    		$(document).ready(function() {
    			$('#dataTables-example').dataTable();
    		});
    	</script>

    </body>

    </html>
