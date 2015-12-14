<h3>Score History</h3>
<div class="row">

<div class="col-md-10 col-md-offset-1">
<div class="row">
<table class="table table-bordered">
<tr>
  <td class="text-center">Time</td>
  <th class="text-center"><?php print($game[0]['tan']) ?></th>
  <th class="text-center"><?php print($game[0]['tbn']) ?></th>
</tr>
<?php foreach ($items as $item):?>  
  <tr>
    <td class="text-center"><?php print($item['created']) ?></td>
    <td class="text-center"><?php print($item['scorea']) ?></td>
    <td class="text-center"><?php print($item['scoreb']) ?></td>
  </tr>      
<?php endforeach ?>
</table>
<?php if(isset($_SESSION["id"])):?>
<a href="/mvc/public/games/show/<?php print($game[0]['id']) ?>" class="btn btn-success">Back to Game</a>
<?php else:?>
	<a href="/mvc/public/home/show/<?php print($game[0]['id']) ?>" class="btn btn-success">Back to Game</a>
<?php endif?>
</div>
</div>