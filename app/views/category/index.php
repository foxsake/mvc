<a href="/mvc/public/categ/create" class="btn btn-success padd-bot">Add Category</a>
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="row">
<table class="table table-bordered">
<tr>
  <th>Name</th>
  <th></th>
  <td></td>
</tr>
<?php foreach ($items as $item):?>  
  <tr>
    <td><?php print($item["name"])?></td>
    <td><a href="/mvc/public/categ/edit/<?php print($item["id"])?>" class="btn btn-warning">Edit</a></td>
    <td><a href="/mvc/public/categ/delete/<?php print($item["id"])?>" class="btn btn-danger">Delete</a></td>
  </tr>      
<?php endforeach ?>
</table>
</div>
</div>