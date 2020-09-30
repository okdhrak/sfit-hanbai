/*!
 * jquery.liquid.carousel.js
 *
 * @varsion   1.2
 * @author    rin316 [Yuta Hayashi]
 * @require   jquery.js, jquery.effects.core.js
 * @create    2012-09-11
 * @modify    2012-09-26
 * @link      https://github.com/rin316/jquery.liquid.carousel
 */
;(function ($, window, undefined) {


var Carousel
	, DEFAULT_OPTIONS
	;

/**
 * DEFAULT_OPTIONS
 */
DEFAULT_OPTIONS = {
    listSelector:           '.carousel-list'
,   itemSelector:           '.carousel-item'
,   frameSelector:           '.carousel-frame'
,   paginationListSelector: '.carousel-paginationList'
,   paginationItemSelector: '.carousel-paginationItem'
,   prevSelector:           '.carousel-prev'
,   nextSelector:           '.carousel-next'
,   pos_x: 'left' //{number, string, function} current item position
,   pos_x_fix: 0 //{number} px
,   start: 0 //{number} index no
,   group: 1 //{number} move pieces
,   cloneClass: 'carousel-clone'
,   currentClass: 'carousel-current'
,   disableClass: 'carousel-disable'
,   easing: 'ease-out' //{string} easing effect
,   speed: 200 //{number} milli second
,   autoPlayInterval: 5000 //{number} milli second
,   autoPlayStartDelay: 0 //{number} milli second
,   loop: true //{boolean}
,   loopingDisabled: false //{boolean}
,   vertical: false //{boolean}
,   currentHighlight: true //{boolean}
,   autoPlay: false //{boolean}
,   autoPlayHoverStop: false //{boolean}
,   resizeRefresh: true //{boolean}
,   resizeTimer: 0 //{number}
,   autoSize: false //{string,boolean}
,   scrollSw: false //{string,boolean}
};


/**
 * Carousel
 */
Carousel = function ($element, options) {
	var self = this;
	
	self.o = $.extend({}, DEFAULT_OPTIONS, options);
	
	self.$element =        $element;
	self.$list =           self.$element.find($(self.o.listSelector));
	self.$item =           self.$element.find($(self.o.itemSelector));
	self.$frame =           self.$element.find($(self.o.frameSelector));
	self.$paginationList = self.$element.find($(self.o.paginationListSelector));
	self.$paginationItem = self.$element.find($(self.o.paginationItemSelector));
	self.$prevNavi =       self.$element.find($(self.o.prevSelector));
	self.$nextNavi =       self.$element.find($(self.o.nextSelector));
	self.$allList =        self.$paginationList.add(self.$list);
	self.$allItem  =       self.$paginationItem.add(self.$item);
	self.$allListAndNavi = self.$allList.add(self.$prevNavi).add(self.$nextNavi);
	
	self.elementSize =      (self.o.vertical) ? self.$element.outerHeight(true) : self.$element.outerWidth(true);
	self.itemSize =         (self.o.vertical) ? self.$frame.height()    : self.$frame.width();
	self.sizeProp =   (self.o.vertical) ? 'height' : 'width';
	self.marginProp = (self.o.vertical) ? 'marginTop' : 'marginLeft';
	
	//TODO
	//'auto'の場合はgroupをwidthから自動計算する
	//group: ( $wraper.width() + parseFloat($item.css('margin-right')) ) / $item.outerWidth(true)
	self.group           = self.o.group;
	self.clonePrependNum = 0;
	self.cloneAppendNum = 0;
	self.index = self.o.start;
	self.isMoving = false;
	
	self.init();
	
	return self;
};//Carousel


/**
 * Carousel.prototype
 */
Carousel.prototype = {

	/**
	 * init
	 */
	init: function () {
		var self = this;
		
		//indexを更新
		self.indexUpdate(self.index);
		
		//左右にクローン作成
		if (self.o.loop) { self.makeClone(); }
		
		//$listのmargin, widthを設定
		self.setListStyle();
		
		//current表示
		self.addCurrentClass();
		if (self.o.currentHighlight) { self.highlightEffect(); }
		
		//autoplay
		if (self.o.autoPlay) { self.autoPlay(); }

		//loopingDisabled
		if (self.o.loopingDisabled) { self.loopingDisabled(); }

		//resizeRefresh
		if (self.o.resizeRefresh) { self.resizeRefresh(); }

		/*
		 * Click Event
		 */
		self.$paginationItem.on('click', function(e){
			self.moveBind(self.$paginationItem.index(this) * self.group);
			e.preventDefault();
		});
		
		self.$prevNavi.on('click', function(e){
			self.moveBind(self.index - self.group, this);
			e.preventDefault();
		});
		
		self.$nextNavi.on('click', function(e){
			self.moveBind(self.index + self.group, this);
			e.preventDefault();
		});
		
		if(self.o.scrollSw){
			self.$item.on("touchstart touchend click",function(e){
				if(!e) e=event;
				e.preventDefault();
			});
		}
		
	}
	,
	
	/**
	 * indexUpdate
	 * 引数で送られたindexを使ってself.indexを更新する。
	 * $itemの最大値より大きければ最小値にリセット、最小値より小さければ最大値にリセット
	 * @param {number} index self.indexの値をこの値に書き換える。0から始まる
	 * @param {string} moved 'moved'を指定するとリセットの幅が狭まる。移動後の位置リセットに使用
	 * @see init, move
	 */
	indexUpdate: function (index, moved) {
		var self = this;
		
		if (!self.isMoving) {
			
			//loopが有効 && move前
			if (self.o.loop && moved !== 'moved') {
				if (index < - self.group                        ) { index = self.$item.length - 1; }
				if (index > (self.$item.length - 1) + self.group) { index = 0; }
			//loopが有効 && move後
			} else if (self.o.loop && moved === 'moved') {
				if (index < 0                    ) {               index = self.$item.length + index; }
				if (index > self.$item.length - 1) {               index = index - self.$item.length; }
			//loop無効
			} else {
				if (self.group > 1) {
				    if (index < 0) {                               index = (Math.ceil( (self.$item.length) / self.group ) - 1) * self.group; }
					
				} else {
				    if (index < 0) {                               index = self.$item.length - 1; }
				}
				
				if (index > self.$item.length - 1){ index = 0; }
			}
			
			self.index = index;
		}
	}
	,
	
	/**
	 * makeClone
	 * roop用のcloneを$itemの左右に追加
	 * @see, init
	 */
	makeClone: function () {
		var self = this, i, j;
		
		//作成要素数
		self.clonePrependNum = self.cloneAppendNum = Math.ceil(self.elementSize / self.itemSize);
		
		//既に作成された要素があれば削除
		self.$list.find($('.' + self.o.cloneClass)).remove();
		
		//prepend
		for (i = 0, j = self.$item.length - 1; i < self.clonePrependNum; i++) {
			self.$list.prepend(
				self.$item.clone().addClass(self.o.cloneClass).removeClass(self.o.currentClass)[j]
			);
			(j <= 0)? j = self.$item.length - 1 : j--;
		}
		
		//append
		for (i = 0, j = 0; i < self.cloneAppendNum; i++) {
			self.$list.append(
				self.$item.clone().addClass(self.o.cloneClass).removeClass(self.o.currentClass)[j]
			);
			(j >= self.$item.length - 1)? j = 0 : j++;
		}
	}
	,
	
	/**
	 * setListStyle
	 * $listにwidth, marginLeftをセット
	 * @see init, move
	 */
	setListStyle: function () {
		var self = this;
		
		var prop = {};
		prop[self.marginProp] = self.calcListMargin() + 'px';//marginTop, marginLeft
		prop[self.sizeProp]   = self.calcListSize() + 'px';//height, width
		self.$list.css(prop);
		
		
		if(self.o.autoSize) self.setAutoSize();
		
	}
	,
	setAutoSize : function(){
		var self = this;
		
		var wH = window.innerHeight ? window.innerHeight : $(window).height();
		var H = wH - self.o.autoSize.$pageCount.innerHeight();
		var mT = ((H - $("a",self.o.autoSize.$pageNav).eq(0).height())/2)+self.o.autoSize.$pageCount.innerHeight();
		
		
		self.$item.css({"width":self.itemSize+"px","height":H+"px"});
		self.o.autoSize.$pageNav.css({"top":mT+"px"});
	}
	,
	
	/**
	 * calcListSize
	 * $listのsizeを返す
	 * @return {number}
	 * @see setListStyle
	 */
	calcListSize: function () {
		var self = this;
		return (self.$item.length + self.clonePrependNum + self.cloneAppendNum ) * self.itemSize;
	}
	,
	
	/**
	 * calcListMargin
	 * $listのmarginLeftを返す
	 * @return {number}
	 * @see setListStyle, move
	 */
	calcListMargin: function () {
		var self = this;
		return  - ( (self.itemSize * (self.index + self.clonePrependNum)) - self.calcPos_x() );
	}
	,
	
	/**
	 * calcPos_x
	 * カレントアイテムの初期位置
	 * @return {number}
	 * @see calcListMargin
	 */
	calcPos_x: function () {
		var self = this;
		//numberであればnumberをそのまま返す
		if (!isNaN(self.o.pos_x)) {
			return self.o.pos_x + self.o.pos_x_fix;
		//functionであれば実行した値を返す
		} else if ($.isFunction(self.o.pos_x)) {
			return self.o.pos_x() + self.o.pos_x_fix;
		} else {
			switch (self.o.pos_x){
				case 'left':
					return 0 + self.o.pos_x_fix;
					break;
					
				case 'center':
					return (self.elementSize / 2) - (self.itemSize / 2) + self.o.pos_x_fix;
					break;
					
				case 'right':
					return (self.elementSize - self.itemSize) + self.o.pos_x_fix;
					break;
					
				default:
					return 0;
					break;
			}
		}
	}
	,
	
	/**
	 * moveBind
	 * カルーセル移動, カレント表示を1つにバインド
	 * @param {number} index self.indexの値をこの値に書き換える。0から始まる
	 * @param {object} element clickされたelement
	 * @see init, autoPlay
	 */
	moveBind: function (index, element) {
		var self = this;

		//clickした要素のclassが'disable'の場合は抜ける
		if ($(element).hasClass(self.o.disableClass)) { return false;}

		//index番号を更新
		self.indexUpdate(index);
		
		//移動前にcurrent表示
		self.addCurrentClass();
		if (self.o.currentHighlight) { self.highlightEffect(); }

		//loopingDisabled
		if (self.o.loopingDisabled) { self.loopingDisabled(); }

		//移動
		self.move();
	}
	,
	
	/**
	 * move
	 * (index * itemSize)分だけ$listを移動する
	 * @see moveBind
	 */
	move: function () {
		var self = this
		,   prop = {}
		;
		
		prop[self.marginProp] = self.calcListMargin() + 'px';//marginTop, marginLeft
		
		if (!self.isMoving) {
			self.isMoving = true;
			self.$element.trigger('carousel:movestart');
			self.$list.animate(
				prop,{
				duration: self.o.speed,
				easing: self.o.easing,
				complete: function(){
					self.isMoving = false;
					if (self.o.loop) {
						//indexを更新
						self.indexUpdate(self.index, 'moved');
						//位置をリセット
						self.setListStyle();
					}
					
					//移動後にcurrent表示
					self.addCurrentClass();
					if (self.o.currentHighlight) { self.highlightEffect(); }

					self.$element.trigger('carousel:moveend');
				},
				queue: false
			})
		}
	}
	,
	
	/**
	 * addCurrentClass
	 * index番目の要素にcurrentClassをセット
	 * @see init, move
	 */
	addCurrentClass: function () {
		var self = this
		,   paginationIndex
		;
		
		//currentClass削除
		self.$allList.children().removeClass(self.o.currentClass);
		
		//$itemをcurrent
		self.$list.children().eq(self.clonePrependNum  + self.index).addClass(self.o.currentClass);
		
		//$itemの最大値より大きい場合は、0番目の$paginationItemをcurrent
		if (self.index > self.$item.length -1) {
			paginationIndex = 0;
		//$itemの最大値より小さい場合は、最後の$paginationItemをcurrent
		} else if (self.index < 0) {
			paginationIndex = Math.floor( (self.$item.length + self.index) / self.group );
		} else {
			paginationIndex = Math.floor(self.index / self.group);
		}
		self.$paginationItem.eq(paginationIndex).addClass(self.o.currentClass);
	}
	,
	
	/**
	 * highlightEffect
	 * currentClass が付いた要素をハイライト表示
	 * @see init, move
	 */
	highlightEffect: function () {
		var self = this;
		self.$paginationItem.animate({opacity: 0.4}, {duration: 300, queue: false});
		self.$paginationItem + $('.' + self.o.currentClass).animate({opacity: 1}, {duration: 300, queue: false});
	}
	,
	
	/**
	 * autoPlay
	 * 一定間隔でmoveBindを実行しカルーセルを自動で動かす
	 * @see init
	 */
	autoPlay: function () {
		var self = this, timer, autoPlay, autoPlayInterval;
		autoPlayInterval = (self.o.autoPlayInterval >= 40) ? self.o.autoPlayInterval : 40;
		
		autoPlay = function(){
			self.moveBind(self.index + 1);
		};
		setTimeout(function () {
			timer = setInterval(autoPlay, autoPlayInterval);
		}, self.o.autoPlayStartDelay);
		
		//マウスオーバーされている間はautoPlayを停止。
		if (self.o.autoPlayHoverStop) {
			self.$allListAndNavi.hover(
				function(){
					clearInterval(timer);
				},
				function() {
					timer = setInterval(autoPlay, autoPlayInterval);
				}
			);
		}
	},

	/**
	 * loopingDisabled
	 * 前のアイテム, 次のアイテムが無い場合に、prev, nextボタンにclass self.o.disableClassを付与する
	 * @see init, moveBind
	 */
	loopingDisabled: function () {
		var self = this;

		if (self.index - (self.group - 1) <= 0){
			self.$prevNavi.addClass(self.o.disableClass)
		} else {
			self.$prevNavi.removeClass(self.o.disableClass)
		}

		if (self.index + (self.group - 1) >= self.$item.length -1){
			self.$nextNavi.addClass(self.o.disableClass)
		} else {
			self.$nextNavi.removeClass(self.o.disableClass)
		}

	},

	/**
	 * resizeRefresh
	 * ブラウザがリサイズされたら描画をリフレッシュ
	 * @see init
	 */
	resizeRefresh: function () {
		var self = this;

		$(window).on('orientationchange resize', function () {
			//timerを使用しリフレッシュ間隔を制限
			if (self.o.resizeTimer) {
				var _timer = null
					, _INTERVAL = self.o.resizeTimer
					;

				if (_timer) {
					clearTimeout(_timer);
					_timer = null;
				}

				_timer = setTimeout(function () {
					self.elementSize = self.$element.outerWidth(true);
					self.itemSize =    self.$frame.width();
					if (self.o.loop) {
						self.makeClone();
					}
					self.setListStyle();

					_timer = null;
				}, _INTERVAL);
			//timerを使用しない
			} else {
				self.elementSize = self.$element.outerWidth(true);
				self.itemSize =    self.$frame.width()
				if (self.o.loop) {
					self.makeClone();
				}
				self.setListStyle();
			}
			
			if(self.o.autoSize && $("body").data("delayedImg")) $("body").data("delayedImg").reSize();

		});
	}
	
};//Carousel.prototype


/**
 * $.fn.liquidCarousel
 */
$.fn.liquidCarousel = function (options) {
	return this.each(function () {
		var $this = $(this);
		$this.data('carousel', new Carousel($this, options));
	});
};//$.fn.liquidCarousel


})(jQuery, this);
