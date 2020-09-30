<?php
class Lp extends AppModel {
	
	//public $name = 'Lp';
	
	//規定外のテーブルを使用する場合に指定
	//public $useTable = 'users';
	public $useTable = false;//'users';
	
	//バリデーション
	public $validate = array(
		'book' => array(
			array(
				'rule' => array('multiple', array('min' => 1)),
				'message' => '来場の予約・お問合せが未選択です',
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
		'contact' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'ご連絡先が未入力です',
				'allowEmpty' => false,
				//'last' => false,
			),
			array(
				'rule'    => array('failFormatContact'),
				'message' => 'ご連絡先の形式が正しくありません',
				'allowEmpty' => false,
				//'last' => false,
			),
		),
		'kind' => array(
			array(
				'rule' => array('multiple', array('min' => 1)),
				'message' => 'お探しの物件種別が未選択です',
				'allowEmpty' => false,
				//'last' => false,
			),
		),
	);
	
	//カスタムバリデーション
	public function failFormatContact() {
		if (preg_match('/^[a-zA-Z0-9_\.\-]+?@[A-Za-z0-9_\.\-]+$/', $this->data['Lp']['contact']) || preg_match("/\d{2,4}-\d{2,4}-\d{2,4}/", $this->data['Lp']['contact'])) {
			return true;
		} else {
			return false;
		}
	}
	
}
