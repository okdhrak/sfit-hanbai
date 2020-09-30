<?php
$this->assign('description', '世田谷区駒沢三丁目【売地(土地)】 東急田園都市線「駒沢大学」駅徒歩9分 限定2区画｜');
$this->assign('keywords', '世田谷区,駒沢,東急田園都市線,駒沢大学,売り地,土地,');
$this->assign('title', '駒沢三丁目売地(土地) 世田谷区駒沢三丁目｜');
?>

<?php
//Googlemap Api
$this->start('gmap');
echo '<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCs8UcysP8HSOkvFf2MwGA05payfuNNr0c"></script>';
echo '<script>';
echo ';$(function(){
	var geocoder = new google.maps.Geocoder();
	var address = "東京都世田谷区駒沢三丁目";
	
	//ジオコーディング
	geocoder.geocode(
		{
			"address": address,
			"region": "jp",
		},
		function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				//var canvas = document.getElementById("map");
				var canvas = $("#map")[0];
				console.log(canvas);
				// 取得した座標をセット緯度経度をセット
				var latlng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
				// マップ表示のオプション
				var map_options = {
					zoom: 16,
					center: latlng,
					disableDefaultUI: false,
					mapTypeId: google.maps.MapTypeId.ROADMAP,//地図の種類
					scrollwheel: false,
					streetViewControl: true,
				};
				
				//マップを表示
				var map = new google.maps.Map(canvas, map_options);
				
				//ポリゴンの描写
				var polygons = [];
				var polygonOption = {
					map: map,
					path: [
						new google.maps.LatLng(35.632596, 139.650255),
						new google.maps.LatLng(35.632146, 139.650506),
						new google.maps.LatLng(35.631925, 139.650570),
						new google.maps.LatLng(35.631691, 139.650621),
						new google.maps.LatLng(35.631129, 139.650637),
						new google.maps.LatLng(35.630849, 139.651398),
						new google.maps.LatLng(35.630608, 139.652207),
						new google.maps.LatLng(35.630450, 139.652977),
						new google.maps.LatLng(35.630389, 139.653884),
						new google.maps.LatLng(35.631078, 139.656588),
						new google.maps.LatLng(35.632120, 139.655708),
						new google.maps.LatLng(35.633839, 139.654997),
						new google.maps.LatLng(35.634071, 139.654911),
						new google.maps.LatLng(35.633961, 139.654715),
						new google.maps.LatLng(35.633760, 139.654478),
						new google.maps.LatLng(35.633639, 139.654185),
						new google.maps.LatLng(35.633611, 139.654034),
						new google.maps.LatLng(35.633616, 139.653772),
						new google.maps.LatLng(35.633545, 139.653534),
						new google.maps.LatLng(35.633404, 139.652997),
						new google.maps.LatLng(35.633343, 139.652852),
						new google.maps.LatLng(35.633320, 139.652713),
						new google.maps.LatLng(35.633264, 139.652573),
						new google.maps.LatLng(35.632943, 139.652222),
						new google.maps.LatLng(35.632944, 139.652143),
						new google.maps.LatLng(35.632982, 139.652118),
						new google.maps.LatLng(35.632969, 139.651812),
						new google.maps.LatLng(35.632910, 139.651380),
						new google.maps.LatLng(35.632814, 139.650922),
					],
					fillColor: "#0000ff",   //塗り色
					fillOpacity: 0.05,      //塗り透過度
					strokeColor: "#0000ff", //外枠色
					strokeOpacity: 1,       //外枠透過度
					strokeWeight: 1,        //外枠太さ
				};
				//ポリゴンのインスタンスを作成
				polygons[0] = new google.maps.Polygon(polygonOption);
			}
		}
	);
});';
echo '</script>';
$this->end();
?>

<section>
	<div class="mv">
		<h1><?php echo $this->Html->image('specials/komazawa/mv.png', array('alt' => '世田谷区駒沢三丁目 建築条件付き売地')); ?></h1>
		<p class="mb-00"><?php echo $this->Html->image('specials/komazawa/mv_title.png', array('alt' => '東急田園都市線「駒沢大学」駅 徒歩9分')); ?></p>
	</div>
</section>

<section id="special" class="komazawa">
	<div id="specialIner">
		<div class="contact">
			<p class="mb-30"><?php echo $this->Html->image('specials/komazawa/contact_title.png', array('alt' => '現地案内随時 予約受付中！ 電話：03-5797-7019')); ?></p>
			<p><?php echo $this->Html->link($this->Html->Image('specials/komazawa/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1452588272', array('target' => '_blank', 'escape' => false)); ?></p>
		</div>
		
		<div class="plan">
			<h2 class="mb-30"><?php echo $this->Html->image('specials/komazawa/plan_title.png', array('alt' => '販売区画')); ?></h2>
			<!--<h3><?php echo $this->Html->image('specials/komazawa/plan_st.png', array('alt' => 'ダミーテキストダミーテキストダミーテキスト')); ?></h3>-->
			<ul>
				<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/komazawa/plan_div_a.png', array('alt' => '販売区画 A区画')); ?></p>
					<!--<p><?php echo $this->Html->link($this->Html->Image('specials/komazawa/btn_plan_room_a.png', array('alt' => 'A区画参考プランの詳細')), '/searches/detail/1452588272.html', array('target' => '_blank', 'escape' => false)); ?></p>-->
				</li>
				<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/komazawa/plan_div_b.png', array('alt' => '販売区画 B区画')); ?></p>
					<!--<p><?php echo $this->Html->link($this->Html->Image('specials/komazawa/btn_plan_room_b.png', array('alt' => 'B区画参考プランの詳細')), '/searches/detail/1452586301.html', array('target' => '_blank', 'escape' => false)); ?></p>-->
				</li>
				<li>
					<p class="mb-20"><?php echo $this->Html->image('specials/komazawa/plan_example.png', array('alt' => '施工例写真')); ?></p>
				</li>
			</ul>
			
		</div>
		
		<div class="access">
			<h2 class="mb-30"><?php echo $this->Html->image('specials/komazawa/access_title.png', array('alt' => '周辺環境')); ?></h2>
			<h3 class="mb-20"><?php echo $this->Html->image('specials/komazawa/access_st.png', array('alt' => '樹々と風にあふれる住環境。人気路線、東急田園都市線2駅利用可能。')); ?></h3>
			<p id="map" class="map"></p>
			<p><?php echo $this->Html->Image('specials/komazawa/access_photo.png', array('alt' => '周辺環境写真')); ?></p>
			
		</div>
		
		<div class="outline mb-50">
			<p class="text">●所在地/世田谷区駒沢三丁目　●東急田園都市線「駒沢大学」駅 徒歩9分、「桜新町」徒歩14分　●土地権利/所有権　●地目/宅地　●都市計画/市街化区域　●防火指定/準防火地域　●用途地域/第一種低層住居専用地域・第一種中層住居専用地域　●高度地区/第一種高度地区・第二種高度地区　●建ぺい率/60％　●容積率/150%　●道路/東側（公道）幅員約4m　●現況/更地　●引渡日/平成27年12月下旬頃<br>※司法書士は売主指定となります。 ※図面の内容と現況が異なる場合には現況優先といたします。</p>
		</div>
		
		<div class="contact">
			<p class="mb-30"><?php echo $this->Html->image('specials/komazawa/contact_title.png', array('alt' => '現地案内随時 予約受付中！ 電話：03-5797-7019')); ?></p>
			<p><?php echo $this->Html->link($this->Html->Image('specials/komazawa/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1452588272', array('target' => '_blank', 'escape' => false)); ?></p>
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
