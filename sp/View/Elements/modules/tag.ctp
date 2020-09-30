<?php
/*
タグ
 */
?>

<?php if ($tagList): ?>
<section>
	<div class="tag">
		<h3><?php echo $this->Html->image('tag_txt_01.png', array('alt' => 'tag search')); ?></h3>
		<ul class="clrFix">
			<?php foreach($tagList as $key => $val): ?>
			<li><a href="<?php echo '/sp/searches/result/tag:' . $key; ?>"><?php echo $val; ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
<?php endif; ?>
