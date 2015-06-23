<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('新規登録 Sign Up'); ?></legend>
        <?php 
        echo $this->Form->input('username');
        echo $this->Form->input('email', array(
        	'maxlength' => '255', 'type' => 'email'));
        echo $this->Form->input('password', array(
        	'maxlength' => '255', 'type' => 'password'));
        echo $this->Form->input('password_confirm', array(
        	'maxlength' => '255', 'type' => 'password'));
        echo $this->Form->input('picture', array(
            'type' => 'file'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>