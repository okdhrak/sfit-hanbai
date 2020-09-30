<?php
$this->assign('description', '会員登録｜');
$this->assign('keywords', '会員登録,');
$this->assign('title', '会員登録｜');

//pr($val);
?>

<section id="visualTc2">
	<div id="visualTc2Inr" class="br3">
		<h1>会員登録</h1>
		<p>会員登録で「非公開物件」を優先的にお届けします。<br>各項目ご入力の上、確認ページへとお進みください。<br>必須項目は必ずご入力お願いします。<br>「個人情報の取り扱いについて」にご同意の上、「同意して確認画面へ進む」ボタンを押してください。</p>
	</div>
</section><!-- /#visualTc2 -->

<section id="form">
<div id="formIner">

<?php echo $this->Form->create('Member', array('name' => 'tosend', 'novalidate' => true, 'action' => '/confirm', 'inputDefaults' => array('label' => false, 'div' => false))); ?>

	<?php if (isset($validationErrors)): ?>
	<div class="missing">
		<p>以下の項目に誤りがございます。再度ご入力をお願いいたします。</p>
		<ul>
			<?php foreach ($validationErrors as $val): ?>
			<li>■<?php echo h($val[0]); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>
	
	<h2>お客様の情報</h2>
	<table class="table-inquery mb-30" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>お名前<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Member']['name']); ?></td>
			</tr>
			<tr>
				<th>ふりがな<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Member']['kana']); ?></td>
			</tr>
			<tr>
				<th>メールアドレス<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Member']['mail']); ?></td>
			</tr>
			<tr>
				<th>メールアドレス(確認)<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Member']['mailcheck']); ?></td>
			</tr>
			<tr>
				<th>パスワード<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->SiteUtil->strtohide($this->request->data['Member']['password'])); ?></td>
			</tr>
			<tr>
				<th>電話番号<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Member']['tel']); ?></td>
			</tr>
			<tr>
				<th>都道府県<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($prefList[$this->request->data['Member']['pref']]); ?></td>
			</tr>
			<tr>
				<th>市区群町名・番地<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Member']['address']); ?></td>
			</tr>
		</tbody>
	</table>
	
	<h2>アンケート</h2>
	<table class="table-inquery" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>お探しの物件種別<br><span class="cap02">※複数選択可</span></th>
				<td><?php echo @implode(' / ', $this->request->data['Member']['kind']); ?></td>
			</tr>
			<tr>
				<th>ご希望の予算</th>
				<td><?php echo h(@$priceStartList[$this->request->data['Member']['price_start']]); ?><?php echo ($this->request->data['Member']['price_start'] || $this->request->data['Member']['price_end']) ? '～' : NULL; ?><?php echo h(@$priceEndList[$this->request->data['Member']['price_end']]); ?></td>
			</tr>
			<tr>
				<th>お探しのエリア</th>
				<td><?php echo h($this->request->data['Member']['area']); ?></td>
			</tr>
			<tr>
				<th>その他、ご希望の条件が<br>ございましたらご記入ください</th>
				<td><?php echo nl2br(h($this->request->data['Member']['etc'])); ?></td>
			</tr>
		</tbody>
	</table>
	
	<?php echo $this->Form->input('postData', array('type' => 'hidden', 'value' => json_encode($this->request->data))); ?>
	
	<p class="form_btn"><input type="submit" name="_toback" class="confirm_btn" id="form_back" value="戻って内容を修正する"><input type="submit" name="_tosend" class="confirm_btn" id="form_send" value="この内容で送信する"></p>
<?php echo $this->Form->end(); ?>

</div>
</section><!-- /#form -->
