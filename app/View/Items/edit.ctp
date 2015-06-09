<?php $this->assign('title','Raiber  アイテム編集画面'); ?>
<h1>Edit Item</h1>
<?php

echo $this->Form->create('Item');
echo $this->Form->input('title');
echo $this->Form->input('Discription',array('row'=>'3'));
echo $this->Form->input('image1',array('type'=>'file'));
echo $this->Form->input('image2',array('type'=>'file'));
echo $this->Form->input('image3',array('type'=>'file'));
echo $this->Form->input('category');
echo $this->Form->end('Save Post');
?>
