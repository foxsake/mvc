<div class="col-md-12">
<div class="row" id="changeme">
<?php foreach ($items as $item):?>        
            <table class="table">
              <tr>
                <td class="text-center"><img src="/mvc/public/uploads/<?php print($item['tal']) ?>" alt="<?php print($item["tan"]) ?>" class="logoimg"></td>
                <td class="text-center" id="tdcenter" rowspan="2"><h1>VS</h1></td>
                <td class="text-center"><img src="/mvc/public/uploads/<?php print($item['tbl']) ?>" alt="<?php print($item["tbn"]) ?>" class="logoimg"></td>
              </tr>
              <tr>
                <td class="text-center"><h3 class="trunwrap"><?php print($item["tan"])?></h3></td>
                <td class="text-center"><h3 class="trunwrap"><?php print($item["tbn"])?></h3></td>
              </tr>
              <tr>
                <td class="text-center"><h1><span class="text-danger"><strong><?php print($item["scorea"])?></strong></span></h1></td>
                <td class="text-center"></td>
                <td class="text-center"><h1><span class="text-danger"><strong><?php print($item["scoreb"])?></strong></span></h1></td>
              </tr>
              <?php if(is_null($item['ended'])):?>
              <tr>
                <td class="text-center">
                <a href="/mvc/public/scores/scorea/<?php print($item["id"]) ?>/3" class="btn btn-success">3</a>
                <a href="/mvc/public/scores/scorea/<?php print($item["id"]) ?>/2" class="btn btn-warning">2</a>
                <a href="/mvc/public/scores/scorea/<?php print($item["id"]) ?>/1" class="btn btn-primary">1</a>
                </td>
                <td class="text-center">
                  <a href="/mvc/public/scores/undo/<?php print($item["id"]) ?>" class="btn btn-danger">Undo Last</a>
                  <a href="/mvc/public/games/end/<?php print($item["id"]) ?>" class="btn btn-default">End Game</a>
                  <a href="/mvc/public/scores/show/<?php print($item["id"]) ?>" class="btn btn-warning">History</a>
                </td>
                <td class="text-center">
                <a href="/mvc/public/scores/scoreb/<?php print($item["id"]) ?>/3" class="btn btn-success">3</a>
                <a href="/mvc/public/scores/scoreb/<?php print($item["id"]) ?>/2" class="btn btn-warning">2</a>
                <a href="/mvc/public/scores/scoreb/<?php print($item["id"]) ?>/1" class="btn btn-primary">1</a></td>
              </tr>
            <?php endif?>
            </table>
            <?php if(!is_null($item['ended'])):?>
            <a href="/mvc/public/scores/show/<?php print($item["id"]) ?>" class="btn btn-warning">History</a>
          <?php endif?>
<?php endforeach ?>
<p>Game started : <?php echo $item['started']; echo $item['ended']==null?"":" and Ended: ".$item['ended'] ?> </p>
</div>
</div>