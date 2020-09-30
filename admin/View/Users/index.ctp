<?php
$this->assign('description', '');
$this->assign('keywords', '');
$this->assign('title', 'ユーザ管理');
?>
<h2><i class="fa fa-user fa-1x fa-fw"></i>ユーザ管理</h2>

<div class="content members-index">
	<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i><?php echo $this->Html->link('ユーザ一覧(変更・削除)', array('action' => 'lists')); ?></h3>
		<p>ユーザ情報の一覧表示および加除訂正を行います。</p>
	</div>
</div>

