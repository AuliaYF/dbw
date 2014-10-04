		<div class="forumContent">
			<div class="left">
				<div class="box below">
					<div class="head" style="background: #4575B4;"><?= $breadcrumbs  ?></div>
					<div class="content">
						<?= anchor('topics/insert', '<button>INSERT</button>', array('class' => 'dark action'));  ?>
						<?php 
						$msg = $this->session->flashdata('message'); 
						if(!empty($msg)):?>
						<span class="message" style="float: right">Status: <?= $msg ?></span>
					<?php endif ?>
					<?= $table_data ?>
				</div>
			</div>
		</div>