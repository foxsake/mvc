<form action="<?php print($target) ?>" method="post" enctype= "multipart/form-data">
    <fieldset>
        <input name="id" type="hidden" value="<?php echo $id ?>">
        <div class="form-group">
            <textarea autofocus class="form-control" rows="3" name="comment" placeholder="Comment"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </fieldset>
</form>
