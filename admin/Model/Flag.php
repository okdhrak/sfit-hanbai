<?php
class Flag extends AppModel {

	//規定外のテーブルを使用する場合に指定
	//public $useTable = 'users';
	//public $useTable = false;
	
	/*public $hasOne = array(
		'PeculiarPoint',
		'Flag',
	);*/
	
	public $belongsTo = array(
		//'MtrStatus',
		//'MtrStation',
	);
	
	//バリデーション
	public $validate = array(
		/*'status' => array(
			
			array(
				'rule' => 'notEmpty', 
				'message' => 'statusが空欄です', 
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
