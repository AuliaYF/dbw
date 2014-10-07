<?php  
$form = array(
	'cat_name' => array(
		'name' => 'cat_name',
		'maxlength' => '255',
		'class' => 'form-control form_field',
		'value' => set_value('cat_name', isset($form_value['cat_name']) ? $form_value['cat_name'] : '')
		),
	'cat_desc' => array(
		'name' => 'cat_desc',
		'rows' => '3',
		'class' => 'form-control',
		'value' => set_value('cat_desc', isset($form_value['cat_desc']) ? $form_value['cat_desc'] : '')
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
						<?= form_open($form_action) ?>
						<div class="form-group">
							<?= form_label('Category Name', 'cat_name'); ?>
							<?= form_input($form['cat_name']); ?>
							<?= form_error('cat_name', '<p class="help-block">', '</p>') ?>
						</div>
						<div class="form-group">
							<?= form_label('Category Description', 'cat_desc'); ?>
							<?= form_textarea($form['cat_desc']); ?>
						</div>
						<div class="pull-right">
							<?= form_submit($form['submit']); ?>
							<?= form_reset($form['reset']); ?>
						</div>
						<?= form_close() ?>
					</div>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
		</div>