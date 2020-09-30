<?php
$this->assign('description', '旗の台二丁目【売り地(土地)】 東急大井町線・東急池上線「旗の台」駅徒歩4分 全1区画｜');
$this->assign('keywords', '品川区,旗の台,東急大井町線,東急池上線,旗の台,売り地,土地,');
$this->assign('title', '旗の台売り地(土地) 品川区旗の台二丁目｜');
?>

<?php
//Googlemap Api
$this->start('gmap');
echo '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false" charset="utf-8"> </script>';
echo '<script>';
echo '$(function(){
	// Google Mapで利用する初期設定用の変数
	var latlng = new google.maps.LatLng(35.606911, 139.705420);
	var mapOptions = {
		zoom: 15,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		center: latlng,
		scrollwheel: false,
	};
	// GoogleMapの生成
	var gmap = new google.maps.Map(document.getElementById("map"), mapOptions);
	// マーカーを生成
	var gmarker = new google.maps.Marker({
		map: gmap,
		position: latlng,
		title: "旗の台二丁目売り地"
	});
	// 情報ウィンドウの生成
	var infoWindow = new google.maps.InfoWindow({
		content: "<div>物件名：旗の台二丁目売り地</div>" + "<div>所在地：東京都品川区旗の台二丁目2-4-13</div>" + "<div>交　通：東急大井町線・東急池上「旗の台」駅 徒歩4分</div>",
		maxWidth: 250
	});

	// マーカーのクリックイベントの関数登録
	google.maps.event.addListener(gmarker, "click", function(event){
		// 情報ウィンドウの表示
		infoWindow.open(gmap, gmarker);
	});
});';
echo '</script>';
$this->end();
?>

<div id="special" class="hatanodai">
	<div class="mv">
		<h2><?php echo $this->Html->Image('specials/hatanodai/mv.png', array('alt' => '品川区旗の台二丁目 建築条件付売り地')); ?></h2>
	</div>
	
	<div class="content">
		<div class="contact mb-50">
			<p class="bg"><?php echo $this->Html->Image('specials/hatanodai/bg_contact.png', array('alt' => '先着順、申込み受付中！')); ?></p>
			<p class="btn"><?php echo $this->Html->link($this->Html->Image('specials/hatanodai/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1439877090', array('escape' => false, 'target' => '_blank')); ?></p>
		</div>
		
		<div class="plan">
			<h3><?php echo $this->Html->Image('specials/hatanodai/plan_title.png', array('alt' => '参考プラン')); ?></h3>
			<p class="st"><?php echo $this->Html->Image('specials/hatanodai/plan_st.png', array('alt' => '寛ぎのひとときを迎える家に。フロア全体をLDKとすることで広々とした空間を実現。')); ?></p>
			<div class="room mb-30">
				<p><?php echo $this->Html->Image('specials/hatanodai/plan_room.png', array('alt' => 'プラン')); ?></p>
				<p class="btn"><?php echo $this->Html->link($this->Html->Image('specials/hatanodai/btn_plan.png', array('alt' => 'プランの詳細')), '/searches/detail/1439877090.html', array('escape' => false, 'target' => '_blank')); ?></p>
				
			</div>
			<div class="room mb-30">
				<p><?php echo $this->Html->Image('specials/hatanodai/plan_example.png', array('alt' => '施工例')); ?></p>
			</div>
		</div>
		
		<div class="access mb-50">
			<h3><?php echo $this->Html->Image('specials/hatanodai/access_title.png', array('alt' => '周辺環境')); ?></h3>
			<p class="st"><?php echo $this->Html->Image('specials/hatanodai/access_st.png', array('alt' => '4路線7駅利用可能。多様なライフスタイルに対応できるアクセスライン。')); ?></p>
			<p id="map" class="map"></p>
			<p><?php echo $this->Html->Image('specials/hatanodai/access_photo.png', array('alt' => '周辺環境写真')); ?></p>
			
		</div>
		
		<div class=" mb-50">
			<p>●所在地／〒142-0064 東京都品川区旗の台2-4-13　●交通／東急池上線・大井町線「旗の台」駅徒歩4分・都営浅草線「中延」駅徒歩11分・東急目黒線「洗足」駅徒歩16分　●土地権利／所有権　●敷地面積／63.39㎡　●地目／宅地　●最適用途／宅地　●都市計画／市街化区域　●接道／4m　●用途地域／第一種住居地域　●地域地区／第二種高度地区　●建蔽率／指定60％　●容積率／指定200％(前面道路により160％)　●取引対応／一般媒介　※備考／土地面積は机上分筆の為、地積に誤差が生じる場合がございます。<br>広告有効期限／平成27年9月末日まで物件概要</p>
		</div>
		
		<div class="contact mb-50">
			<p class="bg"><?php echo $this->Html->Image('specials/hatanodai/bg_contact.png', array('alt' => '先着順、申込み受付中！')); ?></p>
			<p class="btn"><?php echo $this->Html->link($this->Html->Image('specials/hatanodai/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1439877090', array('escape' => false, 'target' => '_blank')); ?></p>
		</div>
		
	</div>
	
</div>

<?php echo $this->element('modules/main_search', array()); ?>
