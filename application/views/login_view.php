<?php  
$form = array(
    'user_email' => array(
        'name' => 'user_email',
        'maxlength' => '255',
        'class' => 'form-control form_field',
        'placeholder' => 'Email',
        'value' => set_value('user_email', isset($form_value['user_email']) ? $form_value['user_email'] : '')
        ),
    'user_pass' => array(
        'name' => 'user_pass',
        'maxlength' => '255',
        'class' => 'form-control form_field',
        'placeholder' => 'Password',
        'value' => set_value('user_pass', isset($form_value['user_pass']) ? $form_value['user_pass'] : '')
        ),
    'submit' => array(
        'name' => 'submit',
        'id' => 'submit',
        'value' => 'Login',
        'class' => 'btn btn-lg btn-success btn-block'
        )
    );
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Project-Forum | It's Superuser Here</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?= base_url('assets/css/plugins/metisMenu/metisMenu.min.css') ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= base_url('assets/css/sb-admin-2.css') ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url('assets/font-awesome-4.1.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <?php if($loginerr){ ?>
                            <div class="alert alert-danger">
                                <?= $err_msg ?>
                            </div>
                            <?php } ?>
                            <?= form_open($form_action) ?>
                            <fieldset>
                                <div class="form-group">
                                    <?= form_input($form['user_email']) ?>
                                    <?= form_error('user_email', '<p class="help-block">', '</p>') ?>
                                </div>
                                <div class="form-group">
                                    <?= form_password($form['user_pass']) ?>
                                    <?= form_error('user_pass', '<p class="help-block">', '</p>') ?>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <?= form_submit($form['submit']); ?>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="<?= base_url('assets/js/jquery-1.11.0.js')  ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url('assets/js/plugins/metisMenu/metisMenu.min.js') ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url('assets/js/sb-admin-2.js"') ?>"></script>

</body>

</html>
