<?php
/*
ヘッダーメニュー
 */
?>
<div id="navi" class="clrFix">
	<div id="glonavi">
		<p class="menu-btn">menu</p>
	</div>
	
	<?php echo $this->element('modules/pop_count', array()); ?>
</div>
<div id="menu">
	<nav>
		<ul>
			<li><?php echo $this->Html->link('HOME(物件検索)', '/', array('escape' => false)); ?></li>
			<?php /* <li><?php echo $this->Html->link('私たちについて', '/about/', array('escape' => false)); ?></li> */ ?>
			<?php /* <li><?php echo $this->Html->link('お客様の声', '/satisfaction/', array('escape' => false)); ?></li> */ ?>
			<li><?php echo $this->Html->link('住宅購入の流れ', '/step/', array('escape' => false)); ?></li>
			<li><?php echo $this->Html->link('不動産の購入時にかかる税金', '/tax_buying/', array('escape' => false)); ?></li>
			<li><?php echo $this->Html->link('不動産の売却時にかかる税金', '/tax_selling/', array('escape' => false)); ?></li>
			<li><?php echo $this->Html->link('会社概要', '/profile/', array('escape' => false)); ?></li>
			<li><?php echo $this->Html->link('個人情報の取扱いについて', '/privacypolicy/', array('escape' => false)); ?></li>
			<li><?php echo $this->Html->link('お問合わせ', '/contacts/', array('target' => '_blank', 'escape' => false)); ?></li>
		</ul>
	</nav>
</div>