<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Sign Up'); ?></legend>
        	<?php 
        		echo $this->Form->input('username');
        		echo $this->Form->input('password');
    			echo $this->Form->submit('画像を追加');
    			echo $this->Form->end();
    		?>
    </fieldset>
<?php echo $this->Form->end(__('アカウントを作成する')); ?>
</div>