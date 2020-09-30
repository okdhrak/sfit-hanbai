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

<div id="special" class="komazawa">
	<div class="mv">
		<h2><?php echo $this->Html->Image('specials/komazawa/mv.png', array('alt' => '世田谷区駒沢三丁目 建築条件付き売地')); ?></h2>
	</div>
	
	<div class="content">
		<div class="contact mb-50">
			<p class="bg"><?php echo $this->Html->Image('specials/komazawa/bg_contact.png', array('alt' => '先着順、申込み受付中！')); ?></p>
			<p class="btn"><?php echo $this->Html->link($this->Html->Image('specials/komazawa/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1452588272', array('escape' => false, 'target' => '_blank')); ?></p>
		</div>
		
		<div class="plan">
			<h3><?php echo $this->Html->Image('specials/komazawa/plan_title.png', array('alt' => '販売区画')); ?></h3>
			<!--<p class="st"><?php echo $this->Html->Image('specials/komazawa/plan_st.png', array('alt' => 'ダミーテキストダミーテキストダミーテキスト')); ?></p>-->
			<div class="room mb-30">
				<p><?php echo $this->Html->Image('specials/komazawa/plan_div.png', array('alt' => '販売区画 A区画・B区画')); ?></p>
				
				<!--<p><?php echo $this->Html->Image('specials/komazawa/plan_room_a.png', array('alt' => 'A区画参考プラン')); ?></p>
				<p class="btn_a"><?php echo $this->Html->link($this->Html->Image('specials/komazawa/btn_plan_a.png', array('alt' => 'A区画参考プランの詳細')), '/searches/detail/1452588272.html', array('escape' => false, 'target' => '_blank')); ?></p>
				<p><?php echo $this->Html->Image('specials/komazawa/plan_room_b.png', array('alt' => 'B区画参考プラン')); ?></p>
				<p class="btn_b"><?php echo $this->Html->link($this->Html->Image('specials/komazawa/btn_plan_b.png', array('alt' => 'B区画参考プランの詳細')), '/searches/detail/1452586301.html', array('escape' => false, 'target' => '_blank')); ?></p>-->
				
			</div>
			<div class="room mb-30">
				<p><?php echo $this->Html->Image('specials/komazawa/plan_example.png', array('alt' => '施工例')); ?></p>
			</div>
		</div>
		
		<div class="access mb-50">
			<h3><?php echo $this->Html->Image('specials/komazawa/access_title.png', array('alt' => '周辺環境')); ?></h3>
			<p class="st"><?php echo $this->Html->Image('specials/komazawa/access_st.png', array('alt' => '4路線7駅利用可能。多様なライフスタイルに対応できるアクセスライン。')); ?></p>
			<p id="map" class="map"></p>
			<p><?php echo $this->Html->Image('specials/komazawa/access_photo.png', array('alt' => '周辺環境写真')); ?></p>
			
		</div>
		
		<div class=" mb-50">
			<p>●所在地/世田谷区駒沢三丁目　●東急田園都市線「駒沢大学」駅 徒歩9分、「桜新町」徒歩14分　●土地権利/所有権　●地目/宅地　●都市計画/市街化区域　●防火指定/準防火地域　●用途地域/第一種低層住居専用地域・第一種中層住居専用地域　●高度地区/第一種高度地区・第二種高度地区　●建ぺい率/60％　●容積率/150%　●道路/東側（公道）幅員約4m　●現況/更地　●引渡日/平成27年12月下旬頃<br>※司法書士は売主指定となります。 ※図面の内容と現況が異なる場合には現況優先といたします。</p>
		</div>
		
		<div class="contact mb-50">
			<p class="bg"><?php echo $this->Html->Image('specials/komazawa/bg_contact.png', array('alt' => '先着順、申込み受付中！')); ?></p>
			<p class="btn"><?php echo $this->Html->link($this->Html->Image('specials/komazawa/btn_contact.png', array('alt' => '物件のお問合せ内覧の予約はこちら')), '/properties/1452588272', array('escape' => false, 'target' => '_blank')); ?></p>
		</div>
		
	</div>
	
</div>

<?php //echo $this->element('modules/main_search', array()); ?>
