<?php
$this->assign('description', '');
$this->assign('keywords', '');
$this->assign('title', '');

/*$this->start('meta');
echo "メタへ挿入";
$this->end();*/
?>
<?php echo $this->element('modules/main_search', array()); ?>

<div id="contentInr">
	<div id="main">
		<div id="mainInr">
		
		<!-- オープンハウス -->
		<div class="cnt_02 clrFix">
			<div class="cnt_02Inr_01"><img src="/img/top_images/oh/201610_sengoku/main.jpg" alt="完成予想パース"></div>
			<div class="cnt_02Inr_02">
				<p class="ophouse_01"><img src="/img/top_images/001_txt_004.png" alt=""></p>
				<p class="ophouse_02"><img src="/img/top_images/oh/201610_sengoku/guidance.png" alt="現地内覧会随時開催"></p>
				<p class="cnt_02_date"><!-- 2016年3月19日(土)～3月20日(日) -->ご都合に合わせ随時ご案内いたします。</p>
				<p class="cnt_02_txt_01"><!--開催時間：17時まで ※事前予約制-->建築のご提案も承ります。お気軽にご相談ください。</p>
				
				<p class="cnt_02_title" style="margin: 0;">売地(建築条件なし)</p>
				<p class="cnt_02_txt_02"><s>7,300万円</s> → 6,780万円<!--より(税込み)--></p>
				<p class="cnt_02_txt_01" style="clear:both;">※大幅に値下げいたしました!</p><!--追加分-->
				
				<p class="cnt_02_txt_03 mb-00">交通：都営三田線「千石」駅 徒歩5分</p>
				<dl class="cnt_02_add clrFix">
					<dt class="cnt_02_add_01">住所：</dt>
					<dd class="cnt_02_add_02">東京都文京区千石一丁目</dd>
				</dl>
				<!--<p class="cnt_02_add_p mb-00">土地面積：80.01㎡～</p>-->
				<p class="btn_more clrFix" style="margin-top:10px; text-align:left;">
					<a href="/specials/sengoku/" target="_blank"><img src="/img/top_images/oh/201601_komazawa/btn_a.png" alt="A区画詳細"></a>
					<!--<a href="http://sfit-hanbai.com/searches/detail/1452586301.html"><img src="/img/top_images/oh/201601_komazawa/btn_b.png" alt="B区画詳細"></a>-->
					<img src="/img/top_images/oh/201601_komazawa/btn_b.png" alt="B区画 販売終了しました">
				</p>
				<!-- <p class="cnt_02_txt_link mb-00"><a href="/files/oh/150425_kyoudou3.pdf" target="_blank">&gt;&gt;物件資料はこちら</a></p> -->
			</div>
		</div><!-- /オープンハウス -->
		
		<!-- おすすめ物件(ランダム) -->
		<?php if ($artData): ?>
		<div class="cnt_03 clrFix">
			<h2 class="h2_03 clrFix">
				<span class="cnt_03_h2_tl">おすすめ物件特集</span>
				<span class="cnt_03_h2_tr">スタッフ一押し</span>
			</h2>
			
			<?php foreach ($artData as $key => $val): ?>
			<div class="cnt_03_col">
				<div class="cnt_03Inr_01"><a href="/searches/detail/<?php echo h($val['Article']['id'] . '.html'); ?>"><?php echo $this->SiteUtil->getThumbPhoto($val['Article']['id'], 'm', 345, 175); ?></a></div>
				<div class="cnt_03Inr_02_right">
					<p class="cnt_03_title cat0<?php echo h($val['Article']['category']); ?>"><?php echo h($categoryList[$val['Article']['category']]); ?></p><p class="cnt_03_txt_02"><?php echo h($this->SiteUtil->numberFormat($val['Article']['price'], 1)); ?></p>
					<p class="cnt_03_txt_03"><?php echo h($this->SiteUtil->getTrafficArr($val['Article']['traffic'])); ?></p>
					<dl class="cnt_03_add clrFix">
						<dt class="cnt_03_add_01">住所：</dt>
						<dd class="cnt_03_add_02"><?php echo h($val['Article']['pref']); ?><?php echo h($val['Article']['city']); ?><?php echo h($val['Article']['town']); ?></dd>
					</dl>
					<div class="btn_more_02 clrFix"><a href="/searches/detail/<?php echo h($val['Article']['id'] . '.html'); ?>"><img src="/img/top_images/002_img_002.png" alt="もっと詳しく"></a></div>
				</div>
			</div><!-- /.cnt_03_col -->
			<?php endforeach; ?>
		
		</div><!-- /.cnt_03 -->
		<?php endif; ?>
		<!-- /おすすめ物件(ランダム) -->
		
		<!-- リノベーション&リフォーム済マンション特集 -->
		<div class="cnt_03 clrFix" id="reno">
			<h2 class="h2_03 clrFix">
				<span class="cnt_03_h2_tl">リノベーション&amp;リフォーム済マンション特集[港区・目黒区・世田谷区・渋谷区]</span>
			</h2>
			
			<div class="cnt_03_img">
				<a href="/renovations/minato/">
					<p class="main"><?php echo $this->Html->image('top_images/reno/main_minato.jpg', array('alt' => '港区のリノベーションマンションイメージ')); ?></p>
					<p class="title"><?php echo $this->Html->image('top_images/reno/title_minato.png', array('alt' => '港区のリノベーションマンション')); ?></p>
				</a>
			</div>
			<div class="cnt_03_img">
				<a href="/renovations/meguro/">
					<p class="main"><?php echo $this->Html->image('top_images/reno/main_meguro.jpg', array('alt' => '目黒区のリノベーションマンションイメージ')); ?></p>
					<p class="title"><?php echo $this->Html->image('top_images/reno/title_meguro.png', array('alt' => '目黒区のリノベーションマンション')); ?></p>
				</a>
			</div>
			<div class="cnt_03_img">
				<a href="/renovations/setagaya/">
					<p class="main"><?php echo $this->Html->image('top_images/reno/main_setagaya.jpg', array('alt' => '世田谷区のリノベーションマンションイメージ')); ?></p>
					<p class="title"><?php echo $this->Html->image('top_images/reno/title_setagaya.png', array('alt' => '世田谷区のリノベーションマンション')); ?></p>
				</a>
			</div>
			<div class="cnt_03_img">
				<a href="/renovations/shibuya/">
					<p class="main"><?php echo $this->Html->image('top_images/reno/main_shibuya.jpg', array('alt' => '渋谷区のリノベーションマンションイメージ')); ?></p>
					<p class="title"><?php echo $this->Html->image('top_images/reno/title_shibuya.png', array('alt' => '渋谷区のリノベーションマンション')); ?></p>
				</a>
			</div>
		</div>
		<!-- /リノベーション&リフォーム済マンション特集 -->
		
		<?php echo $this->element('modules/reno', array()); ?>
		<?php echo $this->element('modules/tag', array()); ?>
		
		</div><!-- /#mainInr -->
	</div><!-- /#main -->

	<aside id="aside">
		<div id="asideInr">
			<?php echo $this->element('modules/pop_count', array()); ?>
			<?php echo $this->element('modules/banner', array()); ?>
			<?php echo $this->element('modules/button', array()); ?>
			<?php echo $this->element('modules/aboutus', array()); ?>
			<?php echo $this->element('modules/information', array()); ?>
			<?php echo $this->element('modules/share', array()); ?>
		</div><!-- /#asideInr -->
	</aside><!-- /#aside -->

</div><!-- /#content -->
