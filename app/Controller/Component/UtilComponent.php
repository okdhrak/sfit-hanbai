<?php
class UtilComponent extends Component {
	
	public function __construct() {
	}
	
	public function initialize(Controller $controller) {
		$this->Controller = $controller;
	}
	
	public function startup(Controller $controller) {
		//コンポーネントからモデルを使用
		$this->Article = ClassRegistry::init('Article');//Articleモデルを$this->Articleに格納
		
		$this->Controller->set('areaList', $this->Article->getAriaList());
		$this->Controller->set('lineList', $this->Article->getLineList());
		$this->Controller->set('artNum', $this->Article->getRestrictedArtNum());
		
		$this->Controller->set('budgetList',
			array(
				'10000000' => '～1,000万円',
				'20000000' => '～2,000万円',
				'30000000' => '～3,000万円',
				'40000000' => '～4,000万円',
				'50000000' => '～5,000万円',
				'100000000' => '～10,000万円',
				'max' => '～10,000万円以上',
			)
		);
	}
	
	/**
	 * タイムスタンプを取得
	 * 
	 * @return int タイムスタンプを返す
	 */
	public function getTimeStamp() {
		return time();
	}
	
	/**
	 * パスワードを発行
	 * 
	 * @return str ランダムでパスワードを生成し返す
	 */
	function createPassword($length = 10) {
		return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $length);
	}
	
	/**
	 * 数値のフォーマットを金額へ変換
	 *
	 * @param string $value
	 * @return string 変換後の金額表示
	 */
	public function numberFormat($value, $type=0) {
		if ($value == ''){
			return null;
		}
		$value = (integer) $value / 10000;
		$value = number_format($value, 0, ".", ",");
		$value .= ($type) ? '万円' : '';
		return $value;
	}
	
	/**
	 * シリアライズ化された駅徒歩分数を表示用へ変換
	 *
	 * @param string $value
	 * @return string 変換後の駅徒歩分数
	 */
	public function getTrafficArr($value) {
		
		if ($value == '' || $value == 'N;') { return NULL; }
		
		$traffic_arr = unserialize($value);
		list($line, $station, $walk) = explode(',', array_shift($traffic_arr));
		//return $line . '「' . $station . '」駅 徒歩' . $walk . '分';
		return $line . '「' . $station . '」駅';
	}
	
	//idを基に画像ディレクトリを返す(ローカル)
	public function _getFileDir($id) {
		return PHOTO_DIR . DS . date('Y', $id) . DS . $id;
	}
	//idを基に画像ディレクトリを返す(HTTP)
	public function _getImgDir($id) {
		return IMAGE_PATH . date('Y', $id) . '/' . $id . '/';
	}
	
	/**
	 * メールヘッダfrom
	 *
	 * @param string $value
	 * @return string
	 */
	public function getMailHeaderFrom($value) {
		if (preg_match('/^[a-zA-Z0-9_\.\-]+?@[A-Za-z0-9_\.\-]+$/', $value)){
			return $value;
		} else {
			return 'someone@example.ne.jp';
		}
	}
	
	/**
	 * おすすめ物件をシャッフルして返す
	 *
	 * @param array $arr
	 * @return array
	 */
	public function getShuffledArt($arr) {
		if (count($arr) >= 4) {
			shuffle($arr);
			$resData = array_slice($arr, 0, 4);
		} elseif (count($arr) >= 2) {
			shuffle($arr);
			$resData = array_slice($arr, 0, 2);
		} else {
			$resData = NULL;
		}
		
		return $resData;
	}
	
}
?>
