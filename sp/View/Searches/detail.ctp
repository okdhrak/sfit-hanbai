<?php
//$this->assign('description', $meta . '・');
//$this->assign('keywords', $meta . ',');
//$this->assign('title', $meta . '｜');

//pr($this);
//pr($articlesData);
//pr($_POST);
//pr($_SESSION);
?>
<script>
$(function(){
	var mh = screen.height;
	var mw = screen.width;
	var ratio = 640 / mw;
	mh = mh*ratio;
	mh = mh - 200;
	$('#bxSilderSaleCb,#bxSilderSaleCb li,#bxSilderSaleCb .imageThumbWrap').height(mh);
	$('#bxSilderSaleCb li img').css('max-height',mh + 'px');
	$('#colorBoxSlider').css('position','fixed');
	$('#colorBoxSlider').css('left','47px');
	$('#colorBoxSlider').css('top', '80px');

	var saleSlide = $('#bxSilderSale').bxSlider({
		slideWidth: 600,
		auto: false,
		infiniteLoop: false,
		onSlideBefore:function(e){
			syncSlide(saleSlide.getCurrentSlide(),true);
		},
		onSlideAfter: function(e){
			afterSlide(saleSlide.getCurrentSlide(),saleSlide.getSlideCount());
		}
	});
	var saleSlideCb = $('#bxSilderSaleCb').bxSlider({
		slideWidth: 546,
		auto: false,
		infiniteLoop: false,
		onSlideBefore:function(e){
			syncSlide(saleSlideCb.getCurrentSlide(),false);
		},
		onSlideAfter: function(e){
			afterSlide(saleSlideCb.getCurrentSlide(),saleSlideCb.getSlideCount());
		}
	});
	afterSlide(saleSlide.getCurrentSlide(),saleSlide.getSlideCount());

	var bt = ( mh / 2 ) - 40;
	$('#colorBoxSlider .bx-controls-direction .bx-prev , #colorBoxSlider .bx-controls-direction .bx-next').css('top', bt + 'px');


	function syncSlide( a, b ){
		if ( b ) {
			saleSlideCb.goToSlide(a);
		} else {
			saleSlide.goToSlide(a);
		}
	}

	function afterSlide(a,b){
		a = a + 1;
		$('#numbers .current').text(a);
		$('#numbers .total').text(b);
		if ( a == 1 ) {
			$('#colorBoxSlider .bx-controls-direction .bx-prev').addClass('none');
		} else {
			$('#colorBoxSlider .bx-controls-direction .bx-prev').removeClass('none');
		}
		if ( a == b ) {
			$('#colorBoxSlider .bx-controls-direction .bx-next').addClass('none');
		} else {
			$('#colorBoxSlider .bx-controls-direction .bx-next').removeClass('none');
		}
	}

	$('#bxSilderSale li a').click(function(){
		$('#colorBoxSlider').css('overflow','visible');
		$('#screenbg').css({width:'640px',height:'9999px',position:'fixed',left:'0',top:'0'});
		$('#screenbg').show();
		return false;
	})
	$('#screenbg').click(function(){
		$('#screenbg').hide();
		$('#colorBoxSlider').css('overflow','hidden');
	});
});
</script>
</head>

<body class="sale">
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
			<h1><span class="unit01"><?php echo h($val['Article']['city']); ?>×<?php echo h($categoryList[$val['Article']['category']]); ?></span>
			<span class="unit02">良い家×自分らしさ</span><span class="unit03"><?php echo h($val['Article']['city']); ?>の戸建・土地・マンションの<br>セレクトショップ</span></h1>
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

