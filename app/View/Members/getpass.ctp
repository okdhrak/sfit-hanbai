<?php
$this->assign('description', 'パスワードの再発行｜');
$this->assign('keywords', 'パスワードの再発行,');
$this->assign('title', 'パスワードの再発行｜');

//pr($_SESSION);
//pr($_POST);
?>

<section id="visual5Tc">
	<div id="visualTc5Inr" class="br3">
		<h1>MEMBER LOGIN</h1>
	</div><!-- /#visualTcIner -->
</section><!-- /#visualTc -->

<div id="bread">
</div><!-- /#bread -->

<div id="content">
	<div id="contentInr">
		<div id="main_02">
			<div id="main_02Inr">
			
			<?php echo $this->Session->flash(); ?>
			
			<h2 class="h2_txt_01">パスワードをお忘れのお客様へ</h2>
			<?php echo $this->Form->create('Member', array('name' => 'sendaddress', 'novalidate' => true)); ?>
				<h3 class="h3_txt_01">ご登録いただいているメールアドレスへパスワード再発行のご案内をお送りいたします。<br>メールアドレスをご入力の上、「送信する」ボタンをクリックしてください。</h3>
				<table cellpadding="0" cellspacing="0" class="table-inquery mb-30">
					<tbody>
						<tr>
							<th>メールアドレス <span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
							<td><?php echo $this->Form->input('mail', array('type' => 'text', 'label' => false, 'placeholder' => '例) your-email@example.com', 'class' => 'inp01 mode-disabled')); ?></td>
						</tr>
					</tbody>
				</table>
				<p class="form_btn"><a href="javascript:;" onclick="document.sendaddress.submit();">送信する</a></p>
			<?php echo $this->Form->end(); ?>
			
			</div>
		</div>
	</div>
</div><!-- /#content -->
