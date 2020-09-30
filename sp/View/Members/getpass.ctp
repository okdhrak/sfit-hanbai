<?php
$this->assign('description', 'パスワードの再発行｜');
$this->assign('keywords', 'パスワードの再発行,');
$this->assign('title', 'パスワードの再発行｜');

//pr($_SESSION);
//pr($_POST);
?>

<section>
	<div id="mainVisual" class="profile_h mb-40">
		<h1>MEMBER LOGIN</h1>
	</div>
</section>

<section id="form">
<div id="formIner">

<?php echo $this->Form->create('Member', array('name' => 'sendaddress', 'novalidate' => true)); ?>
	
	<?php echo $this->Session->flash(); ?>

	<h2>パスワードをお忘れのお客様へ</h2>
	<div class="form_box">
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>メールアドレス<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo $this->Form->input('mail', array('type' => 'text', 'label' => false, 'placeholder' => '例) your-email@example.com', 'class' => 'inp01 mode-disabled')); ?></div>
		</div>
	</div>
	<p style="text-align:center;">ご登録いただいているメールアドレスへ<br>パスワード再発行お手続きの<br>ご案内をお送りいたします。</p>
	
	<p class="form_btn"><a href="javascript:;" onclick="document.sendaddress.submit();">メールアドレスを確認のうえ<br>送信する</a></p>
	
<?php echo $this->Form->end(); ?>

</div><!-- /#formIner -->
</section><!-- /#form -->



