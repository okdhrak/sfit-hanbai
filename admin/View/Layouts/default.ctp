<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

//pr($_SESSION);
//pr($_COOKIE);
//pr($this->request->data);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<?php echo $this->Html->charset(); ?>
<?php echo $this->Html->meta('description', $this->fetch('description') . '', array('inline' => true)); ?>
<?php echo $this->Html->meta('keywords', $this->fetch('keywords') . '', array('inline' => true)); ?>
<title><?php echo 'S-FIT不動産販売[WEB管理] | '; ?><?php if ($this->fetch('title')) echo $this->fetch('title'); ?></title>
<link type="text/css" rel="stylesheet" href="/admin/lib/jquery-ui-1.11.2/jquery-ui.css" />
<script type="text/javascript" src="/admin/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="/admin/lib/jquery-ui-1.11.2/jquery-ui.js"></script>
<?php
echo $this->Html->css(array('common', 'base', 'font-awesome'));
echo $this->Html->script(array('base'));
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- CSS Reset -->
<link rel="stylesheet" type="text/css" href="//yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
</head>

<body>

<!-- [ wrapper ] -->
<div id="wrapper">

<!-- [ header ] -->
<header class="clearfix">
	<h1><?php echo $this->Html->link($this->Html->image('logo.png', array('alt' => 'S-FIT不動産販売')), '/', array('escape' => false)); ?></h1>
	<div class="h-menu">
		<p><?php echo $this->SiteAuth->getAuthStatus(); ?></p>
	</div>
<!-- [ /header ] --></header>

<!-- [ main ] -->
<main class="content-wrapper clearfix" role="main">
	<div class="side-menu-content">
		<ul>
			<li><i class="fa fa-tachometer fa-1x fa-fw"></i><?php echo $this->Html->link('ダッシュボード', '/'); ?></li>
			<li><i class="fa fa-pencil-square-o fa-1x fa-fw"></i><?php echo $this->Html->link('物件管理', '/articles/'); ?></li>
			<li><i class="fa fa-comments fa-1x fa-fw"></i><?php echo $this->Html->link('トピックス管理', '/topics/'); ?></li>
			<li><i class="fa fa-users fa-1x fa-fw"></i><?php echo $this->Html->link('会員管理', '/members/'); ?></li>
			<!--<li><i class="fa fa-user fa-1x fa-fw"></i><?php echo $this->Html->link('ユーザ管理', '/users/'); ?></li>-->
		</ul>
	</div>
	
	<div class="main-content">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
</main><!-- [ /main ] -->

<!-- [ footer ] -->
<footer>
	<p class="copy">COPYRIGHT (C) S-FIT CO.,LTD ALL RIGHTS RESERVED</p>
</footer><!-- [ /footer ] -->

</div><!-- [ /wrapper ] -->
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
