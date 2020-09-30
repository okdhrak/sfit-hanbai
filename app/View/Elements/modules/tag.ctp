<?php
/*
タグ
 */
?>

<?php if ($tagList): ?>
<div class="tag">
	<h3><img src="/img/content_images/h-tag.png" alt="tag"/></h3>
	<ul class="clrFix">
		<?php foreach($tagList as $key => $val): ?>
		<li><a href="<?php echo '/searches/result/tag:' . $key; ?>"><?php echo $val; ?></a></li>
		<?php endforeach; ?>
	</ul>
</div><!-- /.tag -->
<?php endif; ?>
