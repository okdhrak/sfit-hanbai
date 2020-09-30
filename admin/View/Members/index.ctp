<?php
$this->assign('description', '');
$this->assign('keywords', '');
$this->assign('title', '会員管理');
?>
<h2><i class="fa fa-users fa-1x fa-fw"></i>会員管理</h2>

<div class="content members-index">
	<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i><?php echo $this->Html->link('登録会員一覧(登録内容確認・削除)', array('action' => 'lists')); ?></h3>
		<p>会員情報の一覧表示および削除を行います。</p>
	</div>
</div>
