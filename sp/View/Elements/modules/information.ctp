<?php
/*
インフォメーション
 */
?>

<?php if ($topicsData): ?>
<section>
	<div id="info">
		<h3><?php echo $this->Html->image('info_txt_01.png', array('alt' => 'information')); ?></h3>
		<ul>
			<?php foreach ($topicsData as $key => $val): ?>
			<li>
				<p><?php echo h($this->SiteUtil->getTopicsDate($val['Topic']['date'])); ?></p>
				<p><?php echo $this->SiteUtil->getTopicsComment($val['Topic']); ?></p>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
<?php endif; ?>
