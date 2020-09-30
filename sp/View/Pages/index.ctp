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
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<?php
$this->assign('description', '');
$this->assign('keywords', '');
$this->assign('title', '');
?>
<?php echo $this->element('modules/member', array()); ?>

<section>
	<div id="mainSearch" class="clrFix">
		<h2 id="h2_pls" class="clrFix">
			<span id="pleasure_01"><?php echo $this->Html->image('search_txt_02.png', array('alt' => 'PLEASURE IN MY HOME')); ?></span>
			<span id="pleasure_02"><?php echo $this->Html->image('search_txt_03.png', array('alt' => '良い家を探す')); ?></span>
		</h2>

		<div id="mainSearchInr" class="clrFix">
			<?php echo $this->element('modules/search', array()); ?>
		</div><!-- /#mainSearchInr -->
		
	</div>
</section>

<?php /*if ($cont === 123456789) {*/ ?><section>
	<div class="cnt_02 clrFix">
		<h2><?php echo $this->Html->image('top_images/oh/201610_sengoku/guidance.png', array('alt' => '現地案内会随時開催')); ?></h2>
		<p class="ophouse_01"><?php echo $this->Html->image('top_images/oh/201610_sengoku/main.jpg', array('alt' => '千石一丁目売地')); ?></p>
		<div class="cnt_02Inr">
			<h3><?php echo $this->Html->image('top_images/001_txt_005.png', array('alt' => 'オープンハウス')); ?></h3>
			<p class="cnt_02_date"><?php /*2015年4月25日(土)～5月10日(日)*/ ?>ご都合に合わせ随時ご案内いたします。</p>
			<p class="cnt_02_txt_01">建築のご提案も承ります。お気軽にご相談ください。</p>
			<div class="clrFix">
				<p class="cnt_02_title">売地(建築条件なし)</p>
				<p class="cnt_02_txt_02" style="padding-left: 0; margin-bottom: 0;"><s>7,300万円</s> → 6,780万円</p>
				<p class="cnt_02_txt_01" style="clear: both;">※大幅に値下げいたしました！</p>
			</div>
			<p class="cnt_02_txt_03 mb-00">都営三田線「千石」駅 徒歩5分</p>
			<dl class="cnt_02_add clrFix">
				<dt class="cnt_02_add_01">住所：</dt>
				<dd class="cnt_02_add_02">東京都文京区千石一丁目</dd>
			</dl>
			<!--<p class="cnt_02_add_03">土地面積：00坪　※建築条件なし</p>-->
			<!--<p class="btn_more clrFix"><?php echo $this->Html->link($this->Html->image('top_images/oh/201504_kyoudou/btn_no1.png', array('alt' => 'もっと詳しく')), '/searches/detail/123456789', array('class' => 'btnOpa', 'escape' => false)); ?></p>-->
			
			<ul class="btn-list">
				<li><?php echo $this->Html->link($this->Html->image('top_images/oh/201610_sengoku/btn_a.png', array('alt' => 'A区画')), '/specials/sengoku/', array('class' => 'btnOpa', 'escape' => false)); ?></li>
				<!--<li><?php echo $this->Html->link($this->Html->image('top_images/oh/201610_sengoku/btn_b.png', array('alt' => 'B区画')), '/searches/detail/1452586301.html', array('class' => 'btnOpa', 'escape' => false)); ?></li>-->
				<li><?php echo $this->Html->image('top_images/oh/201610_sengoku/btn_b.png', array('alt' => 'B区画 販売終了しました')); ?></li>
				
			</ul>
			
		</div>
	</div>
</section><?php /*}*/ ?>

<?php if ($artData): ?>
<section>
	<div class="cnt_03 clrFix">
		<h2 style="background:url('/sp/img/line_dot_bg.png');"><span style="background:#FFFFFF; padding-right:10px;">スタッフ一押し</span></h2>
		
		<?php foreach ($artData as $key => $val): ?>
		<div class="cnt_03Inr_01">
			<p class="cnt_03_img"><?php echo $this->SiteUtil->getThumbPhoto($val['Article']['id'], 'm', 600, 305); ?></p>
			<div class="cnt_03Inr_02">
				<div class="clrFix"><p class="cnt_03_title cat0<?php echo h($val['Article']['category']); ?>"><?php echo h($categoryList[$val['Article']['category']]); ?></p><p class="cnt_03_txt_02"><?php echo h($this->SiteUtil->numberFormat($val['Article']['price'], 1)); ?></p></div>
				<p class="cnt_03_txt_03"><?php echo h($this->SiteUtil->getTrafficArr($val['Article']['traffic'])); ?></p>
				<dl class="cnt_03_add clrFix">
					<dt class="cnt_03_add_01">住所：</dt>
					<dd class="cnt_03_add_02"><?php echo h($val['Article']['pref']); ?><?php echo h($val['Article']['city']); ?><?php echo h($val['Article']['town']); ?></dd>
				</dl>
				<p class="btn_more_02"><?php echo $this->Html->link($this->Html->image('top_images/002_img_002.png', array('alt' => 'もっと詳しく')), '/searches/detail/' . h($val['Article']['id'] . '.html'), array('class' => 'btnOpa', 'escape' => false)); ?></p>
			</div>
		</div>
		<?php endforeach; ?>
		
	</div>
