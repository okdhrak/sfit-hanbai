<?php
class Request extends AppModel {
	
	//規定外のテーブルを使用する場合に指定
	public $useTable = false;
	
	public $hasOne = array(
	);
	
	public $belongsTo = array(
	);
	
	public $hasAndBelongsToMany = array(
	);
	
	//バリデーション
	public $validate = array(
		'm_kind' => array(
			array(
				'rule' => array('multiple', array('min' => 1)),
				'message' => 'ご希望の物件種別が未選択です',
				'allowEmpty' => false,
				//'last' => false,
			),
		),
		'm_address' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'ご希望の住所が未入力です',
				'allowEmpty' => false,
				//'last' => false,
			),
		),
		'm_line' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'ご希望の路線が未入力です',
				'allowEmpty' => false,
				//'last' => false,
			),
		),
		'name' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'お名前が未入力です',
				'allowEmpty' => false,
				//'last' => false,
			),
		),
		'kana' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'ふりがなが未入力です',
				'allowEmpty' => false,
				//'last' => false,
			),
		),
		'mail' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'メールアドレスが未入力です',
				'allowEmpty' => false,
				//'last' => false,
			),
			array(
				'rule'    => array('email', true),
				'message' => 'メールアドレスの形式が正しくありません',
				'allowEmpty' => false,
				//'last' => false,
			),
		),
		'tel' => array(
			array(
				'rule' => 'notEmpty',
				'message' => '電話番号が未入力です',
				'allowEmpty' => false,
				//'last' => false,
			),
			array(
				'rule' => array('custom', '/\d{2,4}-\d{2,4}-\d{2,4}/'),
				'message' => '電話番号の形式が正しくありません',
				//'last' => false,
			),
		),
		'pref' => array(
			array(
				'rule' => 'notEmpty',
				'message' => '都道府県が未選択です',
				'allowEmpty' => false,
				//'last' => false,
			),
		),
		'address' => array(
			array(
				'rule' => 'notEmpty',
				'message' => '市区群町名・番地が未入力です',
				'allowEmpty' => false,
				//'last' => false,
			),
		),
	);
	
}
