<div class='users form'>
    <?php 
        echo $this->Form->create(array(
        //データを保存するためにモデルの状態をリセットする
            'action' => 'thanks', 'enctype' => 'multipart/form-data')); 
    ?>
    <fieldset>
        <legend><?php echo __('ユーザー登録をしてください。'); ?></legend>
        <?php 
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            //echo $this->Form->input('picture', array(
                //'type' => 'file'));
        ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>