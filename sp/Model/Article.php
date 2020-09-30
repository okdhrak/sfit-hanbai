<?php
class Article extends AppModel {
	
	//public $name = 'Contact';
	
	//規定外のテーブルを使用する場合に指定
	//public $useTable = 'users';
	//public $useTable = false;//'users';
	
	public $hasOne = array(
		'PeculiarPoint' => array(
			'className' => 'PeculiarPoint',
            'foreignKey' => 'article_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'dependent' => true
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
	
	//市区町村リストを一意で取得
	public function getAriaList() {
		
		$sql = 'SELECT Article.city, COUNT(*) AS num FROM
					articles AS Article LEFT JOIN flags AS Flag ON Article.id = Flag.id
						WHERE 1
						AND Flag.status = 1
						AND Flag.delete = 0
							GROUP BY Article.city';
		
		return $this->query($sql);
	}
	
	//沿線リストを一意で取得
	public function getLineList() {
		
		$sql = 'SELECT Article.traffic FROM
					articles AS Article LEFT JOIN flags AS Flag ON Article.id = Flag.id
						WHERE 1
							AND NOT Article.traffic = "N;"
							AND NOT Article.traffic = ""
							AND Flag.status = 1
							AND Flag.delete = 0';
			
			foreach ($this->query($sql) as $key => $val) {
				$traffic_arr = unserialize($val['Article']['traffic']);
				@list($line, $station, $walk) = explode(',', @array_shift($traffic_arr));
				$line_arr[] = $line;
			}
		
			//沿線配列の重複を除く
			$line_arr = array_count_values($line_arr);
			
			//$line_arr:array('沿線名' => '沿線に含まれる駅の個数')
			foreach ($line_arr as $key => $val) {
				$sql = 'SELECT MtrLine.line_name,MtrLine.line_cd,' . $val . ' AS num FROM
							mtr_lines as MtrLine LEFT JOIN mtr_stations AS MtrStation ON MtrLine.line_cd = MtrStation.line_cd
								WHERE 1
								AND MtrLine.line_name LIKE "%' . $key . '%"
								AND MtrStation.pref_cd = 13
								LIMIT 1';
						
				$result_arr[] = $this->query($sql);
			}
		
		return $result_arr;
	}
	
	//メンバー限定物件数の取得
	public function getRestrictedArtNum() {
		$sql = 'SELECT COUNT(*) AS num FROM
					articles as Article LEFT JOIN flags AS Flag ON Article.id = Flag.id
						WHERE 1
							AND Flag.status = 1
							AND Flag.restriction = 1
							AND Flag.delete = 0';
		
		return $this->query($sql);
	}
	
	//駅選択ページで件数の有効な駅を取得
	public function getStations($line_cd) {
		//物件ごとの交通を配列で取得
		$sql = 'SELECT Article.traffic FROM
					articles AS Article LEFT JOIN flags AS Flag ON Article.id = Flag.id
						WHERE 1
							AND NOT Article.traffic = "N;"
							AND Flag.status = 1
							AND Flag.delete = 0';
		
			foreach ($this->query($sql) as $key => $val) {
				$traffic_arr = unserialize($val['Article']['traffic']);
				@list($line, $station, $walk) = @explode(',', array_shift($traffic_arr));
				$articleTraffics[] = array('line' => $line, 'station' => $station);
			}
		
		//特定沿線の全駅を配列で取得
		$sql = null; $sql = 'SELECT MtrLine.line_cd,MtrLine.line_name,MtrStation.station_cd,MtrStation.station_name FROM
								mtr_lines as MtrLine LEFT JOIN mtr_stations AS MtrStation ON MtrLine.line_cd = MtrStation.line_cd
									WHERE 1
										AND MtrStation.pref_cd = 13
										AND MtrLine.line_cd = ' . $line_cd;
		
			foreach($this->query($sql) as $key => $val){
				
				foreach ($articleTraffics as $k => $v) {
					if (@substr_count($val['MtrLine']['line_name'], $v['line']) === 1 && $val['MtrStation']['station_name'] === $v['station']) {
						//echo '★' . $val['MtrLine']['line_name'] . ':' . $v['line'] . '-' . $val['MtrStation']['station_name'] . ':' . $v['station'] . '<br>';
						
						$result[$val['MtrStation']['station_cd']][] = $val['MtrStation']['station_name'];
					} else {
						//echo $val['MtrLine']['line_name'] . ':' . $v['line'] . '-' . $val['MtrStation']['station_name'] . ':' . $v['station'] . '<br>';
					}
					
				}
			}
		
		return $result;
		
	}
	
	//沿線名の取得
	public function getLineName($line_cd) {
		
		$sql = 'SELECT MtrLine.line_name FROM
					mtr_lines as MtrLine
						WHERE 1
							AND MtrLine.line_cd = ' . $line_cd . 
							' LIMIT 1';
		
		$tmp = $this->query($sql);
		
		return $tmp[0]['MtrLine']['line_name'];
	}
	
	//もっと見る(物件情報の取得)
	public function getMore($num = 0, $condition = '', $sort = '') {
		
		$sql = 'SELECT Article.*, PeculiarPoint.*, ResistationTime.*, Flag.* FROM
					articles as Article
					LEFT JOIN peculiar_points AS PeculiarPoint ON Article.id = PeculiarPoint.id
					LEFT JOIN resistation_times AS ResistationTime ON Article.id = ResistationTime.id
					LEFT JOIN flags AS Flag ON Article.id = Flag.id
						WHERE 1
							AND Flag.status = 1
							AND Flag.delete = 0' . 
							$condition . 
							$sort . 
							'LIMIT ' . $num . ', 10';
		
		return $this->query($sql);
		
	}
	
	//全件数の取得
	public function getCount($condition) {
		
		$sql = 'SELECT Article.*, Flag.* FROM
					articles as Article
					LEFT JOIN peculiar_points AS PeculiarPoint ON Article.id = PeculiarPoint.id
					LEFT JOIN resistation_times AS ResistationTime ON Article.id = ResistationTime.id
					LEFT JOIN flags AS Flag ON Article.id = Flag.id
						WHERE 1
							AND Flag.status = 1
							AND Flag.delete = 0'.
							$condition;
		
		return $this->query($sql);
		
	}

}
