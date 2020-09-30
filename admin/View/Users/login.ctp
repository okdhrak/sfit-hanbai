<div class="users-login">
	<p style="margin:50px 0 20px 50px;">www.sfit-hanbai.comログイン</p>
	
	<h3 class="mb10" style="color:#FF0000; margin-left:50px;">※これは旧管理画面です。<br>入力いただいた内容は反映されません。</h3>
	<p class="mb20" style="margin-left:50px; font-weight:bold;"><a href="http://sfit-hanbai.com/admin">>>新サイトはこちら<<</a></p>
	
	<div class="input-area">
		<?php echo $this->Form->create('User', array('novalidate' => true)); ?>
			<i class="fa fa-user fa-1x"></i><span>&nbsp;ユーザID</span>
			<?php echo $this->Form->input('username', array('label' => false, /*'placeholder' => 'ユーザID', */'class' => 'mode-disabled')); ?>
			<i class="fa fa-key"></i><span>&nbsp;パスワード</span>
			<?php echo $this->Form->input('password', array('label' => false, 'class' => 'mode-disabled')); ?>
		<?php echo $this->Form->end('ログイン'); ?>
	</div>
</div>

