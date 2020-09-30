/*====================================================================================================
//////////////////////////////////////////////////////////////////////////////////////////////////////

 created: 2015/05/10
 update : 

//////////////////////////////////////////////////////////////////////////////////////////////////////
====================================================================================================*/

/*======================================================
初期設定
======================================================*/
var offsetTop = '';
var scrollSpeed = 1000;

// IE9.js適用
var IE7_PNG_SUFFIX = '.png';


/*======================================================
ロールオーバー半調処理
======================================================*/
$(function(){
	$("a > img").hover(function(){
		$(this).stop(true, true).fadeTo("normal", 0.8);
	},function(){
		$(this).stop(true, true).fadeTo("normal", 1.0);
	});
});


/*======================================================
トピックスのスクロール
======================================================*/
$(function(){
	//$('header').hide();
	$('header.top').css('display', 'none');
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 535) {
				$('header.top').fadeIn('fast');
			} else {
				$('header.top').fadeOut('fast');
			}
		});
	});
	
	/*$(window).bind("scroll", function() {
		scrollHeight = $(document).height();
		scrollPosition = $(window).height() + $(window).scrollTop();
		footHeight = $('footer').innerHeight();
		if (scrollHeight - scrollPosition  <= footHeight) { //フッターが現れた時
			$('header').css({
				"position":"absolute",
				"bottom": footHeight,
				//"bottom": "0px",
				"z-index": 100
			});
		} else {
			$('header').css({
				"position":"fixed",
				"bottom": "0px",
				"z-index": 100
			});
		}*/
	

		
});


/*function pageScroll(id){
	console.log(id);
	$.scrollTo('#' + id, scrollSpeed, {offset:{left: 0, top: -100}});
}*/

$(function(){
   // #で始まるアンカーをクリックした場合に処理
   $('a[href^=#]').click(function() {
      // スクロールの速度
      var speed = 400; // ミリ秒
      // アンカーの値取得
      var href= $(this).attr("href");
      // 移動先を取得
      var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
      var position = target.offset().top - 100;
      // スムーススクロール
	  
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });
});
