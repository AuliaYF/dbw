<?php  
$form = array(
	'tp_title' => array(
		'name' => 'tp_title',
		'class' => 'form-control form_field',
		'value' => set_value('tp_title', isset($form_value['tp_title']) ? $form_value['tp_title'] : '')),
	'tp_desc' => array(
		'name' => 'tp_desc',
		'rows' => '5',
		'class' => 'form-control form_field',
		'value' => set_value('tp_desc', isset($form_value['tp_desc']) ? $form_value['tp_desc'] : '')
		),
	'submit' => array(
		'name' => 'submit',
		'id' => 'submit',
		'value' => 'Submit',
		'class' => 'btn btn-default'
		),
	'reset' => array(
		'name' => 'reset',
		'id' => 'reset',
		'value' => 'Reset',
		'class' => 'btn btn-default'
		)
	);
	?>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><?= $breadcrumbs ?></h3>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<?= form_open($form_action)  ?>
						<div class="form-group">
							<?= form_label('Category', 'tp_cat') ?>
							<?= form_dropdown('tp_cat', $option_cats, set_value('tp_cat', isset($form_value['tp_cat']) ? $form_value['tp_cat'] : ''), 'class="form-control"'); ?>
							<?= form_error('tp_cat', '<p class="help-block">', '</p>')  ?>
						</div>
						<div class="form-group">
							<?= form_label('Topic Title', 'tp_title')  ?>
							<?= form_input($form['tp_title']) ?>
							<?= form_error('tp_title', '<p class="help-block">', '</p>')  ?>
						</div>
						<div class="form-group">
							<?= form_label('Topic Description', 'tp_desc')  ?>
							<?= form_textarea($form['tp_desc'])  ?>
						</div>
						<div class="pull-right">
							<?= form_submit($form['submit']); ?>
							<?= form_reset($form['reset']); ?>
						</div>
						<? form_close()  ?>
					</div>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
		</div>