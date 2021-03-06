<!DOCTYPE html>
<html lang="ja">
<head>
<?php echo $this->Html->charset(); ?>
<?php echo $this->Html->meta('description', $this->fetch('description') . '港区・渋谷区・目黒区・世田谷区の戸建・土地・中古マンションのことS-FIT不動産販売にお任せください', array('inline' => true)); ?>
<?php echo $this->Html->meta('keywords', $this->fetch('keywords') . '戸建,土地,中古,マンション,不動産,販売,売買,仲介,港区,渋谷,目黒,世田谷,S-FIT', array('inline' => true)); ?>
<title><?php if ($this->fetch('title')) echo $this->fetch('title'); ?><?php echo '港区・渋谷区・目黒区・世田谷区の戸建・土地・中古マンションなら｜S-FIT不動産販売'; ?></title>

<!-- [ Facebook OGP ] -->
<meta property="og:title" content="港区・渋谷区・目黒区・世田谷区の戸建・土地・中古マンションなら｜S-FIT不動産販売">
<meta property="og:type" content="website">
<meta property="og:url" content="http://sfit-hanbai.com/">
<meta property="og:site_name" content="株式会社S-FIT 不動産販売">
<meta property="og:description" content="港区・渋谷区・目黒区・世田谷区の戸建・土地・中古マンションのことS-FIT不動産販売にお任せください">
<!-- [ /Facebook OGP ] -->

<!--[if lt IE 9]>
<script src="/js/html5.js"></script>
<![endif]-->
<?php
echo $this->Html->css(array('import', 'top'));
echo $this->Html->script(array('jquery-1.8.3.min', 'bxslider/jquery.bxslider.min', 'colorbox/jquery.colorbox-min', 'run', 'searchControll'));
/*echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');*/
?>
<script>
$(function(){
	var slider = $('#bxSilder').bxSlider({
		slideWidth: 1020,
		minSlides: 3,
		maxSlides: 3,
		moveSlides: 1,
		slideMargin: 0,
		auto: true,
		pause: 6000,
		onSlideAfter: function(){
			slider.startAuto();
		},
		randomStart: 1,
	});
});
</script>
</head>
<body class="top">
<!-- [ #wrapper ] -->
<div id="wrapper">

<!-- [ header ] -->
<header id="header">
	<div id="headerInr">
		<p id="headerCopy"><img src="/img/header_txt_01.png" alt="良い家×自分らしさ 一生の住まいを“自分らしく”。"></p>
		<p id="headerLogo"><a href="/"><img src="/img/header_logo_01.png" alt="S-FIT 不動産販売"></a></p>
	</div>
</header><!-- [ /header ] -->

<!-- [ #mainVisual ] -->
<div id="mainVisual">
	<div id="mianVisualInner">
		<div class="slide_wrap">
			<ul id="bxSilder">
				<li><?php echo $this->Html->image('top_images/kv/001.png', array('alt' => '終の住処を、最高の自分好みに。')); ?></li>
				<!-- 特設サイト 千石 -->
				<li><?php echo $this->Html->link($this->Html->image('top_images/kv/sengoku_01.png', array('alt' => '千石一丁目売地 売り出し中')), '/specials/sengoku/', array('target' => '_blank', 'escape' => false)); ?></li>
				<li><?php echo $this->Html->link($this->Html->image('top_images/kv/consultation.png', array('alt' => '不動産購入相談カウンター')), '/lp/consultation/', array('target' => '_blank', 'escape' => false)); ?></li>
				<!-- 特設サイト 原町 -->
				<li><?php echo $this->Html->link($this->Html->image('top_images/kv/haramachi_01.png', array('alt' => '原町二丁目新築戸建')), '/specials/haramachi/', array('target' => '_blank', 'escape' => false)); ?></li>
				<li><?php echo $this->Html->image('top_images/kv/005.png', array('alt' => '終の住処を、最高の自分好みに。')); ?></li>
				<!-- リノベーション -->
				<li><?php echo $this->Html->link($this->Html->image('top_images/kv/renovation.png', array('alt' => 'リノベーションマンション特集！')), 'javascript:;', array('escape' => false, 'onClick' => 'return false', 'class' => 'reno')); ?></li>
			</ul>
		</div>
	</div>
</div><!-- [ /#mainVisual ] -->
