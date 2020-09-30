<?php
$this->assign('description', '');
$this->assign('keywords', '');
$this->assign('title', '物件管理(新規登録)');
?>
<h2><i class="fa fa-pencil-square-o fa-1x fa-fw"></i>物件管理</h2>

<div class="content articles-add">
	<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i>新規登録</h3>
		<p>物件情報の新規登録を行います。</p>
	</div>
	
	<?php echo $this->Form->create('Article', array('novalidate' => true, 'enctype' => 'multipart/form-data', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
		<table border="0" cellpadding="0" cellspacing="0" class="form-wrap">
			<tr>
				<th>管理番号<i class="fa fa-exclamation-triangle fa-fw"></i></th>
				<td><?php echo $this->Form->input('mid', array('type' => 'text', /*'label' => false,*//*array('text' => '管理番号'), */'class' => 'mode-disabled')); ?></td>
			<tr>
			<tr>
				<th>物件種別<i class="fa fa-exclamation-triangle fa-fw"></i></th>
				<td><?php echo $this->Form->input('category', array('type' => 'select', 'options' => $categoryList, 'empty' => '選択してください')); ?></td>
			<tr>
			<tr>
				<th>物件名<i class="fa fa-exclamation-triangle fa-fw"></i></th>
				<td><?php echo $this->Form->input('name', array('type' => 'text', 'class' => '')); ?></td>
			<tr>
			<tr>
				<th>価格<i class="fa fa-exclamation-triangle fa-fw"></i></th>
				<td><?php echo $this->Form->input('price', array('type' => 'text', 'class' => 'mode-disabled')); ?></td>
			<tr>
			<tr>
				<td colspan="2" style="background:#f2f2f2;"><?php echo $this->Form->submit('　新規追加　'); ?></td>
			<tr>
		</table>
	<?php echo $this->Form->end(); ?>

</div>




