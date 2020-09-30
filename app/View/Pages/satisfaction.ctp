<?php
$this->assign('description', 'お客様の声｜');
$this->assign('keywords', 'お客様の声,');
$this->assign('title', 'お客様の声｜');
?>

<section id="mainVisualTc">
	<div id="mainVisualTcInr" class="mainVisualTcSatisfactionBg">
		<h1>お客様の声</h1>
	</div>
</section><!-- /#mainVisualTc -->

<div id="bread">
	<ul>
		<li><a href="/">home</a></li>
		<li class="current">お客様の声</li>
	</ul>
</div><!-- /#bread -->

<div id="content">
	<div id="contentInr">
		<main id="main">
			<div id="mainInr" class="satisfaction">
				<article>
					<h3>東京都 H様 (目黒区 中古マンション + リノベーション)<span>2016年4月</span></h3>
					<p class="index">中古マンションの購入からリノベーションプランまでありがとうございました。</p>
					<div class="clrFix imgs">
						<span><?php echo $this->Html->image('sample_350_230.png', array('alt' => '')); ?></span>
						<span><?php echo $this->Html->image('sample_350_230.png', array('alt' => '')); ?></span>
					</div>
					<p>目黒区に住みたくて、ずっと探していましたが、なかなかいい物件が無いところS-FITさんに出会いました。最初は新築マンションを探していたのですが、程度のいい中古マンションと*Renoでのリノベーションプランを提案していただき、S-FITさんにお願いしました。<br>場所も、リノベーションも沢山ワガママを聞いていただき、ありがとうございます！<br>拘りぬいた楽しい家で、楽しい生活が送っていけそうです。</p>
					<p class="index">担当：室屋</p>
					<div class="clrFix charge">
						<span><?php echo $this->Html->image('sample_200_230.png', array('alt' => '')); ?></span>
						<p>H様<br>この度は、誠にありがとうございます。また、お忙しい中声を頂きましてありがとう御座います。<br>あまり物件が出ない地域なので、難しくも有りましたが、H様からお伺いしていた予算から、中古マンション＋リノベーションでも予算内に収まると確信し、ご提案させていただきました。<br>H様の家探しからリノベーションまで関わらせていただき、私も楽しくお付き合いさせていただけました。<br>今後とも宜しくお願い致します。</p>
					</div>
				</article>
				
				<article>
					<h3>東京都 A様 (港区 中古マンション)<span>2016年4月</span></h3>
					<p class="index">どうしても住みたかったヴィンテージマンション</p>
					<div class="clrFix imgs">
						<span><?php echo $this->Html->image('sample_350_230.png', array('alt' => '')); ?></span>
						<span><?php echo $this->Html->image('sample_350_230.png', array('alt' => '')); ?></span>
					</div>
					<p>どうしても住んでみたかったヴィンテージマンション。住みたくて、ずっと探していましたが、なかなかいい物件が無いところS-FITさんに出会いました。最初は新築マンションを探していたのですが、程度のいい中古マンションと*Renoでのリノベーションプランを提案していただき、S-FITさんにお願いしました。<br>場所も、リノベーションも沢山ワガママを聞いていただき、ありがとうございます！拘りぬいた楽しい家で、楽しい生活が送っていけそうです。</p>
					<p class="index">担当：植竹</p>
					<div class="clrFix charge">
						<span><?php echo $this->Html->image('sample_200_230.png', array('alt' => '')); ?></span>
						<p>A様<br>この度は、誠にありがとうございます。また、お忙しい中声を頂きましてありがとう御座います。あまり物件が出ない地域なので、難しくも有りましたが、H様からお伺いしていた予算から、中古マンション＋リノベーションでも予算内に収まると確信し、ご提案させていただきました。<br>H様の家探しからリノベーションまで関わらせていただき、私も楽しくお付き合いさせていただけました。<br>今後とも宜しくお願い致します。</p>
					</div>
				</article>
				
			</div><!-- /#mainInr -->
		</main><!-- /#main -->
		
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
