<h2>問い合わせはこちらからどうぞ</h2>
<?php echo $this->Form->create('Contact', array('action' => 'confirm')) . PHP_EOL; ?>
<?php echo $this->Form->input('name') . PHP_EOL; ?>
<?php echo $this->Form->input('email') . PHP_EOL; ?>
<?php echo $this->Form->textarea('message') . PHP_EOL; ?>
<?php echo $this->Form->end('確認画面へ進む') . PHP_EOL; ?>
