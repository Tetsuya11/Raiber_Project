<p>タイムライン</p>
<?php
	echo $this->Form->create('Post');
	echo $this->Form->input('message');
	echo $this->Form->end('送信');
?>
<table>
	<tr>
		<th>ID</th>
		<th>Message</th>
		<th>User_id</th>
		<th>Created</th>
	</tr>


echo $this->Form->create('Users', ['action' => 'login', 'method' => 'post']);
//echo $this->Form->button('Facebookログイン');

	<?php foreach($posts as $post) 
	// {
	// 		// echo "<a href=\"".
	// 		// 	//$post["Post"]["url"]."\">".
	// 		// 	$post["Post"]["title"]."</a><br>".
	// 		// 	$post["Post"]["message"].
	// 		// 	$post["Post"]["created"]."<br><br>";
	// 	}
	:?>
		<tr>
			<td><?php echo $post['Post']['id']; ?></td>
			<td><?php echo $post['Post']['message']; ?></td>
			<td><?php echo $post['Post']['user_id']; ?></td>
			<td><?php echo $post['Post']['created']; ?></td>
		</tr>
	<?php endforeach; ?>
</table>

<!-- echo $this->Form->create('Members', ['action' => 'login', 'method' => 'post']);
echo $this->Form->button('Facebookログイン'); -->
