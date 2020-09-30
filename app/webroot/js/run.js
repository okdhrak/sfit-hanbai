//スクロール
$(function(){
	$('#pagetop a').click(function() {
		$('body, html').animate({scrollTop: 0}, 500);
		return false;
	});
	
	$('#bxSilder .reno').click(function() {
		var pos = $("#reno").offset().top;
		$('body, html').animate({scrollTop: pos}, 500);
		return false;
	});
});

//高さ揃えライブラリ
(function ($) {
	$.fn.heightAdjust = function (row, child) {
		this.each(function () {
			var elems = $(child, this);
			var nelems = elems.length;
			var heights = new Array(nelems);
			var setHeight = function () {
				for (var i = 0; i < nelems; i++) {
					elems[i].style.height = "";
					heights[i] = $(elems[i]).height();
				}
				var max = 0;
				for (var i = 0; i < nelems; i++) {
					if (0 == i % row) {
						max = Math.max.apply(Math, heights.slice(i, i + row));
					}
					heights[i] = max;
				}
				for (var i = 0; i < nelems; i++) {
					elems[i].style.height = heights[i] + "px";
				}
			}
			setHeight();
			if ($("#font-checker").length == 0) {
				$("body").append('<div id="font-checker" style="position:absolute;left:-9999px;top:0;">&nbsp;</div>');
			}
			var baseSize = $("#font-checker").height();
			var checkSize = 0;
			setInterval(function () {
				checkSize = $("#font-checker").height();
				if (baseSize !== checkSize) {
					setHeight();
					baseSize = checkSize;
				}
			}, 1000);
		});

	}
})(jQuery);


//ロールオーバーライブラリ

(function ($) {
	$.fn.rollover = function () {
		var elems = this;
		var nelems = elems.length;
		var off = "_off";
		var on = "_on";
		var preLoadImg = new Object();
		for (var i = 0; i < nelems; i++) {
			preLoadImg[elems[i]] = new Image();
			preLoadImg[elems[i]].src = elems[i].src.replace(off, on);
			elems[i].onmouseover = function () {
				this.src = this.src.replace(off, on);
			}
			elems[i].onmouseout = function () {
				this.src = this.src.replace(on, off);
			}
		}
	}
})(jQuery);


//文字数制限ライブラリー(高さ揃え前に実行)

(function ($) {
	var maxLength = 23;
	var nText;

	$('.textAdjust').each(function(){
		if($(this).text().length > maxLength){
				nText = $(this).text().substring(0, maxLength)+ '...';
				$(this).text(nText);
		}
	});

})(jQuery);


//以下実行 画像等が全て読み込まれたから実行
$.event.add(window, "load", function () {	// ページ全体が読み込まれたら実行(画像に関するものとか、入れる)
	$("img[src *='_off.'], input[type = 'image']").rollover();		//ロールオーバー実行(img要素のsrc属性とinput要素のtypeがimageのものの_offを_onに対して実行)
	$("#aaa").heightAdjust(3, ".bbb, .ccc, .ddd");	//高さ揃え実行(idがaaaの中のクラスbbb,ccc,dddの3つの高さを揃える)
});
$(function () {	// jsが読み込まれたら実行(画像はキャッシュされるので、二回目移行の実行早くするためにロールオーバー入れている)
	$("img[src *='_off.'], input[type = 'image']").rollover();		//ロールオーバー実行(img要素のsrc属性とinput要素のtypeがimageのものの_offを_onに対して実行)
	$("div#aaa > ul.bbb > li:last-child").addClass("last-child");		//最後の要素にクラス追加(idがaaaの中のul.bbbの中の最後のliにクラスlast-childを付加)
	$("div#aaa > ul.bbb > li:first-child").addClass("first-child");		//最初の要素にクラス追加(idがaaaの中のul.bbbの中の最初のliにクラスfirst-childを付加)
	 $("a[rel*='colorbox']").colorbox();
	 $(".btnOpa , #asideBanner ul li a , #pagetop a").hover(
	  function () {
	    $(this).css('opacity', 0.5);
	  },
	  function () {
	    $(this).css('opacity', 1);
	  }
	);
});

//DOMが読み込まれtら実行
$(document).ready(function() {
	$('ul li:first-child').addClass('first');
	$('ul li:last-child').addClass('last');
});

