<?php echo $this->Form->create('User', array('action' => 'add_success')); ?>
<div>
    <?php echo $this->Form->value('username'); ?>
    <?php echo $this->Form->hidden('username'); ?>
</div>
<div>
    <?php echo $this->Form->value('email'); ?>
    <?php echo $this->Form->hidden('email'); ?>
</div>
<div>
    <?php echo $this->Form->value('password'); ?>
    <?php echo $this->Form->hidden('password'); ?>
</div>
<?php echo $this->Form->button('前に戻る', array('type' => 'button', 'onClick' => 'history.back()')); ?>
<?php echo $this->Form->end('送信する'); ?>
