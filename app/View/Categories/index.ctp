<h1>categories</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        
    </tr>
    
 <?php foreach ($categories as $category): ?>
    <tr>
        <td>
        	<?php echo $category['Category']['id']; ?>
        </td>
        
        <td>
            <?php echo $this->Html->link($category['Category']['name'],
			array('action' => 'view', $category['Category']['id'])); ?>
        </td>
    
    </tr>
    <?php endforeach; ?>
    <?php unset($category); ?>
</table>