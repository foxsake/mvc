<div class="row">
    <!-- TODO IMAGES -->
</div>
<div class="row">
            <div class="col-md-12">
                <div class="thumbnail">
                    <div class="caption-full">

                        <h4><?php print($item["title"])?></h4>
                        <p><?php print($item["posted"])?></p>
                        <p><?php print($item["content"])?></p>
                    </div>

                    <div class="thumbnail">
                </div>

                <div class="well">
                
                    <div class="text-right">
                        <a href="/mvc/public/home/leavecomment/<?php echo $item["id"] ?>" class="btn btn-success">Leave a Comment</a>
                    </div>
                
                    <hr>

                    <div id="changeme">
                    <?php foreach($comments as $comment): ?>

                    <div class="row">
                        <div class="col-md-12">
                            <h5><?php  echo $comment['username'] ?></h5>
                            <span class="pull-right"><?php  echo $comment['date'] ?></span>
                            <p class="text-left"><?php  echo $comment['comment'] ?></p>
                        </div>
                    </div>
                    <hr>

                    <?php endforeach ?>
                    </div>
                </div>
                
                            </div>
                
                        </div>

        <script>
    $(document).ready(function() {

    function update(){
    $.getJSON('/mvc/public/home/refreshcomment/<?php print($item["id"]) ?>').done(function(res) {
        console.log(res.length);
        $('#changeme').html(function(){
          var str = "";
          for (var i=0;i<res.length;i++){
            str +=  '<div class="row">'+
            '<div class="col-md-12">'+
                            '<h5>'+res[i].username+'</h5>'+
                            '<span class="pull-right">'+res[i].date+'</span>'+
                            '<p class="text-left">'+res[i].comment+'</p>'+
                    '</div></div>';
          }
          return str;
        }); 
    });
    }

    var interval = window.setInterval(update, 2000);
    });

    </script>