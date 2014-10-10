<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">
    
    <!-- Roboto Font -->
    <link href="<?= base_url('assets/css/roboto.css') ?>" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="<?= base_url('assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet') ?>" type="text/css">

    <style>
        .header-brand{padding-top: 10px; padding-bottom: 10px; padding-right: 20px;}
        .sidebar UL{list-style-type: none; clear: right; margin: 0; padding: 0;}
        .sidebar UL LI{padding: 10px 5px; text-align: right;}
        .sidebar UL LI.active{background: #454545;}
        .sidebar UL LI.active a{color: #f9f9f9;}
        .left-arrow{width: 0; height: 0; border-bottom: 21px solid transparent; border-top: 22px solid transparent; border-right: 20px solid #454545; font-size: 0; line-height: 0; float: left; margin-left: -25px; margin-top: -10px;}
        .sidebar .tp{font-weight: bold; color: #a9a9a9;}
        .contentTable td{ padding-left: 10px; padding-right: 10px;}
    </style>
</head>
<body>
    <div class="container-fluid">
        <section>
            <header class="row">
                <nav class="navbar navbar-default navbar-fixed-top header-brand" role="navigation" style="margin-bottom: 0; background: #1f2036;">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="<?= base_url('forum') ?>" class="navbar-brand" style="text-decoration: none; font-size: 31pt; color: white;">
                            Project-Forum
                        </a>

                    </div>
                    <form action="" class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control input-box"  placeholder="Search">
                                <a href="#" class="input-group-addon"><i class="glyphicon glyphicon-search"></i></a>
                            </div>
                        </div>
                    </form>
                    <?php if(empty($active_user_name)){ ?>
                    <form class="navbar-form navbar-right" >
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <div class="input-group ">
                                <input type="password" class="form-control" placeholder="Password">
                                <a href="#" class="input-group-addon"><i class="glyphicon glyphicon-chevron-right"></i></a>
                            </div>
                        </div>
                    </form>
                    <?php }else{ ?>
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
                                <li><a href="<?= base_url('login/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                            <!-- /.dropdown-user -->
                        </li>
                        <!-- /.dropdown -->
                    </ul>
                    <?php } ?>
                </nav>
            </header>
        </section>
        <section class="row" style="margin-top: 80px">
            <section class="col-md-8 main">
                <article><h2 class="hidden">Categories</h2>
                    <?php $this->load->view($main_view); ?>
                </article>
            </section>
            <div class="col-md-1"></div>
            <aside class="col-md-3 sidebar">
                <?php $this->load->view($sidebar_view); ?>
            </aside>
        </section>
    </div>

    <script src="<?= base_url('assets/js/jquery-1.11.0.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    
    <?php if($insert){ ?>
    <script src="<?= base_url('assets/js/tinymce/tinymce.min.js') ?>"></script> 
    <script type="text/javascript">
        tinymce.init({
        selector: "textarea", // TinyMCE element selector
        skin: "light",
        plugins: ["preview sh4tinymce"],
        toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table | fontsizeselect | sh4tinymce | preview"
    });
</script>
<?php } ?>
</body>
</html>