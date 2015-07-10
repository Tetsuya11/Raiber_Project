<?php //debug($category); ?>

<?php // echo $category['Item']['title'];?>


<?php foreach ($category['Item'] as $item): ?>
	

	<?php echo $this->Html->link('<img width=160px height=130px src="/Raiber_Project/img/item_img/'.$item['image1'].'">
	',array('controller'=>'Items','action'=>'view',$item['id']),array('escape'=>false));?>


	<figcaption><?php echo $this->Html->link($item['title'],array('controller'=>'Items','action'=>'view',$item['id']));//array（'controller'=>'Items'でitemへ、action'=>'view'でviewへとぶ?></figcaption>

<?php endforeach; ?>


