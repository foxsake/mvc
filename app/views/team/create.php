<h3>Team</h3>
<form action="/mvc/public/team/store" method="post" enctype= "multipart/form-data">
    <fieldset>
        <?php if(isset($item['id'])):?>
            <input name="id" type="hidden" value="<?php echo $item['id']; ?>">
        <?php endif?>
        <div class="form-group">
            <label for="name">Name:</label>
            <input autofocus class="form-control" name="name" placeholder="Name" type="text" value="<?php echo isset($item['name'])?$item['name']:"" ?>"/>
        </div>
        <div class="form-group">
        <label for="pics[]">Logo:</label>
            <input class="form-control" name="pics[]" type="file" >
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </fieldset>
</form>