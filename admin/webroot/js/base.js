$(function(){
	//console.log('読み込み');
	
	/*if(window.File && window.FileReader) {
		//File API
		alert("ご使用のブラウザはFile APIを実装しています");
	}else{
		alert("ご使用のブラウザはFile APIをサポートしていません");
	}*/
	
	
	/*
	タブの切り替え
	*/
	//クリックしたときのファンクションをまとめて指定
	$('.tab li').click(function() {

		//.index()を使いクリックされたタブが何番目かを調べ、
		//indexという変数に代入します。
		var index = $('.tab li').index(this);

		//コンテンツを一度すべて非表示にし、
		$('table.list').hide();

		//クリックされたタブと同じ順番のコンテンツを表示します。
		$('table.list').eq(index).show();

		//一度タブについているクラスselectを消し、
		$('.tab li').removeClass('select');

		//クリックされたタブのみにクラスselectをつけます。
		$(this).addClass('select')
	});
	
	// 物件削除ボタンがクリック
	$('a.delete').click(function(e){
		if (confirm('削除しますか？')) {
			
			$.ajax({
				type: 'POST',
				url: '/admin/articles/delete/' + $(this).data('delete-id'),
				data: {},
				success: function(res){
					//$('table').fadeOut(2000);
					//alert(res);
					$('tr#' + res.id).fadeOut(1000);
				},
				dataType: 'json'
			});
			
			/*$.post('/admin/articles/delete/' + $(this).data('delete-id'), {}, function(res){
				//$('#no_' + res.id).fadeOut();
				$('table').fadeOut();
			}, "json");*/
		}
		
		return false;
	});
	
	// 表示/非表示ボタンがクリック
	$('a.indication').click(function(e){
		//console.log(e);
		$('span.' + $(this).data('indication-id')).html('<i class="fa fa-spinner fa-spin fa-1x"></i>');
		
		$.ajax({
			type : 'POST',
			url : '/admin/articles/change_indication/',
			data : {
				id : $(this).data('indication-id'),
				status : $(this).data('indication-status'),
			},
			success : function(response){
				//console.log(this);
				$('tr#' + response.id + ' a.indication').text(response.status_text);
				$('tr#' + response.id + ' a.indication').data('indication-status', response.status);
				$('tr#' + response.id + ' span + i').removeClass().addClass(response.status_icon);
			},
			dataType : 'json',
			complete : function(data) {
				$('tr span').empty();
			}
		});
		
	});
	
	// 画像削除ボタンがクリック
	$('a.delete-photo').click(function(e){
		if (confirm('画像を削除しますか？')) {
			
			$('#loading').html('<i class="fa fa-spinner fa-spin fa-2x"></i>');
			//exit;
			
			$.ajax({
				type : 'POST',
				url : '/admin/articles/delete_photo/',
				data : {
					aid : $(this).data('article-id'),
					pid : $(this).data('photo-id'),
				},
				success : function(res){
					$('li#' + res.pid).fadeOut(1000);
				},
				dataType : 'json',
				complete : function(data) {
					$("#loading").empty();
					//$("#loading").html("<p>通信終了</p>");
					//alert('削除しました');
				}
			});
		}
		
		return false;
	});
	
	
	// トピックス削除ボタンがクリック
	$('a.delete-topic').click(function(e){
		if (confirm('削除しますか？')) {
			
			$.ajax({
				type: 'POST',
				url: '/admin/topics/delete/' + $(this).data('delete-id'),
				data: {},
				success: function(res){
					$('tr#' + res.id).fadeOut(1000);
				},
				dataType: 'json'
			});
		}
		
		return false;
	});
	
	// 会員削除ボタンがクリック
	$('a.delete-member').click(function(e){
		
		if (confirm('削除しますか？')) {
			
			$.ajax({
				type: 'POST',
				url: '/admin/members/delete/' + $(this).data('delete-id'),
				data: {},
				success: function(res){
					$('tr#' + res.id).fadeOut(1000);
				},
				dataType: 'json'
			});
		}
		
		return false;
	});
	
	
	//デフォルト
	$('.fileUpload').change(function(e){
		
		
		/*var obj = {
			test : 'オブジェクト定義',
			test_func : function (){alert(this.test + ':オブジェクトに関数を定義');},
		}
		function test(){
			//alert(obj.test);
			obj.test_func();
		}*/
		
		//console.log(e);
		
		//console.log($(this).attr('id'));
		var $_id = $(this).attr('id');
		var $_num = e.target.files.length;
		
		if (($_id == 'main' || $_id == 'plan') && $_num > 1) {
			alert('登録できる画像は1枚のみです');
			$('#' + $_id).val(null);
			$('#list' + '-' + $_id).empty();
			return false;
		}
		
		// サムネイルエリアを初期化
		$('#list' + '-' + $_id).empty();
		
		$.each(this.files, function(i) {
			
			if (this.type.indexOf('image/jpeg') != -1) {
				//continue; //合致
			}
			
			var file = this; // 配列にファイル情報が入っている
			
			fileReader = new FileReader(); // ファイルを読み込むFileReaderオブジェクト
			
			fileReader.onload = function(event) {
				$_img = '<img src="' + event.target.result + '" class="thumb">';
				$('#list' + '-' + $_id).append($_img);
			}
			
			//↑fileReader.onloadへファイルデータを渡す
			fileReader.readAsDataURL(file);
		});
		
	});


	/*$(function() {
		var droppable = $("#droppable");
	
		// File API が使用できない場合は諦めます.
		if(!window.FileReader) {
			alert('お使いのブラウザはFileAPIのサポートがありません');
			return false;
		}
	
		// イベントをキャンセルするハンドラです.
		var cancelEvent = function(event) {
			event.preventDefault();
			event.stopPropagation();
			return false;
		}
	
		// dragenter, dragover イベントのデフォルト処理をキャンセルします.
		droppable.bind("dradenter", cancelEvent);
		droppable.bind("dragover", cancelEvent);
	
		// ドロップ時のイベントハンドラを設定します.
		var handleDroppedFile = function(event) {
		
		//初期化
		$('#list').empty();
		
		$.each(event.originalEvent.dataTransfer.files, function(i) {
			if (this.type.indexOf('image/jpeg') != -1) {
				//continue; //合致
			}
		
			var file = this;// 配列にファイル情報が入っている
					
			fileReader = new FileReader();// ファイルを読み込むFileReaderオブジェクト
					
			fileReader.onload = function(event) {
				$_img = '<img src="' + event.target.result + '" class="thumb">';
				$('#list').append($_img);
			}
			//↑fileReader.onloadへファイルデータを渡す
			fileReader.readAsDataURL(file);
		});
	
		cancelEvent(event);
			return false;
		}
	
		// ドロップ時のイベントハンドラを設定します.
		droppable.bind("drop", handleDroppedFile);
	});*/

});



