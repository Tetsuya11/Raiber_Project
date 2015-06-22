<p><?php echo $this->Html->link("Back", array('action' => 'index')); ?></p>

<h2><?php echo h($item['Item']['title']); ?></h2>

<p><?php echo '<img src="/Raiber_Project/item_img/'.$item['Item']['image1_file_name'].'">'?>
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
		<th>Username</th>
		<th>Created</th>
		<th>Delete</th>
	</tr>


	<?php foreach($item['Post'] as $post) :?>
		<tr>
			<td><?php echo $post['id']; ?></td>
			<td><?php echo $post['message']; ?></td>
			<td><?php echo $post['User']['username']; ?></td>
			<td><?php echo $post['created']; ?></td>
		<div class="form-group">
			<label class="control-label" for="email">
			<!-- <td><?php //echo $this->Form->postlink('マンゴー', array(
				//'controller'=>'Posts','action'=>'delete',$post['id'])); ?>
			debug($post['id']);
			'controller'=>'posts'でコント指定、'action' => 'delete'postsコントのfunction delete選択、$post['id']を持ったままpostsコントに行く。削除機能自体はここには無く、選択のみ
			</td> -->
		</tr>
	<?php endforeach; ?>
</table>