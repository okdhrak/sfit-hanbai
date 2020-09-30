<?php
/*
メンバー
 */
?>
<?php if ($this->Session->check('Auth')): ?>
<section>
	<div id="menber_wrap" class="mb-50">
		<p class="minihead"><?php echo $this->Html->image('search_txt_01.png', array('alt' => 'MEMBER')); ?></p>
		<div class="MemberCount">
			<p class="unit01">メンバー様限定物件数</p>
			<p class="unit02"><span><?php echo $this->SiteUtil->modifyArtNum($artNum); ?></span>件</p>
		</div>
		<p class="member_welcome"><?php echo 'ようこそ、' . $this->Session->read('Auth.Member.name') . '様'; ?></p>
		<p class="member_login"><?php echo $this->Html->link('ログアウト', array('controller' => 'members', 'action' => 'logout'), array(), 'ログアウトしますか？'); ?></p>
	</div>
</section>
<?php else: ?>
<section>
	<div id="menber_wrap">
		<p class="minihead"><?php echo $this->Html->image('search_txt_01.png', array('alt' => '')); ?></p>
		<div class="MemberCount">
			<p class="unit01">メンバー様限定物件数</p>
			<p class="unit02"><span><?php echo $this->SiteUtil->modifyArtNum($artNum); ?></span>件</p>
		</div>
		<ul id="login" class="clrFix">
			<li><?php echo $this->Html->link($this->Html->image('search_btn_01.png', array('alt' => 'MEMBER LOGIN')), '/members/', array('class' => 'btnOpa', 'target' => '_blank', 'escape' => false)); ?></li>
			<li><?php echo $this->Html->link($this->Html->image('search_btn_02.png', array('alt' => 'いますぐメンバー登録する')), '/members/edit/', array('class' => 'btnOpa', 'target' => '_blank', 'escape' => false)); ?></li>
		</ul>
		<!--<p class="member_sp"><?php echo $this->Html->link('メンバー特典の内容はこちら', '/members/merit/', array('target' => '_blank', 'escape' => false)); ?></p>-->
	</div>
</section>
<?php endif; ?>
