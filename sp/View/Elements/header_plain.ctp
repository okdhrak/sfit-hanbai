<!DOCTYPE html>
<html lang="ja">
<head>
<?php echo $this->Html->charset(); ?>
<?php echo $this->Html->meta('description', $this->fetch('description') . '', array('inline' => true)); ?>
<?php echo $this->Html->meta('keywords', $this->fetch('keywords') . '', array('inline' => true)); ?>
<title><?php if ($this->fetch('title')) echo $this->fetch('title'); ?><?php echo ''; ?></title>
<?php
echo $this->Html->css(array('import'));
echo $this->Html->script(array('jquery-1.8.3.min', 'bxslider/jquery.bxslider.min', 'colorbox/jquery.colorbox-min', 'run', 'searchControll'));
?>
</head>
<body>

