<?php
class UtilComponent extends Component {
	
	public function printTest() {
		echo 'test';
	}
	
	/**
	 * 物件登録時に画像用ディレクトリを作成
	 * 
	 * @return book
	 */
	public function createDirectory($id) {
		//西暦ディレクトリが存在しなければ作成
		if (!is_dir(PHOTO_DIR_YEAR)) {
			mkdir(PHOTO_DIR_YEAR, 0777);
		}
		//画像ディレクトリが存在しなければタイムスタンプを基に作成
		if (!is_dir(PHOTO_DIR_YEAR . DS . $id)) {
			mkdir(PHOTO_DIR_YEAR . DS . $id, 0777);
		}
	}
	
	/**
	 * idから登録された年数を計算し、画像ディレクトリのパスを取得
	 * 
	 * @return str
	 */
	public function getRegistedPhotoPath($value) {
		return PHOTO_DIR . DS . date('Y', $value) . DS . $value;
	}
	
	/**
	 * 拡張子を除いたファイル名を取得
	 * 
	 * @return str
	 */
	public function getUploadImgName($prefix = 'a') {
		return $prefix . '_' . str_replace('.', '_', microtime(true)) . '.jpg';
	}
	
	/**
	 * 画像ファイルの存在を確認、存在すれば削除
	 * 
	 * @return bool
	 */
	public function ckechFileExistsAndDelete($aid, $pid) {
		if (file_exists($this->getRegistedPhotoPath($aid) . DS . $pid . '.jpg') === true) {
			return unlink($this->getRegistedPhotoPath($aid) . DS . $pid . '.jpg');
		}
	}
	
	/**
	 * アップロードされたCSVファイルのバリデーション
	 * 
	 * @return bool
	 */
	public function checkUploadedCsv($csvfile) {
		
		if ($csvfile['data']['type']['Article']['csvfile'] === 'text/csv' && $csvfile['data']['size']['Article']['csvfile'] < '3200000') {
			return true;
		} else {
			return false;
		}
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
	 * 改行処理
	 *
	 * @param string $value
	 * @return string 改行をnl2br処理
	 */
	public function nltobr($value) {
		return nl2br($value);
	}
	
	/**
	 * 数値のフォーマットを金額へ変換
	 *
	 * @param string $value
	 * @return string 変換後の金額表示
	 */
	public function numberFormat($value) {
		if ($value == ''){
			return null;
		}
		return number_format((integer)$value, 0, ".", ",");
	}
	
	/**
	 * タイムスタンプを日時に変換
	 *
	 * @param string $value
	 * @return string 日時
	 */
	public function stampToDate($value){
		return date("Y/m/d", $value);
	}
	
		
	/**
	 * 変更2週間かをチェック
	 *
	 * @param string $value
	 * @return boolean
	 */
	public function checkDateTime($value){
		$t2w = strtotime('-2 week', time());
		$bool_var = $value > $t2w ? true : false;
		return $bool_var;
	}
	
	/**
	 * CSVファイル読込み時バイト数の調整
	 *
	 * @param string $value
	 * @return boolean
	 */
	public function fGetCsvReg(&$handle, $length = null, $d = ',', $e = '"') {
		$d = preg_quote($d);
		$e = preg_quote($e);
		$_line = "";
		while (@$eof != true) {
			$_line .= (empty($length) ? fgets($handle) : fgets($handle, $length));
			$itemcnt = preg_match_all('/'.$e.'/', $_line, $dummy);
			if ($itemcnt % 2 == 0) $eof = true;
		}
		$_csv_line = preg_replace('/(?:\\r\\n|[\\r\\n])?$/', $d, trim($_line));
		$_csv_pattern = '/('.$e.'[^'.$e.']*(?:'.$e.$e.'[^'.$e.']*)*'.$e.'|[^'.$d.']*)'.$d.'/';
		preg_match_all($_csv_pattern, $_csv_line, $_csv_matches);
		$_csv_data = $_csv_matches[1];
		for($_csv_i=0;$_csv_i<count($_csv_data);$_csv_i++){
			$_csv_data[$_csv_i]=preg_replace('/^'.$e.'(.*)'.$e.'$/s','$1',$_csv_data[$_csv_i]);
			$_csv_data[$_csv_i]=str_replace($e.$e, $e, $_csv_data[$_csv_i]);
		}
		return empty($_line) ? false : $_csv_data;
	}
	
	//CSVファイル読込み時の文字コード変換
	public function sjisToUtf8($value){
		$value = mb_convert_encoding($value, "UTF-8", "Shift_JIS");
		
		return $value;
	}
}
?>
