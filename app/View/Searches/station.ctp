<?php
$this->assign('description', '');
$this->assign('keywords', '');
$this->assign('title', '');

//pr($stations);
?>

<div id="modal">
	<?php if (isset($stations)): ?>
	<form action="">
		<h1>駅を指定する</h1>
		<ul id="line">
			<li><label for="chkLineName"><input type="checkbox" id="chkLineName" name="" value=""><?php echo h($line); ?></label></li>
		</ul>
		
		<ul id="stations" class="clrFix mb-30">
		<?php foreach ($stations as $key => $val): ?>
			<li><label for="<?php echo 'station' . $key; ?>"><input type="checkbox" name="station" id="<?php echo 'station' . $key; ?>" value="<?php echo $val[0]; ?>" <?php $this->SiteUtil->chkCheckedStation($val[0], $stations_name); ?> ><?php echo $val[0]; ?><?php //echo '(' . count($val) . '件)'; ?></label></li>
		<?php endforeach; ?>
		</ul>
		<p id="btn" class="mb-00 align-c"><input type="image" src="/img/btn_station.png" alt="選択した駅で物件を探す" name=""></p>
	</form>
	<?php endif;?>
</div>

<?php //echo $this->Html->script(array('gaTag')); ?>
</body>
</html>