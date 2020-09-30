<!DOCTYPE html>
<html lang="ja">
<head>
<?php echo $this->Html->charset(); ?>
<?php echo $this->Html->meta('description', $this->fetch('description') . '港区・渋谷区・目黒区・世田谷区の戸建・土地・中古マンションのことS-FIT不動産販売にお任せください', array('inline' => true)); ?>
<?php echo $this->Html->meta('keywords', $this->fetch('keywords') . '戸建,土地,中古,マンション,不動産,販売,売買,仲介,港区,渋谷,目黒,世田谷,S-FIT', array('inline' => true)); ?>
<title><?php if ($this->fetch('title')) echo $this->fetch('title'); ?><?php echo '港区・渋谷区・目黒区・世田谷区の戸建・土地・中古マンションなら｜S-FIT不動産販売'; ?></title>

<!-- [ Facebook OGP ] -->
<meta property="og:title" content="<?php if ($this->fetch('title')) echo $this->fetch('title'); ?>港区・渋谷区・目黒区・世田谷区の戸建・土地・中古マンションなら｜S-FIT不動産販売">
<meta property="og:type" content="website">
<meta property="og:url" content="<?php echo $this->Html->url('', true); ?>">
<meta property="og:site_name" content="株式会社S-FIT 不動産販売">
<meta property="og:description" content="<?php echo $this->fetch('description'); ?>港区・渋谷区・目黒区・世田谷区の戸建・土地・中古マンションのことS-FIT不動産販売にお任せください">
<!-- [ /Facebook OGP ] -->

<?php
echo $this->Html->css(array('import'));
echo $this->Html->script(array('jquery-1.8.3.min', 'bxslider/jquery.bxslider.min', 'colorbox/jquery.colorbox-min', 'run', 'searchControll', 'formControll'));
?>
<?php echo $this->fetch('gmap'); //Googlemaps API ?>
<?php echo $this->fetch('kaiu'); //KaiU 広告用タグ ?>
<meta name="viewport" content="width=640,user-scalable=no">
<meta name="format-detection" content="telephone=no" />
</head>

<body>
<!-- [ #wrapper ] -->
<div id="wrapper">

<!-- [ header ] -->
<header>
	<div id="headerInr">
		<p id="headerCopy"><?php echo $this->Html->image('header_txt_01.png', array('alt' => '良い家×自分らしさ')); ?></p>
		<p id="headerLogo"><?php echo $this->Html->link($this->Html->image('header_logo_01.png', array('alt' => 'S-FIT 不動産販売')), '/', array('escape' => false)); ?></p>
	</div>
	
	<?php echo $this->element('modules/header-menu', array()); ?>
</header><!-- [ /header ] -->