</section>
<?php endif; ?>

<section id="reno">
	<div class="cnt_03 clrFix">
		<h2 style="background:url('/sp/img/line_dot_bg.png');"><span style="background:#FFFFFF; padding-right:10px;">リノベーション&amp;リフォーム済特集</span></h2>
		
		<div class="cnt_03Inr_01">
			<p class="cnt_03_img"><?php echo $this->Html->link($this->Html->image('top_images/reno/main_minato.jpg', array('alt' => '港区のリノベーションマンションイメージ')), '/renovations/minato/', array('class' => '', 'escape' => false)); ?></p>
			<p><?php echo $this->Html->link($this->Html->image('top_images/reno/title_minato.png', array('alt' => '港区のリノベーションマンション')), '/renovations/minato/', array('class' => '', 'escape' => false)); ?></p>
		</div>
		
		<div class="cnt_03Inr_01">
			<p class="cnt_03_img"><?php echo $this->Html->link($this->Html->image('top_images/reno/main_meguro.jpg', array('alt' => '目黒区のリノベーションマンションイメージ')), '/renovations/meguro/', array('class' => '', 'escape' => false)); ?></p>
			<p><?php echo $this->Html->link($this->Html->image('top_images/reno/title_meguro.png', array('alt' => '目黒区のリノベーションマンション')), '/renovations/meguro/', array('class' => '', 'escape' => false)); ?></p>
		</div>
		
		<div class="cnt_03Inr_01">
			<p class="cnt_03_img"><?php echo $this->Html->link($this->Html->image('top_images/reno/main_setagaya.jpg', array('alt' => '世田谷区のリノベーションマンションイメージ')), '/renovations/setagaya/', array('class' => '', 'escape' => false)); ?></p>
			<p><?php echo $this->Html->link($this->Html->image('top_images/reno/title_setagaya.png', array('alt' => '世田谷区のリノベーションマンション')), '/renovations/setagaya/', array('class' => '', 'escape' => false)); ?></p>
		</div>
		
		<div class="cnt_03Inr_01">
			<p class="cnt_03_img"><?php echo $this->Html->link($this->Html->image('top_images/reno/main_shibuya.jpg', array('alt' => '渋谷区のリノベーションマンションイメージ')), '/renovations/shibuya/', array('class' => '', 'escape' => false)); ?></p>
			<p class="mb-00"><?php echo $this->Html->link($this->Html->image('top_images/reno/title_shibuya.png', array('alt' => '渋谷区のリノベーションマンション')), '/renovations/shibuya/', array('class' => '', 'escape' => false)); ?></p>
		</div>
		
	</div>
</section>

<section>
	<div class="cnt_01">
		<h2>
			<?php echo $this->Html->image('top_images/001_txt_001.png', array('alt' => 'customaize')); ?>
			<span class="custom"><?php echo $this->Html->image('top_images/001_txt_002.png', array('alt' => '自分好みにカスタマイズ')); ?></span>
		</h2>

		<div class="cntInr">
			<div class="cnt_01_image clrFix">
				<p><?php echo $this->Html->image('top_images/cnt_01_image01.png', array('alt' => '')); ?></p>
				<p><?php echo $this->Html->image('top_images/cnt_01_image02.png', array('alt' => '')); ?></p>
				<p><?php echo $this->Html->image('top_images/cnt_01_image03.png', array('alt' => '')); ?></p>
				<p><?php echo $this->Html->image('top_images/cnt_01_image04.png', array('alt' => '')); ?></p>
				<p><?php echo $this->Html->image('top_images/cnt_01_image05.png', array('alt' => '')); ?></p>
				<p><?php echo $this->Html->image('top_images/cnt_01_image06.png', array('alt' => '')); ?></p>
				<p><?php echo $this->Html->image('top_images/cnt_01_image07.png', array('alt' => '')); ?></p>
				<p><?php echo $this->Html->image('top_images/cnt_01_image08.png', array('alt' => '')); ?></p>
				<p><?php echo $this->Html->image('top_images/cnt_01_image09.png', array('alt' => '')); ?></p>
				<p><?php echo $this->Html->image('top_images/cnt_01_image10.png', array('alt' => '')); ?></p>
				<p><?php echo $this->Html->image('top_images/cnt_01_image11.png', array('alt' => '')); ?></p>
				<p><?php echo $this->Html->image('top_images/cnt_01_image12.png', array('alt' => '')); ?></p>
			</div>
			<p class="cnt_01_txt"><?php echo $this->Html->image('top_images/001_txt_003.png', array('alt' => '不動産販売業者と一級建築事務所が同じ会社だから実現')); ?></p>
			<p class="logo_01"><?php echo $this->Html->image('top_images/001_img_001.png', array('alt' => 'DESIGN BT Reno')); ?></p>
			<p class="btn_more"><?php echo $this->Html->link($this->Html->image('top_images/001_btn_001.png', array('alt' => 'もっと詳しく')), 'http://www.reno-style.com', array('target' => '_blank', 'class' => 'btnOpa', 'escape' => false)); ?></p>
		</div>
	</div>
</section>

<?php echo $this->element('modules/share', array()); ?>
<?php echo $this->element('modules/tag', array()); ?>
<?php echo $this->element('modules/button', array()); ?>
<?php echo $this->element('modules/information', array()); ?>
