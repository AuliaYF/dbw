<table class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead>
    <tr>
      <th>NO</th>
      <th>CAT_ID</th>
      <th>CAT_NAME</th>
      <th>CAT_DESC</th>
 </tr>
</thead>
<tbody>
     <?php $count = 0; foreach($active_table_data as $row): ?>
     <tr>
        <td><?= ++$count ?></td>
        <td><?= $row->cat_id ?></td>
        <td><?= $row->cat_name ?></td>
        <td><?= $row->cat_desc ?></td>
   </tr>
<?php endforeach ?>
</tbody>
</table>