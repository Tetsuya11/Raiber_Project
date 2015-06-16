<?php $this->assign('title','Raiber  商品一覧 Item lists'); ?>
<h1>商品一覧  Item lists</h1>

<table>
	<tr>
		
		<th>ID</th>
		<th>Image</th>
		<th>Title</th>
		<th>Discription</th>
		<th>Category</th>
		<th>Created</th>
		<th>Edit/Deleat</th>
	</tr>

<?php foreach ($items as $item): ?>
	<tr id="item_<?php echo h($item['Item']['id']); ?>">
		<td>

		</td>

		<td>
			<?php echo $this->Html->link('<img src="/Raiber_Project/item_img/'.$item['Item']['image1'].'">',array('action' => 'view', $item['Item']['id']),array('escape'=>false)); ?>
		</td>

		<td>
			<?php
			//debug($item);
			echo $this->Html->link($item['Item']['title'],array('action' => 'view', $item['Item']['id']));
			?>
		</td>
		     
		<td>
			<?php echo $item['Item']['discription'];?>
		</td>

		<td>
			<?php echo $item['Category']['name'];?>
		</td>

		<td>
			<?php echo $item['Item']['created']; ?>
		</td>

		<td>
			<?php echo $this->Html->link('Edit',array('action'=>'edit',$item['Item']['id']));?>
			<?php echo $this->Html->link('Delete','#',array('class'=>'delete','data-post-id'=>$item['Item']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<p><?php echo $this->Html->link("Add Item", array('action' => 'add')); ?></p>

<p><?php echo $this->Html->link("Categories",array('controller'=> 'Categories','action'=> 'index'));?></p>

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


