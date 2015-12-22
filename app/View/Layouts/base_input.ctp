
<?php echo $xformjp->input('name'); ?>


<?php echo $xformjp->password('password'); ?>


<?php echo $xformjp->input('email'); ?>

<?php if($xformjp->checkConfirmScreen() === false) : // 確認画面では非表示  ?>
<?php echo $xformjp->input('email_conf'); ?>(確認)
<?php endif; ?>
