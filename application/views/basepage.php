<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="<?= base_url('assets/css/roboto.css') ?>" rel="stylesheet" type="text/css">

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet">
</head>
<body>
    <div class="container">
        <section class="row" style="margin-top: 20px">
            <section class="col-md-8 main">
                <article><h2 class="hidden">Categories</h2>
                    <!-- General Category -->
                    <?php foreach($table_cat_data as $row): ?>
                    <section class="category"><h3 class="hidden"><?= $row->cat_name ?></h3>
                        <!-- Category Header -->
                        <header class="row">
                            <div class="col-md-12">
                                <a class="title" href="forums.html"><?= $row->cat_name ?></a>
                            </div>
                        </header>
                        
                        <?php foreach($table_tp_data as $row_tp): 
                            if($row_tp->tp_cat === $row->cat_id){
                        ?>
                        <!-- Category Forum -->
                        <section class="row forum"><h4 class="hidden"><?= $row_tp->tp_title ?></h4>
                            <div class="col-md-12">
                                <!-- Forum Header -->
                                <a class="title" href="forums-topics.html"><?= $row_tp->tp_title ?></a>
                                <p>
                                    <?= $row_tp->tp_desc ?>
                                </p>

                                <!-- Forum Details -->
                                <div class="details">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th>TOPICS</th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td>140,734</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                        <?php } endforeach; ?>
                    </section>
                <?php endforeach ?>
                </article>
            </section>
            <div class="col-md-1"></div>
            <aside class="col-md-3 sidebar">
                <!-- <h3 class="hidden">Sidebar</h3>
                Buttons
                <section><h4 class="hidden">Buttons</h4>
                    <button class="btn btn-danger btn-lg">NEW CATEGORY</button>
                    <button class="btn btn-danger btn-lg">NEW FORUM</button>
                </section>
                
                Search
                <section><h4 class="hidden">Search</h4>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                        <input type="text" class="form-control" placeholder="Search Category">
                    </div>
                </section> -->
            </aside>
        </section>
    </div>

    <script src="<?= base_url('assets/js/jquery-1.11.0.js') ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>