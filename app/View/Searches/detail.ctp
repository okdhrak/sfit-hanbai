<?php
$this->assign('description', $val['Article']['name'] . '・');
$this->assign('keywords', $val['Article']['name'] . ',');
$this->assign('title', $val['Article']['name'] . '｜');

//pr($val);
//echo FONT_DIR;
?>
<section id="visualTc">
<div id="visualTcInr" class="br3">
<div id="titleArea">
<h1><span class="unit01"><?php echo h($val['Article']['city']); ?>×<?php echo h($categoryList[$val['Article']['category']]); ?></span><span class="unit02">良い家×自分らしさ</span><span class="unit03"><?php echo h($val['Article']['city']); ?>の戸建・土地・マンションのセレクトショップ</span></h1>
</div>
<div id="kvAreaMini">
<ul id="kvMini">
<li><img src="/img/content_images/kv/001.png" alt=""></li>
<li><img src="/img/content_images/kv/002.png" alt=""></li>
<li><img src="/img/content_images/kv/003.png" alt=""></li>
<li><img src="/img/content_images/kv/004.png" alt=""></li>
<li><img src="/img/content_images/kv/005.png" alt=""></li>
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

<div id="content" >
<div id="contentInr">

<main id="main">
<div id="mainInr">

<article id="single">

<div class="detail">
<h2 class="<?php echo h('cat0' . $val['Article']['category']); ?>"><?php echo h($categoryList[$val['Article']['category']]); ?></h2>
<div class="box">
<table class="table01">
	<tbody>
		<tr>
			<th>価格<span>:&nbsp;</span></th>
			<td><span class="price"><?php echo h($this->SiteUtil->numberFormat($val['Article']['price'], 1)); ?></span></td>
			<th>物件名<span>:&nbsp;</span></th>
			<td><?php echo h($val['Article']['name']); ?></td>
		</tr>
		<tr>
			<th>住所<span>:&nbsp;</span></th>
			<td><?php echo h($val['Article']['pref']); ?><?php echo h($val['Article']['city']); ?><?php echo h($val['Article']['town']); ?></td>
			<th>取引態様<span>:&nbsp;</span></th>
			<td><?php echo h(@$accountList[$val['Article']['account']]); ?></td>
		</tr>
		<tr>
			<th>交通<span>:&nbsp;</span></th>
			<td><?php echo nl2br(h($this->SiteUtil->getTrafficAll($val['Article']['traffic']))); ?></td>
			<th>交通(バス)<span>:&nbsp;</span></th>
			<td><?php echo nl2br(h($val['Article']['bus'])); ?></td>
		</tr>
		<tr>
			<th>用途地域①<span>:&nbsp;</span></th>
			<td><?php echo h(@$districtList[$val['Article']['district1']]); ?></td>
			<th>用途地域②<span>:&nbsp;</span></th>
			<td><?php echo h(@$districtList[$val['Article']['district2']]); ?></td>
		</tr>
		<tr>
			<th>現況<span>:&nbsp;</span></th>
			<td><?php echo ($val['Article']['category'] == 1) ? h(@$landStateList[$val['Article']['state']]) : h(@$buildingStateList[$val['Article']['state']]); ?></td>
			<th>敷地の権利<span>:&nbsp;</span></th>
			<td><?php echo h(@$rightsList[$val['Article']['rights']]); ?></td>
		</tr>
		<tr>
			<th>引渡し時期<span>:&nbsp;</span></th>
			<td><?php echo h(@$deliveryList[$val['Article']['delivery']]); ?></td>
			<th>引渡し日<span>:&nbsp;</span></th>
			<td><?php echo nl2br(h($val['Article']['delivery_etc'])); ?></td>
		</tr>
		<tr>
			<th>建築確認番号<span>:&nbsp;</span></th>
			<td><?php echo h($val['Article']['building_confirmation']); ?></td>
			<th>開発許可番号<span>:&nbsp;</span></th>
			<td><?php echo h($val['Article']['development_permit']); ?></td>
		</tr>
		<tr>
			<th>設備等<span>:&nbsp;</span></th>
			<td><?php echo nl2br(h($val['Article']['facilities'])); ?></td>
			<th>備考<span>:&nbsp;</span></th>
			<td><?php echo nl2br(h($val['Article']['etc'])); ?></td>
		</tr>
		
	</tbody>
</table>

<p class="favorite"><?php echo $this->SiteUtil->getFavBtn($val['Article']['id']); ?></p>
</div>
<p class="update">最終更新日:<?php echo h($val['ResistationTime']['modified']); ?></p>
</div><!-- /.detail -->

<?php if ($val['Article']['sells_point']): ?>
<div class="comment">
<h3>スタッフコメント</h3>
<p><?php echo nl2br(h($val['Article']['sells_point'])); ?></p>
</div><!-- /.comment -->
<?php endif; ?>

<div class="photo">
<h2><img src="/img/content_images/h-photo.png" alt="photo" /></h2>
<div class="double clrFix">
<?php echo $this->SiteUtil->getDetailPhoto($val['Article']['id'], 'm'); ?>
<?php echo $this->SiteUtil->getDetailPhoto($val['Article']['id'], 'p'); ?>
</div>
<div class="triple clrFix">
<?php echo $this->SiteUtil->getDetailPhoto($val['Article']['id'], 'o'); ?>
</div>
</div><!-- /.photo -->

<div class="spec">
<h2><img src="/img/content_images/h-spec.png" alt="spec"/></h2>
<table class="table02" cellspacing="0">
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
		<td><?php echo h($this->SiteUtil->priceFormat($val['PeculiarPoint']['m_management_cost']) . '円')?></td>
	</tr><?php endif; ?>
	<?php if ($val['PeculiarPoint']['m_repair_cost']): ?><tr>
		<th>修繕積立金</th>
		<td><?php echo h($this->SiteUtil->priceFormat($val['PeculiarPoint']['m_repair_cost']) . '円')?></td>
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

<div class="contct_p">
<p>お電話でのご相談 <span>03-5797-7019</span></p>
</div>

<div class="btn-cntct clrFix">
<p class="btn-contct-01"><a href="/properties/<?php echo h($val['Article']['id']); ?>">物件のお問合せ</a></p>
<p class="btn-contct-02"><a href="/properties/<?php echo h($val['Article']['id']); ?>">見学予約</a></p>
</div>

<?php echo $this->element('modules/tag', array()); ?>

</article><!-- /#single -->

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
