<h2>入力内容をご確認ください</h2>
<?php echo $this->Form->create('User', array('action' => 'send')) . PHP_EOL; ?>
<div>
    <?php echo $this->Form->value('username') . PHP_EOL; ?>
    <?php echo $this->Form->hidden('username'); ?>
</div>
<div>
    <?php echo $this->Form->value('email') . PHP_EOL; ?>
    <?php echo $this->Form->hidden('email'); ?>
</div>
<div>
    <?php echo $this->Form->value('password') . PHP_EOL; ?>
    <?php echo $this->Form->hidden('password'); ?>
</div>
<?php echo $this->Form->button('前に戻る', array('type' => 'button', 'onClick' => 'history.back()')) . PHP_EOL; ?>
<?php echo $this->Form->end('送信する') . PHP_EOL; ?>