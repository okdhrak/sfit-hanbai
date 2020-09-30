<?php
class SearchesController extends AppController {

	public $html = '';
	
	//スマホのみ
	public $layout = 'searches';
	
	//利用するモデルの設定
	public $uses = array(
		'Article',
		'MtrAccount',
		'MtrBuildingCondition',
		'MtrBuildingState',
		'MtrCategory',
		'MtrDelivery',
		'MtrDirection',
		'MtrDistrict',
		'MtrExistences',
		'MtrLandCategory',
		'MtrLandState',
		'MtrLine',
		'MtrLoad',
		'MtrManagement',
		'MtrRight',
		'MtrRoomType',
		'MtrStructure',
		'MtrTag',
		'MtrUrbanPlan');
	
	//コンポーネントの設定
	public $components = array('Session');
	
	//ページネーション設定
	/*public $paginate = array(
		//$this->result()側で設定
	);*/
	
	/**
	 * beforeFilterコールバック
	 */
	public function beforeFilter() {
		
		//ログインなしでアクセス可能なページをアクション名で列挙
		//$this->Auth->allow('index');
		
		//URLがhttps://だったらhttp://にリダイレクト
		if (env('HTTPS')) {
            $this->_unforceSSL();
        }
	}
	
	/**
	 * Securityコンポーネント、強制HTTPメソッド
	 */
	public function _unforceSSL() {
        $this->redirect('http://' . env('SERVER_NAME') . $this->here);
    }
	
	/**
	 * beforeRenderコールバック
	 */
	public function beforeRender() {
		$this->set('accountList', $this->MtrAccount->find('list'));
		$this->set('buildingConditionList', $this->MtrBuildingCondition->find('list'));
		$this->set('buildingStateList', $this->MtrBuildingState->find('list'));
		
		$this->set('categoryList', $this->MtrCategory->find('list'));
		
		$this->set('deliveryList', $this->MtrDelivery->find('list'));
		$this->set('directionList', $this->MtrDirection->find('list'));
		$this->set('districtList', $this->MtrDistrict->find('list'));
		$this->set('existenceList', $this->MtrExistences->find('list'));
		$this->set('landCategoryList', $this->MtrLandCategory->find('list'));
		$this->set('landStateList', $this->MtrLandState->find('list'));
		$this->set('loadList', $this->MtrLoad->find('list'));
		$this->set('managementList', $this->MtrManagement->find('list'));
		$this->set('rightsList', $this->MtrRight->find('list'));
		$this->set('roomTypeList', $this->MtrRoomType->find('list'));
		$this->set('structureList', $this->MtrStructure->find('list'));
		$this->set('tagList', $this->MtrTag->find('list'));
		$this->set('urbanPlanList', $this->MtrUrbanPlan->find('list'));
	}
	
