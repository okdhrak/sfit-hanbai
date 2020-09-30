<?php
class Member extends AppModel {
	
	//public $name = '';
	
	//規定外のテーブルを使用する場合に指定
	public $useTable = 'members';
		
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
				'rule' => array('email', true),
				'message' => 'メールアドレスの形式が正しくありません',
				'allowEmpty' => false,
				//'last' => false,
			),
			/*array(
				'rule' => 'isUnique',
				'message' => 'このメールアドレスはすでに登録されています',
				'allowEmpty' => false,
				//'last' => false,
			),*/
			array(
				'rule' => array('notUniqueEmail'),
				'message' => 'このメールアドレスはすでに登録されているか仮登録手続き中です',
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
				'rule' => array('email', true),
				'message' => 'メールアドレス(確認)の形式が正しくありません',
				'allowEmpty' => false,
				//'last' => false,
			),
			array(
				'rule' => array('notDifferentEmail'),
				'message' => 'メールアドレスとメールアドレス(確認)の内容が異なります',
				'allowEmpty' => false,
				//'last' => false,
			),
		),
		'password' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'パスワードが未入力です',
				'allowEmpty' => false,
				//'last' => false,
			),
			array(
				'rule' => array('custom', '/[a-z1-9]/'),
				'message' => 'パスワードは英数字のみ入力可能です',
				//'last' => false,
			),
			array(
				'rule' => array('between', 4, 20),
				'message' => 'パスワードは4文字以上20文字以下で入力可能です'
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
	
	//カスタムバリデーション(確認用メールアドレスとの同一性チェック)
	public function notDifferentEmail() {
		
		if ($this->data['Member']['mail'] === $this->data['Member']['mailcheck']) {
			return true;
		} else {
			return false;
		}
		
	}
	
	//カスタムバリデーション(メールアドレスの一意性チェック)
	public function notUniqueEmail() {
		
		//本登録済み
		if ($this->find('count', array(
				'conditions' => array(
					'mail' => $this->data['Member']['mail'],
					'agreement' => 1
				),
				'order' => 'id DESC',
				'limit' => 1,
			))) {
			return false;
		//仮登録済み24時間以内
		} elseif ($this->find('first', array(
				'conditions' => array(
					'mail' => $this->data['Member']['mail'],
					'agreement' => 0,
					'id >' => time() - (60 * 60 * 24)
				),
				'order' => 'id DESC',
				'limit' => 1,
			))) {
			return false;
		} else {
			return true;
		}
		
		/*echo '<pre>';
		print_r($this->find('all', array(
			'conditions' => array(
				'mail' => $this->data['Member']['mail'],
				'agreement' => 1
			),
			'order' => 'id DESC',
			'limit' => 1,
		)));
		echo '</pre>';*/
		
	}
	
	//保存前の処理
	function beforeSave($options = array()) {
		
		//パスワードが入力されている場合は暗号化する
		if (!empty($this->data['Member']['password'])) {
			//$this->data['Member']['password'] = md5($this->data['Member']['password']);
			$this->data['Member']['password'] = AuthComponent::password($this->data['Member']['password']);
		}
		
		return true;
	}
	
}
