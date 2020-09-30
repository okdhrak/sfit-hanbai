<?php
$this->assign('description', '会員ログイン｜');
$this->assign('keywords', '会員ログイン,');
$this->assign('title', '会員ログイン｜');

//pr($_SESSION);
?>

<section>
	<div id="mainVisual" class="profile_h mb-40">
		<h1>MEMBER LOGIN</h1>
	</div>
</section>

<section id="form">
<div id="formIner">

<?php echo $this->Form->create('Member', array('name' => 'tocheck', 'novalidate' => true)); ?>
	
	<?php echo $this->Session->flash(); ?>

	<h2>会員登録がお済みのお客様</h2>
	<div class="form_box">
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>メールアドレス<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo $this->Form->input('mail', array('type' => 'text', 'label' => false, 'placeholder' => '例) your-email@example.com', 'class' => 'inp01 mode-disabled')); ?></div>
		</div>
		<div class="form_box_01">
			<div class="form_txt_01"><span class="sq">■</span>パスワード<span class="i">[必須]</span></div>
			<div class="form_input_01"><?php echo $this->Form->input('password', array('type' => 'password', 'label' => false, 'placeholder' => '******', 'class' => 'inp01 mode-disabled')); ?></div>
		</div>
	</div>
	
	<p class="form_btn"><a href="javascript:;" onclick="document.tocheck.submit();">ID・パスワードを入力して<br><span>ログイン</span></a></p>
	<p class="forget"><a href="/sp/members/getpass">パスワードを忘れた方はこちら</a></p>
	
<?php echo $this->Form->end(); ?>

	<p class="form_btn"><a href="/sp/members/edit/">会員登録をされていないお客様<br><span>会員登録をする</span></a></p>

</div><!-- /#formIner -->
</section><!-- /#form -->


