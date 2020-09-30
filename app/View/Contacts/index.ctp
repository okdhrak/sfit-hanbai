<?php
$this->assign('description', 'お問合せ｜');
$this->assign('keywords', 'お問合せ,');
$this->assign('title', 'お問合せ｜');
?>

<?php
//KaiU広告用タグ(お問合せ)
$this->start('kaiu');
echo '<script type="text/javascript" src="https://kaiu-marketing.com/visitor/advertising/script.js?site_code=b89d20143226a4d2f023&key=2c74554be98c17280fbc&secret=30d64898046380ffa561"></script>';
$this->end();
?>

<section id="visualTc2">
	<div id="visualTc2Inr" class="br3">
		<h1>お問合せ</h1>
		<p>お問合せページです。<br>各項目ご入力の上、確認ページへとお進みください。<br>必須項目は必ずご入力お願いします。<br>「個人情報の取り扱いについて」にご同意の上、「同意して確認画面へ進む」ボタンを押してください。</p>
	</div><!-- /#visualTc2Iner -->
</section><!-- /#visualTc2 -->

<section id="form">
<div id="formIner">
<?php echo $this->Form->create('Contact', array('name' => 'tocheck', 'novalidate' => true, 'action' => '#form', 'inputDefaults' => array('label' => false, 'div' => false/*, 'error' => false*/))); ?>

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

	<h2>お問合せ内容</h2>
	<table class="table-inquery" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>お問合せ内容<br><span class="cap02">※複数選択可</span></th>
				<td><?php echo $this->Form->input('kind', array('type' => 'select', 'multiple'=> 'checkbox', 'label' => false, 'class' => 'kind', 'options' => $kindList)); ?></td>
			</tr>
			<tr>
				<th>お問合せ内容を<br>ご記入ください</th>
				<td><?php echo $this->Form->input('comment', array('type' => 'textarea', 'label' => false, 'class' => 'textarea01', 'placeholder' => '例) ご自由にご記入ください')); ?></td>
			</tr>
		</tbody>
	</table>

	<h2>お客様の情報</h2>
	<table class="table-inquery mb-30" cellspacing="0" cellpadding="0">
		<tbody>
			<tr class="<?php echo (isset($validationErrors['name'])) ? 'error' : ''; ?>">
				<th>お名前<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php //echo $this->Form->error('name', 'お名前が未入力です', array('wrap' => 'p', 'class' => 'error-text')); ?>
				<?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) 山田 太郎')); ?>
				</td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['kana'])) ? 'error' : ''; ?>">
				<th>ふりがな<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('kana', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) やまだ たろう')); ?></td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['mail'])) ? 'error' : ''; ?>">
				<th>メールアドレス<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('mail', array('type' => 'text', 'label' => false, 'class' => 'inp01 mode-disabled', 'placeholder' => '例) your-email@example.com')); ?></td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['mailcheck'])) ? 'error' : ''; ?>">
				<th>メールアドレス(確認)<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('mailcheck', array('type' => 'text', 'label' => false, 'class' => 'inp01 mode-disabled', 'placeholder' => '例) your-email@example.com')); ?></td>
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

	<p class="form_privecy">弊社個人情報の取扱いにつきましては<a href="/privacypolicy/" target="_blank">こちらのページ</a>をご確認ください。<br>記載内容に同意して頂ける方は次へお進みください。</p>

	<p class="form_btn"><a href="javascript:;" onclick="javascript:tocheck.submit();"><span>個人情報保護方針を了承のうえ</span><br>入力内容を確認する</a></p>
<?php echo $this->Form->end(); ?>

<?php echo $this->element('modules/ssl'); ?>

</div><!-- /#formIner -->
</section><!-- /#form -->
