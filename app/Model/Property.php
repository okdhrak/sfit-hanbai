<?php
class Property extends AppModel {
	
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
		'kind' => array(
			array(
				'rule' => array('multiple', array('min' => 1)),
				'message' => 'お問い合わせ内容が未選択です',
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
	
	//物件情報を取得
	public function getArtInfo($id) {
		//return $this->findById($id);
		$sql = "SELECT * FROM `articles` WHERE 1 AND `id` = {$id} LIMIT 1";
		return $this->query($sql);
	}

}
