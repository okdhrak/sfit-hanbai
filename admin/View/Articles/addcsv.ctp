<h2><i class="fa fa-pencil-square-o fa-1x fa-fw"></i>物件管理</h2>

<div class="content articles-add">
	<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i>新規登録(CSV一括)</h3>
		<p>物件情報の一括登録を行います。</p>
	</div>
	
	<div class="form-wrap">
	<?php echo $this->Form->create('Article', array('novalidate' => true, 'enctype' => 'multipart/form-data')); ?>
	<?php echo 'ファイル名：' . $_FILES['data']['name']['Article']['csvfile'] . '<br>' . 'サイズ：' . $_FILES['data']['size']['Article']['csvfile'] . 'bite'; ?>
	
	<?php echo $this->Form->end(array('label' => 'ファイルの内容を登録する', 'name' => '_toadd')); ?>
	</div>
	
</div>
