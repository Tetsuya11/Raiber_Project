<h2>Thank you, <?php echo $user_data; ?> !</h2>
<?php echo $this->Form->create('User', array(
'action' => 'delete_comp')) . PHP_EOL; ?>
<h3>Feed back from <?php echo $user_data; ?></h3>
<?php echo $this->Form->textarea('message') . PHP_EOL; ?>
<?php echo $this->Form->end('退会') . PHP_EOL; ?>