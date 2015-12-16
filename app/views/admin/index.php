<form action="/mvc/public/admin/banner" method="post" enctype= "multipart/form-data" class="ajax">
    <fieldset>
        <h3>Banner</h3>
        <div class="form-group">
            <input class="form-control" name="pics[]" type="file" >
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </fieldset>
</form>
<form action="/mvc/public/admin/theme" method="post" enctype= "multipart/form-data" class="ajax">
    <fieldset>
        <h3>Theme</h3>
        <div class="form-group">
            <input type="radio" name="theme" value="theme1.css" <?php if($curtheme=='theme1.css') print('checked')?>>Theme1
  			<input type="radio" name="theme" value="theme2.css" <?php if($curtheme=='theme2.css') print('checked')?>>Theme2
  			<input type="radio" name="theme" value="theme3.css" <?php if($curtheme=='theme3.css') print('checked')?>>Theme3
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </fieldset>
</form>
<form action="/mvc/public/admin/layout" method="post" enctype= "multipart/form-data" class="ajax">
    <fieldset>
        <h3>Layout</h3>
        <div class="form-group">
            <input type="radio" name="layout" value="index1" <?php if($layouts=='index1') print('checked')?>>layout1
  			<input type="radio" name="layout" value="index2" <?php if($layouts=='index2') print('checked')?>>layout2
  			<input type="radio" name="layout" value="index3" <?php if($layouts=='index3') print('checked')?>>layout3
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </fieldset>
</form>