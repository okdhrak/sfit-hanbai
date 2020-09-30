<?php
$this->assign('description', '');
$this->assign('keywords', '');
$this->assign('title', 'トピックス管理(登録)');
?>
<h2><i class="fa fa-comments fa-1x fa-fw"></i>トピックス管理</h2>

<div class="content articles-add">
	<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i>新規登録</h3>
		<p>トピックスの<?php echo empty($this->data['Topic']['id']) ? '新規登録' : '編集登録'; ?>を行います。</p>
	</div>
	
	<?php echo $this->Form->create('Topic', array('novalidate' => true, 'inputDefaults' => array('label' => false, 'div' => false))); ?>
		<table border="0" cellpadding="0" cellspacing="0" class="form-wrap">
			<tr>
				<th>年月日<i class="fa fa-exclamation-triangle fa-fw"></i></th>
				<td>
					<?php $this->request->data['Topic']['date'] = unserialize(@$this->request->data['Topic']['date']); ?>
					<?php
						echo $this->Form->input('date', array(
							'type' => 'date',
							//'label' => array('text' => '築年月'),
							'dateFormat' => 'YMD',
							/*'selected' => array(
								'year' => empty($this->request->data['Topic']['date']['year']) ? date('Y') : $this->request->data['Topic']['date']['year'],
								'month' => empty($this->request->data['Topic']['date']['month']) ? date('m') : $this->request->data['Topic']['date']['month'],
								'day' => empty($this->request->data['Topic']['date']['day']) ? date('d') : $this->request->data['Topic']['date']['day'],
							),*/
							'monthNames' => false,
							'empty' => '選択してください',
							'minYear' => date('Y') - 1,
							'maxYear' => date('Y') + 1,
						));
					?>
				</td>
			<tr>
			<tr>
				<th>コメント<i class="fa fa-exclamation-triangle fa-fw"></i></th>
				<td><?php echo $this->Form->input('comment', array('type' => 'textarea')); ?></td>
			<tr>
			<tr>
				<th>リンク先URL</th>
				<td><?php echo $this->Form->input('link', array('class' => 'mode-disabled', 'placeholder' => 'http://www.example.com')); ?></td>
			<tr>
			<tr>
				<th>リンクを別ウィンドで開く</th>
				<td>
					<?php
						echo $this->Form->input('tb', array(
							'type' => 'checkbox',
							'checked' => empty($this->request->data['Topic']['tb']) ? false : true,
							'label' => 'リンクを別ウィンドで開く',
							'div' => false,
						));
					?>
				</td>
			<tr>
			<tr>
				<th>表示/非表示</th>
				<td><?php echo $this->Form->input('indication', array('legend' => false, 'type' => 'radio', 'value' => empty($this->request->data['Topic']['indication']) ? 0 : $this->request->data['Topic']['indication'], 'options' => $indicationList, 'separator' => '&nbsp;')); ?></td>
			<tr>
			<tr>
				<td colspan="2" style="background:#f2f2f2;"><?php echo $this->Form->submit(empty($this->data['Topic']['id']) ? '　登録　' : '　編集　'); ?></td>
			<tr>
		</table>
	
	<?php echo $this->Form->end(); ?>
	
</div>
