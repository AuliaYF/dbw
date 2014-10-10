<h3 class="hidden">Sidebar</h3>
<span class="pull-right tp">FORUMS</span>
<ul>
	<?php foreach($breadcrumbs as $row): ?>
		<li <?php if($table_tp_data->tp_title === $row->tp_title){ ?> class="active" <?php } ?>>
			<?php if($table_tp_data->tp_title === $row->tp_title){ ?><div class="left-arrow"></div><?php } ?>
			<a href="<?= base_url('forum/'.$row->tp_title) ?>"><?= $row->tp_title ?></a>
		</li>
	<?php endforeach; ?>
</ul>