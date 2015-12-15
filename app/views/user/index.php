<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="row">
<table class="table table-bordered">
<tr>
  <th>Username</th>
  <th>Banned</th>
  <th></th>
</tr>
<?php foreach ($items as $item):?>  
  <tr>
    <td><?php print($item["username"])?></td>
    <td><?php print($item["banned"]? "yes":"no")?></td>
    <td>
    	<?php if($item['banned']==false): ?>
    		<a href="/mvc/public/users/ban/<?php print($item["id"])?>" class="btn btn-danger">BAN</a>
    	<?php else: ?>
    		<a href="/mvc/public/users/unban/<?php print($item["id"])?>" class="btn btn-success">UNBAN</a>
    	<?php endif ?>
    </td>
  </tr>      
<?php endforeach ?>
</table>
</div>
</div>