<form action="<?php print($target) ?>" method="post" enctype= "multipart/form-data" class="ajax">
    <fieldset>
    <?php if(isset($item['id'])):?>
            <input name="id" type="hidden" value="<?php echo $item['id']; ?>">
        <?php endif?>

        <div class="form-group">
        <label for="categoryid">Category:</label>
            <select class="form-control" name="categoryid">
                <?php foreach($cats as $cat): ?>
                    <option value="<?php print($cat['id'].'" '); if(isset($item['categoryid']) && $item['categoryid']==$cat['id']) print("selected = selected")?> ><?php print($cat["name"])?> </option>
                <?php endforeach?>
            </select>
        </div>

        <div class="form-group">
        <label for="title">Title:</label>
            <input autofocus class="form-control" name="title" placeholder="title" type="text" <?php if(isset($item['title'])) print('Value="'.$item['title'].'"')?>/>
        </div>
        <div class="form-group">
            <label for="content">Content:</label>
            <textarea class="form-control" name="content" type="text"><?php if(isset($item['content'])) print($item['content'])?></textarea>
        </div>

        <h3>Images</h3>
        
        <div class="form-group">
            <input class="form-control" name="pics[]" type="file" >
            <button type="button" class="btn btn-primary" id="add-pic">Add More</button>
        </div>
        <div class="contents3"></div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </fieldset>
</form>
<script>
    var ctr = 1;
    $(document).ready(function(){
        $('#add-pic').click(function(){
            var str = '<div class="form-group">'+
            '<input class="form-control" name="pics[]" type="file" > '+
            '<button type="button" class="btn btn-danger" id="rem-pic">Remove</button>'+
            '</div>'
            $(str).appendTo('.contents3');
        });
        $('.contents3').on('click', '#rem-pic', function() {
          $(this).parent("div").remove();
        });
    });
</script>