<?php  
$form = array(
	'user_name' => array(
		'name' => 'user_name',
		'maxlength' => '30',
		'class' => 'form_field',
		'size' => '80',
		'value' => set_value('user_name', isset($form_value['user_name']) ? $form_value['user_name'] : '')
		),
	'user_pass' => array(
		'name' => 'user_pass',
		'size' => '80',
		'maxlength' => '255',
		'class' => 'form_field',
		'value' => set_value('user_pass', isset($form_value['user_pass']) ? $form_value['user_pass'] : '')
		),
	'user_email' => array(
		'name' => 'user_email',
		'size' => '80',
		'maxlength' => '255',
		'class' => 'form_field',
		'value' => set_value('user_email', isset($form_value['user_email']) ? $form_value['user_email'] : '')
		),
	'user_profile_pic' => array(
		'name' => 'user_profile_pic',
		'rows' => '5',
		'cols' => '82',
		'value' => set_value('user_profile_pic', isset($form_value['user_profile_pic']) ? $form_value['user_profile_pic'] : '')
		),
	'user_profile_signature' => array(
		'name' => 'user_profile_signature',
		'rows' => '5',
		'cols' => '82',
		'value' => set_value('user_profile_signature', isset($form_value['user_profile_signature']) ? $form_value['user_profile_signature'] : '')
		),
	'submit' => array(
		'name' => 'submit',
		'id' => 'submit',
		'value' => 'Save'
		)
	);
	?>
	<div class="forumContent">
		<div class="left">
			<div class="box below">
				<div class="head" style="background: #4575B4;"><?= $breadcrumbs  ?></div>
				<div class="content">
					<p class="dark">
						<?= form_open($form_action)  ?>
						<table>
							<tr>
								<td><?= form_label('Name', 'user_name')  ?></td>
								<td><?= form_input($form['user_name'])  ?></td>
							</tr>
							<tr>
								<td></td>
								<td><?= form_error('user_name', '<p>', '</p>')  ?></td>
							</tr>
							<tr>
								<td><?= form_label('Password', 'user_pass')  ?></td>
								<td><?= form_input($form['user_pass'])  ?></td>
							</tr>
							<tr>
								<td></td>
								<td><?= form_error('user_pass', '<p>', '</p>')  ?></td>
							</tr>
							<tr>
								<td><?= form_label('Email', 'user_email')  ?></td>
								<td><?= form_input($form['user_email'])  ?></td>
							</tr>
							<tr>
								<td></td>
								<td><?= form_error('user_email', '<p>', '</p>')  ?></td>
							</tr>
							<tr>
								<td><?= form_label('Profile Picture', 'user_profile_pic')  ?></td>
								<td><?= form_textarea($form['user_profile_pic'])  ?></td>
							</tr>
							<tr>
								<td></td>
								<td><?= form_error('user_profile_pic', '<p>', '</p>')  ?></td>
							</tr>
							<tr>
								<td><?= form_label('Signature', 'user_profile_signature')  ?></td>
								<td><?= form_textarea($form['user_profile_signature'])  ?></td>
							</tr>
							<tr>
								<td></td>
								<td><?= form_error('user_profile_signature', '<p>', '</p>')  ?></td>
							</tr>
							<tr>
								<td></td>
								<td align="right"><?= form_submit($form['submit']); ?></td>
							</tr>
						</table>
						<?= form_close()  ?>
					</p>
				</div>
			</div>
		</div>