	/**
	 * result
	 */
	public function result() {
		
		if ($this->request->isPost()) {
			
			//検索条件を設定
			$this->Session->write('cnd_html', $this->request->data);
		} elseif ($this->Session->check('cnd_html')) {
			
			//検索条件を持ちまわる
			$this->request->data = $this->Session->read('cnd_html');
		}
		
		
		if ($this->request->isPost() || $this->request->isPut()) {
			
			//カテゴリー
			if ($this->request->data['Search']['kdt_n'] && $this->request->data['Search']['kdt_o'] && $this->request->data['Search']['tc_a'] && $this->request->data['Search']['tc_n'] && $this->request->data['Search']['mns_n'] && $this->request->data['Search']['mns_o']) {
				//すべてチェックあり→カテゴリーの条件を指定しない
			} elseif (!$this->request->data['Search']['kdt_n'] && !$this->request->data['Search']['kdt_o'] && !$this->request->data['Search']['tc_a'] && !$this->request->data['Search']['tc_n'] && !$this->request->data['Search']['mns_n'] && !$this->request->data['Search']['mns_o']) {
				//すべてチェックなし→カテゴリーの条件を指定しない
			} else {
				//土地
				if ($this->request->data['Search']['tc_a'] && $this->request->data['Search']['tc_n']) {
					$cnd_arr['OR'][] = 'Article.category = 1';
				} elseif ($this->request->data['Search']['tc_a'] || $this->request->data['Search']['tc_n']) {
					if ($this->request->data['Search']['tc_a']) {
						$cnd_arr['OR'][] = 'PeculiarPoint.t_building_condition = 1' . ' AND Article.category = 1';
					} elseif ($this->request->data['Search']['tc_n']) {
						$cnd_arr['OR'][] = 'PeculiarPoint.t_building_condition != 1' . ' AND Article.category = 1';
					}
				} else {
					$cnd_arr['AND'][] = 'Article.category != 1';
				}
				//戸建て
				if ($this->request->data['Search']['kdt_n'] && $this->request->data['Search']['kdt_o']) {
					$cnd_arr['OR'][] = 'Article.category = 2';
				} elseif ($this->request->data['Search']['kdt_n'] || $this->request->data['Search']['kdt_o']) {
					if ($this->request->data['Search']['kdt_n']) {
						$cnd_arr['OR'][] = 'PeculiarPoint.k_new = 1' . ' AND Article.category = 2';
					} elseif ($this->request->data['Search']['kdt_o']) {
						$cnd_arr['OR'][] = 'PeculiarPoint.k_new != 1' . ' AND Article.category = 2';
					}
				} else {
					$cnd_arr['AND'][] = 'Article.category != 2';
				}
				//マンション
				if ($this->request->data['Search']['mns_n'] && $this->request->data['Search']['mns_o']) {
					$cnd_arr['OR'][] = 'Article.category = 3';
				} elseif ($this->request->data['Search']['mns_n'] || $this->request->data['Search']['mns_o']) {
					if ($this->request->data['Search']['mns_n']) {
						$cnd_arr['OR'][] = 'PeculiarPoint.m_new = 1' . ' AND Article.category = 3';
					} elseif ($this->request->data['Search']['mns_o']) {
						$cnd_arr['OR'][] = 'PeculiarPoint.m_new != 1' . ' AND Article.category = 3';
					}
				} else {
					$cnd_arr['AND'][] = 'Article.category != 3';
				}
				
			}
			//エリアまたは沿線(駅名)
			if ($this->request->data['Search']['area']) {
				$cnd_arr['AND'][] = 'Article.city = "' . $this->request->data['Search']['area'] . '"';
			} elseif ($this->request->data['Search']['line']) {
				//沿線
				$line_name = $this->MtrLine->find('first', array('fields' => 'line_name', 'conditions' => array('line_cd' => $this->request->data['Search']['line'])));
				$line_name = $line_name['MtrLine']['line_name'];
				$cnd_arr['AND'][] = 'Article.traffic LIKE "%' . $line_name . '%"';
				//駅の指定があった場合
				if ($this->request->data['Search']['stations']) {
					foreach (explode(',', $this->request->data['Search']['stations']) as $key => $val) {
						$cnd_arr['OR'][] = 'Article.traffic LIKE "%,' . $val . ',%"';
					}
				}
			}
			//予算
			if ($this->request->data['Search']['budget']) {
				$cnd_arr['AND'][] = ($this->request->data['Search']['budget'] == 'max') ? 'Article.price > 100000000' : 'Article.price < ' . $this->request->data['Search']['budget'];
			}
			
			//検索条件
			if (isset($cnd_arr['OR'])) {
				$condition = ' AND (' . implode(' OR ', $cnd_arr['OR']) . ')';
			} else {
				$condition = '';
			}
			if (isset($cnd_arr['AND'])) {
				$condition .= ' AND ' . implode(' AND ', $cnd_arr['AND']);
			} else {
				$condition .= '';
			}
			
		} elseif (@$this->request->params['named']['tag']) {
			$cnd_arr['AND'][] = 'Article.tag LIKE "%\"' . $this->request->params['named']['tag'] . '\"%"';
			
			//検索条件
			if (isset($cnd_arr['OR'])) {
				$condition = ' AND (' . implode(' OR ', $cnd_arr['OR']) . ')';
			} else {
				$condition = '';
			}
			if (isset($cnd_arr['AND'])) {
				$condition .= ' AND ' . implode(' AND ', $cnd_arr['AND']);
			} else {
				$condition .= '';
			}
			
		} elseif (@$this->request->params['named']['sorted']) {
			foreach (unserialize($_COOKIE['fav']) as $key => $val) {
				$cnd_arr['OR'][] = 'Article.id = ' . $key;
			}
			
			//検索条件
			if (isset($cnd_arr['OR'])) {
				$condition = ' AND (' . implode(' OR ', $cnd_arr['OR']) . ')';
			} else {
				$condition = '';
			}
			if (isset($cnd_arr['AND'])) {
				$condition .= ' AND ' . implode(' AND ', $cnd_arr['AND']);
			} else {
				$condition .= '';
			}
			
		} else {
			$condition = $this->Session->read('condition');
		}
		
		//表示順
		if (isset($this->request->params['named']['price'])) {
			$sort = ($this->request->params['named']['price'] == 'desc') ? ' ORDER BY Article.price DESC ' : ' ORDER BY Article.price ASC ';
		} elseif($this->Session->check('sort')) {
			$sort = $this->Session->read('sort');
		} else {
			$sort = ' ORDER BY ResistationTime.modified DESC ';
		}
		
		
		//条件をセッションで持ちまわる
		$this->Session->write('condition', $condition);
		$this->Session->write('sort', $sort);
		
		//ビューに値を渡す
		$this->set('articlesData', $this->Article->getMore(0, $condition, $sort));
		$this->set('articlesCount', $this->Article->getCount($condition));
		
		
		//ビューに渡すmeta情報
		if ($this->request->isPost() || $this->request->isPut()) {
			if ($this->request->data['Search']['area']) {
				$meta[] = $this->request->data['Search']['area'];
			} elseif ($this->request->data['Search']['line']) {
				$line_name = $this->MtrLine->find('first', array('fields' => 'line_name', 'conditions' => array('line_cd' => $this->request->data['Search']['line'])));
				$meta[] = $line_name['MtrLine']['line_name'];
			}
			
			if ($this->request->data['Search']['kdt_n'] || $this->request->data['Search']['kdt_o']) {
				$meta[] = '戸建て';
			}
			if ($this->request->data['Search']['tc_a'] || $this->request->data['Search']['tc_n']) {
				$meta[] = '土地';
			}
			if ($this->request->data['Search']['mns_n'] || $this->request->data['Search']['mns_o']) {
				$meta[] = 'マンション';
			}
			
			if (count(@$meta)) {
				$this->Session->write('meta', implode('×', $meta));
			} else {
				$this->Session->write('meta', '戸建て×土地×マンション');
			}
			
		}
		
		$this->set('meta', $this->Session->read('meta'));
	}
	
