<a href="/mvc/public/posts/create" class="btn btn-success padd-bot">Add Post</a>
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="row">
<table class="table table-bordered">
<tr>
  <th>Title</th>
  <th></th>
  <td></td>
</tr>
<?php foreach ($items as $item):?>  
  <tr>
    <td><?php print($item["title"])?></td>
    <td><a href="/mvc/public/posts/edit/<?php print($item["id"])?>" class="btn btn-warning">Edit</a></td>
    <td><a href="/mvc/public/posts/delete/<?php print($item["id"])?>" class="btn btn-danger">Delete</a></td>
  </tr>      
<?php endforeach ?>
</table>
</div>
</div>