<?php
$this->assign('description', 'お問合せ｜');
$this->assign('keywords', 'お問合せ,');
$this->assign('title', 'お問合せ｜');

//pr($_POST);
//pr($this->request->data);
?>

<section id="visualTc2">
	<div id="visualTc2Inr" class="br3">
		<h1>お問合せ</h1>
		<p>お問合せページです。<br>各項目ご入力の上、確認ページへとお進みください。<br>必須項目は必ずご入力お願いします。<br>「個人情報の取り扱いについて」にご同意の上、「同意して確認画面へ進む」ボタンを押してください。</p>
	</div><!-- /#visualTc2Iner -->
</section><!-- /#visualTc2 -->

<section id="form">
<div id="formIner">
<?php echo $this->Form->create('Contact', array('name' => 'tosend', 'novalidate' => true, 'inputDefaults' => array('label' => false, 'div' => false/*, 'error' => false*/))); ?>

	<h2>お問合せ内容</h2>
	<table class="table-inquery" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>お問合せ内容<br><span class="cap02">※複数選択可</span></th>
				<td><?php echo @implode(' / ', $this->request->data['Contact']['kind']); ?>
				<?php //if (isset($this->request->data['Contact']['kind'])): foreach ($this->request->data['Contact']['kind'] as $key => $val): ?>
				<?php //echo ($key != 0) ? ' / ' : ''; ?>
				<?php //echo h($kindList[$val]); ?>
				<?php //endforeach; endif; ?></td>
			</tr>
			<tr>
				<th>お問合せ内容を<br>ご記入ください</th>
				<td><?php echo nl2br(h($this->request->data['Contact']['comment'])); ?></td>
			</tr>
		</tbody>
	</table>
	
	<h2>お客様の情報</h2>
	<table class="table-inquery mb-30" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>お名前<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Contact']['name']); ?></td>
			</tr>
			<tr>
				<th>ふりがな<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Contact']['kana']); ?></td>
			</tr>
			<tr>
				<th>メールアドレス<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Contact']['mail']); ?></td>
			</tr>
			<tr>
				<th>メールアドレス(確認)<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Contact']['mailcheck']); ?></td>
			</tr>
			<tr>
				<th>電話番号<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Contact']['tel']); ?></td>
			</tr>
			<tr>
				<th>都道府県<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($prefList[$this->request->data['Contact']['pref']]); ?></td>
			</tr>
			<tr>
				<th>市区群町名・番地<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Contact']['address']); ?></td>
			</tr>
		</tbody>
	</table>
	
	<?php echo $this->Form->input('postData', array('type' => 'hidden', 'value' => json_encode($this->request->data))); ?>
	
	<p class="form_btn"><input type="submit" name="_toback" class="confirm_btn" id="form_back" value="戻って内容を修正する"><input type="submit" name="_tosend" class="confirm_btn" id="form_send" value="この内容で送信する"></p>
<?php echo $this->Form->end(); ?>
</div><!-- /#formIner -->
</section><!-- /#form -->