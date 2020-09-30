<?php
$this->assign('description', $meta . '・');
$this->assign('keywords', $meta . ',');
$this->assign('title', $meta . '｜');

//pr($this);
//pr($articlesData);
//pr($_POST);
//pr($_SESSION);
?>
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

<section>
	<div id="mainVisual">
		<div id="titleArea">
			<h1><!--<span class="unit01">世田谷×戸建</span>--><span class="unit02" style="font-size:2em; margin-bottom:60px;">良い家×自分らしさ</span><span class="unit03">世田谷区の戸建・土地・マンションの<br>セレクトショップ</span></h1>
		</div>
	</div>
</section>

<?php echo $this->element('modules/member', array()); ?>

<section>
	<div id="mainSearch" class="clrFix mb-30">
		<h2 id="h2_pls" class="clrFix">
			<span id="pleasure_01"><?php echo $this->Html->image('search_txt_02.png', array('alt' => 'PLEASURE IN MY HOME')); ?></span>
			<span id="pleasure_02"><?php echo $this->Html->image('search_txt_03.png', array('alt' => '良い家を探す')); ?></span>
		</h2>
		<p class="btnSearchOpen">物件検索</p>
	
		<div id="mainSearchInr" class="clrFix mainSearchInrSlide">
			<?php echo $this->element('modules/search', array()); ?>
		</div><!-- /#mainSearchInr -->
	</div>
</section>

<div id="content">
	
	<?php if ($articlesData): ?>
		<?php echo $this->element('modules/pagenate', array('count' => count($articlesCount), 'here' => '/sp/searches/result/')); ?>
		
		<?php foreach ($articlesData as $key => $val): ?>
		
			<?php if ($val['Flag']['restriction'] && ($this->Session->check('Auth') === false)): ?>
				<article>
					<div class="post">
						<div class="post_title clrFix"><p class="post_title_01 <?php echo h('cat0' . $val['Article']['category']); ?>"><?php echo h($categoryList[$val['Article']['category']]); ?></p><p class="post_txt_01"><?php echo h($this->SiteUtil->numberFormat($val['Article']['price'], 1)); ?></p></div>
						<div class="post-menbers">
							<p class="login"><?php echo $this->Html->link($this->Html->image('list_images/btn-login.png', array('alt' => 'メンバーログイン')), '/members/', array('class' => 'btnOpa', 'escape' => false)); ?></p>
							<p class="signup"><?php echo $this->Html->link($this->Html->image('list_images/btn-signup.png', array('alt' => 'いますぐメンバー登録する')), '/members/', array('class' => 'btnOpa', 'escape' => false)); ?></p>
							<!--<p class="special"><?php echo $this->Html->link('メンバー特典の内容はこちら', '/members/merit/', array('escape' => false)); ?></p>-->
						</div>
						<!--<div class="post_memberInr">
							<p class="post_txt_02">JR山手線「東京」駅 徒歩0分</p>
							<dl class="post_add_member clrFix">
								<dt class="post_add_01">住所：</dt>
								<dd class="post_add_02">東京都千代田区1-1-1</dd>
							</dl>
						</div>-->
					</div>
				</article>
			<?php else: ?>
				<article>
					<div class="post">
						<div class="post_title clrFix"><p class="post_title_01 <?php echo h('cat0' . $val['Article']['category']); ?>"><?php echo h($categoryList[$val['Article']['category']]); ?></p><p class="post_txt_01"><?php echo h($this->SiteUtil->numberFormat($val['Article']['price'], 1)); ?></p></div>
						<p class="post_img"><a href="<?php echo h('/sp/searches/detail/' . $val['Article']['id']) . '.html'; ?>" target="_blank"><?php echo $this->SiteUtil->getThumbPhoto($val['Article']['id'], 'm', 600, 300); ?></a></p>
						<div class="postInr">
							<p class="post_txt_02"><?php echo h($this->SiteUtil->getTrafficArr($val['Article']['traffic'])); ?></p>
							<dl class="post_add clrFix">
								<dt class="post_add_01">住所：</dt>
								<dd class="post_add_02"><?php echo h($val['Article']['pref']); ?><?php echo h($val['Article']['city']); ?><?php echo h($val['Article']['town']); ?></dd>
							</dl>
							<p class="favorite"><?php echo $this->SiteUtil->getFavBtn($val['Article']['id']); ?></p>
							<p class="more"><?php echo $this->Html->link($this->Html->image('list_images/btn-detail.png', array('alt' => '詳細を見る')), '/searches/detail/' . $val['Article']['id'] . '.html', array('class' => 'btnOpa', 'target' => '_blank', 'escape' => false)); ?></p>
						</div>
					</div>
				</article>
			<?php endif; ?>
		
		<?php endforeach; ?>
		
		<?php //もっと見るボタン 物件情報が存在、かつ11件以上存在の場合に表示 ?>
		<?php if (count($articlesCount) > 10): //if (count($articlesData) > 0): ?>
			<p class="page_more" data-num="10"><?php echo $this->Html->image('list_images/btn-more.png', array('alt' => 'もっと見る')); ?></p>
		<?php endif; ?>
		
	<?php else: ?>
		<p style="padding:100px 0;">条件に該当する物件情報がありませんでした。<br>検索条件を変更いただき再度お探しください。</p>
	<?php endif; ?>
	
</div><!-- /#content -->

<?php echo $this->element('modules/share', array()); ?>
<?php echo $this->element('modules/tag', array()); ?>
