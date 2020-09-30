<?php
$this->assign('description', '会員ログイン｜');
$this->assign('keywords', '会員ログイン,');
$this->assign('title', '会員ログイン｜');

//pr($_SESSION);
?>

<section id="visual5Tc">
	<div id="visualTc5Inr" class="br3">
		<h1>MEMBER LOGIN</h1>
	</div>
</section><!-- /#visualTc -->

<div id="bread">
</div><!-- /#bread -->

<div id="content">
	<div id="contentInr">
	
		<div id="main_02">
			<div id="main_02Inr">
			
			<?php echo $this->Session->flash(); ?>
			
			<h2 class="h2_txt_01">会員登録がお済みのお客様</h2>
			<?php echo $this->Form->create('Member', array('name' => 'tocheck', 'novalidate' => true)); ?>
			<?php //echo $this->Form->create('Member', array('name' => 'tocheck', 'novalidate' => true, 'action' => '/login', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
				<h3 class="h3_txt_01">メールアドレス・パスワードを入力してログインしてください。</h3>
				<table cellpadding="0" cellspacing="0" class="table-inquery mb-30">
					<tbody>
						<tr>
							<th>メールアドレス <span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
							<td><?php echo $this->Form->input('mail', array('type' => 'text', 'label' => false, 'placeholder' => '例) your-email@example.com', 'class' => 'inp01 mode-disabled')); ?></td>
						</tr>
						<tr>
							<th>パスワード <span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
							<td><?php echo $this->Form->input('password', array('type' => 'password', 'label' => false, 'placeholder' => '******', 'class' => 'inp01 mode-disabled')); ?></td>
						</tr>
					</tbody>
				</table>
				<p class="form_btn"><a href="javascript:;" onclick="document.tocheck.submit();">ログイン</a></p>
				<p class="link"><a href="/members/getpass">パスワードを忘れた方はこちら</a></p>
			<?php echo $this->Form->end(); ?>
			
			<h2 class="h2_txt_01">まだ会員登録をされていないお客様はこちら</h2>
			<p class="form_btn"><a href="/members/edit/">会員登録をする</a></p>
			
			</div><!-- /#mainInr -->
		</div><!-- /#main -->
	
		<?php echo $this->element('modules/ssl'); ?>
		
	</div><!-- /#contentInr -->
</div><!-- /#content -->
