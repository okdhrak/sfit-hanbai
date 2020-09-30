<?php
$this->assign('description', '小田急線経堂駅徒歩11分 -経堂三丁目戸建住宅 全5棟-｜');
$this->assign('keywords', '世田谷区,経堂,小田急線,戸建て,');
$this->assign('title', '世田谷区経堂三丁目 戸建住宅｜');
?>

<?php
//コンバージョンタグの読み込み
$this->start('gmap');
echo '<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false" charset="utf-8"> </script>';
echo '<script>';
echo '$(function(){
	// Google Mapで利用する初期設定用の変数
	var latlng = new google.maps.LatLng(35.653307, 139.629210);
	var mapOptions = {
		zoom: 16,
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
		title: "経堂三丁目戸建"
	});
	// 情報ウィンドウの生成
	var infoWindow = new google.maps.InfoWindow({
		content: "<div>物件名：経堂三丁目戸建</div>" + "<div>所在地：東京都世田谷区経堂3丁目23-8</div>" + "<div>交　通：小田急線「経堂」駅 徒歩11分</div>",
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

<div id="special" class="kyodo3">
	<div class="mv">
		<h2><?php echo $this->Html->Image('specials/kyodo3/mv.png', array('alt' => '世田谷区経堂三丁目 新築分譲住宅 好評につき残り1棟！')); ?></h2>
	</div>
	
	<div class="content">
		<div class="contact">
			<p class="bg"><?php echo $this->Html->Image('specials/kyodo3/bg_contact.png', array('alt' => '現地内覧会 予約受付中！ 電話：03-5797-7019')); ?></p>
			<p class="btn"><?php echo $this->Html->link($this->Html->Image('specials/kyodo3/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1429696038', array('escape' => false)); ?></p>
		</div>
		
		<div class="plan">
			<h3><?php echo $this->Html->Image('specials/kyodo3/plan_title.png', array('alt' => '閑静な街並みに佇む、2階建て大型3LDK＋ロフトの全5邸')); ?></h3>
			<div class="room mb-30">
				<p><?php echo $this->Html->Image('specials/kyodo3/plan_room.png', array('alt' => 'プラン')); ?></p>
				<p class="btn1"><?php echo $this->Html->link($this->Html->Image('specials/kyodo3/btn_plan_room1.png', array('alt' => '1号棟の詳細')), '/searches/detail/1429696038.html', array('escape' => false)); ?></p>
				<?php /*<p class="btn3"><?php echo $this->Html->link($this->Html->Image('specials/kyodo3/btn_plan_room3.png', array('alt' => '3号棟の詳細')), '/searches/detail/1429696775.html', array('escape' => false)); ?></p>
				<p class="btn5"><?php echo $this->Html->link($this->Html->Image('specials/kyodo3/btn_plan_room5.png', array('alt' => '5号棟の詳細')), '/searches/detail/1429697149.html', array('escape' => false)); ?></p>*/ ?>
			</div>
			<p><?php echo $this->Html->Image('specials/kyodo3/plan_photo.png', array('alt' => '室内写真')); ?></p>
		</div>
		
		<div class="access">
			<h3><?php echo $this->Html->Image('specials/kyodo3/access_title.png', array('alt' => '小田急小田原線「経堂」駅 徒歩11分 / 小田急小田原線「千歳船橋」駅 徒歩13分')); ?></h3>
			<p id="map" class="map"></p>
			<p><?php echo $this->Html->Image('specials/kyodo3/access_photo.png', array('alt' => '周辺環境写真')); ?></p>
		</div>
		
		<div class="contact">
			<p class="bg"><?php echo $this->Html->Image('specials/kyodo3/bg_contact.png', array('alt' => '現地内覧会 予約受付中！ 電話：03-5797-7019')); ?></p>
			<p class="btn"><?php echo $this->Html->link($this->Html->Image('specials/kyodo3/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1429696038', array('escape' => false)); ?></p>
		</div>
		
	</div>
	
</div>

<?php echo $this->element('modules/main_search', array()); ?>
