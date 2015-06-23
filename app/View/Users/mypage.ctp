<?php $this->assign('title','Raiber  マイページ Mypage'); ?>
<h1 style="color:red;">
  <?php echo $user_data['User']['username']; ?>マイページ My Page
</h1>

<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Negotiation</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Favorites</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">My Item Lists</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Trades</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="negotiation">
      <?php echo '交渉履歴'; ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="favorites">
      <?php echo 'お気に入り'; ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="my item lists">
      <?php echo ''; ?></div>
    <div role="tabpanel" class="tab-pane" id="trades">...</div>
  </div>

</div>
<p><a href="/users/edit/">編集</a><p>
<p><a href="/users/logout/">ログアウト</a></p>
<p><a href="/users/delete/">退会</a></p>