<article>
	<div id="content">
	
		<section>
			<div class="detail">
				<h2 class="<?php echo h('cat0' . $val['Article']['category']); ?>"><?php echo h($categoryList[$val['Article']['category']]); ?></h2>
				<div class="box">
					<table class="detail_table_01">
						<tbody>
							<tr>
								<th>価格<span>:</span></th>
								<td><span class="price"><?php echo h($this->SiteUtil->numberFormat($val['Article']['price'], 1)); ?></span></td>
							</tr>
							<tr>
								<th>物件名<span>:</span></th>
								<td><?php echo h($val['Article']['name']); ?></td>
							</tr>
							<tr>
								<th>交通<span>:</span></th>
								<td><?php echo nl2br(h($this->SiteUtil->getTrafficAll($val['Article']['traffic']))); ?></td>
							</tr>
							<tr>
								<th>交通(バス)<span>:</span></th>
								<td><?php echo nl2br(h($val['Article']['bus'])); ?></td>
							</tr>
							<tr>
								<th>住所<span>:</span></th>
								<td><?php echo h($val['Article']['pref']); ?><?php echo h($val['Article']['city']); ?><?php echo h($val['Article']['town']); ?></td>
							</tr>
							<?php if ($val['Article']['district1']): ?><tr>
								<th>用途地域①<span>:</span></th>
								<td><?php echo h(@$districtList[$val['Article']['district1']]); ?></td>
							</tr><?php endif; ?>
							<?php if ($val['Article']['district2']): ?><tr>
								<th>用途地域②<span>:</span></th>
								<td><?php echo h(@$districtList[$val['Article']['district2']]); ?></td>
							</tr><?php endif; ?>
							<?php if ($val['Article']['state']): ?><tr>
								<th>現況<span>:</span></th>
								<td><?php echo ($val['Article']['category'] == 1) ? h(@$landStateList[$val['Article']['state']]) : h(@$buildingStateList[$val['Article']['state']]); ?></td>
							</tr><?php endif; ?>
							<?php if ($val['Article']['rights']): ?><tr>
								<th>敷地の権利<span>:</span></th>
								<td><?php echo h(@$rightsList[$val['Article']['rights']]); ?></td>
							</tr><?php endif; ?>
							<?php if ($val['Article']['delivery']): ?><tr>
								<th>引渡し時期<span>:</span></th>
								<td><?php echo h(@$deliveryList[$val['Article']['delivery']]); ?></td>
							</tr><?php endif; ?>
							<?php if ($val['Article']['delivery_etc']): ?><tr>
								<th>引渡し日<span>:</span></th>
								<td><?php echo nl2br(h($val['Article']['delivery_etc'])); ?></td>
							</tr><?php endif; ?>
							<?php if ($val['Article']['building_confirmation']): ?><tr>
								<th>建築確認番号<span>:</span></th>
								<td><?php echo h($val['Article']['building_confirmation']); ?></td>
							</tr><?php endif; ?>
							<?php if ($val['Article']['development_permit']): ?><tr>
								<th>開発許可番号<span>:</span></th>
								<td><?php echo h($val['Article']['development_permit']); ?></td>
							</tr><?php endif; ?>
							<?php if ($val['Article']['account']): ?><tr>
								<th>取引態様<span>:</span></th>
								<td><?php echo h(@$accountList[$val['Article']['account']]); ?></td>
							</tr><?php endif; ?>
							<?php if ($val['Article']['facilities']): ?><tr>
								<th>設備等<span>:</span></th>
								<td><?php echo nl2br(h($val['Article']['facilities'])); ?></td>
							</tr><?php endif; ?>
							<?php if ($val['Article']['etc']): ?><tr>
								<th>備考<span>:</span></th>
								<td><?php echo nl2br(h($val['Article']['etc'])); ?></td>
							</tr><?php endif; ?>
							
						</tbody>
					</table>
					<p class="favorite"><?php echo $this->SiteUtil->getFavBtn($val['Article']['id']); ?></p>
				</div>
			</div><!-- /.detail -->
		</section>
		
		<?php if ($val['Article']['sells_point']): ?>
		<section>
			<div class="comment">
				<h3>スタッフコメント</h3>
				<p><?php echo nl2br(h($val['Article']['sells_point'])); ?></p>
			</div>
		</section>
		<?php endif; ?>
		
		<section>
			<div class="photo">
				<div class="slide_wrap">
					<ul id="bxSilderSale">
						<?php echo $this->SiteUtil->getDetailPhoto($val['Article']['id'], 'm'); ?>
						<?php echo $this->SiteUtil->getDetailPhoto($val['Article']['id'], 'p'); ?>
						<?php echo $this->SiteUtil->getDetailPhoto($val['Article']['id'], 'o'); ?>
						<!--<li><p class="imageThumbWrap"><a href="#bxSilderSaleCb" class=""><img src="/sp/img/400x800.gif" alt=""></a></p></li>
						<li><p class="imageThumbWrap"><a href="#bxSilderSaleCb" class=""><img src="/sp/img/800x400.gif" alt=""></a></p></li>
						<li><p class="imageThumbWrap"><a href="#bxSilderSaleCb" class=""><img src="/sp/img/800x1600.gif" alt=""></a></p></li>
						<li><p class="imageThumbWrap"><a href="#bxSilderSaleCb" class=""><img src="/sp/img/800x1200.gif" alt=""></a></p></li>
						<li><p class="imageThumbWrap"><a href="#bxSilderSaleCb" class=""><img src="/sp/img/1200x800.gif" alt=""></a></p></li>-->
					</ul>
				</div>
			</div><!-- /.photo -->
		</section>
		
		<section id="colorBoxSlider">
			<p id="numbers"><span class="current">0</span>/<span class="total">0</span></p>
			<p class="cboxClose"></p>
			<ul id="bxSilderSaleCb">
				<!--<li><p class="imageThumbWrap"><img src="/sp/img/400x800.gif" alt=""></p></li>
				<li><p class="imageThumbWrap"><img src="/sp/img/800x400.gif" alt=""></p></li>
				<li><p class="imageThumbWrap"><img src="/sp/img/800x1600.gif" alt=""></p></li>
				<li><p class="imageThumbWrap"><img src="/sp/img/800x1200.gif" alt=""></p></li>
				<li><p class="imageThumbWrap"><img src="/sp/img/1200x800.gif" alt=""></p></li>-->
			</ul>
		</section>
		
		<div id="screenbg"></div>
		
		<?php echo $this->element('modules/contact', array('id' => $val['Article']['id'])); ?>
		
		<section>
			<div class="spec">
				<table class="detail_table_02" cellspacing="0">
					<tbody>
						
					<?php if ($val['Article']['category'] == 1): ?>
	
						<?php if ($val['PeculiarPoint']['t_site']): ?><tr>
							<th>土地面積</th>
							<td><?php echo h($val['PeculiarPoint']['t_site'] . '㎡')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['t_lot']): ?><tr>
							<th>総区画数</th>
							<td><?php echo h($val['PeculiarPoint']['t_lot'])?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['t_site_coverage1']): ?><tr>
							<th>建ぺい率①</th>
							<td><?php echo h($val['PeculiarPoint']['t_site_coverage1'] . '%')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['t_floorarea_ratio1']): ?><tr>
							<th>容積率①</th>
							<td><?php echo h($val['PeculiarPoint']['t_floorarea_ratio1'] . '%')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['t_site_coverage2']): ?><tr>
							<th>建ぺい率②</th>
							<td><?php echo h($val['PeculiarPoint']['t_site_coverage2'] . '%')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['t_floorarea_ratio2']): ?><tr>
							<th>容積率②</th>
							<td><?php echo h($val['PeculiarPoint']['t_floorarea_ratio2'] . '%')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['t_setback']): ?><tr>
							<th>セットバック</th>
							<td><?php echo h($val['PeculiarPoint']['t_setback'] . '㎡')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['t_road_category1']): ?><tr>
							<th>接道状況①</th>
							<td>種別:<?php echo h(@$loadList[$val['PeculiarPoint']['t_road_category1']])?> <?php echo h(@$directionList[$val['PeculiarPoint']['t_road_direction1']] . '向き')?> (接面長さ:<?php echo h($val['PeculiarPoint']['t_road_length1'])?>m 幅員:<?php echo h($val['PeculiarPoint']['t_road_width1'])?>m)</td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['t_road_category2']): ?><tr>
							<th>接道状況②</th>
							<td>種別:<?php echo h(@$loadList[$val['PeculiarPoint']['t_road_category2']])?> <?php echo h(@$directionList[$val['PeculiarPoint']['t_road_direction2']] . '向き')?> (接面長さ:<?php echo h($val['PeculiarPoint']['t_road_length2'])?>m 幅員:<?php echo h($val['PeculiarPoint']['t_road_width2'])?>m)</td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['t_road_category3']): ?><tr>
							<th>接道状況③</th>
							<td>種別:<?php echo h(@$loadList[$val['PeculiarPoint']['t_road_category3']])?> <?php echo h(@$directionList[$val['PeculiarPoint']['t_road_direction3']] . '向き')?> (接面長さ:<?php echo h($val['PeculiarPoint']['t_road_length3'])?>m 幅員:<?php echo h($val['PeculiarPoint']['t_road_width3'])?>m)</td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['t_road_category4']): ?><tr>
							<th>接道状況④</th>
							<td>種別:<?php echo h(@$loadList[$val['PeculiarPoint']['t_road_category4']])?> <?php echo h(@$directionList[$val['PeculiarPoint']['t_road_direction4']] . '向き')?> (接面長さ:<?php echo h($val['PeculiarPoint']['t_road_length4'])?>m 幅員:<?php echo h($val['PeculiarPoint']['t_road_width4'])?>m)</td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['t_land_category']): ?><tr>
							<th>地目</th>
							<td><?php echo h(@$landCategoryList[$val['PeculiarPoint']['t_land_category']])?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['t_urban_plan']): ?><tr>
							<th>都市計画</th>
							<td><?php echo h(@$urbanPlanList[$val['PeculiarPoint']['t_urban_plan']])?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['t_building_condition']): ?><tr>
							<th>建築条件の有無</th>
							<td><?php echo h(@$buildingConditionList[$val['PeculiarPoint']['t_building_condition']])?></td>
						</tr><?php endif; ?>
					<?php elseif ($val['Article']['category'] == 2): ?>
						<?php if ($val['PeculiarPoint']['k_extent']): ?><tr>
							<th>面積</th>
							<td><?php echo h($val['PeculiarPoint']['k_extent'] . '㎡')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_site']): ?><tr>
							<th>土地面積</th>
							<td><?php echo h($val['PeculiarPoint']['k_site'] . '㎡')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_room_num'] || $val['PeculiarPoint']['k_room_type']): ?><tr>
							<th>間取り</th>
							<td><?php echo h($val['PeculiarPoint']['k_room_num'] . @$roomTypeList[$val['PeculiarPoint']['k_room_type']])?></td>
						</tr><?php endif; ?>
						<?php if ($this->SiteUtil->checkOld($val['PeculiarPoint']['k_old'])): ?><tr>
							<th>築年数</th>
							<td><?php echo h($this->SiteUtil->getOld($val['PeculiarPoint']['k_old']))?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_structure']): ?><tr>
							<th>構造</th>
							<td><?php echo h(@$structureList[$val['PeculiarPoint']['k_structure']])?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_building']): ?><tr>
							<th>建物階数</th>
							<td><?php echo h($val['PeculiarPoint']['k_building'] . '階建て')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_lot']): ?><tr>
							<th>総区画数</th>
							<td><?php echo h($val['PeculiarPoint']['k_lot'])?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_site_coverage1']): ?><tr>
							<th>建ぺい率①</th>
							<td><?php echo h($val['PeculiarPoint']['k_site_coverage1'] . '%')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_floorarea_ratio1']): ?><tr>
							<th>容積率①</th>
							<td><?php echo h($val['PeculiarPoint']['k_floorarea_ratio1'] . '%')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_site_coverage2']): ?><tr>
							<th>建ぺい率②</th>
							<td><?php echo h($val['PeculiarPoint']['k_site_coverage2'] . '%')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_floorarea_ratio2']): ?><tr>
							<th>容積率②</th>
							<td><?php echo h($val['PeculiarPoint']['k_floorarea_ratio2'] . '%')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_setback']): ?><tr>
							<th>セットバック</th>
							<td><?php echo h($val['PeculiarPoint']['k_setback'] . '㎡')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_road_category1']): ?><tr>
							<th>接道状況①</th>
							<td>種別:<?php echo h(@$loadList[$val['PeculiarPoint']['k_road_category1']])?> <?php echo h(@$directionList[$val['PeculiarPoint']['k_road_direction1']] . '向き')?> (接面長さ:<?php echo h($val['PeculiarPoint']['k_road_length1'])?>m 幅員:<?php echo h($val['PeculiarPoint']['k_road_width1'])?>m)</td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_road_category2']): ?><tr>
							<th>接道状況②</th>
							<td>種別:<?php echo h(@$loadList[$val['PeculiarPoint']['k_road_category2']])?> <?php echo h(@$directionList[$val['PeculiarPoint']['k_road_direction2']] . '向き')?> (接面長さ:<?php echo h($val['PeculiarPoint']['k_road_length2'])?>m 幅員:<?php echo h($val['PeculiarPoint']['k_road_width2'])?>m)</td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_road_category3']): ?><tr>
							<th>接道状況③</th>
							<td>種別:<?php echo h(@$loadList[$val['PeculiarPoint']['k_road_category3']])?> <?php echo h(@$directionList[$val['PeculiarPoint']['k_road_direction3']] . '向き')?> (接面長さ:<?php echo h($val['PeculiarPoint']['k_road_length3'])?>m 幅員:<?php echo h($val['PeculiarPoint']['k_road_width3'])?>m)</td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_road_category4']): ?><tr>
							<th>接道状況④</th>
							<td>種別:<?php echo h(@$loadList[$val['PeculiarPoint']['k_road_category4']])?> <?php echo h(@$directionList[$val['PeculiarPoint']['k_road_direction4']] . '向き')?> (接面長さ:<?php echo h($val['PeculiarPoint']['k_road_length4'])?>m 幅員:<?php echo h($val['PeculiarPoint']['k_road_width4'])?>m)</td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_land_category']): ?><tr>
							<th>地目</th>
							<td><?php echo h(@$landCategoryList[$val['PeculiarPoint']['k_land_category']])?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['k_urban_plan']): ?><tr>
							<th>都市計画</th>
							<td><?php echo h(@$urbanPlanList[$val['PeculiarPoint']['k_urban_plan']])?></td>
						</tr><?php endif; ?>
						
					<?php elseif ($val['Article']['category'] == 3): ?>
						<?php if ($val['PeculiarPoint']['m_extent']): ?><tr>
							<th>専有面積</th>
							<td><?php echo h($val['PeculiarPoint']['m_extent'] . '㎡')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['m_extent_bal']): ?><tr>
							<th>バルコニー面積</th>
							<td><?php echo h($val['PeculiarPoint']['m_extent_bal'] . '㎡')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['m_management_cost']): ?><tr>
							<th>管理費</th>
							<td><?php echo h($val['PeculiarPoint']['m_management_cost'] . '円')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['m_repair_cost']): ?><tr>
							<th>修繕積立金</th>
							<td><?php echo h($val['PeculiarPoint']['m_repair_cost'] . '円')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['m_room_type']): ?><tr>
							<th>間取り</th>
							<td><?php echo h($val['PeculiarPoint']['m_room_num'] . @$roomTypeList[$val['PeculiarPoint']['m_room_type']])?></td>
						</tr><?php endif; ?>
						<?php if ($this->SiteUtil->checkOld($val['PeculiarPoint']['m_old'])): ?><tr>
							<th>築年数</th>
							<td><?php echo h($this->SiteUtil->getOld($val['PeculiarPoint']['m_old']))?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['m_structure']): ?><tr>
							<th>構造</th>
							<td><?php echo h(@$structureList[$val['PeculiarPoint']['m_structure']])?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['m_building']): ?><tr>
							<th>建物階数</th>
							<td><?php echo h($val['PeculiarPoint']['m_building'] . '階建て')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['m_floor']): ?><tr>
							<th>所在階</th>
							<td><?php echo h($val['PeculiarPoint']['m_floor'] . '階')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['m_rooms']): ?><tr>
							<th>総戸数</th>
							<td><?php echo h($val['PeculiarPoint']['m_rooms'] . '戸')?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['m_window']): ?><tr>
							<th>窓の向き</th>
							<td><?php echo h(@$directionList[$val['PeculiarPoint']['m_window']])?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['m_outside_facilities']): ?><tr>
							<th>部屋外設備</th>
							<td><?php echo nl2br(h($val['PeculiarPoint']['m_outside_facilities']))?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['m_management']): ?><tr>
							<th>管理形態</th>
							<td><?php echo h(@$managementList[$val['PeculiarPoint']['m_management']])?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['m_parking']): ?><tr>
							<th>駐車場</th>
							<td><?php echo h(@$existenceList[$val['PeculiarPoint']['m_parking']])?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['m_bicycle_parking']): ?><tr>
							<th>駐輪場</th>
							<td><?php echo h(@$existenceList[$val['PeculiarPoint']['m_bicycle_parking']])?></td>
						</tr><?php endif; ?>
						<?php if ($val['PeculiarPoint']['m_bike_parking']): ?><tr>
							<th>バイク置き場</th>
							<td><?php echo h(@$existenceList[$val['PeculiarPoint']['m_bike_parking']])?></td>
						</tr><?php endif; ?>
						
					<?php endif; ?>
						
					</tbody>
				</table>
			</div><!-- /.spec -->
		</section>
		
		<?php echo $this->element('modules/contact', array('id' => $val['Article']['id'])); ?>
	
	</div><!-- /#content -->
</article>

<?php echo $this->element('modules/share', array()); ?>
<?php echo $this->element('modules/tag', array()); ?>
