<table class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead>
    <tr>
      <th>NO</th>
      <th>TP_ID</th>
      <th>TP_CAT</th>
      <th>TP_TITLE</th>
      <th>TP_DESC</th>
      <th>ACTIONS</th>
    </tr>
  </thead>
  <tbody>
   <?php $count = 0; foreach($active_table_data as $row): ?>
   <tr>
    <td><?= ++$count ?></td>
    <td><?= $row->tp_id ?></td>
    <td><?= $row->tp_cat ?></td>
    <td><?= $row->tp_title ?></td>
    <td><?= $row->tp_desc ?></td>
    <td align="middle">
      <a href="<?= base_url('tables/topics/edit/'.$row->tp_id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
      <a href="<?= base_url('tables/topics/delete/'.$row->tp_id) ?>" class="btn btn-danger btn-sm" onclick='return confirm("Are you sure?")'><i class="fa fa-trash-o"></i></a>    
       </div>
     </td>
   </tr>
 <?php endforeach ?>
</tbody>
</table>