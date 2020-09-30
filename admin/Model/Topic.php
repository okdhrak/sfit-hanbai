<?php
class Topic extends AppModel {

	//規定外のテーブルを使用する場合に指定
	//public $useTable = 'users';
	//public $useTable = false;
	
	public $hasOne = array();
	
	public $belongsTo = array();
	
	public $hasAndBelongsToMany = array();
	
	//バリデーション
	public $validate = array(
		'date' => array(
			array(
				'rule' => array('notEmptyArray'),
				'message' => '年月日が未入力です',
			),
		),
		'comment' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'コメントが未入力です',
			),
		),
		
	);
	
	public function notEmptyArray($check) {
		//pr($check);
		return (strpos($check['date'], 's:0:"";')) ? false : true;
    }
	
	//保存前の処理
	/*function beforeSave($options = array()) {
	}*/
}
