<?php $this->assign('title','Raiber  商品一覧 Item lists'); ?>
<h1 style="color:red;">商品一覧  Item lists</h1>

	
		
		<div class="row ">
			
  			<div style='float:left;'class="col-md-2">
  				
  				<ul class="nav nav-tabs nav-stacked">
	<li><?php echo "Categories";?> </li>
	<?php foreach ($categories as $category) :?> 
			    

	    	<li><?php echo $this->Html->link($category['Category']['name'],array('controller'=>'Categories','action'=>'view',$category['Category']['id'])); ?></li>
	<?php endforeach; ?>
	<?php unset($category); ?>
			</ul>
			</div>
		

		




		<div style='float:right;'class="col-sm-10" >
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
			<?php echo $this->Html->link('<img width=160px height=130px src="/Raiber_Project/upload/items/'.$item['Item']['id'].'/'.str_replace('.','_thumb.',$item['Item']['image1_file_name']).'">',array('action' => 'view', $item['Item']['id']),array('escape'=>false)); ?>
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
</table>



  <?php echo $this->Html->link("<button class=\"btn btn-default\" type=\"submit\">Add Item</button>", array('action' => 'add'),array('escape'=>false)); ?>	

<td>
<nav>
  <ul class="pagination">
    <li href=<?php echo $this->Paginator->prev('', array('action' => '/'), null, array('class' => 'prev disabled')); ?> </li>

    <li class="active"><?php echo $this->Paginator->numbers(array('separator' => '')); ?><span class="sr-only">(current)</span></li>
    
    <li href=<?php echo $this->Paginator->next('', array(), null, array('class' => 'next disabled')); ?><span aria-hidden="true"></span></li>
  </ul>
</nav>


</td>
</div>
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

</table>
</div>
    
   


