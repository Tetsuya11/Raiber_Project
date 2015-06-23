<h2>Thank you!</h2>
	<table>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Password</th>
			<th>Picture</th>
		</tr>

		<?php foreach(array($record) as $data): ?>
		<?php debug($data); ?>

		<tr>
			<td><?php echo h($data['User']['username']); ?></td>
			<td><?php echo h($data['User']['email']); ?></td>
			<td><?php echo h($data['User']['password']); ?></td>
			<td><?php echo h($data['User']['picture']); ?></td>
		</tr>

		<?php endforeach; ?>

	</table>

	<?php
	echo $this->Html->link('Begin', '/items/index/');
	echo $this->Html->link('Login', '/users/login/');
	?>