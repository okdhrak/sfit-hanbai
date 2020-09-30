<?php
$this->assign('description', 'お問合せ｜');
$this->assign('keywords', 'お問合せ,');
$this->assign('title', 'お問合せ｜');

//pr($_POST);
//pr($this->request->data);
?>

<section>
	<div id="mainVisual" class="br4">
		<h1>お問合せ</h1>
		<p>お問合せページです。<br>各項目ご入力の上、確認ページへとお進みください。<br>必須項目は必ずご入力お願いします。<br>「個人情報の取り扱いについて」にご同意の上、<br>「同意して確認画面へ進む」ボタンを押してください。</p>
	</div>
</section>

<section id="form">
<div id="formIner">
<?php echo $this->Form->create('Contact', array('name' => 'tosend', 'novalidate' => true, 'action' => '/confirm', 'inputDefaults' => array('label' => false, 'div' => false/*, 'error' => false*/))); ?>
	
	<h2>お問合せ内容</h2>
	<div class="form_box">
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>お問合せ内容</div>
			<div class="form_input_01"><?php echo @implode('<br>', $this->request->data['Contact']['kind']); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>お問合せ内容をご記入ください</div>
			<div class="form_input_01"><?php echo nl2br(h($this->request->data['Contact']['comment'])); ?></div>
		</div>
	</div>
		
	<h2>お客様の情報</h2>
	<div class="form_box">
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>お名前<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo h($this->request->data['Contact']['name']); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>ふりがな<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo h($this->request->data['Contact']['kana']); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>メールアドレス<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo h($this->request->data['Contact']['mail']); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>メールアドレス(確認)<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo h($this->request->data['Contact']['mailcheck']); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>電話番号<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo h($this->request->data['Contact']['tel']); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>都道府県<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo h($prefList[$this->request->data['Contact']['pref']]); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>市区群町名・番地<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo h($this->request->data['Contact']['address']); ?></div>
		</div>
	</div>
	
	<?php echo $this->Form->input('postData', array('type' => 'hidden', 'value' => json_encode($this->request->data))); ?>
	
	<p class="form_btn mb-20"><input type="submit" name="_toback" class="confirm_btn" id="form_back" value="戻って内容を修正する"/></p>
	<p class="form_btn"><input type="submit" name="_tosend" class="confirm_btn" id="form_send" value="この内容で送信する"/></p>
		
<?php echo $this->Form->end(); ?>
</div><!-- /#formIner -->
</section><!-- /#form -->

