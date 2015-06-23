<?php //debug($category); ?>

<?php// echo $category['Item']['title'];?>
<?php foreach ($category['Item'] as $item): ?>
	<p><?php// echo $item['title'];?></p>

	<p><?php echo $this->Html->link($item['title'],array('controller'=>'Items','action'=>'view',$item['id']));//array（'controller'=>'Items'でitemへ、action'=>'view'でviewへとぶ?>
	</p>

	<p><?php echo $this->Html->link('<img width=160px height=130px src="/Raiber_Project/item_img/'.$item['image1_file_name'].'">
	',array('controller'=>'Items','action'=>'view',$item['id']),array('escape'=>false));?>
	
<?php endforeach; ?>