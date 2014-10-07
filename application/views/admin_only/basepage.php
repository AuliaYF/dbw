<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Project-Forum | It's Superuser Here</title>

    <!-- Custom CSS -->
    <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">

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
    				<a class="navbar-brand" href="index.html">Project-Forum</a>
    			</div>
    			<!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?= base_url('basepage/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                       <ul class="nav" id="side-menu">
                          <li>
                             <a href="<?= base_url() ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                         </li>
                         <li <?php if(!empty($active_table)){echo 'class="active"';} ?>>
                             <a href="<?= base_url('tables') ?>"><i class="fa fa-table fa-fw"></i> Tables<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                   <a <?php if(strtolower($active_table) === 'categories'){echo 'class="active"';} ?> href="<?= base_url('tables/categories') ?>">Categories</a>
                               </li>
                               <li>
                                   <a <?php if(strtolower($active_table) === 'topics'){echo 'class="active"';} ?> href="<?= base_url('tables/topics') ?>">Topics</a>
                               </li>
                               <li>
                                <a <?php if(strtolower($active_table) === 'users'){echo 'class="active"';} ?> href="<?= base_url('tables/users') ?>">Users</a>
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
