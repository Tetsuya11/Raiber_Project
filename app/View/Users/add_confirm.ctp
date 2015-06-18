<?php
//外部ファイル読み込み
//view/elements/users_add_user.ctp
echo $this->element(__("users_add_user"));
?>
<?php echo $this->xform->create('User', array('action' => 'add_success'));
//ここにHiddenでPostデータを出力 or セッションでPostデータを管理 ?>
<?php echo $this->xform->submit('送信', array('name' => 'success')); ?>
<?php echo $this->xform->submit('戻る', array('name' => 'back')); ?>
<?php echo $this->xform->end();?>
