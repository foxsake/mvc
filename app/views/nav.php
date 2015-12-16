<nav class="navbar">
  <div class="container">
      <ul class="nav navbar-nav">
        <?php if(isset($_SESSION['admin'])&&$_SESSION['admin']==true):?>
          <li <?php if($_SERVER['REQUEST_URI']=='/mvc/public/admin/') echo "class = 'active'";?>><a href="/mvc/public/admin"><strong>Home</strong></a></li>
          <li <?php if($_SERVER['REQUEST_URI']=='/mvc/public/categ') echo "class = 'active'";?>><a href="/mvc/public/categ"><strong>Categories</strong></a></li>
          <li <?php if($_SERVER['REQUEST_URI']=='/mvc/public/posts') echo "class = 'active'";?>><a href="/mvc/public/posts"><strong>Posts</strong></a></li>
          <li <?php if($_SERVER['REQUEST_URI']=='/mvc/public/users') echo "class = 'active'";?>><a href="/mvc/public/users"><strong>Users</strong></a></li>
          <li <?php if($_SERVER['REQUEST_URI']=='/mvc/public/') echo "class = 'active'";?>><a href="/mvc/public/"><strong>Index</strong></a></li>
        <?php else:?>
        <li <?php if($_SERVER['REQUEST_URI']=='/mvc/public/') echo "class = 'active'";?>><a href="/mvc/public/"><strong>Home</strong></a></li>

        <?php foreach($cats as $cat):?>
          <li <?php if( preg_match('@/mvc/public/home/category/'.$cat['id'].'@', $_SERVER['REQUEST_URI']) == 1) echo "class = 'active'";?>><a href="/mvc/public/home/category/<?php echo $cat['id']?>"><strong><?php echo $cat['name']?></strong></a></li>
        <?php endforeach ?>

        <li <?php if($_SERVER['REQUEST_URI']=='/mvc/public/home/about') echo "class = 'active'";?>><a href="/mvc/public/home/about"><strong>About Us</strong></a></li>
      <?php endif?>
      </ul>
  <ul class="nav navbar-nav navbar-right">
  <?php if(!empty($_SESSION["id"])): ?>      
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php print($_SESSION["username"]); ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="opos"><a href="/mvc/public/auth/logout"><strong>Log Out</strong></a></li>
          </ul>
        </li>
    <?php else:?>
      <li><a href="/mvc/public/auth/login">Login</a></li>
  <?php endif?>
  </ul>
  </div>
</nav>