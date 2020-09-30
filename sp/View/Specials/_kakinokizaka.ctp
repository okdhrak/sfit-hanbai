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

<section>
	<div class="mv">
		<h1><?php echo $this->Html->image('specials/kakinokizaka/mv.png', array('alt' => '目黒区柿の木坂三丁目 建築条件付売り地')); ?></h1>
		<p class="mb-00"><?php echo $this->Html->image('specials/kakinokizaka/mv_title.png', array('alt' => '東急東横線線「学芸大学」駅 徒歩16分 販売価格6,300万円～')); ?></p>
	</div>
</section>

<section id="special" class="kakinokizaka">
	<div id="specialIner">
		<div class="contact">
			<p class="mb-30"><?php echo $this->Html->image('specials/kakinokizaka/contact_title.png', array('alt' => '現地内覧会 予約受付中！ 電話：03-5797-7019')); ?></p>
			<p><?php echo $this->Html->link($this->Html->Image('specials/kakinokizaka/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1436166119', array('target' => '_blank', 'escape' => false)); ?></p>
		</div>
		
		<div class="plan">
			<h2 class="mb-30"><?php echo $this->Html->image('specials/kakinokizaka/plan_title.png', array('alt' => '参考プラン')); ?></h2>
			<h3><?php echo $this->Html->image('specials/kakinokizaka/plan_st.png', array('alt' => '室数を多くとった広々としたプランニング。リビングには南方からの暖かな光が差し込みます。')); ?></h3>
			<ul>
				<!--<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/kakinokizaka/plan_room_a.png', array('alt' => 'A区画参考プラン')); ?></p>
					<p><?php echo $this->Html->link($this->Html->Image('specials/kakinokizaka/btn_plan_room_a.png', array('alt' => 'A区画参考プランの詳細')), '/searches/detail/1436166896.html', array('target' => '_blank', 'escape' => false)); ?></p>
				</li>-->
				<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/kakinokizaka/plan_room_bc.png', array('alt' => 'B区画/A区画参考プラン')); ?></p>
					<p class="mb-20"><?php echo $this->Html->link($this->Html->Image('specials/kakinokizaka/btn_plan_room_b.png', array('alt' => 'B区画参考プランの詳細')), '/searches/detail/1436158531.html', array('target' => '_blank', 'escape' => false)); ?></p>
					<p><?php echo $this->Html->link($this->Html->Image('specials/kakinokizaka/btn_plan_room_c.png', array('alt' => 'C区画参考プランの詳細')), '/searches/detail/1436166119.html', array('target' => '_blank', 'escape' => false)); ?></p>
				</li>
				<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/kakinokizaka/plan_example.png', array('alt' => '施工例写真')); ?></p>
				</li>
			</ul>
			
		</div>
		
		<div class="access">
			<h2 class="mb-30"><?php echo $this->Html->image('specials/kakinokizaka/access_title.png', array('alt' => '周辺環境')); ?></h2>
			<h3 class="mb-20"><?php echo $this->Html->image('specials/kakinokizaka/access_st.png', array('alt' => '四季折々の表情を見せる駒沢公園近く。上質な住環境を享受する閑静な住宅地に住まう。')); ?></h3>
			<p id="map" class="map"></p>
			<p><?php echo $this->Html->Image('specials/kakinokizaka/access_photo.png', array('alt' => '周辺環境写真')); ?></p>
			
		</div>
		
		<div class="outline mb-50">
			<p class="text">●所在地／〒152-0022 東京都目黒区柿の木坂三丁目5-22　●交通／東急東横線「学芸大学」駅徒歩16分・東急田園都市線「駒沢大学」駅徒歩16分・東急東横線「都立大学」駅徒歩17分●土地権利／所有権　●敷地面積／<!--A区画：80.99㎡／-->B・C区画：72.29㎡　●地目／宅地　●最適用途／宅地　●都市計画／市街化区域　●接道／南側4ｍ・西側5.68ｍ●用途地域／第一種低層住居専用地域　●地域地区／準防火地域、第一種高度地区●建蔽率／指定60％（角地70％）　●容積率／指定150％　●取引対応／一般媒介　※備考／土地面積は机上分筆の為、地積に誤差が生じる場合がございます。</p>
		</div>
		
		<div class="contact">
			<p class="mb-30"><?php echo $this->Html->image('specials/kakinokizaka/contact_title.png', array('alt' => '現地内覧会 予約受付中！ 電話：03-5797-7019')); ?></p>
			<p><?php echo $this->Html->link($this->Html->Image('specials/kakinokizaka/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1436166119', array('target' => '_blank', 'escape' => false)); ?></p>
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
