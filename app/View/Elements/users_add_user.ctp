<?php echo $this->xform->input('username'); ?>

<?php echo $this->xform->input('password'); ?>

<?php if($this->xform->checkConfirmScreen() === false) : // 確認画面では非表示  ?>
<?php echo $this->xform->input('password_conf'); ?>(確認)
<?php endif; ?>

<?php echo $this->xform->input('email'); ?>

<?php if($this->xform->checkConfirmScreen() === false) : // 確認画面では非表示  ?>
<?php echo $this->xform->input('email_conf'); ?>(確認)

<?php echo $this->xform->input('picture', array('type' => 'file')); ?>

<?php endif; ?>