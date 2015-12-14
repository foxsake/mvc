<h3>Team</h3>
<form action="/mvc/public/games/store" method="post" enctype= "multipart/form-data" class="ajax">
    <fieldset>
        <?php if(isset($item['id'])):?>
            <input name="id" type="hidden" value="<?php echo $item['id']; ?>">
        <?php endif?>

        <div class="form-group">
            <select class="form-control" name="teama">
                <option></option>
                <?php foreach($teams as $team): ?>
                    <option value="<?php print($team['id']) ?>" ><?php print($team["name"])?></option>
                <?php endforeach?>
            </select>
        </div>

        <h1>VS</h1>

        <div class="form-group">
            <select class="form-control" name="teamb">
                <option></option>
                <?php foreach($teams as $team): ?>
                    <option value="<?php print($team['id']) ?>" ><?php print($team["name"])?></option>
                <?php endforeach?>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" type="text" value="<?php echo isset($game['description'])?$game['description']:"" ?>"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </fieldset>
</form>