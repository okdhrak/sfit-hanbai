<?php
/*
メンバー限定物件数(トップページ)
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
	<ul id="aside_login">
		<li><a href="/members/login/" class="btnOpa"><img src="/img/search_btn_05.png" alt="MEMBER LOGIN"></a></li>
		<li><a href="/members/edit/" class="btnOpa"><img src="/img/search_btn_06.png" alt="いますぐメンバー登録する"></a></li>
		<!--<li class="align-c mb-00"><a href="/members/privilege/">メンバー特典の内容はこちら</a></li>-->
	</ul>
	<?php endif; ?>
</section>
