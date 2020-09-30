<footer>
		<div id="footerInr">
		<p class="foot01"><?php echo $this->Html->image('footer_txt_01.png', array('alt' => '')); ?></p>
		<p class="foot02"><?php echo $this->Html->image('footer_txt_02.png', array('alt' => '')); ?></p>
		<p class="foot03"><?php echo $this->Html->image('footer_txt_03.png', array('alt' => '')); ?></p>
		<p class="foot04"><?php echo $this->Html->image('footer_txt_04.png', array('alt' => '')); ?></p>
		<p class="footText01">TEL : <?php echo $this->Html->link('03-5797-7019', 'tel:03-5797-7019', array('escape' => false)); ?></p>
		<p class="footText02">国土交通大臣(3) 第7352号　一級建築士事務所 東京都知事登録 第55878号</p>
		<p class="foot05"><?php echo $this->Html->image('footer_txt_05.png', array('alt' => '')); ?></p>
		<p id="pagetop"><?php echo $this->Html->link($this->Html->image('btn_pagetop.png', array('alt' => 'このページの先頭へ')), '#wrapper', array(/*'target' => '_blank', */'escape' => false)); ?></p>
	</div><!-- /#footerInr -->
</footer><!-- /footer -->

</div><!-- /#wrapper -->

<?php //echo $this->Html->script(array('gaTag')); ?>
<?php echo $this->element('modules/adtag/all'); ?>
<?php echo $this->fetch('tag-thanks'); ?>
</body>
</html>
