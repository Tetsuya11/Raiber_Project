<div class="users form">   
    <h2><?php printf(__('Confirm', true), __('User', true)); ?></h2>
    <dl>            
        <dt>
            <?php __('Name'); ?>
        </dt>
        <dd>
            <?php echo h($post['Post']['title']); ?>                
        </dd>
        <dt>
            <?php __('Password'); ?>
        </dt>
        <dd>
            <?php echo h($post['Post']['body']); ?>                
        </dd>
    </dl>
    <?php echo $this->Form->create('Post', array('action' => 'add_confirm'));?>
    <?php echo $this->Form->hidden('dummy');?>
    <?php echo $this->Form->end(__('Submit', true));?>
</div>