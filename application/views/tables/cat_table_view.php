<table class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead>
    <tr>
      <th>NO</th>
      <th>CAT_ID</th>
      <th>CAT_NAME</th>
      <th>CAT_DESC</th>
      <th>ACTIONS</th>
    </tr>
  </thead>
  <tbody>
   <?php $count = 0; foreach($active_table_data as $row): ?>
   <tr>
    <td><?= ++$count ?></td>
    <td><?= $row->cat_id ?></td>
    <td><?= $row->cat_name ?></td>
    <td><?= $row->cat_desc ?></td>
    <td align="middle">
      <a href="<?= base_url('tables/categories/edit/'.$row->cat_id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
      <a href="<?= base_url('tables/categories/delete/'.$row->cat_id) ?>" class="btn btn-danger btn-sm" onclick='return confirm("Are you sure?")'><i class="fa fa-trash-o"></i></a>    
       </div>
     </td>
   </tr>
 <?php endforeach ?>
</tbody>
</table>