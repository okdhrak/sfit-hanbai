/***********  チェックボックス  **********/
$(function(){
	$('.btnSrc').each(function(i){
		$(this).click(function(){  cateToCheck( i+1 , $(this) );  });
	});
	$('.asLabel').each(function(i){
		$(this).children('input:checkbox').change(function(){ checkToCate( i+1 ); });
	});
});

function checkToCate(a){
	if ( a % 2 == 0 ) {
		var cb1 = $('#as0' + ( a - 1 ) );
		var cb2 = $('#as0' + ( a ) );
	} else {
		var cb1 = $('#as0' + ( a ) );
		var cb2 = $('#as0' + ( a + 1 ) );
	}
	var chk1 = cb1.attr('checked');
	var chk2 = cb2.attr('checked');
	var b = $('#btnSrc0' + Math.ceil( a / 2 ) );
	var img = b.children('img').attr('src');
	if ( typeof chk1 == 'undefined' &&  typeof chk2 == 'undefined' ) {
		b.children('img').attr('src' , img.replace('_a','_off'));
		b.children('img').rollover();
		/* まとめてチェックを外す場合の処理を以下に */
	} else {
		b.children('img').attr('src' , img.replace('_off','_a'));
		/* まとめてチェックを外す場合の処理を以下に */
	}
}

function cateToCheck(a,b){
	var img = b.children('img').attr('src');
	var cb1 = $('#as0' + ( 2 * a - 1 ) );
	var cb2 = $('#as0' + ( 2 * a ) );
	var chk1 = cb1.attr('checked');
	var chk2 = cb2.attr('checked');
	if ( typeof chk1 == 'undefined' &&  typeof chk2 == 'undefined' ){
		//チェックする
		cb1.attr('checked','checked');
		cb2.attr('checked','checked');
		b.children('img').attr('src' , img.replace('_on','_a'));
		/* まとめてチェックを付ける場合の処理を以下に */

	} else {
		//チェックを外す
		cb1.removeAttr('checked');
		cb2.removeAttr('checked');
		b.children('img').attr('src' , img.replace('_a','_off'));
		b.children('img').rollover();
		/* まとめてチェックを外す場合の処理を以下に */

	}
}

//2カラムページのボタン(デフォルトの表示設定)
$(function(){
	
	$('#btnSrc01 img.first').attr('src', '/img/aside_btn_01_off.png');
	
	$('#asideSearch .asLabel input:checkbox:checked').each(function(){
		//console.log($(this).context.id);
		if ($(this).context.id == 'as01' || $(this).context.id == 'as02') {
			$(this).parents('.condSelet').find('img').attr('src', '/img/aside_btn_01_a.png');
		}
		if ($(this).context.id == 'as03' || $(this).context.id == 'as04') {
			$(this).parents('.condSelet').find('img').attr('src', '/img/aside_btn_02_a.png');
		}
		if ($(this).context.id == 'as05' || $(this).context.id == 'as06') {
			$(this).parents('.condSelet').find('img').attr('src', '/img/aside_btn_03_a.png');
		}
		
	});
});

/***********  セレクトボックス  **********/
$(function(){
	$('#stationLink').hide();
	$('#asAdr').change(function(){
		if( $(this).val() != '' ) {
			$('#asLine').addClass('deactive');
			$('#asLine').val('');
			$(this).removeClass('deactive');
			$('#stationLink').hide();
		} else {
			
		}
	});
	$('#asLine').change(function(){
		if( $(this).val() != '' ) {
			$('#asAdr').addClass('deactive');
			$('#asAdr').val('');
			$(this).removeClass('deactive');
			$('#stationLink').show();
			//駅の選択を空に
			$('#SearchStations').val('');
		} else {
			$('#stationLink, #selectedStations').hide();
		}
	});
	
	//
	$('#asAdr option').each(function(index) {
		if (index && $(this).context.selected == true) {
			$('#asLine').addClass('deactive');
			$('#asLine').val('');
		}
	});
	$('#asLine option').each(function(index) {
		if (index && $(this).context.selected == true) {
			$('#asAdr').addClass('deactive');
			$('#asAdr').val('');
			$('#stationLink').show();
		}
	});
	
});

/***********  駅名選択  **********/
$(function(){
	var stationWindow = $('#stationLink a').colorbox({
		iframe:true,
		width:800,
		height:480,
	}).click(function(){
		$(this).attr('href', '/searches/station/' + '?line_cd=' + $('select[id="asLine"]').val());
	});
	
	//モーダル閉じる
	$('#modal #btn input').click(function(){
		//ここに駅選択画面と親ウィンドウ間のデータの受け渡しの処理
		
		/*var obj = {};
		obj = $('input:checkbox:checked').map(function(i){
			return $(this).val();
		}).get().join();
		$('#stationLink input', parent.document).val(obj);*/
		
		if ($('#stations input:checkbox:checked').length !== 0){
			$('#stations input:checkbox:checked').each(function(i){
				
				if (i == 0) {
					stations = $(this).val();
				} else {
					stations += ',' + $(this).val();
				}
			});
			
			$.ajax({
				type : 'POST',
				url : '/searches/set_stations/',
				data : {
					stations : stations,
				},
				success : function(){
				},
				complete : function() {
					$('#stationLink input', parent.document).val(stations);
				}
			});
		} else {
			$.ajax({
				type : 'POST',
				url : '/searches/set_stations/',
				data : {
					stations : null,
				},
				success : function(){
				},
				complete : function() {
					$('#stationLink input', parent.document).val(null);
				}
			});
		}
		
		parent.$.colorbox.close();
		return false;
	});
	
	//駅を全選択・全解除
	$('#chkLineName').change(function(){
		if ( typeof $(this).attr('checked') != 'undefined' ) {
			$('#stations input:checkbox').attr('checked', 'checked');
		} else {
			$('#stations input:checkbox').removeAttr('checked');
		}
	});
});

/***********  お気に入りボタン  **********/
$(function(){
	$('a.fav').click(function(e){
		
		//console.log(e);
		
		$.ajax({
			type : 'POST',
			url : '/searches/change_fav/',
			data : {
				id : $(this).data('id'),
				status : $(this).data('status'),
			},
			success : function(response){
				$('#' + response.id).data('status', response.status)/*.children('img')*/.find('img').attr('src', response.src);
				
				//お気に入り物件の件数表示を増減
				if (response.status) {
					$('#asidePopCount span.count').text(parseInt($('#asidePopCount span.count').text()) + 1);
				} else {
					$('#asidePopCount span.count').text(parseInt($('#asidePopCount span.count').text()) - 1);
				}
			},
			dataType : 'json',
			complete : function(r) {
				//$('#').empty();
				chkQuant();
			}
		});
	});
	
	//お気に入りが0件であればリンクを無効化
	var chkQuant = function () {
		if ($('#asidePopCount span.count').text() == false) {
			$('#asidePopCount a').css('pointer-events', 'none');
		} else {
			$('#asidePopCount a').css('pointer-events', 'visible');
		}
	};
	chkQuant();
	
});

/***********  詳細ページ画像のモーダル表示  **********/
$(function(){
	var imageWindow = $('a.photoModal').colorbox({
		iframe:true,
		width:830,//800
		height:555,//536
	})
});
