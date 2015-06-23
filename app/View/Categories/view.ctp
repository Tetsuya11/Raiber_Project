<?php //debug($category); ?>

<?php// echo $category['Item']['title'];?>
<?php foreach ($category['Item'] as $item) ?>
	<p><?php// echo $item['title'];?></p>

	<p><?php echo $this->Html->link($item['title'],array('controller'=>'Items','action'=>'view',$item['id']));//array（'controller'=>'Items'でitemへ、action'=>'view'でviewへとぶ?>
	</p>

	<p><?php echo $this->Html->link('<img src="/Raiber_Project/item_img/'.$item['Item']['image1_file_name'].'">
	',array('controller'=>'Items','action'=>'view',$item['id']));?>
	
