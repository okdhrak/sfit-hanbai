<?php
class Api extends AppModel {
	
	//public $name = 'Api';
	
	//規定外のテーブルを使用する場合に指定
	public $useTable = false;
	
	public $hasOne = array(
	);
	
	public $belongsTo = array(
	);
	
	public $hasAndBelongsToMany = array(
	);
	
	//郵便番号から住所を取得
	public function getPostCode($pcode) {
		
		//return $pcode;
		
		$sql = 'SELECT MtrAddress.pref_cd, MtrAddress.city, MtrAddress.town FROM
					mtr_addresses as MtrAddress
						WHERE 1
							AND MtrAddress.post_cd = "' . $pcode . 
							'" LIMIT 1';
		
		$tmp = $this->query($sql);
		
		return $tmp[0]['MtrAddress'];
	}
	

}
