<?php
$this->assign('description', $meta . '・');
$this->assign('keywords', $meta . ',');
$this->assign('title', $meta . '｜');
?>
<section id="visualTc">
<div id="visualTcInr" class="br3">
<div id="titleArea">
<h1 style="margin-top:60px;"><!--<span class="unit01">世田谷×戸建</span>--><span class="unit02">良い家×自分らしさ</span><span class="unit03">戸建・土地・マンションのセレクトショップ</span></h1>
</div>
<div id="kvAreaMini">
<ul id="kvMini">
<li><img src="/img/content_images/kv/001.png" alt=""></li>
<li><img src="/img/content_images/kv/002.png" alt=""></li>
<li><img src="/img/content_images/kv/003.png" alt=""></li>
<li><img src="/img/content_images/kv/004.png" alt=""></li>
<li><img src="/img/content_images/kv/005.png" alt=""></li>
<li><img src="/img/content_images/kv/006.png" alt=""></li>
<li><img src="/img/content_images/kv/007.png" alt=""></li>
<li><img src="/img/content_images/kv/008.png" alt=""></li>
</ul>
</div>
</div><!-- /#visualTcIner -->
</section><!-- /#visualTc -->

<div id="bread">
	<ul>
		<li><a href="/">home</a></li>
		<li><a href="/">戸建て</a></li>
		<li><a href="/">住所から探す</a></li>
		<li><a href="/">世田谷区</a></li>
		<li><a href="/">戸建</a></li>
		<li class="current">検索結果一覧</li>
	</ul>
</div><!-- /#bread -->

<div id="content">
<div id="contentInr">

<div id="main">
<div id="mainInr">

<?php if ($articlesData): ?>
	<?php echo $this->element('modules/pagenate', array('here' => '/searches/result/')); ?>
	<?php foreach ($articlesData as $key => $val): ?>
		<?php if ($val['Flag']['restriction'] && ($this->Session->check('Auth') === false)): ?>
		<article>
			<div class="post">
				<div class="post-head clrFix">
					<div class="cat"><h2 class="<?php echo h('cat0' . $val['Article']['category']); ?>"><?php echo h($categoryList[$val['Article']['category']]); ?></h2></div>
					<div class="access"><p><?php echo h($this->SiteUtil->getTrafficArr($val['Article']['traffic'])); ?>&nbsp;</p></div>
					<div class="address"><p><?php echo h($val['Article']['pref']); ?><?php echo h($val['Article']['city']); ?></p></div>
				</div>
				<div class="post-menbers clrFix">
					<p class="login"><a href="/members/login/"><img src="/img/content_images/btn-login.png" alt="メンバーログイン"/></a></p>
					<p class="signup"><a href="/members/edit/"><img src="/img/content_images/btn-signup.png" alt="いますぐメンバー登録する"/></a></p>
					<!--<p class="special"><a href="/members/privilege/">メンバー特典の内容はこちら</a></p>-->
				</div>
			</div><!-- /.post -->
		</article>
		<?php else: ?>
		<article>
			<div class="post">
				<div class="post-head clrFix">
					<div class="cat"><h2 class="<?php echo h('cat0' . $val['Article']['category']); ?>"><?php echo h($categoryList[$val['Article']['category']]); ?></h2></div>
					<div class="access"><p><?php echo h($this->SiteUtil->getTrafficArr($val['Article']['traffic'])); ?>&nbsp;</p></div>
					<div class="address"><p><?php echo h($val['Article']['pref']); ?><?php echo h($val['Article']['city']); ?><?php echo h($val['Article']['town']); ?></p></div>
				</div>
				<div class="post-box clrFix">
					<div class="image"><p><a href="<?php echo h('/searches/detail/' . $val['Article']['id']) . '.html'; ?>"><?php echo $this->SiteUtil->getThumbPhoto($val['Article']['id'], 'm', 300, 180); ?></a></p></div>
					<div class="detail">
						<p class="price"><?php echo h($this->SiteUtil->numberFormat($val['Article']['price'], 1)); ?></p>
						<?php echo $this->SiteUtil->getCateContent($val['Article']['category'], $val['PeculiarPoint'], $roomTypeList); ?>
						<div class="tag-list">
							<?php echo $this->SiteUtil->getTagArr($val['Article']['tag'], $tagList); ?>
						</div>
					</div>
					<p class="favorite"><?php echo $this->SiteUtil->getFavBtn($val['Article']['id']); ?></p>
					<p class="more"><a href="<?php echo h('/searches/detail/' . $val['Article']['id']) . '.html'; ?>"><img src="/img/content_images/btn-detail.png" alt="詳細を見る"/></a></p>
				</div>
			</div><!-- /.post -->
		</article>
		<?php endif; ?>
	<?php endforeach; ?>
	<p class="request"><a href="/requests/"><img src="/img/content_images/btn-request.png" alt="この条件で新着情報をリクエスト" /></a></p>
	<!--<p class="request">--><?php //echo $this->Form->postLink($this->Html->image('/img/content_images/btn-request.png'), array('controller' => 'requests', 'action' => 'index'), array('escape' => false, 'data' => array('test1' => 'aa')), false); ?><!--</p>-->
	<?php echo $this->element('modules/pagenate', array('here' => '/searches/result/')); ?>
<?php else: ?>
	<p style="padding:100px 0;">条件に該当する物件情報がありませんでした。<br>検索条件を変更いただき再度お探しください。</p>
<?php endif; ?>

<?php echo $this->element('modules/tag', array($tagList)); ?>

</div><!-- /#mainInr -->
</div><!-- /#main -->


<aside id="aside">
<div id="asideInr">
<?php echo $this->element('modules/pop_count', array()); ?>
<?php echo $this->element('modules/search', array()); ?>
<?php echo $this->element('modules/member', array()); ?>
<?php echo $this->element('modules/banner', array()); ?>
<?php echo $this->element('modules/button', array()); ?>
<?php echo $this->element('modules/share', array()); ?>
</div><!-- /#asideInr -->
</aside><!-- /#aside -->

</div><!-- /#contentInr -->
</div><!-- /#content -->
