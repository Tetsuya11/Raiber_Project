<?php echo $this->Form->create(); ?>

<?php echo $this->Form->label('User.name', 'お名前:'); ?>
<?php echo $this->Form->text('User.name'); ?>
<?php echo $this->Form->error('User.name'); ?>

<?php echo $this->Form->label('User.password', 'パスワード:'); ?>
<?php echo $this->Form->password('User.password'); ?>
<?php echo $this->Form->error('User.password'); ?>

<?php echo $this->Form->label('User.password_confirm', 'パスワード(確認):'); ?>
<?php echo $this->Form->password('User.password_confirm'); ?>
<?php echo $this->Form->error('User.password_confirm'); ?>

<?php echo $this->Form->end('登録'); ?>