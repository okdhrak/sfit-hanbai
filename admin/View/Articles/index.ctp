<?php
$this->assign('description', '');
$this->assign('keywords', '');
$this->assign('title', '物件管理');
?>
<h2><i class="fa fa-pencil-square-o fa-1x fa-fw"></i>物件管理</h2>

<div class="content articles-index">
	<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i><?php echo $this->Html->link('新規登録', array('action' => 'add')); ?></h3>
		<p>物件情報の新規登録を行います。</p>
	</div>
	<!--<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i><?php echo $this->Html->link('新規登録(CSV一括)', array('action' => 'uploadcsv')); ?></h3>
		<p>物件情報の一括登録を行います。</p>
	</div>-->
	<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i><?php echo $this->Html->link('登録物件一覧(変更・削除)', array('action' => 'lists')); ?></h3>
		<p>登録済み物件情報の一覧表示および加除訂正を行います。</p>
	</div>
	<!--<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i><?php echo $this->Html->link('タグツール', array('action' => 'tagtool')); ?></h3>
		<p>タグ情報の登録および修正を行います。</p>
	</div>-->
</div>

