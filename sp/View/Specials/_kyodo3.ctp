<?php
$this->assign('description', '小田急線経堂駅徒歩11分 -経堂三丁目戸建住宅 全5棟-｜');
$this->assign('keywords', '世田谷区,経堂,小田急線,戸建て,');
$this->assign('title', '世田谷区経堂三丁目 戸建住宅｜');
?>

<?php
//Googlemap Api
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

<section>
	<div class="mv">
		<h1><?php echo $this->Html->image('specials/kyodo3/mv.png', array('alt' => '世田谷区経堂三丁目 新築分譲住宅 好評につき残り1棟！')); ?></h1>
		<p class="mb-00"><?php echo $this->Html->image('specials/kyodo3/mv_title.png', array('alt' => '小田急線「経堂」駅 徒歩11分')); ?></p>
	</div>
</section>

<section id="special" class="kyodo3">
	<div id="specialIner">
		<div class="contact">
			<p class="mb-30"><?php echo $this->Html->image('specials/kyodo3/contact_title.png', array('alt' => '現地内覧会 予約受付中！ 電話：03-5797-7019')); ?></p>
			<p><?php echo $this->Html->link($this->Html->Image('specials/kyodo3/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1429696775', array('target' => '_blank', 'escape' => false)); ?></p>
		</div>
		
		<div class="plan">
			<h2><?php echo $this->Html->image('specials/kyodo3/plan_title.png', array('alt' => '閑静な街並みに佇む、2階建て大型3LDK＋ロフトの全5邸')); ?></h2>
			<ul>
				<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/kyodo3/plan_division.png', array('alt' => '全体区画図')); ?></p>
				</li>
				<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/kyodo3/plan_room1.png', array('alt' => '1号棟プラン')); ?></p>
					<p><p class="btn1"><?php echo $this->Html->link($this->Html->Image('specials/kyodo3/btn_plan_room1.png', array('alt' => '1号棟の詳細')), '/searches/detail/1429696038.html', array('target' => '_blank', 'escape' => false)); ?></p></p>
				</li>
				<?php /*<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/kyodo3/plan_room3.png', array('alt' => '3号棟プラン')); ?></p>
					<p><p class="btn1"><?php echo $this->Html->link($this->Html->Image('specials/kyodo3/btn_plan_room3.png', array('alt' => '3号棟の詳細')), '/searches/detail/1429696775.html', array('target' => '_blank', 'escape' => false)); ?></p></p>
				</li>
				<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/kyodo3/plan_room5.png', array('alt' => '5号棟プラン')); ?></p>
					<p><p class="btn1"><?php echo $this->Html->link($this->Html->Image('specials/kyodo3/btn_plan_room5.png', array('alt' => '5号棟の詳細')), '/searches/detail/1429697149.html', array('target' => '_blank', 'escape' => false)); ?></p></p>
				</li>*/ ?>
			</ul>
			<p><?php echo $this->Html->image('specials/kyodo3/plan_photo.png', array('alt' => '室内写真')); ?></p>
			
		</div>
		
		<div class="access">
			<h2><?php echo $this->Html->image('specials/kyodo3/access_title.png', array('alt' => '小田急小田原線「経堂」駅 徒歩11分 / 小田急小田原線「千歳船橋」駅 徒歩13分')); ?></h2>
			<p id="map" class="map"></p>
			<p><?php echo $this->Html->Image('specials/kyodo3/access_photo.png', array('alt' => '周辺環境写真')); ?></p>
			
		</div>
		
		<div class="contact">
			<p class="mb-30"><?php echo $this->Html->image('specials/kyodo3/contact_title.png', array('alt' => '現地内覧会 予約受付中！ 電話：03-5797-7019')); ?></p>
			<p><?php echo $this->Html->link($this->Html->Image('specials/kyodo3/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1429696775', array('target' => '_blank', 'escape' => false)); ?></p>
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
