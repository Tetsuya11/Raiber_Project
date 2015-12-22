<h2>入力内容をご確認ください</h2>
<?php echo $this->Form->create('Contact', array('action' => 'send')) . PHP_EOL; ?>
<div>
    <?php echo $this->Form->value('name') . PHP_EOL; ?>
    <?php echo $this->Form->hidden('name'); ?>
</div>
<div>
    <?php echo $this->Form->value('email') . PHP_EOL; ?>
    <?php echo $this->Form->hidden('email'); ?>
</div>
<div>
    <?php echo $this->Form->value('message') . PHP_EOL; ?>
    <?php echo $this->Form->hidden('message'); ?>
</div>
<?php echo $this->Form->button('前に戻る', array('type' => 'button', 'onClick' => 'history.back()')) . PHP_EOL; ?>
<?php echo $this->Form->end('送信する') . PHP_EOL; ?>