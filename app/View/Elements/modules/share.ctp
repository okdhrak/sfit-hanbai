<?php
/*
SNSシェア
 */
?>

<section id="asideShare">
	<h3><img src="/img/aside_txt_15.png" alt="share"></h3>
	<ul>
		<li><?php echo $this->Html->link($this->Html->image('aside_btn_share_facebook.png', array('alt' => 'facebook')), 'https://www.facebook.com/sharer/sharer.php?u=' . $this->SiteUtil->urlEncode($this->Html->url('', true)), array(/*'target' => '_blank', */'escape' => false, 'onclick' => 'window.open(this.href, \'FBwindow\', \'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes\'); return false;')); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('aside_btn_share_twitter.png', array('alt' => 'twitter')), 'https://twitter.com/share?url=' . $this->SiteUtil->urlEncode($this->Html->url('', true)) . '&text=' . $this->SiteUtil->urlEncode(($this->fetch('title')) ? $this->fetch('title') : NULL) . 'S-FIT不動産販売', array('escape' => false, 'onclick' => 'window.open(this.href, \'FBwindow\', \'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes\'); return false;')); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('aside_btn_share_gplus.png', array('alt' => 'google+')), 'https://plus.google.com/share?url=' . $this->SiteUtil->urlEncode($this->Html->url('', true)), array('target' => '_blank', 'escape' => false)); ?></li>
		<li><?php echo $this->Html->link($this->Html->image('aside_btn_share_hatena.png', array('alt' => 'hatena')), 'http://b.hatena.ne.jp/entry/' . 'sfit-hanbai.com', array('target' => '_blank', 'escape' => false)); ?></li>
	</ul>
</section><!-- /#asideCustom -->
