<?php
$this->assign('description', '物件のリクエスト｜');
$this->assign('keywords', '物件のリクエスト,');
$this->assign('title', '物件のリクエスト｜');
?>

<?php
//KaiU広告用タグ(物件のリクエスト)
$this->start('kaiu');
echo '<script type="text/javascript" src="https://kaiu-marketing.com/visitor/advertising/script.js?site_code=fedfe6c4fd2d7dbb7eec&key=abbb2e0eb939aaad16b6&secret=1ec52f6c39faabd77d46"></script>';
$this->end();
?>

<section id="visualTc2">
	<div id="visualTc2Inr" class="br3">
		<h1>物件のリクエスト</h1>
		<p>物件のリクエストページです。<br>各項目ご入力の上、確認ページへとお進みください。<br>必須項目は必ずご入力お願いします。<br>「個人情報の取り扱いについて」にご同意の上、「同意して確認画面へ進む」ボタンを押してください。</p>
	</div><!-- /#visualTc2Iner -->
</section><!-- /#visualTc2 -->

<section id="form">
<div id="formIner">
<?php echo $this->Form->create('Request', array('name' => 'tocheck', 'novalidate' => true, 'action' => '#form', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
	
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
	
	<h2>ご要望の物件について</h2>
	<table class="table-inquery mb-30" cellspacing="0" cellpadding="0">
		<tbody>
			<tr class="<?php echo (isset($validationErrors['m_kind'])) ? 'error' : ''; ?>">
				<th>ご希望の物件種別<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('m_kind', array('type' => 'select', 'multiple'=> 'checkbox', 'label' => false, 'class' => 'kind', 'options' => $kindList)); ?></td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['m_address'])) ? 'error' : ''; ?>">
				<th>ご希望の住所<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('m_address', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) 港区')); ?></td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['m_line'])) ? 'error' : ''; ?>">
				<th>ご希望の路線<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('m_line', array('type' => 'text', 'label' => false, 'class' => 'inp02', 'placeholder' => '例) 山手線')); ?></td>
			</tr>
			<tr>
				<th>建物(専有)面積</th>
				<td><?php echo $this->Form->input('m_extent', array('type' => 'text', 'label' => false, 'class' => 'inp03 mode-disabled', 'placeholder' => '例) 500')); ?><?php echo $this->Form->input('m_extent_unit', array('type' => 'radio', 'label' => true, 'legend' => false, 'class' => '', 'before' => ' ', 'separator' => ' ', 'value' => (@$this->request->data['Request']['m_extent_unit']) ? $this->request->data['Request']['m_extent_unit'] : NULL, 'options' => $unitList)); ?></td>
			</tr>
			<tr>
				<th>土地面積</th>
				<td><?php echo $this->Form->input('m_site', array('type' => 'text', 'label' => false, 'class' => 'inp03 mode-disabled', 'placeholder' => '例) 1000')); ?><?php echo $this->Form->input('m_site_unit', array('type' => 'radio', 'label' => true, 'legend' => false, 'class' => '', 'before' => ' ', 'separator' => ' ', 'value' => (@$this->request->data['Request']['m_site_unit']) ? $this->request->data['Request']['m_site_unit'] : NULL, 'options' => $unitList)); ?></td>
			</tr>
			<tr>
				<th>間取り</th>
				<td><?php echo $this->Form->input('m_type', array('type' => 'select', 'multiple'=> 'checkbox', 'label' => false, 'class' => 'kind', 'options' => $typeList)); ?></td>
			</tr>
			<tr>
				<th>ご希望価格</th>
				<td><?php echo $this->Form->input('m_price', array('type' => 'text', 'label' => false, 'class' => 'inp03 mode-disabled', 'after' => ' 万円位', 'placeholder' => '例) 1000')); ?></td>
			</tr>
			<tr>
				<th>お買い換え</th>
				<td><?php echo $this->Form->input('m_replacing', array('type' => 'radio', 'label' => true, 'legend' => false, 'div' => true, 'class' => '', 'before' => '', 'separator' => ' ', 'value' => (@$this->request->data['Request']['m_replacing']) ? $this->request->data['Request']['m_replacing'] : NULL, 'options' => $existencesList)); ?></td>
			</tr>
			<tr>
				<th>購入希望時期</th>
				<td><?php echo $this->Form->input('m_period', array('type' => 'radio', 'label' => true, 'legend' => false, 'div' => true, 'class' => '', 'before' => '', 'separator' => ' ', 'value' => (@$this->request->data['Request']['m_period']) ? $this->request->data['Request']['m_period'] : NULL, 'options' => $periodList)); ?></td>
			</tr>
			<tr>
				<th>お問合せ内容を<br>ご記入ください</th>
				<td><?php echo $this->Form->input('m_comment', array('type' => 'textarea', 'label' => false, 'class' => 'textarea01', 'placeholder' => '例) 購入事情または購入に関してのご要望')); ?></td>
			</tr>
		</tbody>
	</table>
	
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
				<td><?php echo $this->Form->input('mail', array('type' => 'text', 'label' => false, 'class' => 'inp01 mode-disabled', 'placeholder' => '例) your-email@example.com')); ?></td>
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