	/**
	 * get_more
	 */
	public function get_more() {
		
		$categoryList = $this->MtrCategory->find('list');
		
		//条件と並び順を、セッションから読み込み
		$condition = ($this->Session->check('condition')) ? $this->Session->read('condition') : '';
		$sort = ($this->Session->check('sort')) ? $this->Session->read('sort') : '';
		
		
		$num = $this->request->data['num'];
		$arr = $this->Article->getMore($num, $condition, $sort);
		
		foreach ($arr as $key => $val) {
			
			if ($val['Flag']['restriction'] && ($this->Session->check('Auth') === false)) {
			
$this->html .= <<< EOG
	<article>
		<div class="post">
			<div class="post_title clrFix"><p class="post_title_01 cat0{$val['Article']['category']}">{$categoryList[$val['Article']['category']]}</p><p class="post_txt_01">{$this->Util->numberFormat($val['Article']['price'], 1)}</p></div>
			<div class="post-menbers">
				<p class="login"><a href="/sp/members/login/" class="btnOpa"><img alt="メンバーログイン" src="/sp/img/list_images/btn-login.png"></a></p>
				<p class="signup"><a href="/sp/members/edit/" class="btnOpa"><img alt="いますぐメンバー登録する" src="/sp/img/list_images/btn-signup.png"></a></p>
			</div>
		</div>
	</article>
EOG;
			
			} else {
			
$this->html .= <<< EOF
	
	<article>
		<div class="post">
			<div class="post_title clrFix"><p class="post_title_01 cat0{$val['Article']['category']}">{$categoryList[$val['Article']['category']]}</p><p class="post_txt_01">{$this->Util->numberFormat($val['Article']['price'], 1)}</p></div>
			<p class="post_img"><a href="/sp/searches/detail/{$val['Article']['id']}.html">{$this->getThumbPhoto($val['Article']['id'],'m',600,300)}</a></p>
			<div class="postInr">
				<p class="post_txt_02">{$this->Util->getTrafficArr($val['Article']['traffic'])}</p>
				<dl class="post_add clrFix">
					<dt class="post_add_01">住所：</dt>
					<dd class="post_add_02">{$val['Article']['pref']}{$val['Article']['city']}{$val['Article']['town']}</dd>
				</dl>
				<p class="favorite">{$this->Util->getFavBtn($val['Article']['id'])}</p>
				<p class="more"><a href="/sp/searches/detail/{$val['Article']['id']}.html" class="btnOpa"><img alt="詳細を見る" src="/sp/img/list_images/btn-detail.png"></a></p>
			</div>
		</div>
	</article>
EOF;
			
			}
		}
		
		echo $this->html;
		
//{$this->getThumbPhoto($val['Article']['id'],'m',600,300)}
//{$val['Article']['id']}<br>
		
		/*if ($this->request->data['num'] > 5) {
			echo false;
		} else {
			echo $num_1st = $this->request->data['num'];
		}*/
		
		//pr($this->Article->getMore($num_1st));
		
		//ベースSQL文
		/*$this->paginate = array(
			//'fields' => array('Article.*', 'PeculiarPoint.*', 'ResistationTime.*', 'Flag.*'),
			'fields' => array('Article.id'),
			'conditions' => array(
				'Flag.status' => 1,
				'Flag.delete' => 0,
			),
			'order' => array('ResistationTime.modified' => 'DESC'),
			//'limit' => 1,
		);*/
		
		//$num_first = $num_first + 1;
		
		//pr($this->paginate);
		
		//$conditions['AND'] = 'LIMIT' . $num_1st . ', 1';
		
		//pr($this->paginate($this->Session->read('conditions')));
		
		//echo '<p class="page_more" data-num="' . $num_first . '"><img alt="もっと見る" src="/sp/img/list_images/btn-more.png"></p>';
		
		exit;
	}
	
