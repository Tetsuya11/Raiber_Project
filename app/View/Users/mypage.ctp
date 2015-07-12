<?php $this->assign('title','Raiber  マイページ Mypage'); ?>
<p><?php echo $this->Html->link("Back", array(
'controller' => 'items', 'action' => 'index')); ?></p>
<h1 style="color:blue;">
  <?php print $user_data; ?> 's page
</h1>
<div>
    <!--タブ-->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" data-toggle="tab">Items</a></li>
      <li><a href="#tab2" data-toggle="tab">Profile</a></li>
      <li><a href="#tab3" data-toggle="tab">Negotiations</a></li>
      <li><a href="#tab4" data-toggle="tab">Trades</a></li>
    </ul>
    <!-- / タブ-->
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="tab1">
        <p>
          <?php foreach($myitems as $item): ?>
            <li><?php echo h($item['Item']['title']); ?></li>
            <li><?php echo $this->Html->link('<img width=100px height=100px src= "/Raiber_Project/img/item_img/'.$item['Item']['image1'].'">',array('action' => 'view', $item['Item']['id']),array('escape'=>false)); ?></li>
        </p>
        <?php endforeach; ?>
      </div>
      <div class="tab-pane fade in active" id="tab2">
        <p>
          <li>
            <?php 
            echo $this->Html->link('Quit', array(
              'action' => 'delete', $user['User']['id']));
            ?>
            <?php 
            echo $this->Html->link('Edit', array(
              'action' => 'edit', $user['User']['id']));
            ?>
          </li>
        </p>
      </div>
      <div class="tab-pane fade" id="tab3">
        <p></p>
      </div>
      <div class="tab-pane fade" id="tab4">
        <p>コンテンツ4</p>
      </div>
    </div>
  </div>

