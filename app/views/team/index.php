<a href="/mvc/public/team/create" class="btn btn-success padd-bot">Add Team</a>
<div class="row">

<div class="col-md-10 col-md-offset-1">
<div class="row">
<table class="table table-bordered">
<tr>
  <th>Logo</th>
  <th>Name</th>
  <td></td>
  <td></td>
</tr>
<?php foreach ($items as $item):?>  
  <tr>
    <td><img src="/mvc/public/uploads/<?php print($item['logo']) ?>" alt="<?php print($item["name"]) ?>" class="img-rounded logoimg"></td>
    <td><?php print($item["name"])?></td>
    <td><a href="#" class="btn btn-warning">Edit</a><td>
    <td><a href="#" class="btn btn-danger">Delete</a><td>
  </tr>      
<?php endforeach ?>
</table>
</div>
</div>