<?php
$this->assign('description', '物件のお問合せ｜');
$this->assign('keywords', '物件のお問合せ,');
$this->assign('title', '物件のお問合せ｜');

//pr($_POST);
//pr($this->request->data);
?>

<section>
	<div id="mainVisual" class="br4">
		<h1>物件のお問合せ</h1>
		<p>物件のお問合せページです。<br>各項目ご入力の上、確認ページへとお進みください。<br>必須項目は必ずご入力お願いします。<br>「個人情報の取り扱いについて」にご同意の上、<br>「同意して確認画面へ進む」ボタンを押してください。</p>
	</div><!-- /#mainVisual -->
</section>

<section id="form">
<div id="formIner">
<?php echo $this->Form->create('Property', array('name' => 'tosend', 'novalidate' => true, 'action' => '/confirm', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
	
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
		<div class="form_box_01">
			<p class="form_txt_01"><span class="sq">■</span>お問合せ内容<span class="i">[必須]</span></p>
			<p class="form_input_01"><?php echo @implode(' / ', $this->request->data['Property']['kind']); ?></p>
		</div>
		<div class="form_box_01">
			<p class="form_txt_01"><span class="sq">■</span>お問合せ内容</p>
			<p class="form_input_01"><?php echo nl2br(h($this->request->data['Property']['comment'])); ?></p>
		</div>
		<div class="form_box_01">
			<p class="form_txt_01"><span class="sq">■</span>お名前<span class="i">[必須]</span></p>
			<p class="form_input_01"><?php echo h($this->request->data['Property']['name']); ?></p>
		</div>
		<div class="form_box_01">
			<p class="form_txt_01"><span class="sq">■</span>ふりがな<span class="i">[必須]</span></p>
			<p class="form_input_01"><?php echo h($this->request->data['Property']['kana']); ?></p>
		</div>
		<div class="form_box_01">
			<p class="form_txt_01"><span class="sq">■</span>メールアドレス<span class="i">[必須]</span></p>
			<p class="form_input_01"><?php echo h($this->request->data['Property']['mail']); ?></p>
		</div>
		<div class="form_box_01">
			<p class="form_txt_01"><span class="sq">■</span>電話番号<span class="i">[必須]</span></p>
			<p class="form_input_01"><?php echo h($this->request->data['Property']['tel']); ?></p>
		</div>
		<div class="form_box_01">
			<p class="form_txt_01"><span class="sq">■</span>都道府県<span class="i">[必須]</span></p>
			<p class="form_input_01"><?php echo h($prefList[$this->request->data['Property']['pref']]); ?></p>
		</div>
		<div class="form_box_01">
			<p class="form_txt_01"><span class="sq">■</span>市区群町名・番地<span class="i">[必須]</span></p>
			<p class="form_input_01"><?php echo h($this->request->data['Property']['address']); ?></p>
		</div>
	</div>
	
	<?php echo $this->Form->input('postData', array('type' => 'hidden', 'value' => json_encode($this->request->data))); ?>
	
	<p class="form_btn mb-20"><input type="submit" name="_toback" class="confirm_btn" id="form_back" value="戻って内容を修正する"/></p>
	<p class="form_btn"><input type="submit" name="_tosend" class="confirm_btn" id="form_send" value="この内容で送信する"/></p>
	
<?php echo $this->Form->end(); ?>
</div><!-- /#formIner -->
</section><!-- /#form -->
