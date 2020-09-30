<?php
$this->assign('description', '会員登録｜');
$this->assign('keywords', '会員登録,');
$this->assign('title', '会員登録｜');

//pr($val);
?>

<section>
	<div id="mainVisual" class="br4">
		<h1>会員登録</h1>
		<p>会員登録で「非公開物件」を優先的にお届けします。<br>各項目ご入力の上、確認ページへとお進みください。<br>必須項目は必ずご入力お願いします。<br>「個人情報の取り扱いについて」にご同意の上、<br>「同意して確認画面へ進む」ボタンを押してください。</p>
	</div><!-- /#mainVisual -->
</section>

<section id="form">
<div id="formIner">
<?php echo $this->Form->create('Member', array('name' => 'tosend', 'novalidate' => true, 'action' => '/confirm', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
	
	<h2>お客様の情報</h2>
	<div class="form_box">
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>お名前<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo h($this->request->data['Member']['name']); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>ふりがな<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo h($this->request->data['Member']['kana']); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>メールアドレス<span class="i">[必須]</span></div>
			<p class="form_caption_01">次回ログインする際のIDになります</p>
			<div class="form_input_01"><?php echo h($this->request->data['Member']['mail']); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>メールアドレス(確認)<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo h($this->request->data['Member']['mailcheck']); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>パスワード<span class="i">[必須]</span></div>
			<p class="form_caption_01">次回ログインする際のパスワードになります。英数半角、6文字以上で設定してください</p>
			<div class="form_input_01"><?php echo h($this->SiteUtil->strtohide($this->request->data['Member']['password'])); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>電話番号<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo h($this->request->data['Member']['tel']); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>都道府県<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo h($prefList[$this->request->data['Member']['pref']]); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>市区群町名・番地<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo h($this->request->data['Member']['address']); ?></div>
		</div>
	</div>
	
	<h2>アンケート</h2>
	<div class="form_box">
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>お探しの物件種別<span class="caption">※複数選択可</span></div>
			<div class="form_input_01"><?php echo @implode('<br>', $this->request->data['Member']['kind']); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>ご希望の予算</div>
			<div class="form_input_01"><?php echo h(@$priceStartList[$this->request->data['Member']['price_start']]); ?><?php echo ($this->request->data['Member']['price_start'] || $this->request->data['Member']['price_end']) ? '～' : NULL; ?><?php echo h(@$priceEndList[$this->request->data['Member']['price_end']]); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>お探しのエリア</div>
			<div class="form_input_01"><?php echo h($this->request->data['Member']['area']); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>その他、ご希望の条件が<br>ございましたらご記入ください</div>
			<div class="form_input_01"><?php echo nl2br(h($this->request->data['Member']['etc'])); ?></div>
		</div>
	</div>
	
	<?php echo $this->Form->input('postData', array('type' => 'hidden', 'value' => json_encode($this->request->data))); ?>
	
	<p class="form_btn mb-20"><input type="submit" name="_toback" class="confirm_btn" id="form_back" value="戻って内容を修正する"/></p>
	<p class="form_btn"><input type="submit" name="_tosend" class="confirm_btn" id="form_send" value="この内容で送信する"/></p>

<?php echo $this->Form->end(); ?>
</div><!-- /#formIner -->
</section><!-- /#form -->
