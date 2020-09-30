<?php
$this->assign('description', '');
$this->assign('keywords', '');
$this->assign('title', 'トピックス管理');
?>
<h2><i class="fa fa-comments fa-1x fa-fw"></i>トピックス管理</h2>

<div class="content topics-index">
	<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i><?php echo $this->Html->link('新規登録', array('action' => 'add')); ?></h3>
		<p>トピックス情報の新規登録を行います。</p>
	</div>
	<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i><?php echo $this->Html->link('登録トピックス一覧(変更・削除)', array('action' => 'lists')); ?></h3>
		<p>トピックス情報の一覧表示および加除訂正を行います。</p>
	</div>
</div>
