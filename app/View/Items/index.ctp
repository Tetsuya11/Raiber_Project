<?php $this->assign('title','Raiber  商品一覧 Item lists'); ?>
<h1 style="color:red;">商品一覧  Item lists</h1>

	<table class="table-hover" >
		<div class="row">
  			<div class="col-md-1">
				<th>id</th>
				<th>Name</th>
			</tr>
	
	<?php foreach ($categories as $category) :?>
	    <tr>
	    	<td><?php echo $category['Category']['id']; ?></td>

	    	<td><?php echo $this->Html->link($category['Category']['name'],array('controller'=>'Categories','action'=>'view',$category['Category']['id'])); ?></td>
	    </tr>
	<?php endforeach; ?>
	<?php unset($category); ?>
			</div>

		




		<div class="col-sm-3" style="background-color: green;color:white;">
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
			<?php echo ''?>
		</td>

		<td>
			<?php echo $this->Html->link('<img src="/Raiber_Project/item_img/'.$item['Item']['image1_file_name'].'">',array('action' => 'view', $item['Item']['id']),array('escape'=>false)); ?>
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
			<div >
			
			<?php echo $this->Html->link('Edit',array('action'=>'edit',$item['Item']['id']));?>
			</div>
		<div>
			<?php echo $this->Html->link('Delete','#',array('class'=>'delete','data-post-id'=>$item['Item']['id'])); ?>
		</div>
		</td>
	</tr>
<?php endforeach; ?>
</div>
<button class="btn btn-default" type="submit">
  <?php echo $this->Html->link("Add Item", array('action' => 'add')); ?>	
</button>
<p><?php //echo $this->Html->link("Categories",array('controller'=> 'Categories','action'=> 'index'));?></p>

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

</div>

</table>

    
   


