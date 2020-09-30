<?php
$this->assign('description', 'ご売却・ご相談、審査のお申込み｜');
$this->assign('keywords', 'ご売却・ご相談、審査のお申込み,');
$this->assign('title', 'ご売却・ご相談、審査のお申込み｜');

//pr($_POST);
//pr($this->request->data);
//pr($validationErrors);
//pr($this->Session->flash());
//debug($messages);
?>

<section id="visualTc2">
	<div id="visualTc2Inr" class="br3">
		<h1>ご売却・ご相談、審査のお申込み</h1>
		<p>物件のご売却や審査等に関するお問合わせページです。<br>各項目ご入力の上、確認ページへとお進みください。<br>必須項目は必ずご入力お願いします。<br>「個人情報の取り扱いについて」にご同意の上、「同意して確認画面へ進む」ボタンを押してください。</p>
	</div><!-- /#visualTc2Iner -->
</section><!-- /#visualTc2 -->

<section id="form">
<div id="formIner">
<?php echo $this->Form->create('Appraise', array('name' => 'tocheck', 'novalidate' => true, 'action' => '#form', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
	
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
	
	<h2>ご相談内容について</h2>
	<table class="table-inquery mb-30" cellspacing="0" cellpadding="0">
		<tbody>
			<tr class="<?php echo (isset($validationErrors['m_kind'])) ? 'error' : ''; ?>">
				<th>売却物件/種別<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('m_kind', array('type' => 'select', 'multiple'=> 'checkbox', 'label' => false, 'class' => 'kind', 'options' => $kindList)); ?></td>
			</tr>
			<tr>
				<th>建物名</th>
				<td><?php echo $this->Form->input('m_name', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) ○○マンション')); ?></td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['m_pcode2'])) ? 'error' : ''; ?>">
				<th>売却物件/郵便番号<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><span id="loading"><img src="/img/loading.gif"></span><?php echo $this->Form->input('m_pcode1', array('type' => 'text', 'label' => false, 'class' => 'inp03 mode-disabled pcode1', 'maxlength' => '3', 'placeholder' => '例) 000')); ?> - <?php echo $this->Form->input('m_pcode2', array('type' => 'text', 'label' => false, 'class' => 'inp03 mode-disabled pcode2', 'maxlength' => '4', 'placeholder' => '例) 0000')); ?></td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['m_pref'])) ? 'error' : ''; ?>">
				<th>売却物件/都道府県<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('m_pref', array('type' => 'select', 'label' => false, 'id' => 'm_pref', 'class' => 'select-box', 'options' => $prefList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr class="<?php echo (isset($validationErrors['m_address'])) ? 'error' : ''; ?>">
				<th>売却物件/<br>市区群町名・番地<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo $this->Form->input('m_address', array('type' => 'text', 'label' => false, 'id' => 'm_address', 'class' => 'inp02', 'placeholder' => '例) 港区六本木')); ?></td>
			</tr>
			<tr>
				<th>建物(専有)面積</th>
				<td><?php echo $this->Form->input('m_extent', array('type' => 'text', 'label' => false, 'class' => 'inp03 mode-disabled', 'placeholder' => '例) 500')); ?><?php echo $this->Form->input('m_extent_unit', array('type' => 'radio', 'label' => true, 'legend' => false, 'class' => '', 'before' => ' ', 'separator' => ' ', 'value' => (@$this->request->data['Appraise']['m_extent_unit']) ? $this->request->data['Appraise']['m_extent_unit'] : NULL, 'options' => $unitList)); ?></td>
			</tr>
			<tr>
				<th>土地面積</th>
				<td><?php echo $this->Form->input('m_site', array('type' => 'text', 'label' => false, 'class' => 'inp03 mode-disabled', 'placeholder' => '例) 1000')); ?><?php echo $this->Form->input('m_site_unit', array('type' => 'radio', 'label' => true, 'legend' => false, 'class' => '', 'before' => ' ', 'separator' => ' ', 'value' => (@$this->request->data['Appraise']['m_site_unit']) ? $this->request->data['Appraise']['m_site_unit'] : NULL, 'options' => $unitList)); ?></td>
			</tr>
			<tr>
				<th>間取り</th>
				<td><?php echo $this->Form->input('m_type', array('type' => 'select', 'multiple'=> 'checkbox', 'label' => false, 'class' => 'kind', 'options' => $typeList)); ?></td>
			</tr>
			<tr>
				<th>竣工年月</th>
				<td><?php echo $this->Form->input('m_old', array(
						'type' => 'date',
						'dateFormat' => 'YM',
						'monthNames' => false,
						'empty' => '選択してください',
						'minYear' => date('Y') -60,
						'maxYear' => date('Y') +1,
						'separator' => ' 年 ',
						'after' => ' 月',
					)); ?></td>
			</tr>
			<tr>
				<th>ご希望価格</th>
				<td><?php echo $this->Form->input('m_price', array('type' => 'text', 'label' => false, 'class' => 'inp03 mode-disabled', 'after' => ' 万円位', 'placeholder' => '例) 1000')); ?></td>
			</tr>
			<tr>
				<th>お買い換え</th>
				<td><?php echo $this->Form->input('m_replacing', array('type' => 'radio', 'label' => true, 'legend' => false, 'div' => true, 'class' => '', 'before' => '', 'separator' => ' ', 'value' => (@$this->request->data['Appraise']['m_replacing']) ? $this->request->data['Appraise']['m_replacing'] : NULL, 'options' => $existencesList)); ?></td>
			</tr>
			<tr>
				<th>売却希望時期</th>
				<td><?php echo $this->Form->input('m_period', array('type' => 'radio', 'label' => true, 'legend' => false, 'div' => true, 'class' => '', 'before' => '', 'separator' => ' ', 'value' => (@$this->request->data['Appraise']['m_period']) ? $this->request->data['Appraise']['m_period'] : NULL, 'options' => $periodList)); ?></td>
			</tr>
			<tr>
				<th>お問合せ内容を<br>ご記入ください</th>
				<td><?php echo $this->Form->input('m_comment', array('type' => 'textarea', 'label' => false, 'class' => 'textarea01', 'placeholder' => '例) 売却事情(買い替え、建物老朽化、転勤、資産処分、相続など)、または売却に関してのご要望')); ?></td>
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