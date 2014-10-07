<table class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead>
    <tr>
      <th>NO</th>
      <th>USER_ID</th>
      <th>USER_NAME</th>
      <th>USER_EMAIL</th>
      <th>USER_DATE_JOINED</th>
      <th>ACTIONS</th>
    </tr>
  </thead>
  <tbody>
   <?php $count = 0; foreach($active_table_data as $row): ?>
   <tr>
    <td><?= ++$count ?></td>
    <td><?= $row->user_id ?></td>
    <td><?= $row->user_name ?></td>
    <td><?= $row->user_email ?></td>
    <td><?= $row->user_date_joined ?></td>
    <td align="middle">
      <a href="<?= base_url('tables/users/edit/'.$row->user_id) ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
      <a href="<?= base_url('tables/users/delete/'.$row->user_id) ?>" class="btn btn-danger btn-sm" onclick='return confirm("Are you sure?")'><i class="fa fa-trash-o"></i></a>    
       </div>
     </td>
   </tr>
 <?php endforeach ?>
</tbody>
</table>