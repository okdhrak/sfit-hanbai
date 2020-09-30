<?php
class PeculiarPoint extends AppModel {

	//規定外のテーブルを使用する場合に指定
	//public $useTable = 'users';
	//public $useTable = false;
	
	/*public $hasOne = array(
		'PeculiarPoint',
		'Flag',
	);*/
	
	public $belongsTo = array(
		//'MtrRoomType',
	);
	
	//バリデーション
	public $validate = array(
		/*'m_extent' => array(
			
			array(
				'rule' => 'notEmpty',
				'message' => '面積(建物専有部)が空欄です',
			),
		),*/
		/*'t_site_test' => array(
			
			array(
				'rule' => 'notEmpty', 
				'message' => 't_siteが空欄です', 
			),
		),*/
	);
	
	//保存前の処理
	/*function beforeSave($options = array()) {
		
		//パスワードが入力されている場合は暗号化する
		if (!empty($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		
		return true;
	}*/
	
}
