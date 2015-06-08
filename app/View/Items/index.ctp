<?php $this->assign('title','Raiber  商品一覧 Item lists'); ?>
<h2>商品一覧  Item lists</h2>

<ul>
<?php foreach ($items as $item): ?>
<li>
<?php
//debug($item);
echo h($item['Item']['title']);
?>
</li>
<?php endforeach; ?>
</ul>