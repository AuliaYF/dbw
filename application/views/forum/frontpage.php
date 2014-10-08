<article><h2 class="hidden">Categories</h2>
	<!-- General Category -->
	<?php foreach($table_cat_data as $row): 
	if($this->model_tp->getSpecifiedByCat($row->cat_id)->num_rows() > 0){
		?>
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
						<a class="title" href="<?= base_url('forum/'.$row_tp->tp_title) ?>"><?= $row_tp->tp_title ?></a>
						<p>
							<?= $row_tp->tp_desc ?>
						</p>

						<!-- Forum Details -->
						<div class="details">
							<table class="table">
								<tbody>
									<tr>
										<th>THREADS</th>
										<th></th>
									</tr>
									<tr>
										<td><?= $this->model_th->countData($row_tp->tp_id) ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</section>
				<?php } endforeach; ?>
			</section>
			<?php } endforeach; ?>
			<p class="root"></p>
		</article>