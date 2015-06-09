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
	<tr>
		<td>

		</td>

		<td>
			<?php echo $this->Html->link($item['Item']['image1'],array('action' => 'view', $item['Item']['id'])); ?>
		</td>

		<td>
			<?php
			//debug($item);
			echo $this->Html->link($item['Item']['title'],array('action' => 'view', $item['Item']['id']));
			?>
		</td>
		     
		<td>

		</td>

		<td>

		</td>

		<td>
			<?php echo $item['Item']['created']; ?>
		</td>

		<td>
			<?php echo $this->Html->link('Edit',array('action'=>'edit',$item['Item']['id']));?>
			<?php echo $this->Form->postLink('Deleat',array('action'=>'delete',$item['Item']['id']));?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<p><?php echo $this->Html->link("Add Item", array('action' => 'add')); ?></p>