	/**
	 * 一覧ページサムネイル画像を取得
	 */
	public function getThumbPhoto($id, $cate, $width=600, $height=300) {
		if ($file_dir_re = opendir($file_dir = $this->Util->_getFileDir($id))) {
			while (($file = readdir($file_dir_re)) !== false) {
				if (preg_match("/^{$cate}.+.jpg/", $file)) {
					return  sprintf('<img src="/sp/searches/c_thumb_image/%s/%s/%s/%s" width="%s" height="%s">', $id, $cate, $width, $height, $width, $height);
				}
			}
		}
		return sprintf('<img src="%s" width="%s" height="%s">', '/sp/img/sample_list_600_300.png', $width, $height);
	}
	
	/**
	 * detail
	 */
	public function detail($id = NULL) {
		
		//検索条件を引き継ぐ
		if ($this->request->isPost()) {
			$this->Session->write('Condition', $this->request->data);
		} elseif ($this->Session->check('Condition')) {
			$this->request->data = $this->Session->read('Condition');
		}
		
		//物件情報を取得
		if ($val = $this->Article->find('first', array('conditions' => array('Article.id' => $id, 'Flag.status' => 1, 'Flag.delete' => 0)))) {
			$this->set('val', $val);
		} else {
			//物件情報がなければエラーを投げる
			throw new MethodNotAllowedException();
		}
		
		//制限ありかつ認証がない場合はエラーを投げる
		if ($val['Flag']['restriction'] && $this->Session->check('Auth') === false) {
			throw new UnauthorizedException();
		}
	}
	
	/**
	 * station
	 */
	public function station() {
		
		$this->layout = 'plain';
		
		$line_cd = @$_GET['line_cd'];
		
		$this->set('line', $this->Article->getLineName($line_cd));
		$this->set('stations', $this->Article->getStations($line_cd));
		$this->set('stations_name', $this->Session->read('Stations'));//セッションに渡してある選択された駅名
		
	}
	
