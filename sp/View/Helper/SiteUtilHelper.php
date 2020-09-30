<?php
class SiteUtilHelper extends AppHelper {
	
	//コンポーネントの設定
	//public $components = array('Session');
		
	//エリアの配列を適正な形に整形し配列へ渡す
	public function modifyAreaArr($areaList) {
		foreach ($areaList as $key => $val) {
			$arr[$val['Article']['city']] = $val['Article']['city']/* . '(' . $val[0]['num'] . ')'*/;
		}
		
		arsort($arr);
		return $arr;
	}
	
	//沿線の配列を適正な形に整形し配列へ渡す
	public function modifyLineArr($lineList) {
		foreach ($lineList as $key => $val) {
			$arr[$val[0]['MtrLine']['line_cd']] = $val[0]['MtrLine']['line_name'];
			//echo $val[0][0]['num'];
			
		}

		asort($arr);
		return $arr;
	}
	
	//限定物件の適正化
	public function modifyArtNum($artNum) {
		return $artNum[0][0]['num'];
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
	 * 金額にコロンを付ける
	 *
	 * @param string $value
	 * @return string 変換後の金額表示
	 */
	public function priceFormat($value) {
		$value = number_format($value, 0, ".", ",");
		return $value;
	}
	
	/**
	 * urlエンコード
	 *
	 * @param string $value
	 * @return string 
	 */
	public function urlEncode($value) {
		return rawurlencode($value);
	}
	
	/**
	 * シリアライズ化された駅徒歩分数を表示用へ変換
	 *
	 * @param string $value
	 * @return string 変換後の駅徒歩分数
	 */
	public function getTrafficAll($value) {
		
		if ($value == '' || $value == 'N;') { return NULL; }
		
		$traffic_arr = unserialize($value);
		foreach ($traffic_arr as $key => $val) {
			list($line, $station, $walk) = explode(',', $val);
			$traffic[] = $line . '「' . $station . '」駅' . $walk . '分';
		}
		return implode("\n", $traffic);
		//list($line, $station, $walk) = explode(',', array_shift($traffic_arr));
		//return $line . '「' . $station . '」駅' . $walk . '分';
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
		return $line . '「' . $station . '」駅' . $walk . '分';
	}
	
	public function getTagArr($value, $tagList) {
		
		if ($value == '' || $value == 's:0:"";') { return NULL; }
		
		$tags = '<ul class="clrFix">';
		foreach (unserialize($value) as $key => $val) {
			$tags .= '<li><a href="/searches/result/tag:' . $val . '">' . $tagList[$val] . '</a></li>';
		}
		$tags .= '</ul>';
		
		return $tags;
	}
	
	//
	public function getCateContent($value, $artInfoArr, $roomTypeList) {
		
		if ($value == 1) {
			return sprintf('<p class="area"><span>土地面積</span>：%s㎡</p>
							<p class="year"><span>建ぺい率</span>：%s％ / 容積率：%s％</p>', $artInfoArr['t_site'], $artInfoArr['t_site_coverage1'], $artInfoArr['t_floorarea_ratio1']);
		} elseif ($value == 2) {
			$old_arr = unserialize($artInfoArr['k_old']);
			return sprintf('<p class="area"><span>面積</span>：%s㎡ / 間取り：%s%s</p>
							<p class="year"><span>築年数</span>：%s年%s月</p>', $artInfoArr['k_extent'], $artInfoArr['k_room_num'], ($artInfoArr['k_room_type']) ? $roomTypeList[$artInfoArr['k_room_type']] : '', $old_arr['year'], $old_arr['month']);
		} elseif ($value == 3) {
			$old_arr = unserialize($artInfoArr['m_old']);
			return sprintf('<p class="area"><span>専有面積</span>：%s㎡ / 間取り：%s%s</p>
							<p class="year"><span>築年数</span>：%s年%s月</p>', $artInfoArr['m_extent'], $artInfoArr['m_room_num'], ($artInfoArr['m_room_type']) ? $roomTypeList[$artInfoArr['m_room_type']] : '', $old_arr['year'], $old_arr['month']);
		} else {
			return false;
		}
	}
	
	//築年数を整形し取得
	public function getOld($date) {
		$date_arr = unserialize($date);
		return $date_arr['year'] . '年' . $date_arr['month'] . '月';
	}
	//築年数を判別
	public function checkOld($date) {
		
		if ($date == 'N;') {
			return false;
		}
		
		$date_arr = unserialize($date);
		
		if (!$date_arr['year'] && !$date_arr['month']) {
			return false;
		}
		
		return true;
	}
	
	//お気に入り状況を判断しボタンを返す
	public function getFavBtn($id) {
		//cookieがある場合の処理
		if ($this->_chkIssetCookie($id)) {//あり
			return sprintf('<a id="%s" href="javascript:;" class="fav" data-id="%s" data-status="%s"><img src="%s"></a>', $id, $id, 1, '/sp/img/list_images/btn-favorite_done.png');
		} else {//なし
			return sprintf('<a id="%s" href="javascript:;" class="fav" data-id="%s" data-status="%s"><img src="%s"></a>', $id, $id, 0, '/sp/img/list_images/btn-favorite_add.png');
		}
	}
	
	public function _chkIssetCookie($id) {
		if (isset($_COOKIE['fav'])) {
			return array_key_exists($id, unserialize($_COOKIE['fav']));
		} else {
			return false;
		}
	}
	
	//選択されている沿線からチェック状態を判断
	public function chkCheckedStation($station_name, $stations_name) {
		foreach (explode(',', $stations_name) as $key => $val) {
			echo ($station_name === $val) ? 'checked="checked"' : NULL;
		}
	}
	
	//選択されている駅名をセッションから取り出して表示
	public function getSelectedStations($stations) {
		if ($stations) {
			$stations = str_replace(',', ' ', $stations);						
$str = <<< EOF
<div id="selectedStations" style="text-align:right; line-height:1.6em; margin-top:25px;">
	<p>指定駅：$stations</p>
</div>
EOF;
			return $str;
		}
	}
	
	//メイン画像の有無を確認
	/*public function getResultPageThumb($id, $width_thumb = 300, $height_thumb = 180) {
		if ($file_dir_re = opendir($file_dir = $this->_getFileDir($id))) {
			while (($file = readdir($file_dir_re)) !== false) {
				if (preg_match('/^m_.+.jpg/', $file)) {
					
					//define('WIDTH', 300);
					//define('HEIGHT', 150);
					//$img_path = $this->_getImgDir($id) . $file;
					$img_path = $this->_getFileDir($id) . DS . $file;
					$thumb_name = 'thumb.jpg';
					
					list($iwidth, $iheight) = getimagesize($img_path);
					
					//echo $img_path;
					//echo $iwidth.':'.$iheight;
					
					$in = imagecreatefromjpeg($img_path);//リソースが返る
					$out = imagecreatetruecolor($width_thumb, $height_thumb);//リソースが返る
					
					//求める画像サイズとの比を求める
					$width_ratio = $iwidth / $width_thumb;
					$height_ratio = $iheight / $height_thumb;
					
					//横より縦の比率が大きい場合は、求める画像サイズより縦長
					// => 縦の上下をカット
					if ($width_ratio < $height_ratio) {
						$cut = ceil((($height_ratio - $width_ratio) * $height_thumb) / 2);
						imagecopyresampled($out, $in, 0, 0, 0, $cut, $width_thumb, $height_thumb, $iwidth, $iheight - ($cut * 2));
					//縦より横の比率が大きい場合は、求める画像サイズより横長
					// => 横の左右をカット
					} else if ($height_ratio < $width_ratio) {
						$cut = ceil((($width_ratio - $height_ratio) * $width_thumb) / 2);
						imagecopyresampled($out, $in, 0, 0, $cut, 0, $width_thumb, $height_thumb, $iwidth - ($cut * 2), $iheight);
					//縦横比が同じなら、そのまま縮小
					} else {
						imagecopyresampled($out, $in, 0, 0, 0, 0, $width_thumb, $height_thumb, $width, $height);
					}
					
					//ファイルの保存
					imagejpeg($out, $file_dir . DS . $thumb_name, 100);
					
					//画像の出力タグを帰す
					return sprintf('<img src="%s" width="%s" height="%s">', $this->_getImgDir($id) . $thumb_name, $width_thumb, $height_thumb);
					
					//メモリ開放
					imagedestroy($in);
					imagedestroy($out);
					
					return false;
				}
			}
		}
		
		return sprintf('<img src="%s">', 'http://placehold.it/300x180/');
	}*/
	
	
	//一覧ページサムネイル画像を取得
	public function getThumbPhoto($id, $cate, $width=600, $height=300) {
		if ($file_dir_re = opendir($file_dir = $this->_getFileDir($id))) {
			while (($file = readdir($file_dir_re)) !== false) {
				if (preg_match("/^{$cate}.+.jpg/", $file)) {
					return  sprintf('<img src="/sp/searches/c_thumb_image/%s/%s/%s/%s" width="%s" height="%s">', $id, $cate, $width, $height, $width, $height);
				}
			}
		}
		return sprintf('<img src="%s" width="%s" height="%s">', '/sp/img/sample_list_600_300.png', $width, $height);
	}
	
	//詳細ページ画像を取得
	public function getDetailPhoto($id, $cate, $width=600, $height=600) {
		
		$result = NULL;
		$pr_width = ($cate == 'o') ? 600 : 600;
		
		if ($file_dir_re = opendir($file_dir = $this->_getFileDir($id))) {
			while (($file = readdir($file_dir_re)) !== false) {
				if (preg_match("/^{$cate}.+.jpg/", $file)) {
					$result .= sprintf('<li><p class="imageThumbWrap"><img src="%s" width="%s" alt=""></p></li>', "/sp/searches/c_detail_image/$id/$file/$width/$height", $pr_width);
				}
			}
			
			if ($result !== NULL) {
				return $result;
			} elseif ($cate == 'o') {
				return false;
			} else {
				return sprintf('<li><p class="imageThumbWrap"><img src="%s" width="%s"></p></li>', '/sp/img/sample_list_600_600.png', $pr_width);
			}
		}
	}
	
	//idを基に画像ディレクトリを返す(ローカル)
	public function _getFileDir($id) {
		return PHOTO_DIR . DS . date('Y', $id) . DS . $id;
	}
	//idを基に画像ディレクトリを返す(HTTP)
	public function _getImgDir($id) {
		return IMAGE_PATH . date('Y', $id) . '/' . $id . '/';
	}
	
	//cookieの数を取得
	public function getCookieNum() {
		if (isset($_COOKIE['fav'])) {
			return count(unserialize($_COOKIE['fav']));
		} else {
			return '0';
		}
	}
	
	//cookieの数を取得
	public function strtohide($value) {
		return str_repeat('*', strlen($value));
	}
	
	//トピックスの登録日を整形し取得
	public function getTopicsDate($value) {
		$date_arr = unserialize($value);
		return implode('.', $date_arr);
	}
	
	//トピックスのコメントを整形し取得
	public function getTopicsComment($value) {
		
		if (!empty($value['link'])) {
			$linkHtml = '<a href="' . $value['link'] . '"';
			$linkHtml .= ($value['tb']) ? ' target="_blank">' : '>';
			$linkHtml .= nl2br($value['comment'], false) . '</a>';
			return $linkHtml;
		}
		
		return nl2br($value['comment'], false);
	}
	
}
