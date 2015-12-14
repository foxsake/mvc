<div class="col-md-12">
<div class="row" id="changeme">
<?php foreach ($items as $item):?>        
          <div class="col-sm-6 col-md-10 col-md-offset-1">
            <div class="thumbnail">
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
            </table>

              <div class="caption">
              <p>Game started : <?php echo $item['started']; echo $item['ended']==null?"":" and Ended: ".$item['ended'] ?> </p>
              <p>
                    <a href="/mvc/public/games/show/<?php print($item["id"])?>" class="btn btn-primary btn-sm" role="button">View</a> 
                </p>
              </div>
            </div>
          </div>
<?php endforeach ?>
</div>
</div>
<?php if( !preg_match('@/mvc/public/games/ended@', $_SERVER['REQUEST_URI']) == 1) :?>
<script>
  $(document).ready(function(){
    function update(){
    $.getJSON('/mvc/public/games/refresh').done(function(res) {
        $('#changeme').html(function(){
          var str = "";
          for (var i=0;i<res.length;i++){

            str +=   '<div class="col-sm-6 col-md-10 col-md-offset-1">'+
            '<div class="thumbnail">'+
            '<table class="table">'+
              '<tr>'+
                '<td class="text-center"><img src="/mvc/public/uploads/'+res[i].tal+'" alt="'+res[i].tan+'" class="logoimg"></td>'+
                '<td class="text-center" id="tdcenter" rowspan="2"><h1>VS</h1></td>'+
                '<td class="text-center"><img src="/mvc/public/uploads/'+res[i].tbl+'" alt="'+res[i].tbn+'" class="logoimg"></td>'+
              '</tr>'+
              '<tr>'+
                '<td class="text-center"><h3 class="trunwrap">'+res[i].tan+'</h3></td>'+
                '<td class="text-center"><h3 class="trunwrap">'+res[i].tbn+'</h3></td>'+
              '</tr><tr>'+
                '<td class="text-center"><h1><span class="text-danger"><strong>'+res[i].scorea+'</strong></span></h1></td>'+
                '<td class="text-center"></td>'+
                '<td class="text-center"><h1><span class="text-danger"><strong>'+res[i].scoreb+'</strong></span></h1></td>'+
              '</tr>'+
            '</table>'+

              '<div class="caption">'+
              '<p>Game started : <?php echo $item["started"]; echo $item["ended"]==null?"":" and Ended: ".$item["ended"] ?> </p>'+
              '<p>'+
                    '<a href="/mvc/public/games/show/'+res[i].id+'" class="btn btn-primary btn-sm" role="button">View</a> '+
                '</p>'+
              '</div>'+
            '</div>'+
          '</div>';
          }
          return str;
        }); 
    });
    }

    var interval = window.setInterval(update, 2000);

  });

</script>

<?php endif ?>