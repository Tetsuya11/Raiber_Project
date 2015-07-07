<p><?php echo $this->Html->link("Back", array('action' => 'index')); ?></p>

<h2><?php echo h($item['Item']['title']); ?></h2>


<th><?php echo '<img width=300px height=270px src="/Raiber_Project/upload/items/'.$item['Item']['id'].'/'.str_replace('.','_thumb.',$item['Item']['image1_file_name']).'">'?></th>

<th><?php echo '<img width=300px height=270px src="/Raiber_Project/upload/items/'.$item['Item']['id'].'/'.str_replace('.','_thumb.',$item['Item']['image2_file_name']).'">'?></th>

<th><?php echo '<img width=300px height=270px src="/Raiber_Project/upload/items/'.$item['Item']['id'].'/'.str_replace('.','_thumb.',$item['Item']['image3_file_name']).'">'?></th>

<p><?php echo h($item['Item']['discription']); ?></p>

<p>タイムライン</p>
<?php
	echo $this->Form->create('Post');
	echo $this->Form->input('message');
	echo $this->Form->hidden('item_id',array('value'=>$item['Item']['id']));
	//掲示板の送信ボタンを押したときに自分のページに帰ってくるようにする
	echo $this->Form->end('投稿');
?>

<h3>Social Button(同期)</h3>
<div class="actions">
    <div class='fb-like' data-href='http://social-button.local' data-send='false' data-layout='box_count' data-width='450' data-show-faces='true'></div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</div>
<div class="actions">
    <a href='https://twitter.com/share' class='twitter-share-button' data-count='vertical' data-via='xxxx' data-url='http://social-button.local' data-text='social-button'>Tweet</a><script type='text/javascript' src='//platform.twitter.com/widgets.js'></script>
</div>
<div class="actions">
    <script type='text/javascript' src='https://apis.google.com/js/plusone.js'></script><g:plusone size='tall' href='http://social-button.local'></g:plusone>
</div>

<table>
	<tr>
		<!-- <th>ID</th> -->
		<th>Image</th>
		<th>Message</th>
		<th>Username</th>
		<th>Created</th>
		<th>Delete</th>
		<th>Favorite</th>
	</tr>


	<?php foreach($item['Post'] as $post) :?>
		<tr>
			<!-- <td><?php// echo $post['id']; ?></td> -->
			<td><?php echo '<img width=100px height=100px src= "/Raiber_Project/img/'.$post['User']['picture'].'">'?></td>
			<td><?php echo $post['message']; ?></td>
			<td><?php echo $post['User']['username']; ?></td>
			<td><?php echo $post['created']; ?></td>
		<div class="form-group">
			<label class="control-label" for="email">
			
			<td><?php echo $this->Form->postlink('マンゴー', array(
				'controller'=>'Posts','action'=>'delete',$post['id'],$item['Item']['id'])); ?>

		     
			<!-- </td> 			debug($post['id']);
			'controller'=>'posts'でコント指定、'action' => 'delete'postsコントのfunction delete選択、$post['id']を持ったままpostsコントに行く。削除機能自体はここには無く、選択のみ
			</td> -->
			<td></td>
		</tr>
	<?php endforeach; ?>
</table>