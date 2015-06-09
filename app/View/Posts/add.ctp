<!-- File: /app/View/Posts/add.ctp -->

<h1>Add</h1>
<?php
echo $this->Form->create('Item');
echo $this->Form->input('title');
echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Post');
?>