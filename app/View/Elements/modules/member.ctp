<?php
/*
メンバー限定物件数(2カラムページ)
 */
?>
<section id="asideMember">
	<div class="asideMemberCount">
		<p class="unit01">メンバー様限定物件数</p>
		<p class="unit02"><span><?php echo $this->SiteUtil->modifyArtNum($artNum); ?></span>件</p>
	</div>
	<?php if ($this->Session->check('Auth')): ?>
	<ul id="aside_login">
		<li><?php echo 'ようこそ、' . $this->Session->read('Auth.Member.name') . '様'; ?></li>
		<li class="align-r mb-00"><?php echo $this->Html->link('ログアウト', array('controller' => 'members', 'action' => 'logout'), array(), 'ログアウトしますか？'); ?></li>
	</ul>
	<?php else: ?>
	<ul>
		<li><a class="btnOpa" href="/members/login/"><img src="/img/aside_btn_05.png" alt="MEMBER LOGIN"></a></li>
		<li><a class="btnOpa" href="/members/edit/"><img src="/img/aside_btn_06.png" alt="いますぐメンバー登録する"></a></li>
		<!--<li class="align-c"><a href="/members/privilege/">メンバー特典の内容はこちら</a></li>-->
	</ul>
	<?php endif; ?>
</section><!-- /#asideMember -->