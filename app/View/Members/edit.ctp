<?php
$this->assign('description', '会員登録｜');
$this->assign('keywords', '会員登録,');
$this->assign('title', '会員登録｜');
?>

<?php
//KaiU広告用タグ(会員登録)
$this->start('kaiu');
echo '<script type="text/javascript" src="https://kaiu-marketing.com/visitor/advertising/script.js?site_code=6c9b86d83ba3f6507faa&key=0b3a645f301cf1ee9ff7&secret=4760808b0fa9c8233b5e"></script>';
$this->end();
?>

<section id="visualTc2">
	<div id="visualTc2Inr" class="br3">
		<h1>会員登録</h1>
		<p>会員登録で「非公開物件」を優先的にお届けします。<br>各項目ご入力の上、確認ページへとお進みください。<br>必須項目は必ずご入力お願いします。<br>「個人情報の取り扱いについて」にご同意の上、「同意して確認画面へ進む」ボタンを押してください。</p>
	</div><!-- /#visualTc2Iner -->
</section><!-- /#visualTc2 -->

<section id="form">
<div id="formIner">

<?php echo $this->Form->create('Member', array('name' => 'tocheck', 'novalidate' => true, 'action' => '/edit/#form', 'inputDefaults' => array('label' => false, 'div' => false))); ?>

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
			<tr class="<?php echo (isset($validationErrors['name'])) ? 'error' : ''; ?>">
				<th>お名前<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) 山田 太郎')); ?></td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['kana'])) ? 'error' : ''; ?>">
				<th>ふりがな<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('kana', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) やまだ たろう')); ?></td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['mail'])) ? 'error' : ''; ?>">
				<th>メールアドレス<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><span class="cap">次回ログインする際のIDになります</span><?php echo $this->Form->input('mail', array('type' => 'text', 'label' => false, 'class' => 'inp01 mode-disabled', 'placeholder' => '例) your-email@example.com')); ?></td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['mailcheck'])) ? 'error' : ''; ?>">
				<th>メールアドレス(確認)<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('mailcheck', array('type' => 'text', 'label' => false, 'class' => 'inp01 mode-disabled', 'placeholder' => '例) your-email@example.com')); ?></td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['password'])) ? 'error' : ''; ?>">
				<th>パスワード<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><span class="cap">次回ログインする際のパスワードになります。英数半角、4文字以上20文字以下で設定してください</span><?php echo $this->Form->input('password', array('type' => 'password', 'label' => false, 'class' => 'inp01', 'placeholder' => '******')); ?></td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['tel'])) ? 'error' : ''; ?>">
				<th>電話番号<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('tel', array('type' => 'text', 'label' => false, 'class' => 'inp01 mode-disabled', 'placeholder' => '例) 03-1234-1234')); ?></td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['pref'])) ? 'error' : ''; ?>">
				<th>都道府県<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('pref', array('type' => 'select', 'label' => false, 'class' => 'select-box', 'options' => $prefList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['address'])) ? 'error' : ''; ?>">
				<th>市区群町名・番地<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('address', array('type' => 'text', 'label' => false, 'class' => 'inp02', 'placeholder' => '例) 港区六本木')); ?></td>
			</tr>
		</tbody>
	</table>
	
	<h2>アンケート</h2>
	<table class="table-inquery" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>お探しの物件種別<br><span class="cap02">※複数選択可</span></th>
				<td><?php echo $this->Form->input('kind', array('type' => 'select', 'multiple'=> 'checkbox', 'label' => false, 'class' => 'kind', 'options' => $kindList)); ?></td>
			</tr>
			<tr>
				<th>ご希望の予算</th>
				<td><?php echo $this->Form->input('price_start', array('type' => 'select', 'label' => false, 'class' => 'select-box', 'options' => $priceStartList, 'empty' => '下限なし')); ?> ～ <?php echo $this->Form->input('price_end', array('type' => 'select', 'label' => false, 'class' => 'select-box', 'options' => $priceEndList, 'empty' => '上限なし')); ?></td>
			</tr>
			<tr>
				<th>お探しのエリア</th>
				<td><?php echo $this->Form->input('area', array('type' => 'text', 'label' => false, 'class' => 'inp02', 'placeholder' => '例) 港区六本木')); ?></td>
			</tr>
			<tr>
				<th>その他、ご希望の条件が<br>ございましたらご記入ください</th>
				<td><?php echo $this->Form->input('etc', array('type' => 'textarea', 'label' => false, 'class' => 'textarea01', 'placeholder' => '例) ご自由にご記入ください')); ?></td>
			</tr>
		</tbody>
	</table>
	
	<p class="form_privecy">弊社個人情報の取扱いにつきましては<a href="/privacypolicy/" target="_blank">こちらのページ</a>をご確認ください。<br>記載内容に同意して頂ける方は次へお進みください。</p>
	
	<p class="form_btn"><a href="javascript:;" onclick="javascript:tocheck.submit();"><span>個人情報保護方針を了承のうえ</span><br>入力内容を確認する</a></p>
<?php echo $this->Form->end(); ?>

<?php echo $this->element('modules/ssl'); ?>

</div><!-- /#formIner -->
</section><!-- /#form -->
