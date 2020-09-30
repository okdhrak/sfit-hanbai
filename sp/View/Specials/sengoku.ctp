<?php
$this->assign('description', '文京区千石一丁目【売地(土地)】 都営三田線「千石」駅徒歩5分 限定2区画｜');
$this->assign('keywords', '文京区,千石一丁目,東急田園都市線,千石,売り地,土地,');
$this->assign('title', '千石一丁目売地(土地) 文京区千石一丁目｜');
?>

<?php
//Googlemap Api
$this->start('gmap');
echo '<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCs8UcysP8HSOkvFf2MwGA05payfuNNr0c"></script>';
echo '<script>';
echo '$(function(){
	// Google Mapで利用する初期設定用の変数
	var latlng = new google.maps.LatLng(35.726619, 139.744923);
	var mapOptions = {
		zoom: 16,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		center: latlng,
		scrollwheel: false,
	};
	// GoogleMapの生成
	var gmap = new google.maps.Map(document.getElementById("map"), mapOptions);
	
	// サークルの描写
	new google.maps.Circle({
		center: latlng,         // 中心点(google.maps.LatLng)
		fillColor: "#ff0000",   // 塗りつぶし色
		fillOpacity: 0.2,       // 塗りつぶし透過度（0: 透明 ⇔ 1:不透明）
		map: gmap,              // 表示させる地図（google.maps.Map）
		radius: 300,            // 半径(m)
		strokeColor: "#ff0000", // 外周色
		strokeOpacity: 0,       // 外周透過度（0: 透明 ⇔ 1:不透明）
		strokeWeight: 0,        // 外周太さ（ピクセル）
	});
	
});';
echo '</script>';
$this->end();
?>

<section class="mb-50">
	<div class="mv">
		<h1><?php echo $this->Html->image('specials/sengoku/mv.png', array('alt' => '文京区千石一丁目 売地')); ?></h1>
		<!--<p class="mb-00"><?php echo $this->Html->image('specials/sengoku/mv_title.png', array('alt' => '都営三田線「千石」駅 徒歩5分')); ?></p>-->
	</div>
</section>

<section id="special" class="sengoku">
	<div id="specialIner">
		<div class="contact">
			<p class="mb-30"><?php echo $this->Html->image('specials/sengoku/contact_title.png', array('alt' => '現地案内随時 予約受付中！ 電話：03-5797-7019')); ?></p>
			<p><?php echo $this->Html->link($this->Html->Image('specials/sengoku/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1468371943', array('target' => '_blank', 'escape' => false)); ?></p>
		</div>
		
		<div class="plan">
			<h2 class="mb-30"><?php echo $this->Html->image('specials/sengoku/plan_title.png', array('alt' => '販売区画')); ?></h2>
			<h3><?php echo $this->Html->image('specials/sengoku/plan_st.png', array('alt' => '各居室それぞれに収納を確保。2階部分全体をリビングスペースとした広々LDK。')); ?></h3>
			<ul>
				<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/sengoku/plan_div_a.png', array('alt' => '販売区画 A区画')); ?></p>
					<p><?php echo $this->Html->link($this->Html->Image('specials/sengoku/btn_plan_room_a.png', array('alt' => 'A区画参考プランの詳細')), '/searches/detail/1468371943.html', array('target' => '_blank', 'escape' => false)); ?></p>
				</li>
				<!--<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/sengoku/plan_div_b.png', array('alt' => '販売区画 B区画')); ?></p>
					<p><?php echo $this->Html->link($this->Html->Image('specials/sengoku/btn_plan_room_b.png', array('alt' => 'B区画参考プランの詳細')), '/searches/detail/1468372383.html', array('target' => '_blank', 'escape' => false)); ?></p>
				</li>-->
				<!--<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/sengoku/plan_example.png', array('alt' => '施工例写真')); ?></p>
				</li>-->
			</ul>
			
		</div>
		
		<div class="access">
			<h2 class="mb-30"><?php echo $this->Html->image('specials/sengoku/access_title.png', array('alt' => '周辺環境')); ?></h2>
			<h3 class="mb-20"><?php echo $this->Html->image('specials/sengoku/access_st.png', array('alt' => '低層住宅の建ち並ぶ、閑静な住宅街。日常で利用する商業施設をはじめ、周辺は教育施設も充実しています。')); ?></h3>
			<p id="map" class="map"></p>
			<p><?php echo $this->Html->Image('specials/sengoku/access_photo.png', array('alt' => '周辺環境写真')); ?></p>
			
		</div>
		
		<div class="outline mb-50">
			<p class="text">●所在地/東京都文京区千石一丁目　●最寄駅/都営三田線「千石」駅 徒歩5分　●土地権利/所有権　●地目/宅地　●敷地面積/A区画：72.81㎡(22.02坪)　●都市計画/市街化区域　●高度地域/第三種高度地区　●防火制限/準防火地域　●用途地域/第一種中高層住居専用地域　●建ぺい率/60％　●容積率/300%　●日影4-2.5h(4m)　●接面道路/南側私道 約4.0m　●現況/更地　●引渡日/平成28年7月末　●取引形態/一般媒介　※司法書士は売主指定となります。 ※図面の内容と現況が異なる場合には現況優先といたします。</p>
		</div>
		
		<div class="contact">
			<p class="mb-30"><?php echo $this->Html->image('specials/sengoku/contact_title.png', array('alt' => '現地案内随時 予約受付中！ 電話：03-5797-7019')); ?></p>
			<p><?php echo $this->Html->link($this->Html->Image('specials/sengoku/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1468371943', array('target' => '_blank', 'escape' => false)); ?></p>
		</div>
		
	</div>
	
</section>

<?php echo $this->element('modules/member', array()); ?>

<?php /* ?>
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
<?php */ ?>

<?php echo $this->element('modules/share', array()); ?>
