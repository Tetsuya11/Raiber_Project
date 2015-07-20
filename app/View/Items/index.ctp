<?php $this->assign('title','Raiber  商品一覧 Item lists'); ?>
<div class="container">
	<div class="row">

		<!-- カテゴリー一覧 -->
		<div class="sidebar col-md-2">
			<ul>
				<li>Categories</li>
				<?php foreach ($categories as $category): ?>
				<li class="text-muted"><?php echo $this->Html->link($category['Category']['name'],array('action'=>'category_index',$category['Category']['id'])); ?></li>
				<?php endforeach; ?>
				<?php unset($category); ?>
			</ul>
		</div>




		<!-- 商品一覧 -->
		<div class="main col-md-10">
			<div class="main-top">商品一覧 Item list</div>


		<?php foreach ($items as $item): ?>
			<ul>
				<li id="item_<?php echo h($item['Item']['id']); ?>" class="main-item" style="height:80%;">
					<ul>
						<div class="row">
							<!-- 商品画像 -->
							<div class="col-md-4 col-sm-4 col-xs-12">
								<li style="float:left;"><?php echo $this->Html->link('<img width=350px height=300px src= "/Raiber_Project/img/item_img/'.$item['Item']['image1'].'">',array('action' => 'view', $item['Item']['id']),array('escape'=>false)); ?></li>
							</div>
							<!-- 商品情報 -->
							<div class="col-md-8 col-sm-8 col-xs-12">
									<li class="item-category" style="float:left;"><?php echo h($item['Category']['name']); ?></li>
									<li class="item-title"><?php echo $this->Html->link(h($item['Item']['title']),array('controller'=>'items', 'action'=>'view', $item['Item']['id'])); ?></li>	
									<li class="item-name glyphicon glyphicon-user"><?php echo h($item['User']['username']); ?></li>
									<li class="item-created"><?php echo h($item['Item']['created']); ?></li>
									<li class="item-edit"><?php echo $this->Html->link('Edit',array('action'=>'edit',$item['Item']['id']));?></li>
									<li class="item-delete"><?php echo $this->Html->link('Delete','#',array('class'=>'delete','data-post-id'=>$item['Item']['id'])); ?></li>
									<li class="item-description"><?php echo h($item['Item']['discription']); ?></li>
							</div>
						</div>
					</ul>
				</li>
			</ul>
		<?php endforeach; ?>
		<?php unset($item); ?>

		<!-- ページネーション -->
		<ul class="pagination">
			<li><?php echo $this->Paginator->prev('< 前へ', array(), null, array('class' => 'prev disabled')); ?></li>
			<li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
			<li><?php echo $this->Paginator->next('次へ >', array(), null, array('class' => 'next disabled')); ?></li>
		</ul>

		</div>
	</div>
</div>

	<!-- 削除ボタンをふわっと -->
	<script>
		$(function() {
			$('a.delete').click(function(e) {
				if (confirm('sure?')) {
					$.post('./items/delete/'+$(this).data('post-id'), {} , function(res) {
						$('#item_'+res.id).fadeOut();
					}, "json");
				}
				return false;
			});
		});

	</script>
