<?php echo $this->xform->create('User', array('action' => 'add_confirm'));?>

<?php
echo $this->element("users_add_user");
?>

<?php echo $this->xform->submit('確認する', array('name' => 'confirm')); ?>
<?php echo $this->xform->end(); ?>