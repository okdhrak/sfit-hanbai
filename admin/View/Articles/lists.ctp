<?php
$this->assign('description', '');
$this->assign('keywords', '');
$this->assign('title', '物件管理(物件一覧)');
?>
<h2><i class="fa fa-pencil-square-o fa-1x fa-fw"></i>物件一覧</h2>
	
<div class="content articles-lists">

	<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i>登録物件一覧(変更・削除)</h3>
		<p>登録済み物件情報の一覧表示および加除訂正を行います。</p>
	</div>
	
	<?php echo $this->Form->create('Search', array('url' => '/articles/lists/', 'novalidate' => true, 'enctype' => 'multipart/form-data', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
	<table class="searches mb30">
		<tr>
			<th>カテゴリー</th>
			<td><?php echo $this->Form->input('category', array('type' => 'select', 'options' => $categoryList, 'empty' => '選択してください')); ?></td>
			<th>市区町村</th>
			<td><?php echo $this->Form->input('city', array('type' => 'select', 'options' => $cityList, 'empty' => '選択してください')); ?></td>
		</tr>
		<tr>
			<th>状態</th>
			<td><?php echo $this->Form->input('status', array('legend' => false, 'type' => 'radio', 'options' => $statusList)); ?></td>
			<th>価格</th>
			<td><?php echo $this->Form->input('price', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' 円')); ?></td>
		</tr>
		<tr>
			<td colspan="4" style="border-top:none; background:#f2f2f2;">
				<?php echo $this->Form->submit('　上記条件で絞り込む　', array('name' => '_onsearch')); ?><?php echo $this->Form->submit('　リセット　', array('name' => '_onreset')); ?>
			</td>
		</tr>
	</table>
	<?php echo $this->Form->end(); ?>
	
	<?php if (@$articlesData): ?>
		
		<?php echo $this->element('pagenate', array()); ?>
		
		<table class="articles mb5">
			<tr>
				<th><?php echo $this->Paginator->sort('mid', '管理番号'); ?></th>
				<th><?php echo $this->Paginator->sort('category', '物件種別'); ?></th>
				<th><?php echo $this->Paginator->sort('name', '物件名'); ?></th>
				<th><?php echo $this->Paginator->sort('city', '市区町村'); ?></th>
				<th><?php echo $this->Paginator->sort('price', '価格'); ?></th>
				<th><?php echo $this->Paginator->sort('PmCompany.name', '管理会社'); ?></th>
				<th><?php echo $this->Paginator->sort('PmCompany.name', '電話番号'); ?></th>
				<th>操作</th>
			</tr>
		
			<?php foreach($articlesData as $data): ?>
			<tr id="<?php echo h($data['Article']['id']); ?>">
				<td><?php echo h($data['Article']['mid']); ?></td>
				<td><?php echo h($categoryList[$data['Article']['category']]); ?></td>
				<td><?php echo h($data['Article']['name']); ?></td>
				<td><?php echo h($data['Article']['city']); ?></td>
				<td><?php echo h($this->App->numberFormat($data['Article']['price'], 1)); ?></td>
				<td><?php echo h($data['PmCompany']['name']); ?></td>
				<td><?php echo h($data['PmCompany']['tel']); ?></td>
				<td>
				<span class="<?php echo h($data['Article']['id']); ?>"></span><i class="fa <?php echo ($data['Flag']['status']) ? 'fa-check-circle-o fc-g' : 'fa-close fc-r' ;?> fa-1x fa-fw"></i><?php echo $this->Html->link(($data['Flag']['status']) ? '表示中' : '非表示', 'javascript:;', array('class' => 'indication', 'data-indication-id' => $data['Article']['id'], 'data-indication-status' => $data['Flag']['status'])); ?>
				<i class="fa fa-edit fa-1x fa-fw"></i><?php echo $this->Html->link('編集', array('action' => 'edit', $data['Article']['id'])); ?>
				<i class="fa fa-trash fa-1x fa-fw"></i><?php echo $this->Html->link('削除', '#', array('class' => 'delete', 'data-delete-id' => $data['Article']['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		
		<?php echo $this->element('pagenate', array()); ?>
		
	<?php endif;?>
	
	<div class="toListTop">
		<p><i class="fa fa-arrow-circle-o-right fa-1x fa-fw"></i><?php echo $this->Html->link('物件管理トップへ', array('action' => 'index')); ?></p>
	</div>
</div>
