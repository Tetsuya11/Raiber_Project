<?php echo $this->Form->create(); ?>
<?php echo $this->Form->label('User.name'); ?>
<?php echo $this->Form->text('User.name'); ?>
<?php echo $this->Form->label('User.password'); ?>
<?php echo $this->Form->password('User.password'); ?>
<?php echo $this->Form->end('ログイン'); ?>