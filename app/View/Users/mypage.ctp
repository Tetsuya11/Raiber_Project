<?php $this->assign('title','Raiber  マイページ Mypage'); ?>
<h1 style="color:blue;">
  <?php print $user_data; ?> さんのマイページ My Page
</h1>
<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">My Item Lists</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Trades</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="my item lists">
      <?php foreach($myitems as $item): ?>
      <li><?php echo h($item['Item']['title']); ?></li>
      <li><?php echo $this->Html->link('<img width=160px height=130px src="/Raiber_Project/upload/items/'.$item['Item']['id'].'/'.str_replace('.','_thumb.',$item['Item']['image1_file_name']).'">',array('action' => 'view', $item['Item']['id']),array('escape'=>false)); ?></li>
    <?php endforeach; ?>
      </div>
    <div role="tabpanel" class="tab-pane active" id="trades">
    </div>
  </div>

</div>

