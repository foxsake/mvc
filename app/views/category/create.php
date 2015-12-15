<form action="<?php print($target)?>" method="post" enctype= "multipart/form-data" class="ajax">
    <fieldset>
        <?php if(isset($item['id'])):?>
            <input name="id" type="hidden" value="<?php echo $item['id']; ?>">
        <?php endif?>

        <div class="form-group">
            <label for="description">Name:</label>
            <input autofocus class="form-control" name="name" placeholder="name" type="text" <?php if(isset($item['name'])) print("value='".$item['name']."'")?>/>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </fieldset>
</form>