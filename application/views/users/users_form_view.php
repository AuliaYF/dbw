<?php  
$form = array(
	'user_name' => array(
		'name' => 'user_name',
		'maxlength' => '30',
		'class' => 'form_field form-control',
		'value' => set_value('user_name', isset($form_value['user_name']) ? $form_value['user_name'] : '')
		),
	'user_pass' => array(
		'name' => 'user_pass',
		'maxlength' => '255',
		'class' => 'form_field form-control',
		'value' => set_value('user_pass', isset($form_value['user_pass']) ? $form_value['user_pass'] : '')
		),
	'user_email' => array(
		'name' => 'user_email',
		'maxlength' => '255',
		'class' => 'form_field form-control',
		'value' => set_value('user_email', isset($form_value['user_email']) ? $form_value['user_email'] : '')
		),
	'user_profile_signature' => array(
		'name' => 'user_profile_signature',
		'rows' => '5',
		'class' => 'form_field form-control',
		'value' => set_value('user_profile_signature', isset($form_value['user_profile_signature']) ? $form_value['user_profile_signature'] : '')
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
							<?= form_label('User Name', 'user_name'); ?>
							<?= form_input($form['user_name']); ?>
							<?= form_error('user_name', '<p class="help-block text-danger">', '</p>') ?>
						</div>
						<div class="form-group">
							<?= form_label('User Password', 'user_pass'); ?>
							<?= form_input($form['user_pass']); ?>
						</div>
						<div class="form-group">
							<?= form_label('User Email', 'user_email'); ?>
							<?= form_input($form['user_email']); ?>
							<?= form_error('user_email', '<p class="help-block text-danger">', '</p>') ?>
						</div>
						<div class="form-group">
							<?= form_label('User Profile Signature', 'user_profile_signature'); ?>
							<?= form_textarea($form['user_profile_signature']); ?>
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