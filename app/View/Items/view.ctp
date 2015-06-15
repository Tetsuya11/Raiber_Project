<p><?php echo $this->Html->link("Back", array('action' => 'index')); ?></p>

<h2><?php echo h($item['Item']['title']); ?></h2>

<p><?php echo '<img src="/Raiber_Project/item_img/'.$item['Item']['image1'].'">'?>
<p><?php echo h($item['Item']['discription']); ?></p>

<p>タイムライン</p>
<?php
	echo $this->Form->create('Post');
	echo $this->Form->input('message');
	echo $this->Form->hidden('item_id',array('value'=>$item['Item']['id']));//掲示板の送信ボタンを押したときに自分のページに帰ってくるようにする
	echo $this->Form->end('投稿');
?>
<table>
	<tr>
		<th>ID</th>
		<th>Message</th>
		<th>User_name </th>
		<th>Created</th>
	</tr>


	<?php foreach($item['Post'] as $post) :?>
		<tr>
			<td><?php echo $post['id']; ?></td>
			<td><?php echo $post['message']; ?></td>
			<td><?php echo $post['user_id']; ?></td>
			<td><?php echo $post['created']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>