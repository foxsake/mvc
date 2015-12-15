
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/mvc/public"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      
        
        <li <?php if($_SERVER['REQUEST_URI']=='/mvc/public/') echo "class = 'active'";?>><a href="/mvc/public/"><strong>Home</strong></a></li>

        <?php foreach($cats as $cat):?>
          <li <?php if( preg_match('@/mvc/public/home/category*@', $_SERVER['REQUEST_URI']) == 1) echo "class = 'active'";?>><a href="/mvc/public/home/category/<?php echo $cat['id']?>"><strong><?php echo $cat['name']?></strong></a></li>
        <?php endforeach ?>

        <li <?php if($_SERVER['REQUEST_URI']=='/mvc/public/home/about') echo "class = 'active'";?>><a href="/mvc/public/home/about"><strong>About Us</strong></a></li>
      </ul>
      <!--
      <form class="navbar-form navbar-left" role="search" action="items.php" method="get" autocomplete="off">
        <div class="form-group">
          <input type="text" class="form-control" id="qry" name="find" placeholder="Search" <?php if(!empty($param)) print("value='".$param."'")?>>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      -->

  
  <ul class="nav navbar-nav navbar-right">
  

  <?php if(!empty($_SESSION["id"])): ?>      
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php print($_SESSION["username"]); ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="chpw.php">Change Password</a></li>
            <li role="separator" class="divider"></li>
            <li class="opos"><a href="/mvc/public/auth/logout"><strong>Log Out</strong></a></li>
          </ul>
        </li>
    <?php else:?>
      <li><a href="/mvc/public/auth/login">Login</a></li>
  <?php endif?>
  </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>