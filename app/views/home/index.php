<div class="row">
  <div class="col-md-3">
    <p class="lead">Widgets</p>
    <form class="form-horizontal" role="search" action="/mvc/public/home/search" method="post" autocomplete="off">
        <div class="form-group">
          <input type="text" class="form-control" name="search" placeholder="Search">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </form>
</div>
  

<div class="col-md-9">
<div class="row" id="changeme">
<?php foreach ($items as $item):?>        
          <div>
            <div class="thumbnail">
              <img src="/mvc/public/uploads/<?php print($item['image']) ?>" alt="<?php print($item["title"]) ?>">
              <div class="caption">
                <a href="/mvc/public/home/post/<?php print($item["id"])?>"><h5 class="trunwrap"><?php print($item["title"])?></h5></a>
                <p class="text-right">
                    <?php print($item["posted"]);?>
                </p>
                <p class="saranwrap">
                    <?php print($item["content"]);?>
                </p>
                <a href="/mvc/public/home/post/<?php print($item["id"])?>">Read More..</a>
              </div>
            </div>
          </div>
<?php endforeach ?>
</div>

<?php if(count($items) === 0): ?>
  <h4 class="text-danger">No records found.</h4>
<?php endif ?>
</div>
</div>

<script>
$(document).ready(function(){
  $('#filterform').on('submit',function(){
    var formData = new FormData($(this)[0]);

    var that = $(this),
      url = that.attr('action'),
      method = that.attr('method');

    $.ajax({
      url: url,
      type: method,
      data: formData,
      async: false,
      cache: false,
      contentType: false,
      processData: false,
      success: function(response){
        $('#changeme').html(response);
      }
    });

    return false;
  });
});
</script>