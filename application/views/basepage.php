<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Project-Forum | It's Superuser Here</title>
    <!-- Custom CSS -->
    

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url('assets/css/plugins/metisMenu/metisMenu.min.css') ?>" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?= base_url('assets/css/plugins/dataTables.bootstrap.css') ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('assets/css/sb-admin-2.css') ?>" rel="stylesheet">
    
    <!-- Forum CSS-->
    <link href="<?= base_url('assets/css/forum.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">

    <link href="<?= base_url('assets/css/roboto.css') ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet') ?>" type="text/css">

</head>
<body>
    <h1 class="hidden">ini apa</h1>
    <div class="header-background"></div>

    <div class="container">
        <!-- Header -->
        <section>
            <header class="row header">
                <div class="col-md-12">
                    <nav class="navbar navbar-inverse" role="navigation"><h1 class="hidden">Login Form</h1>
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <img src="<?= base_url('assets/img/ic_action_person.png') ?>" width="60" height="60" class="pull-left" alt="User Photo">
                            <p class="navbar-text">Howdy, <?= $this->session->userdata('logged_in')['active_user_name'] ?></p>
                            <div class="navbar-form navbar-left">
                                <a href="<?= base_url('login/logout') ?>">
                                    <button class="btn btn-default">Logout</button>
                                </a>
                            </div>

                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Preferences <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="profile.html">Profile</a></li>
                                        <li><a href="#">Setting</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Control <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="forums-moderators.html">Moderators</a></li>
                                        <li><a href="#">Users</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-facebook fa-stack-1x"></i>
                                        </span>
                                    </a>
                                    <a href="#">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-twitter fa-stack-1x"></i>
                                        </span>
                                    </a>
                                    <a href="#">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-dribbble fa-stack-1x"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <div class="jumbotron">
                        <h1>MOON <span>LIGHT</span></h1>
                    </div>

                    <nav class="navbar navbar-default" role="navigation"><h1 class="hidden">Main Menu</h1>
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">HOME</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="about.html">ABOUT</a></li>
                                <li><a href="contact.html">CONTACT</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <span class="glyphicon glyphicon-search"></span>
                                    <input class="form-control" type="text" placeholder="Search">
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>

                    <?= $breadcrumbs ?>
                </div>
            </header>
        </section>

        <!-- Home Page -->
        <section class="row"><h1 class="hidden">Content</h1>
            <section class="col-md-8 main">
                <?php $this->load->view($main_view); ?>
            </section>
            <div class="col-md-1"></div>
            <aside class="col-md-3 sidebar"><h3 class="hidden">Sidebar</h3>
                <?php $this->load->view($sidebar_view); ?>
            </aside>
        </section>

        <!-- Footer -->
        <section>
            <footer class="row footer">
                <div class="col-md-12">
                    <nav class="navbar navbar-default" role="navigation"><h3 class="hidden">Up</h3>
                        <div class="navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><span class="up">UP</span></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>

                    <div class="jumbotron">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <h2>About</h2>
                                <p class="about">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa. Sed eleifend nonummy diam. Praesent mauris ante, elementum et, bibendum at, posuere sit amet, nibh. Duis tincidunt lectus quis dui viverra vestibulum.</p>

                                <div class="row">
                                    <div class="col-md-1">
                                        <i class="fa fa-twitter"></i>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit nam. <a href="#">http://t.co/link</a>
                                            <br />
                                            <span><time datetime="2011-11-12 14:54:39">15 Minutes ago</time></span>
                                        </p>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-1">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="col-md-4">
                                        <p>
                                            <input type="text" class="form-control" placeholder="Sign up to our newsletter">
                                            <a class="newsletter" href="#">Submit</a>
                                        </p>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </div>

                    <nav class="navbar navbar-inverse" role="navigation"><h3 class="hidden">Copyright and Site map</h3>
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
                            <ul class="nav navbar-nav">
                                <li>
                                    <p class="navbar-text navbar-right">&copy; Copyright 2014 - Designed by <a href="http://myflashlab.com/">myFlashLab Team</a></p>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="about.html">About</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Site map</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>
                </div>
            </footer>
        </section>
    </div> <!-- /container -->

    <div class="footer-background"></div>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url('assets/js/jquery-1.11.0.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>

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