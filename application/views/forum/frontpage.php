		<div class="forumContent">
			<div class="left">
				<?php if(count($table_tp_data) !== 0){ ?>
				<div class="box below">
					<div class="head" style="background: #4575B4;">
						<?= anchor('topics/edit/'.$table_tp_data->tp_id, $table_tp_data->tp_title, array('title' => $table_tp_data->tp_desc, 'style' => 'padding-left: 10px;'));?>
						<div style="float: right; padding-right: 10px">
							<?= anchor('threads/insert/'.$table_tp_data->tp_id, '<button>INSERT CHILD</button>');  ?>
							<?= anchor('topics/delete/'.$table_tp_data->tp_id, '<button>DELETE</button>', array('onclick' => "return confirm('Are you sure?')"));  ?>
						</div>
					</div>
					<div class="content">
						<p class="dark">
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
										<tr>
											<td style="width: 5%; padding-top: 0px; padding-bottom: 0px">
												<img src="<?= base_url('assets/img/ic_action_collection.png') ?>" alt="Icon" width="25px" height="25px">
											</td>
											<td style="width: 60%;">
												<?= anchor('forum/'.$rows->th_id, '<b>'.$rows->th_title.'</b>', array('class' => 'dark'));  ?>
												<p><?= 'by '.$rows->user_name ?></p>
											</td>
											<td style="width: 15%; background: #f5f5f5;">Statistic</td>
											<td style="width: 20%;">Latest</td>
										</tr>
									<?php endforeach ?>
								</table>
								<?php } ?>
							</p>	
						</div>
					</div>
					<?php } ?>
				</div>