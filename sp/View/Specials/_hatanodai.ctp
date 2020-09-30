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

<section>
	<div class="mv">
		<h1><?php echo $this->Html->image('specials/hatanodai/mv.png', array('alt' => '品川区旗の台二丁目 建築条件付売り地')); ?></h1>
		<p class="mb-00"><?php echo $this->Html->image('specials/hatanodai/mv_title.png', array('alt' => '東急大井町線・東急池上線「旗の台」駅 徒歩4分 販売価格5,280万円')); ?></p>
	</div>
</section>

<section id="special" class="hatanodai">
	<div id="specialIner">
		<div class="contact">
			<p class="mb-30"><?php echo $this->Html->image('specials/hatanodai/contact_title.png', array('alt' => '現地内覧会 予約受付中！ 電話：03-5797-7019')); ?></p>
			<p><?php echo $this->Html->link($this->Html->Image('specials/hatanodai/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1439877090', array('target' => '_blank', 'escape' => false)); ?></p>
		</div>
		
		<div class="plan">
			<h2 class="mb-30"><?php echo $this->Html->image('specials/hatanodai/plan_title.png', array('alt' => '参考プラン')); ?></h2>
			<h3><?php echo $this->Html->image('specials/hatanodai/plan_st.png', array('alt' => '寛ぎのひとときを迎える家に。フロア全体をLDKとすることで広々とした空間を実現。')); ?></h3>
			<ul>
				<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/hatanodai/plan_room.png', array('alt' => '参考プラン')); ?></p>
					<p><?php echo $this->Html->link($this->Html->Image('specials/hatanodai/btn_plan_room.png', array('alt' => '参考プランの詳細')), '/searches/detail/1439877090.html', array('target' => '_blank', 'escape' => false)); ?></p>
				</li>
				<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/hatanodai/plan_example.png', array('alt' => '施工例写真')); ?></p>
				</li>
			</ul>
			
		</div>
		
		<div class="access">
			<h2 class="mb-30"><?php echo $this->Html->image('specials/hatanodai/access_title.png', array('alt' => '周辺環境')); ?></h2>
			<h3 class="mb-20"><?php echo $this->Html->image('specials/hatanodai/access_st.png', array('alt' => '4路線7駅利用可能。多様なライフスタイルに対応可能なアクセス。')); ?></h3>
			<p id="map" class="map"></p>
			<p><?php echo $this->Html->Image('specials/hatanodai/access_photo.png', array('alt' => '周辺環境写真')); ?></p>
			
		</div>
		
		<div class="outline mb-50">
			<p class="text">●所在地／〒142-0064 東京都品川区旗の台2-4-13　●交通／東急池上線・大井町線「旗の台」駅徒歩4分・都営浅草線「中延」駅徒歩11分・東急目黒線「洗足」駅徒歩16分　●土地権利／所有権　●敷地面積／63.39㎡　●地目／宅地　●最適用途／宅地　●都市計画／市街化区域　●接道／4m　●用途地域／第一種住居地域　●地域地区／第二種高度地区　●建蔽率／指定60％　●容積率／指定200％(前面道路により160％)　●取引対応／一般媒介　※備考／土地面積は机上分筆の為、地積に誤差が生じる場合がございます。<br>広告有効期限／平成27年9月末日まで物件概要</p>
		</div>
		
		<div class="contact">
			<p class="mb-30"><?php echo $this->Html->image('specials/hatanodai/contact_title.png', array('alt' => '現地内覧会 予約受付中！ 電話：03-5797-7019')); ?></p>
			<p><?php echo $this->Html->link($this->Html->Image('specials/hatanodai/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1439877090', array('target' => '_blank', 'escape' => false)); ?></p>
		</div>
		
	</div>
	
</section>

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

<?php echo $this->element('modules/share', array()); ?>
