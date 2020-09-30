<?php
$this->assign('description', '物件のお問合せ｜');
$this->assign('keywords', '物件のお問合せ,');
$this->assign('title', '物件のお問合せ｜');

//pr($_POST);
//pr($this->request->data);
//pr($validationErrors);
//pr($this->Session->flash());

//debug($messages);
?>

<section>
	<div id="mainVisual" class="br4">
		<h1>物件のお問合せ</h1>
		<p>物件のお問合せページです。<br>各項目ご入力の上、確認ページへとお進みください。<br>必須項目は必ずご入力お願いします。<br>「個人情報の取り扱いについて」にご同意の上、<br>「同意して確認画面へ進む」ボタンを押してください。</p>
	</div><!-- /#mainVisual -->
</section>

<section id="form">
<div id="formIner">
<?php echo $this->Form->create('Property', array('name' => 'tocheck', 'novalidate' => true, 'action' => '#form', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
	<?php echo $this->Form->input('d_mid', array('type' => 'hidden', 'value' => $this->request->data['Property']['d_mid'])); ?>
	<?php echo $this->Form->input('d_name', array('type' => 'hidden', 'value' => $this->request->data['Property']['d_name'])); ?>
	
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
	
	<h2>お問合せする物件をご確認ください</h2>
	<div id="prop_warp">
		<div class="prop">
			<div class="prop_title clrFix">
				<p class="prop_title_01 <?php echo h('cat0' . $this->request->data['Property']['d_category']); ?>"><?php echo h($categoryList[$this->request->data['Property']['d_category']]); ?>
					<?php echo $this->Form->input('d_category', array('type' => 'hidden', 'value' => $this->request->data['Property']['d_category'])); ?></p>
				<p class="prop_txt_01"><?php echo h($this->request->data['Property']['d_price']); ?>
					<?php echo $this->Form->input('d_price', array('type' => 'hidden', 'value' => $this->request->data['Property']['d_price'])); ?></p>
			</div>
			<dl class="prop_add clrFix">
				<dt class="prop_add_01">住所<span>：</span></dt>
				<dd class="prop_add_02"><?php echo h($this->request->data['Property']['d_address']); ?>
					<?php echo $this->Form->input('d_address', array('type' => 'hidden', 'value' => $this->request->data['Property']['d_address'])); ?></dd>
			</dl>
			<dl class="prop_add clrFix">
				<dt class="prop_add_01">アクセス<span>：</span></dt>
				<dd class="prop_add_02"><?php echo h($this->request->data['Property']['d_traffic']); ?>
					<?php echo $this->Form->input('d_traffic', array('type' => 'hidden', 'value' => $this->request->data['Property']['d_traffic'])); ?></dd>
			</dl>
		</div>
	</div><!-- /#prop_warp -->

	<h2>お客様の情報</h2>
	<div class="form_box">
		<div class="form_box_01 <?php echo (isset($validationErrors['kind'])) ? 'error' : ''; ?>">
			<p class="form_txt_01"><span class="sq">■</span>お問合せ内容<span class="i">[必須]</span></p>
			<p class="form_input_01"><?php echo $this->Form->input('kind', array('type' => 'select', 'multiple'=> 'checkbox', 'label' => false, 'class' => 'kind', 'options' => $kindList)); ?></p>
		</div>
		<div class="form_box_01">
			<p class="form_txt_01"><span class="sq">■</span>お問合せ内容</p>
			<p class="form_input_01"><?php echo $this->Form->input('comment', array('type' => 'textarea', 'label' => false, 'class' => 'textarea01', 'placeholder' => '例) ご自由にご記入ください')); ?></p>
		</div>
		<div class="form_box_01 <?php echo (isset($validationErrors['name'])) ? 'error' : ''; ?>">
			<p class="form_txt_01"><span class="sq">■</span>お名前<span class="i">[必須]</span></p>
			<p class="form_input_01"><?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) 山田 太郎')); ?></p>
		</div>
		<div class="form_box_01 <?php echo (isset($validationErrors['kana'])) ? 'error' : ''; ?>">
			<p class="form_txt_01"><span class="sq">■</span>ふりがな<span class="i">[必須]</span></p>
			<p class="form_input_01"><?php echo $this->Form->input('kana', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) やまだ たろう')); ?></p>
		</div>
		<div class="form_box_01 <?php echo (isset($validationErrors['mail'])) ? 'error' : ''; ?>">
			<p class="form_txt_01"><span class="sq">■</span>メールアドレス<span class="i">[必須]</span></p>
			<p class="form_input_01"><?php echo $this->Form->input('mail', array('type' => 'text', 'label' => false, 'class' => 'inp01 mode-disabled', 'placeholder' => '例) your-email@example.com')); ?></p>
		</div>
		<div class="form_box_01 <?php echo (isset($validationErrors['tel'])) ? 'error' : ''; ?>">
			<p class="form_txt_01"><span class="sq">■</span>電話番号<span class="i">[必須]</span></p>
			<p class="form_input_01"><?php echo $this->Form->input('tel', array('type' => 'text', 'label' => false, 'class' => 'inp01 mode-disabled', 'placeholder' => '例) 03-1234-1234')); ?></p>
		</div>
		<div class="form_box_01 <?php echo (isset($validationErrors['pref'])) ? 'error' : ''; ?>">
			<p class="form_txt_01"><span class="sq">■</span>都道府県<span class="i">[必須]</span></p>
			<p class="form_input_01"><?php echo $this->Form->input('pref', array('type' => 'select', 'label' => false, 'class' => 'select-box', 'options' => $prefList, 'empty' => '選択してください')); ?></p>
		</div>
		<div class="form_box_01 <?php echo (isset($validationErrors['address'])) ? 'error' : ''; ?>">
			<p class="form_txt_01"><span class="sq">■</span>市区群町名・番地<span class="i">[必須]</span></p>
			<p class="form_input_01"><?php echo $this->Form->input('address', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) 港区六本木')); ?></p>
		</div>
	</div>
	
	<p class="form_privecy">弊社個人情報の取扱いにつきましては<br><?php echo $this->Html->link('こちらのページ', array('controller' => 'pages', 'action' => 'display', 'privacypolicy'), array('target' => '_blank', 'escape' => false)); ?>をご確認ください。<br>記載内容に同意して頂ける方は<br>次へお進みください。</p>
	<p class="form_btn"><a href="javascript:;" onclick="javascript:tocheck.submit();">個人情報保護方針を了承のうえ<br><span>入力内容を確認する</span></a></p>
<?php echo $this->Form->end(); ?>
</div><!-- /#formIner -->
</section><!-- /#form -->
