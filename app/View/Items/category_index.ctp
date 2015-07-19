<p><?php echo $this->Html->link("Back", array('action' => 'index')); ?></p>

<table>
	<tr>
		<!-- <th>ID</th> -->
		<th>Image</th>
		<th>Title</th>
		<th>User</th>
		<th>Discription</th>
		<th>Category</th>
		<th>Created</th>
		<th>Edit/Deleat</th>
	</tr>

<?php foreach ($items as $item): ?>

	<tr id="item_<?php echo h($item['Item']['id']); ?>">
		<!-- <td><?php// echo $item['Item']['id']; ?></td> -->
		<td><?php echo $this->Html->link('<img width=100px height=100px src= "/Raiber/img/item_img/'.h($item['Item']['image1']).'">',array('action' => 'view', $item['Item']['id']),array('escape'=>false)); ?></td>
		<td><?php echo $this->Html->link(h($item['Item']['title']),array('controller'=>'items', 'action'=>'view', $item['Item']['id'])); ?></td>
		<td><?php echo h($item['User']['username']); ?></td>
		<td><?php echo h($item['Item']['discription']); ?></td>
		<td><?php echo h($item['Category']['name']); ?></td>
		<td><?php echo h($item['Item']['created']); ?></td>
		<td>
			<?php echo $this->Html->link('Edit',array('action'=>'edit',$item['Item']['id']));?>
			<?php echo $this->Html->link('Delete','#',array('class'=>'delete','data-post-id'=>$item['Item']['id'])); ?>
		</td>

	</tr>
<?php endforeach; ?>
<?php unset($item); ?>
</table>



<script>
$(function() {
	$('a.delete').click(function(e) {
		if (confirm('sure?')) {
			$.post('./items/delete/'+$(this).data('post-id'), {} , function(res) {
				$('#item_'+res.id).fadeOut();
			}, "json");
		}
		return false;
	});
});

</script>