		    		<div id="page-wrapper">
		    			<div class="row">
		    				<div class="col-lg-12">
		    					<h1 class="page-header"><?= $breadcrumbs ?></h1>
		    				</div>
		    				<!-- /.col-lg-12 -->
		    			</div>
		    			<!-- /.row -->
		    			<div class="row">
		    				<div class="col-lg-12">
		    					<?php if(count($table_th_data) > 0){ ?>
		    					<table style="width: 100%; " class="contentTable" cellpadding="0" cellspacing="0">
									<!--<thead>
										<tr>
											<td style="width: 5%;">Icon</td>
											<td style="width: 60%;">Name</td>
											<td style="width: 15%; background: #f5f5f5;">Statistic</td>
											<td style="width: 20%;">Latest</td>
										</tr>
									</thead>-->
									<?php foreach ($table_th_data as $rows): ?>
										<tr style="border: 1px solid #000; border-right: 0px; border-top: 0px; border-left: 0px">
											<td style="width: 5%; padding-top: 0px; padding-bottom: 0px">
												<img src="<?= base_url('assets/img/ic_action_collection.png') ?>" alt="Icon" width="25px" height="25px">
											</td>
											<td style="width: 60%;">
												<?= anchor('forum/'.$rows->th_id, '<b>'.$rows->th_title.'</b>', array('class' => 'dark'));  ?>
												<p><?= 'by '.$rows->user_name ?></p>
											</td>
											<td style="width: 15%; background: #f5f5f5">Statistic</td>
											<td style="width: 20%;">Latest</td>
										</tr>
									<?php endforeach ?>
								</table>
								<?php } ?>
							</div>
							<!-- /.col-lg-12 -->
						</div>
						<!-- /.row -->
					</div>