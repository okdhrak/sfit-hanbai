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
ページ内スクロール
======================================================*/
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