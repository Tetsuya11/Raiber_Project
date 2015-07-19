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
	<div id="container">
		<div id="header">
			<!-- <h1><?php //echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1> -->

			<nav class="navbar navbar-default navbar-fixed-top" style="height:55px">
				<div class="navbar-header">
					<!-- 左上のロゴ -->
					<a class="navbar-brand" href="/Raiber_Project/pages/top">Raiber</a>
				</div>
					<ul class="nav navbar-nav navbar-right" >
						<!-- ログインユーザー名 -->
						<li style="margin-top: 6px;"><h5 style="height: 30px; width: 200px; ">Welcome to Raiber, <?php echo $user_data; ?> !</h5></li>

						<!-- <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"
							role="button" aria-expanded="false" id="searchbtn">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id="searchbtn">
					        	<img src="" style=""><?php// echo 'Item'; ?><span class="caret" ></span>
					        </a>	
							 <ul class="dropdown-menu" role="menu">
						         <li><a href="">Login</a></li> -->
						        <!-- <li><?php// echo $this->Html->link("Add", array(
						        //'controller' => 'items','action' => 'add')); ?>
						        </li>
						        <li><?php// echo $this->Html->link("My Items", array(
						        //'controller' => 'users','action' => 'mypage')); ?>
						        </li>
						    </ul>
						</li> -->

					    <li class="dropdown user-menu">
					    	<!-- ユーザーメニュー -->
					        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" id="searchbtn"><?php echo 'Menu'; ?><span class="caret" ></span></a>
					        </a>
					        <ul class="dropdown-menu" role="menu">
						        <li><?php echo $this->Html->link('商品追加 Add Item', array('controller'=>'items', 'action'=>'add')); ?></li>
								<li><?php echo $this->Html->link('会員登録 Sign up',array('controller'=>'users', 'action'=>'add')); ?></li>
								<li><?php echo $this->Html->link('ログイン Login',array('controller'=>'users', 'action'=>'login')); ?></li>
								<li><?php echo $this->Html->link('ログアウト Logout', array('controller'=>'users', 'action'=>'logout')); ?></li>
								<li><?php echo $this->Html->link('退会 Withdraw',array('controller'=>'users', 'action'=>'')); ?></li>
						    </ul>
						</li>
					</ul>
			</nav>
		</div>

		
		<div id="content">
			<div id="content">
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
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/
    	jquery.min.js">
    	</script>
    	<script src="js/bootstrap.min.js"></script>
    </div>
</body>
</html>