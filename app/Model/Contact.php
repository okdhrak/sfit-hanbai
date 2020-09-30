<?php
class Contact extends AppModel {
	
	//public $name = 'Contact';
	
	//規定外のテーブルを使用する場合に指定
	//public $useTable = 'users';
	public $useTable = false;//'users';
	
	public $hasOne = array(
	);
	
	public $belongsTo = array(
	);
	
	public $hasAndBelongsToMany = array(
	);
	
	//バリデーション
	public $validate = array(
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
		'mailcheck' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'メールアドレス(確認)が未入力です',
				'allowEmpty' => false,
				//'last' => false,
			),
			array(
				'rule'    => array('email', true),
				'message' => 'メールアドレス(確認)の形式が正しくありません',
				'allowEmpty' => false,
				//'last' => false,
			),
			array(
				'rule'    => array('notDifferentEmail'),
				'message' => 'メールアドレスとメールアドレス(確認)の内容が異なります',
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
	
	//カスタムバリデーション
	public function notDifferentEmail(){
		//pr($this->data['Contact']);
		if($this->data['Contact']['mail'] === $this->data['Contact']['mailcheck']) {
			return true;
		} else {
			return false;
		}
	}
	
}
