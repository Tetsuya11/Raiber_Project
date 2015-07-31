<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Raiber</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
    header.jumbotron {
      background: url("img/chain-232930.jpg");
      background-position: center center;
      background-size: cover;
      color: #00bfff;
    }
    
    header .container {
      margin-top: 8%;
    }
    
    header .midashi-btn {
      border: 1px solid #00bfff;
      color: #00bfff;
      border-radius: 0;
    }
    
    header .midashi-btn:hover {
      color: #00bfff;
      border-color: #00bfff;
    }

    @media screen and (max-width: 480px) {
    
      header.jumbotron .container p {
        font-size: 16px;
      }
    }
    
    .navbar-form {
      padding-right: 30px;
    }

    footer {
      text-align: center;
      padding: 10px;
      background: #101010;
    }
    </style>
  </head>
  <body>   
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-header">

        <!--Raiber ロゴの表示-->
        <a class="navbar-brand" href="#">Raiber</a>

        <!--トグルボタンの設置-->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-content">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div id="nav-content" class="collapse navbar-collapse">

        <!--リンクのリスト メニューリスト-->
        <!-- ネクシードの公式サイトのリンクとかあってもいいかも笑-->
        <ul class="nav navbar-nav">
          <li><a href="">About Us</a></li>
          <li><a href="">Contact</a></li>
          <li><a href="">Add Items</a></li>
          <li><a href="">Category</a></li>

          <!--ドロップダウン 各機能へのアクセス-->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" href="">Menu  <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#"><?php echo $this->Html->link('Sign Up',array(
              'controller'=>'users', 'action'=>'add')); ?></a>
              </li>
              <li><a href="#"><?php echo $this->Html->link('Login',array(
              'controller'=>'users', 'action'=>'login')); ?></a>
              </li>
              <li><a href="#"><?php echo $this->Html->link('Logout', array(
              'controller'=>'users', 'action'=>'logout')); ?></a>
              </li>
              <li><a href="#">Favorites</a></li>
              <li><a href="#"></a></li>
            </ul>
          </li>
        </ul>


        <!--検索フォーム-->
        <!-- -->
        <form class="navbar-form navbar-right" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </nav>
    <!-- ヘッダー部分 -->
    <header class="jumbotron">
      <div class="container">
        <h1>Let's Barter!</h1>
        <p>ここをクリックするとしょうくんの名言とともに簡単なチュートリアルが表示される仕様</p>
        <p><a class="btn btn-lg midashi-btn" role="button">Tutorial &raquo;</a></p>
      </div>
    </header>

    <div class="container main-content">
      <div class="row">
        <div class="col-md-9 content-area">
          <h2>Items</h2>
          <?php foreach ($items as $item): ?>
            <ul>
              <li id="item_<?php echo h($item['Item']['id']); ?>" class="main-item" style="height:80%;">
                <ul>
                  <div class="row">
                    <!-- 商品画像 -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <li style="float:left;"><?php echo $this->Html->link('<img width=350px height=300px src= "/Raiber_Project/img/item_img/'.$item['Item']['image1'].'">',array('action' => 'view', $item['Item']['id']),array('escape'=>false)); ?></li>
                    </div>
                    <!-- 商品情報 -->
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <li class="item-category" style="float:left;"><?php echo h($item['Category']['name']); ?></li>
                        <li class="item-title"><?php echo $this->Html->link(h($item['Item']['title']),array('controller'=>'items', 'action'=>'view', $item['Item']['id'])); ?></li> 
                        <li class="item-name glyphicon glyphicon-user"><?php echo h($item['User']['username']); ?></li>
                        <li class="item-created"><?php echo h($item['Item']['created']); ?></li>
                        <li class="item-edit"><?php echo $this->Html->link('Edit',array('action'=>'edit',$item['Item']['id']));?></li>
                        <li class="item-delete"><?php echo $this->Html->link('Delete','#',array('class'=>'delete','data-post-id'=>$item['Item']['id'])); ?></li>
                        <li class="item-description"><?php echo h($item['Item']['discription']); ?></li>
                    </div>
                  </div>
                </ul>
              </li>
            </ul>
          <?php endforeach; ?>
          <?php unset($item); ?>

          <!-- ページネーション -->
          <ul class="pagination">
            <li><?php echo $this->Paginator->prev('< Prev', array(), null, array('class' => 'prev disabled')); ?></li>
            <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
            <li><?php echo $this->Paginator->next('Next >', array(), null, array('class' => 'next disabled')); ?></li>
          </ul>
          
        </div>

        <!--/.content-area-->
        <div class="col-md-3 sidebar">
          <aside>
            <h4>Categories</h4>
            <ul class="list-unstyled">
              <li><a href=""><?php foreach ($categories as $category): ?>
                <li class="text-muted">
                  <?php echo $this->Html->link($category['Category']['name'],array('action'=>'category_index',$category['Category']['id'])); ?>
                </li>
                  <?php endforeach; ?>
                  <?php unset($category); ?>
                </a>
              </li>
            </ul>
          </aside>
          
          <aside>
            <h4>Links</h4>
            <ul class="list-unstyled">
              <li><a href="">ネクシードの公式とか</a></li>
              <li><a href="">他の生徒のサイトとか</a></li>
            </ul>
          </aside>
        </div><!--/.sidebar-->
      </div>
    </div><!--/.main-content-->

    <!--フッターを追加-->
    <footer class="container-fluid">
      <small><a href="/">Copyright (C) 2013-2014 9ineBB All Rights Reserved.</a></small>
    </footer>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>