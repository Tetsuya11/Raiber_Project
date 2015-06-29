<?php $this->assign('title','Raiber  マイページ Mypage'); ?>
<h1 style="color:blue;">
  <?php print $user_data; ?> 's page
</h1>
<div>
    <!--タブ-->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" data-toggle="tab">Your items</a></li>
      <li><a href="#tab2" data-toggle="tab">Your favorites</a></li>
      <li><a href="#tab3" data-toggle="tab">Negotiations</a></li>
      <li><a href="#tab4" data-toggle="tab">Trades</a></li>
    </ul>
    <!-- / タブ-->
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade in active" id="tab1">
        <p>
          <?php foreach($myitems as $item): ?>
            <li><?php echo h($item['Item']['title']); ?></li>
            <li><?php echo $this->Html->link('<img width=160px height=130px src="/Raiber_Project/upload/items/'.$item['Item']['id'].'/'.str_replace('.','_thumb.',$item['Item']['image1_file_name']).'">',array('controller' => 'items','action' => 'view', $item['Item']['id']),array('escape'=>false)); ?>
        </p>
        <?php endforeach; ?>
      </div>
      <div class="tab-pane fade" id="tab2">
        <p>コンテンツ2</p>
      </div>
      <div class="tab-pane fade" id="tab3">
        <p>コンテンツ3</p>
      </div>
      <div class="tab-pane fade" id="tab4">
        <p>コンテンツ4</p>
      </div>
    </div>
  </div>

