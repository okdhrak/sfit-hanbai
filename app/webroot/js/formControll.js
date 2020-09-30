/***********  郵便番号から住所を表示  **********/
$(function(){
	$('.pcode1, .pcode2').change(function(e){
		
		if ($('.pcode1').val() == '' || $('.pcode2').val() == '') {
			return false;
		}
		
		//ローディングを表示
		$('span#loading img').show();
		
		$.ajax({
			type : 'POST',
			url : '/api/get_postcode/',
			data : {
				pcode1 : $('.pcode1').val(),
				pcode2 : $('.pcode2').val(),
			},
			success : function(response){
				if (response) {
					$('#m_pref').val(response.pref_cd);
					$('#m_address').val(response.city + response.town);
				}
			},
			dataType : 'json',
			complete : function(r) {
				$('span#loading img').hide();
			}
		});
	});
});



/*====================================================================================================
//////////////////////////////////////////////////////////////////////////////////////////////////////

 created: 2015/05/05
 update : 

//////////////////////////////////////////////////////////////////////////////////////////////////////
====================================================================================================*/
/***********  プルダウン項目(金額)適正化  **********/
$(function(){
	
	//
	$('select[id=MemberPriceStart], select[id=MemberPriceEnd]').change(function(){
		
		var changed_val = $(this).val();
		var attr_name = $(this).attr('id');
		
		if (attr_name === 'MemberPriceStart') {
			$('[id=MemberPriceEnd] option').each(function(/*index, element*/){
				if (parseInt(changed_val) >= parseInt($(this).val())) {
					$(this).css('display', 'none');
				} else {
					$(this).css('display', 'block');
				}
			});
		} else {
			$('[id=MemberPriceStart] option').each(function(/*index, element*/){
				if (parseInt(changed_val) <= parseInt($(this).val())) {
					$(this).css('display', 'none');
				} else {
					$(this).css('display', 'block');
				}
			});
		}
	});
	
	//
	$(window).bind("load", function(event){
		
		$('[id=MemberPriceEnd] option').each(function(/*index, element*/){
			if (parseInt($('select[id=MemberPriceStart]').val()) >= parseInt($(this).val())) {
				$(this).css('display', 'none');
			} else {
				$(this).css('display', 'block');
			}
		});
		
		$('[id=MemberPriceStart] option').each(function(/*index, element*/){
			if (parseInt($('select[id=MemberPriceEnd]').val()) <= parseInt($(this).val())) {
				$(this).css('display', 'none');
			} else {
				$(this).css('display', 'block');
			}
		});
		
	});
	
});
