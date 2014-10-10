<section class="forum-header">
	<h1><?= $table_tp_data->tp_title ?></h1>
</section>
<div class="root">
	<p><?= $table_tp_data->tp_desc ?></p>
	<a href="<?= base_url('forum/'.$table_tp_data->tp_title.'/insert') ?>" class="btn btn-success btn-lg">New Thread</a>
</div>

<?php if(count($active_table_data) > 0){ ?>
<article><h2 class="hidden">Topics</h2>
	<?php foreach($active_table_data as $row): ?>
		<!-- Topic -->
		<section class="topic"><h3 class="hidden"><?= $row->th_title ?></h3>
			<!-- Topic Header -->
			<header class="row topic-header">
				<div class="col-md-12">
					<table>
						<tbody>
							<tr>
								<td><a class="title" href="topics-posts.html"><?= $row->th_title ?></a></td>
								<td>
									<img src="img/user.png" width="70" height="70" class="pull-right" alt="User Photo">
									<img src="img/user.png" width="35" height="35" class="pull-right" alt="User Photo">
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</header>
			<!-- Topic Details -->
			<div class="row details table-responsive">
				<div class="col-md-12">
					<table class="table">
						<tbody>
							<tr>
								<th>STARTED</th>
								<th>LAST POST</th>
								<th>VIEWS</th>
								<th>REPLIES</th>
								<th></th>
							</tr>
							<tr>
								<td><?= $row->user_name ?></td>
								<td><?= $row->user_name ?></td>
								<td>40</td>
								<td>30</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	<?php endforeach ?>
</article>
<?php } ?>