	/**
	 * change_fav(お気に入り関係)
	 */
	public function change_fav() {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$this->autoLayout = false;
			
			//COOKIE削除
			if ($this->request->data['status']) {
				
				//
				$cookie_fav = unserialize($_COOKIE['fav']);
				unset($cookie_fav[$this->request->data['id']]);
				//シリアライズしてCOOKIEをセット
				$result = setcookie('fav', serialize($cookie_fav), time() + 3600 * 24 * 7 * 4, '/', NULL, false, true);//1ヶ月間保存
				
				$response = array(
					'id' => $this->request->data['id'],
					'status' => 0,//値が1なので0を渡して解除する
					'src' => '/sp/img/list_images/btn-favorite_add.png',
				);
			
			//COOKIE追加
			} else {
				
				//cookie['fav']があれば読み込み配列へ変換
				$cookie_fav = (isset($_COOKIE['fav'])) ? unserialize($_COOKIE['fav']) : NULL;
				//idを基に物件情報を呼び出す
				$result = $this->Article->findById($this->request->data['id']);
				//物件情報を配列に追加
				$cookie_fav[$result['Article']['id']] = array(
					$result['Article']['name'],
					$result['Article']['price'],
				);
				//シリアライズしてCOOKIEをセット
				$result = setcookie('fav', serialize($cookie_fav), time() + 3600 * 24 * 7 * 4, '/', NULL, false, true);//1ヶ月間保存
				
				$response = array(
					'id' => $this->request->data['id'],
					'status' => 1,//値が0なので1を渡してお気に入りに追加する
					'src' => '/sp/img/list_images/btn-favorite_done.png',
				);
			}
			
			$this->header('Content-Type: application/json');
			echo json_encode($response);
		}
		exit;
	}
	
	/**
	 * set_station(セッションへ値を渡す)
	 */
	public function set_stations() {
		
		//echo $this->request->data['stations'];
		
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$this->autoLayout = false;
			
			if ($this->request->data['stations']) {
				$this->Session->write('Stations', $this->request->data['stations']);
			} else {
				$this->Session->delete('Stations');
			}
			
			//pr($this->Session->read('Stations'));
			//pr($_SESSION);	
			return false;
		}
		exit;
	}
	
	/**
	 * c_thumb_image
	 */
	public function c_thumb_image($id, $cate, $width_thumb, $height_thumb) {
		
		$this->autoRender = false;
		$this->autoLayout = false;
		
		if ($file_dir_re = opendir($file_dir = $this->Util->_getFileDir($id))) {
			while (($file = readdir($file_dir_re)) !== false) {
				if (preg_match("/^{$cate}_.+.jpg/", $file)) {
					
					$img_path = $this->Util->_getFileDir($id) . DS . $file;
					
					list($iwidth, $iheight) = getimagesize($img_path);
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
					
					header('Content-Type: image/jpeg');
					imagejpeg($out, NULL, 100);
					
					//メモリ開放
					imagedestroy($in);
					imagedestroy($out);
					
					return false;
				}
			}
		}
	}
	
	/**
	 * c_detail_image
	 */
	public function c_detail_image($id, $file, $out_width, $out_height) {//$width_thumb, $height_thumb
		
		$this->autoRender = false;
		$this->autoLayout = false;
		
		$img_path = $this->Util->_getFileDir($id) . DS . $file;
		
		list($in_width, $in_height) = getimagesize($img_path);
		$in = imagecreatefromjpeg($img_path);//リソースが返る
		//↓作成したい画像サイズを指定　800×536
		$out = imagecreatetruecolor($out_width, $out_height);//リソースが返る
		
		// 背景色を設定
		//$bgc = imagecolorallocate($out, 247, 247, 244);
		$bgc = imagecolorallocate($out, 150, 150, 150);
		imagefill($out, 0, 0, $bgc);
		
		//ベースとなる枠の大きさに対する、表示する画像サイズとの比を求める
		$width_ratio = $out_width / $in_width;
		$height_ratio = $out_height / $in_height;
				
		//縦比率が大きければ縦の長さを基準にする(横の余白を調整)
		if ($height_ratio < $width_ratio) {
			$shift_x = (($out_width - ($in_width * $height_ratio)) / 2);
			imagecopyresampled($out, $in, $shift_x, 0, 0, 0, $in_width * $height_ratio, $out_height, $in_width, $in_height);
		//横比率が大きければ横の長さを基準にする(縦の余白を調整)
		} elseif ($height_ratio > $width_ratio) {
			$shift_y = (($out_height - ($in_height * $width_ratio)) / 2);
			imagecopyresampled($out, $in, 0, $shift_y, 0, 0, $out_width, $in_height * $width_ratio, $in_width, $in_height);
		//縦横比率が1：1であればベースの大きさに調整し出力(余白なし)
		} else {
			imagecopyresampled($out, $in, 0, 0, 0, 0, $out_width, $out_height, $in_width, $in_height);
		}
		
		//ロゴ画像を乗せる
		/*$pile = imagecreatefromjpeg(IMAGES.'pile.jpg');
		imagecopy($out, $pile, 0, 0, 0, 0, $out_width, $out_height);*/
		
		//テキストを乗せる
		$text = mb_convert_encoding('S-FIT不動産販売', 'UTF-8', 'auto');//必要に応じてUTF8へ変換(環境依存)
		$fcolor = imagecolorallocate($out, 150, 150, 150);
		imagettftext($out, 18, 0, 210, 300, $fcolor, FONT_DIR . 'logotype_gothic_7.otf', $text);
		
		header('Content-Type: image/jpeg');
		imagejpeg($out, NULL, 100);
		
		//メモリ開放
		imagedestroy($in);
		imagedestroy($out);
		
		return false;
	}
	
}
