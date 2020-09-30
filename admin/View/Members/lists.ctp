<?php
$this->assign('description', '');
$this->assign('keywords', '');
$this->assign('title', '会員管理(会員一覧)');
?>
<h2><i class="fa fa-users fa-1x fa-fw"></i>会員管理</h2>

<div class="content members-lists">
	<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i>登録会員一覧(登録内容確認・削除)</h3>
		<p>登録済み会員の一覧表示および削除を行います。</p>
	</div>
	
	<?php if (@$membersData): ?>
	
		<table class="members">
			<tr>
				<th><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
				<th><?php echo $this->Paginator->sort('name', '氏名'); ?></th>
				<th><?php echo $this->Paginator->sort('kana', 'カナ'); ?></th>
				<th><?php echo $this->Paginator->sort('mail', 'メール'); ?></th>
				<th><?php echo $this->Paginator->sort('tel', '電話'); ?></th>
				<th><?php echo $this->Paginator->sort('created', '登録日'); ?></th>
				<th>操作</th>
			</tr>
			
			<?php foreach(@$membersData as $data): ?>
			
			<tr id="<?php echo h($data['Member']['id']); ?>">
				<td><?php echo h($data['Member']['id']); ?></td>
				<td><?php echo h($data['Member']['name']); ?></td>
				<td><?php echo h($data['Member']['kana']); ?></td>
				<td><?php echo h($data['Member']['mail']); ?></td>
				<td><?php echo h($data['Member']['tel']); ?></td>
				<td align="center"><?php echo h($data['Member']['created']); ?></td>
				<td align="center">
				<i class="fa fa-edit fa-1x fa-fw"></i><?php echo $this->Html->link('登録内容', array('action' => 'view', $data['Member']['id'])); ?>
				<i class="fa fa-trash fa-1x fa-fw"></i><?php echo $this->Html->link('削除', '#', array('class' => 'delete-member', 'data-delete-id' => $data['Member']['id'])); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		
	<?php endif;?>
	
</div>