$(function() {
	$('#station').change(function(){
		getLineList($(this).val());
	});
	
	function getLineList(sn){
		$.ajax({
			type : 'POST',
			url : '/admin/articles/get_line_list',
			data : {
				station_name : sn,
			},
			success : function(request){
				$('#line').find('option').remove();
				$.each(request, function(i, ln){
					$('#line').append($('<option></option>')
					.val(ln)
					.text(ln)
					);
				});
				
			},
			dataType : 'json',
			complete : function(){
			}
		});
		
	}
	
	$('#toTraffic').click(function(){
		if (!$('#station').val() || !$('#line').val() || !$('#walk').val()){
			alert('駅名、沿線または徒歩分数が空欄です');
			return false;
			
		}
		
		//alert($('#station').val());
		//if ($('#station').val()){
			$('#traffic')
			.append($('<option selected="selected">')
			.html($('#line').val() + ',' + $('#station').val() + ',' + $('#walk').val())
			.val($('#line').val() + ',' + $('#station').val() + ',' + $('#walk').val())
			);
		//}
	});
	
	$('#trafficClear').click(function(){
		$('#station').val('');
		$('#line').find('option').remove();
		$('#walk').val('');
	});
});



$(function() {

	/*$.ajax({
		type : 'POST',
		url : '/admin/articles/getStationList',
		data : {
			pref_code : 13,
		},
		success : function(res){
			var data = res;
			//$('li#' + res.pid).fadeOut(1000);
		},
		dataType : 'json',
		complete : function(data) {
			//$("#loading").empty();
			var data = data;
		}
	});*/

	// 3候補リストに表示するデータを配列で準備
	/*var dataList = [
		'荻窪',
		'西荻窪',
		'accepts',
		'action_name',
		'add',
		'add_column',
		'add_index',
		'add_timestamps',
		'after_create',
		'after_destroy',
		'after_filter',
		'all',
		'渋谷',
		'渋谷高座',
		'渋谷テスト',
		'渋谷test',
		'渋谷',
		//……中略……
	];*/
	/*var dataList = [
['とうきょうとしんじゅくく', '東京都新宿区'],
['とうきょうとしながわく',   '東京都品川区'],
['とうきょうとすぎなみく',   '東京都杉並区']
];*/
	
	
	// 2オートコンプリート機能を適用
	$('#station').autocomplete({
	/*source : function(request, response) {
			var re   = new RegExp('^(' + request.term + ')'),
				list = [];

			$.each(dataList, function(i, values) {
				if(values[0].match(re) || values[1].match(re)) {
					list.push(values[1]);
				}
			});
			response(list);
		},*/
	source: function(request, response){
		$.ajax({
			type : 'POST',
			url : '/admin/articles/get_station_list',
			data : {
				pref_code : 13,
			},
			success : function(o){
				//console.log(o);
				//var re   = new RegExp('^(' + request.term + ')'),
				var re   = new RegExp('(' + request.term + ')'),
				list = [];
				$.each(o, function(i, values) {
				//if(values[0].match(re)) {
				if(values.match(re)) {
					list.push(values);
				}
			});
				
				response(list);
				//console.log(o);
				//$('li#' + res.pid).fadeOut(1000);
			},
			dataType : 'json',
			complete : function(data) {
				//$("#loading").empty();
				var data = data;
			}
		});
	},
	autoFocus: true,
	delay: 500,
	minLength: 1,
	});

});
