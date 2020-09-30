<?php
$this->assign('description', '柿の木坂三丁目【売り地(土地)】 東急東横線学芸大学駅徒歩16分 全3区画｜');
$this->assign('keywords', '目黒区,柿の木坂,東急田園都市線,学芸大学,都立大学,東急東横線,駒沢大学,売り地,土地,');
$this->assign('title', '柿の木坂売り地 目黒区柿の木坂三丁目｜');
?>

<?php
//Googlemap Api
$this->start('gmap');
echo '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false" charset="utf-8"> </script>';
echo '<script>';
echo '$(function(){
	// Google Mapで利用する初期設定用の変数
	var latlng = new google.maps.LatLng(35.628027, 139.672923);
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
		title: "柿の木坂三丁目戸建"
	});
	// 情報ウィンドウの生成
	var infoWindow = new google.maps.InfoWindow({
		content: "<div>物件名：柿の木坂三丁目売り地</div>" + "<div>所在地：東京都目黒区柿の木坂三丁目5-22</div>" + "<div>交　通：東急東横線「学芸大学」駅 徒歩16分</div>",
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

<div id="special" class="kakinokizaka">
	<div class="mv">
		<h2><?php echo $this->Html->Image('specials/kakinokizaka/mv.png', array('alt' => '目黒区柿の木坂三丁目 建築条件付売り地')); ?></h2>
	</div>
	
	<div class="content">
		<div class="contact mb-50">
			<p class="bg"><?php echo $this->Html->Image('specials/kakinokizaka/bg_contact.png', array('alt' => '先着順、申込み受付中！')); ?></p>
			<p class="btn"><?php echo $this->Html->link($this->Html->Image('specials/kakinokizaka/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1436166119', array('escape' => false, 'target' => '_blank')); ?></p>
		</div>
		
		<div class="plan">
			<h3><?php echo $this->Html->Image('specials/kakinokizaka/plan_title.png', array('alt' => '参考プラン')); ?></h3>
			<p class="st"><?php echo $this->Html->Image('specials/kakinokizaka/st_plan.png', array('alt' => '室数を多くとった広々としたプランニング。リビングには南方からの暖かな光が差し込みます。')); ?></p>
			<div class="room mb-30">
				<p><?php echo $this->Html->Image('specials/kakinokizaka/plan_room.png', array('alt' => 'プラン')); ?></p>
				<!--<p class="btn-a"><?php echo $this->Html->link($this->Html->Image('specials/kakinokizaka/btn_plan_a.png', array('alt' => 'A区画参考プランの詳細')), '/searches/detail/1436166896.html', array('escape' => false, 'target' => '_blank')); ?></p>-->
				<p class="btn-b"><?php echo $this->Html->link($this->Html->Image('specials/kakinokizaka/btn_plan_b.png', array('alt' => 'B区画参考プランの詳細')), '/searches/detail/1436158531.html', array('escape' => false, 'target' => '_blank')); ?></p>
				<p class="btn-c"><?php echo $this->Html->link($this->Html->Image('specials/kakinokizaka/btn_plan_c.png', array('alt' => 'C区画参考プランの詳細')), '/searches/detail/1436166119.html', array('escape' => false, 'target' => '_blank')); ?></p>
				
			</div>
			<div class="room mb-30">
				<p><?php echo $this->Html->Image('specials/kakinokizaka/plan_example.png', array('alt' => '施工例')); ?></p>
			</div>
		</div>
		
		<div class="access mb-50">
			<h3><?php echo $this->Html->Image('specials/kakinokizaka/access_title.png', array('alt' => '周辺環境')); ?></h3>
			<p class="st"><?php echo $this->Html->Image('specials/kakinokizaka/st_access.png', array('alt' => '四季折々の表情を見せる駒沢公園近く。上質な住環境を享受する閑静な住宅地に住まう。')); ?></p>
			<p id="map" class="map"></p>
			<p><?php echo $this->Html->Image('specials/kakinokizaka/access_photo.png', array('alt' => '周辺環境写真')); ?></p>
			
		</div>
		
		<div class=" mb-50">
			<p>●所在地／〒152-0022 東京都目黒区柿の木坂三丁目5-22　●交通／東急東横線「学芸大学」駅徒歩16分・東急田園都市線「駒沢大学」駅徒歩16分・東急東横線「都立大学」駅徒歩17分●土地権利／所有権　●敷地面積／<!--A区画：80.99㎡／-->B・C区画：72.29㎡　●地目／宅地　●最適用途／宅地　●都市計画／市街化区域　●接道／南側4ｍ・西側5.68ｍ●用途地域／第一種低層住居専用地域　●地域地区／準防火地域、第一種高度地区●建蔽率／指定60％（角地70％）　●容積率／指定150％　●取引対応／一般媒介　※備考／土地面積は机上分筆の為、地積に誤差が生じる場合がございます。</p>
		</div>
		
		<div class="contact mb-50">
			<p class="bg"><?php echo $this->Html->Image('specials/kakinokizaka/bg_contact.png', array('alt' => '先着順、申込み受付中！')); ?></p>
			<p class="btn"><?php echo $this->Html->link($this->Html->Image('specials/kakinokizaka/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1436166119', array('escape' => false, 'target' => '_blank')); ?></p>
		</div>
		
	</div>
	
</div>

<?php echo $this->element('modules/main_search', array()); ?>
