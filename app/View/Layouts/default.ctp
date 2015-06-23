<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('mycss');

		// jQuery CDN
        echo $this->Html->script('//code.jquery.com/jquery-1.10.2.min.js');

		// Twitter Bootstrap 3.0 CDN
        echo $this->Html->css('//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css');
        echo $this->Html->css('//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-glyphicons.css');
        echo $this->Html->script('//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js');
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="pages/top">Raiber</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="">New membership</a></li>
			<li><a href="">My page</a></li>
			<li><a href="">login</a></li>
		</ul>
	</nav>

	<div id="container">
		<div id="header">
			<!-- <h1><?php //echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1> -->   <!-- 初期cakephp -->
			<!-- <nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-header">
					<a class="navbar-brand" href="">Raiber</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="">New membership</a></li>
					<li><a href="">My page</a></li>
					<li><a href="">login</a></li>
				</ul>
			</nav> -->
		</div>

		
		<div id="content">



		<div id="content" style="padding-top:50px">


			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>



		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
		</div>
		<?php echo $this->element('sql_dump'); ?>
	<script>
	$(function() {
		setTimeout(function() {
			$('#flashMessage').fadeOut("slow");
		}, 1500);
	});

	</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</div>
</body>
</html>
