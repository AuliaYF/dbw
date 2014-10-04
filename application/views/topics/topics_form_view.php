<?php  
$form = array(
	'tp_title' => array(
		'name' => 'tp_title',
		'size' => '80',
		'class' => 'form_field',
		'value' => set_value('tp_title', isset($form_value['tp_title']) ? $form_value['tp_title'] : '')),
	'tp_desc' => array(
		'name' => 'tp_desc',
		'rows' => '5',
		'cols' => '82',
		'value' => set_value('tp_desc', isset($form_value['tp_desc']) ? $form_value['tp_desc'] : '')
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
								<td><?= form_label('Category', 'tp_cat') ?></td>
								<td><?= form_dropdown('tp_cat', $option_cats, set_value('tp_cat', isset($form_value['tp_cat']) ? $form_value['tp_cat'] : '')); ?></td>
							</tr>
							<tr>
								<td></td>
								<td><?= form_error('tp_cat', '<p>', '</p>')  ?></td>
							</tr>
							<tr>
								<td><?= form_label('Topic Title', 'tp_title')  ?></td>
								<td><?= form_input($form['tp_title'])  ?></td>
							</tr>
							<tr>
								<td></td>
								<td><?= form_error('tp_title', '<p>', '</p>')  ?></td>
							</tr>
							<tr>
								<td valign="top"><?= form_label('Topic Description', 'tp_desc')  ?></td>
								<td><?= form_textarea($form['tp_desc'])  ?></td>
							</tr>
							<tr>
								<td></td>
								<td align="right"><?= form_submit($form['submit']); ?></td>
							</tr>
						</table>
						<? form_close()  ?>
					</p>
				</div>
			</div>
		</div>