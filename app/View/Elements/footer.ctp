<!-- [ footer ] -->
<footer id="footer">
	<div id="footerInr">
		<p class="foot01"><img src="/img/footer_txt_01.png" alt="良い家×自分らしさ 一生の住まいを“自分らしく”。"></p>
		<p class="foot02"><img src="/img/footer_txt_02.jpg" alt="終の住処を、最高の自分好みに。 Life is customize"></p>
		<p class="foot03"><img src="/img/footer_txt_03.jpg" alt="COPYRIGHT(C) S-FIT CO.,LTD."></p>
		<p class="footText01">国土交通大臣(3) 第7352号　一級建築士事務所 東京都知事登録 第55878号</p>
		<p class="foot04"><img src="/img/footer_txt_04.jpg" alt="お問合わせ TEL : 03-5797-7019"></p>
		<ul class="footList">
			<li><?php echo $this->Html->link('HOME', '/', array()); ?></li>
			<!--<li><?php echo $this->Html->link('私たちについて', '/aboutus/', array()); ?></li>-->
			<!--<li><?php echo $this->Html->link('お客様の声', '/satisfaction/', array()); ?></li>-->
			<li><?php echo $this->Html->link('住宅購入の流れ', '/step/', array()); ?></li>
			<li><?php echo $this->Html->link('不動産の購入時にかかる税金', '/tax_buying/', array()); ?></li>
			<li><?php echo $this->Html->link('不動産の売却時にかかる税金', '/tax_selling/', array()); ?></li>
			<li><?php echo $this->Html->link('会社概要', '/profile/', array()); ?></li>
			<li><?php echo $this->Html->link('個人情報の取扱いについて', '/privacypolicy/', array()); ?></li>
			<li><?php echo $this->Html->link('お問合せ', '/contacts/', array()); ?></li>
		</ul>
		<p class="foot05"><img src="/img/footer_txt_05.jpg" alt="Pleasure in MY HOME."></p>
		<p class="footLogo"><a href="/"><img src="/img/footer_logo_01.jpg" alt="S-FIT 不動産販売"></a></p>
		<p id="pagetop"><a href="javascript:;"><img src="/img/btn_pagetop.png" alt="このページの先頭へ"></a></p>
	</div>
</footer><!-- [ /footer ] -->
</div><!-- [ /#wrapper ] -->
<?php echo $this->element('modules/adtag/all'); ?>
<?php echo $this->fetch('tag-thanks'); ?>
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
