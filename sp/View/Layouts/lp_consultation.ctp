<?php
/**
 * LP相談会
*/
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<?php echo $this->Html->charset(); ?>
<?php echo $this->Html->meta('description', $this->fetch('description') . '', array('inline' => true)); ?>
<?php echo $this->Html->meta('keywords', $this->fetch('keywords') . '', array('inline' => true)); ?>
<title><?php if ($this->fetch('title')) echo $this->fetch('title'); ?><?php echo ''; ?></title>
<?php
echo $this->Html->css(array('default', 'modules', 'structure', 'lp/consultation'));
echo $this->Html->script(array('jquery-1.8.3.min', 'lp/base', 'lp/consultation'));
?>
<!-- [ Facebook OGP ] -->
<meta property="og:title" content="家を買おうと思ったらご相談ください！！｜六本木 泉ガーデンタワー 14階 S-FIT不動産販売">
<meta property="og:type" content="website">
<meta property="og:url" content="//sfit-hanbai.com/">
<meta property="og:site_name" content="株式会社S-FIT 不動産販売">
<meta property="og:description" content="家を買おうと思ったら、六本木 泉ガーデンタワー 14階 S-FIT不動産販売までご相談ください！！相談カウンターでお待ちしています。">
<meta property="og:image" content="//sfit-hanbai.com/img/lp/consultation/fb_ogp.png">

<meta name="viewport" content="width=640,user-scalable=no">
<meta name="format-detection" content="telephone=no" />
</head>

<body>
<?php echo $this->fetch('content'); ?>
<?php echo $this->element('modules/adtag/all'); ?>
<?php echo $this->fetch('tag-thanks'); ?>
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
