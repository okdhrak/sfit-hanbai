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
		<div class="complete_txt">
			<p class="complete_txt_01">ご登録いただいているメールアドレスへ、<br>再発行手続きのご案内を送信しました。<br>内容をご確認のうえパスワード<br>再発行手続きをお願いいたします。</p>
			<p class="complete_txt_01 mb-00"><?php echo $this->Html->link('TOPページへ戻る', '/', array('escape' => false)); ?></p>
		</div>
	</div><!-- /#formIner -->
</section><!-- /#form -->
