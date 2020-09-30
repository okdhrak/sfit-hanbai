<?php
$this->assign('description', '目黒区原町二丁目【新築戸建】 東急目黒線「洗足」駅徒歩7分 限定2棟｜');
$this->assign('keywords', '目黒区,原町二丁目,東急目黒線,洗足,新築,戸建,');
$this->assign('title', '原町二丁目新築戸建 目黒区原町二丁目｜');
?>

<?php
//Googlemap Api
$this->start('gmap');
echo '<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCs8UcysP8HSOkvFf2MwGA05payfuNNr0c"></script>';
echo '<script>';
echo '$(function(){
	// Google Mapで利用する初期設定用の変数
	var latlng = new google.maps.LatLng(35.613588, 139.691359);
	var mapOptions = {
		zoom: 15,
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
		fillOpacity: 0.2,       // 塗りつぶし透過度(0: 透明 ⇔ 1:不透明)
		map: gmap,              // 表示させる地図(google.maps.Map)
		radius: 500,            // 半径(m)
		strokeColor: "#ff0000", // 外周色
		strokeOpacity: 0,       // 外周透過度(0: 透明 ⇔ 1:不透明)
		strokeWeight: 0,        // 外周太さ(ピクセル)
	});
	
});';
echo '</script>';
$this->end();
?>

<div id="special" class="haramachi">
	<div class="mv">
		<h2><?php echo $this->Html->Image('specials/haramachi/mv.png', array('alt' => '目黒区原町二丁目 新築戸建')); ?></h2>
	</div>
	
	<div class="content">
		<div class="contact mb-50">
			<p class="bg"><?php echo $this->Html->Image('specials/haramachi/bg_contact.png', array('alt' => '先着順、申込み受付中！')); ?></p>
			<p class="btn"><?php echo $this->Html->link($this->Html->Image('specials/haramachi/btn_toweb.png', array('alt' => 'その他の物件をWEBサイトで検索する')), '/', array('escape' => false, 'target' => '_blank')); ?></p>
		</div>
		
		<div class="plan">
			<h3><?php echo $this->Html->Image('specials/haramachi/plan_title.png', array('alt' => '販売区画')); ?></h3>
			<p class="st"><?php echo $this->Html->Image('specials/haramachi/plan_st.png', array('alt' => '各居室それぞれに収納を確保。2階部分全体をリビングスペースとした広々LDK。')); ?></p>
			<div class="room mb-50">
				<p class="mb-40"><?php echo $this->Html->Image('specials/haramachi/div_a_roomplan.png', array('alt' => 'A棟プラン')); ?></p>
				<!--<p class="btn_a"><?php echo $this->Html->link($this->Html->Image('specials/haramachi/btn_plan_a.png', array('alt' => 'A棟プランの詳細')), '/searches/detail/**********.html', array('escape' => false, 'target' => '_blank')); ?></p>-->
				<p><?php echo $this->Html->Image('specials/haramachi/div_b_roomplan.png', array('alt' => 'B棟プラン')); ?></p>
				<!--<p class="btn_b"><?php echo $this->Html->link($this->Html->Image('specials/haramachi/btn_plan_b.png', array('alt' => 'B棟プランの詳細')), '/searches/detail/**********.html', array('escape' => false, 'target' => '_blank')); ?></p>-->
			</div>
			<div class="room mb-30">
				<p><?php echo $this->Html->Image('specials/haramachi/plan_example.png', array('alt' => '現地物件写真')); ?></p>
			</div>
		</div>
		
		<div class="access mb-30">
			<h3><?php echo $this->Html->Image('specials/haramachi/access_title.png', array('alt' => '周辺環境')); ?></h3>
			<p class="st"><?php echo $this->Html->Image('specials/haramachi/access_st.png', array('alt' => '低層住宅の建ち並ぶ、閑静な住宅街。日常で利用する商業施設をはじめ、周辺は教育施設も充実しています。')); ?></p>
			<p id="map" class="map"></p>
			<p><?php echo $this->Html->Image('specials/haramachi/access_photo.png', array('alt' => '周辺環境写真')); ?></p>
		</div>
		
		<div class=" mb-50">
			<p>●所在地/目黒区原町二丁目24-3　●最寄り駅/東急目黒線｢洗足｣駅 徒歩7分　●土地権利/所有権　●地目/宅地　●都市計画/市街化区域　●土地面積/A号棟・B号棟[共通]:79.20㎡(23.95坪)※別途セットバックおよび私道持分あり　●建物面積/A号棟・B号棟[共通]:92.53㎡(27.99坪)※車庫面積5.26㎡を含む　●建物構造/木造2階建て　●販売棟数/2棟　●用途地域/第一種低層住居専用地域　●建ぺい率/60％　●容積率/150％　●高度地区/第一種高度地区(絶対高さ制限10ｍ)　●防火指定/準防火地域　●日影規制/4h-2.5h/1.5m　●接道/東側私道約3.2m(セットバック後)　●完成/平成28年9月　●引渡日/相談　●設備/都市ガス、公営水道、公共下水<br>【備考】 ※登記時の司法書士・土地家屋調査士は売主指定とさせていただきます。※本物件には協定部分がございます。※A区画の南西側敷地境界際に井戸が存在しておりましたが、埋め戻しが完了しています。※図面と現況が異なる場合は現況優先となります。</p>
		</div>
		
		<div class="contact mb-50">
			<p class="bg"><?php echo $this->Html->Image('specials/haramachi/bg_contact.png', array('alt' => '先着順、申込み受付中！')); ?></p>
			<p class="btn"><?php echo $this->Html->link($this->Html->Image('specials/haramachi/btn_toweb.png', array('alt' => 'その他の物件をWEBサイトで検索する')), '/', array('escape' => false, 'target' => '_blank')); ?></p>
		</div>
	</div>
	
</div>

<?php echo $this->element('modules/main_search', array()); ?>
