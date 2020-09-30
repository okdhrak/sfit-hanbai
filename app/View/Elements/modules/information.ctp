<?php
/*
インフォメーション
 */
?>

<?php if ($topicsData): ?>
<section id="asideInformation">
	<div id="aside_info">
		<ul class="aside_info_ul">
			<li class="aside_info_li"><img src="/img/aside_txt_08.png" alt="INFOMATION"></li>
			<?php foreach ($topicsData as $key => $val): ?>
			<li class="aside_info_li">
				<p><?php echo h($this->SiteUtil->getTopicsDate($val['Topic']['date'])); ?></p>
				<p><?php echo $this->SiteUtil->getTopicsComment($val['Topic']); ?></p>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section><!-- /#asideInformation -->
<?php endif; ?>
