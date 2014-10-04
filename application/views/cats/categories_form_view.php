<?php  
$form = array(
	'cat_name' => array(
		'name' => 'cat_name',
		'size' => '80',
		'maxlength' => '255',
		'class' => 'form_field',
		'value' => set_value('cat_name', isset($form_value['cat_name']) ? $form_value['cat_name'] : '')
		),
	'cat_desc' => array(
		'name' => 'cat_desc',
		'rows' => '5',
		'cols' => '82',
		'value' => set_value('cat_desc', isset($form_value['cat_desc']) ? $form_value['cat_desc'] : '')
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
								<td><?= form_label('Category Name', 'cat_name')  ?></td>
								<td><?= form_input($form['cat_name'])  ?></td>
							</tr>
							<tr>
								<td></td>
								<td><?= form_error('cat_name', '<p>', '</p>')  ?></td>
							</tr>
							<tr>
								<td valign="top"><?= form_label('Category Description', 'cat_desc')  ?></td>
								<td><?= form_textarea($form['cat_desc'])  ?></td>
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