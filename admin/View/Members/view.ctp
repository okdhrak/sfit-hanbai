<?php
$this->assign('description', '');
$this->assign('keywords', '');
$this->assign('title', '会員管理(登録内容確認)');
?>
<h2><i class="fa fa-users fa-1x fa-fw"></i>会員管理</h2>

<div class="content articles-view">
	<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i>登録内容確認</h3>
		<p>会員情報の登録内容確認を行います。</p>
	</div>
	
	<?php echo $this->Form->create('Member', array('inputDefaults' => array('label' => false, 'div' => false))); ?>
		<table border="0" cellpadding="0" cellspacing="0" class="form-wrap">
			<tr>
				<th colspan="2" style="text-align:center;">お客様情報</th>
			</tr>
			<tr>
				<th>名前</th>
				<td><?php echo h($memberData['Member']['name']); ?></td>
			</tr>
			<tr>
				<th>カナ</th>
				<td><?php echo h($memberData['Member']['kana']); ?></td>
			</tr>
			<tr>
				<th>メール</th>
				<td><?php echo h($memberData['Member']['mail']); ?></td>
			</tr>
			<tr>
				<th>電話</th>
				<td><?php echo h($memberData['Member']['tel']); ?></td>
			</tr>
			<tr>
				<th colspan="2" style="text-align:center;">アンケート内容</th>
			</tr>
			<tr>
				<th>都道府県</th>
				<td><?php echo h($memberData['Member']['pref']); ?></td>
			</tr>
			<tr>
				<th>市区群町名・番地</th>
				<td><?php echo h($memberData['Member']['address']); ?></td>
			</tr>
			<tr>
				<th>種別</th>
				<td><?php echo h($memberData['Member']['kind']); ?></td>
			</tr>
			<tr>
				<th>価格</th>
				<td><?php echo h($memberData['Member']['price']); ?></td>
			</tr>
			<tr>
				<th>その他</th>
				<td><?php echo nl2br(h($memberData['Member']['etc'])); ?></td>
			</tr>
			<tr>
				<th>登録日</th>
				<td><?php echo h($memberData['Member']['created']); ?></td>
			</tr>
			<tr>
				<th>最終更新日時</th>
				<td><?php echo h($memberData['Member']['modified']); ?></td>
			</tr>
			
			<tr>
				<td colspan="2" style="background:#f2f2f2;"><div class="submit"><?php echo $this->Form->button('　一覧へ戻る　', array('type' => 'button', 'onClick' => 'history.back()')); ?></div></td>
			</tr>
		</table>
	<?php echo $this->Form->end(); ?>
	
</div>
