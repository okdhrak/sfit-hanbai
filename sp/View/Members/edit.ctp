<?php
$this->assign('description', '会員登録｜');
$this->assign('keywords', '会員登録,');
$this->assign('title', '会員登録｜');

//pr($val);
?>

<?php
//KaiU広告用タグ(会員登録)
$this->start('kaiu');
echo '<script type="text/javascript" src="https://kaiu-marketing.com/visitor/advertising/script.js?site_code=6c9b86d83ba3f6507faa&key=0b3a645f301cf1ee9ff7&secret=4760808b0fa9c8233b5e"></script>';
$this->end();
?>

<section>
	<div id="mainVisual" class="br4">
		<h1>会員登録</h1>
		<p>会員登録で「非公開物件」を優先的にお届けします。<br>各項目ご入力の上、確認ページへとお進みください。<br>必須項目は必ずご入力お願いします。<br>「個人情報の取り扱いについて」にご同意の上、<br>「同意して確認画面へ進む」ボタンを押してください。</p>
	</div><!-- /#mainVisual -->
</section>

<section id="form">
<div id="formIner">
<?php echo $this->Form->create('Member', array('name' => 'tocheck', 'novalidate' => true, 'action' => '/edit/#form', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
	
	<?php if (isset($validationErrors)): ?>
	<div class="missing">
		<ul>
			<?php foreach ($validationErrors as $val): ?>
			<li>■<?php echo h($val[0]); ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>
	
	<h2>お客様の情報</h2>
	<div class="form_box">
		<div class="form_box_01 <?php echo (isset($validationErrors['name'])) ? 'error' : ''; ?>">
			<div class="form_txt_01"><span class="sq">■</span>お名前<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) 山田 太郎')); ?></div>
		</div>
		<div class="form_box_01 <?php echo (isset($validationErrors['kana'])) ? 'error' : ''; ?>">
			<div class="form_txt_01"><span class="sq">■</span>ふりがな<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo $this->Form->input('kana', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) やまだ たろう')); ?></div>
		</div>
		<div class="form_box_01 <?php echo (isset($validationErrors['mail'])) ? 'error' : ''; ?>">
			<div class="form_txt_01"><span class="sq">■</span>メールアドレス<span class="i">[必須]</span></div>
			<p class="form_caption_01">次回ログインする際のIDになります</p>
			<div class="form_input_01"><?php echo $this->Form->input('mail', array('type' => 'text', 'label' => false, 'class' => 'inp01 mode-disabled', 'placeholder' => '例) your-email@example.com')); ?></div>
		</div>
		<div class="form_box_01 <?php echo (isset($validationErrors['mailcheck'])) ? 'error' : ''; ?>">
			<div class="form_txt_01"><span class="sq">■</span>メールアドレス(確認)<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo $this->Form->input('mailcheck', array('type' => 'text', 'label' => false, 'class' => 'inp01 mode-disabled', 'placeholder' => '例) your-email@example.com')); ?></div>
		</div>
		<div class="form_box_01 <?php echo (isset($validationErrors['password'])) ? 'error' : ''; ?>">
			<div class="form_txt_01"><span class="sq">■</span>パスワード<span class="i">[必須]</span></div>
			<p class="form_caption_01">次回ログインする際のパスワードになります。英数半角、6文字以上で設定してください</p>
			<div class="form_input_01"><?php echo $this->Form->input('password', array('type' => 'password', 'label' => false, 'class' => 'inp01', 'placeholder' => '******')); ?></div>
		</div>
		<div class="form_box_01 <?php echo (isset($validationErrors['tel'])) ? 'error' : ''; ?>">
			<div class="form_txt_01"><span class="sq">■</span>電話番号<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo $this->Form->input('tel', array('type' => 'text', 'label' => false, 'class' => 'inp01 mode-disabled', 'placeholder' => '例) 03-1234-1234')); ?></div>
		</div>
		<div class="form_box_01 <?php echo (isset($validationErrors['pref'])) ? 'error' : ''; ?>">
			<div class="form_txt_01"><span class="sq">■</span>都道府県<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo $this->Form->input('pref', array('type' => 'select', 'label' => false, 'class' => 'select-box', 'options' => $prefList, 'empty' => '選択してください')); ?></div>
		</div>
		<div class="form_box_01 <?php echo (isset($validationErrors['address'])) ? 'error' : ''; ?>">
			<div class="form_txt_01"><span class="sq">■</span>市区群町名・番地<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo $this->Form->input('address', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) 港区六本木')); ?></div>
		</div>
	</div>
	
	<h2>アンケート</h2>
	<div class="form_box">
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>お探しの物件種別<span class="caption">※複数選択可</span></div>
			<div class="form_input_01"><?php echo $this->Form->input('kind', array('type' => 'select', 'multiple'=> 'checkbox', 'label' => false, 'class' => 'kind', 'options' => $kindList)); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>ご希望の予算</div>
			<div class="form_input_01"><?php echo $this->Form->input('price_start', array('type' => 'select', 'label' => false, 'class' => 'select-box', 'options' => $priceStartList, 'empty' => '下限なし')); ?><br>～<br><?php echo $this->Form->input('price_end', array('type' => 'select', 'label' => false, 'class' => 'select-box', 'options' => $priceEndList, 'empty' => '上限なし')); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>お探しのエリア</div>
			<div class="form_input_01"><?php echo $this->Form->input('area', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) 港区六本木')); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>その他、ご希望の条件が<br>ございましたらご記入ください</div>
			<div class="form_input_01"><?php echo $this->Form->input('etc', array('type' => 'textarea', 'label' => false, 'class' => 'textarea01', 'placeholder' => '例) ご自由にご記入ください')); ?></div>
		</div>
	</div>
	
	<p class="form_privecy">弊社個人情報の取扱いにつきましては<br><?php echo $this->Html->link('こちらのページ', array('controller' => 'pages', 'action' => 'display', 'privacypolicy'), array('target' => '_blank', 'escape' => false)); ?>をご確認ください。<br>記載内容に同意して頂ける方は<br>次へお進みください。</p>
	<p class="form_btn"><a href="javascript:;" onclick="javascript:tocheck.submit();">個人情報保護方針を了承のうえ<br><span>入力内容を確認する</span></a></p>

<?php echo $this->Form->end(); ?>
</div><!-- /#formIner -->
</section><!-- /#form -->
