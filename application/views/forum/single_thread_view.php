<?php foreach($active_table_data as $row):?>
<h3>Title: <?= $row->rp_title ?></h3>
<h3>Content:</h3>
<div>
	<?= $row->rp_content ?>
</div>
<h3>Starter: <?= $row->rp_starter ?></h3>
<h3>Date: <?= $row->rp_date ?></h3>
<h3>ThreadID: <?= $row->rp_thread ?></h3>
<hr>
<?php endforeach;?>