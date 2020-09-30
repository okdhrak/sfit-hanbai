<?php
$this->assign('description', '');
$this->assign('keywords', '');
$this->assign('title', '物件管理(トピックス一覧)');
?>
<h2><i class="fa fa-comments fa-1x fa-fw"></i>トピックス管理</h2>

<div class="content topics-lists">
	<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i>登録トピックス一覧(変更・削除)</h3>
		<p>登録済みトピックスの一覧表示および加除訂正を行います。</p>
	</div>
	
	<?php if (@$topicsData): ?>
	
		<table class="topics">
			<tr>
				<th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
				<th><?php echo $this->Paginator->sort('date', '日付'); ?></th>
				<th width="30%"><?php echo $this->Paginator->sort('comment', 'コメント'); ?></th>
				<th width="30%"><?php echo $this->Paginator->sort('link', 'リンク'); ?></th>
				<th><?php echo $this->Paginator->sort('indication', '表示状況'); ?></th>
				<th>操作</th>
			</tr>
			
			<?php foreach(@$topicsData as $data): ?>
			
			<?php //pr($data); ?>
			
			<tr id="<?php echo h($data['Topic']['id']); ?>">
				<td><?php echo h($data['Topic']['id']); ?></td>
				<td><?php echo h(implode('/', unserialize($data['Topic']['date']))); ?></td>
				<td><?php echo h($this->SiteUtil->adjustComment($data['Topic']['comment'])); ?></td>
				<td><?php echo $this->SiteUtil->adjustLink(h($data['Topic']['link'])); ?><?php echo ($data['Topic']['link'] && $data['Topic']['tb']) ? '<i class="fa fa-share-square-o fa-1x fa-fw"></i>' : NULL; ?></td>
				<td align="center"><?php echo h($indicationList[$data['Topic']['indication']] . '中'); ?></td>
				<td align="center">
				<i class="fa fa-edit fa-1x fa-fw"></i><?php echo $this->Html->link('編集', array('action' => 'edit', $data['Topic']['id'])); ?>
				<i class="fa fa-trash fa-1x fa-fw"></i><?php echo $this->Html->link('削除', '#', array('class' => 'delete-topic', 'data-delete-id' => $data['Topic']['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		
	<?php endif;?>
	
</div>
