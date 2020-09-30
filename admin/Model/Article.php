<?php
class Article extends AppModel {

	//規定外のテーブルを使用する場合に指定
	//public $useTable = 'users';
	//public $useTable = false;
	
	public $hasOne = array(
		'PeculiarPoint' => array(
			'className' => 'PeculiarPoint',
            'foreignKey' => 'article_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'dependent' => true
		),
		'PmCompany' => array(
			'className' => 'PmCompany',
            'foreignKey' => 'article_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'dependent' => false
		),
		'ResistationTime' => array(
			'className' => 'ResistationTime',
            'foreignKey' => 'article_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'dependent' => false
		),
		'Flag' => array(
			'className' => 'Flag',
            'foreignKey' => 'article_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'dependent' => false
		),
	);
	
	public $belongsTo = array(
		//'MtrCategory',
		//'MtrPref',
	);
	
	public $hasAndBelongsToMany = array(
		//'MtrFavolite', 
	);
	
	//バリデーション
	public $validate = array(
		'mid' => array(
			array(
				'rule' => 'notEmpty',
				'message' => '管理番号が未入力です',
			),
		),
		'category' => array(
			array(
				'rule' => 'notEmpty',
				'message' => 'カテゴリーが未選択です',
			),
		),
		'name' => array(
			array(
				'rule' => 'notEmpty',
				'message' => '物件名が未入力です',
			),
		),
		'price' => array(
			array(
				'rule' => 'notEmpty',
				'message' => '価格が未入力です',
			),
		),
		'pref' => array(
			array(
				'rule' => 'notEmpty', 
				'message' => '都道府県が未選択です', 
			),
		),
		'city' => array(
			array(
				'rule' => 'notEmpty', 
				'message' => '市区町村が未選択です', 
			),
		),
		'town' => array(
			array(
				'rule' => 'notEmpty', 
				'message' => '物件所在地(町域・丁目)が空欄です', 
			),
		),
	);
	
	//保存前の処理
	/*function beforeSave($options = array()) {
		
		//パスワードが入力されている場合は暗号化する
		if (!empty($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		
		return true;
	}*/
	
	public function findByTest() {
		return $this->find('all');
	}
	
	public function findByTestQuery() {
		$sql = 'select * from articles';
		return $this->query($sql);
	}
	
	public function getStationList(){
		//$sql = 'select * from mtr_stations';
		$sql = 'SELECT DISTINCT `MtrStation`.`station_name` FROM `hanbai_db`.`mtr_stations` AS `MtrStation` WHERE pref_cd = 13';
		return $this->query($sql);
	}
	
	public function getLineList($sn){
		//$sql = "SELECT `line_cd` FROM `mtr_stations` WHERE `station_name` = \"$sn\"";
		$sql = "SELECT `MtrLine`.`line_name`, `MtrStation`.`station_name` FROM `hanbai_db`.`mtr_stations` AS `MtrStation` LEFT JOIN `hanbai_db`.`mtr_lines` AS `MtrLine` ON `MtrLine`.`line_cd` = `MtrStation`.`line_cd` WHERE `station_name` = \"$sn\"";
		return $this->query($sql);
	}
	
	public function getCityList(){
		$sql = 'SELECT DISTINCT `MtrAddress`.`city` FROM `hanbai_db`.`mtr_addresses` AS `MtrAddress` WHERE pref_cd = 13';
		$result = $this->query($sql);
		foreach ($result as $key => $val){
			$cityList[$val['MtrAddress']['city']] = $val['MtrAddress']['city'];
		}
		return $cityList;
	}

}
