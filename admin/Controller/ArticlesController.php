<?php
class ArticlesController extends AppController {
	
	//プロパティ定義
	public $uploadErrors;
	
	//利用するモデルの設定
	public $uses = array('Article', 'PeculiarPoint', 'PmCompany', 'ResistationTime', 'Flag', 'MtrCategory', 'MtrPref', 'MtrRoomType', 'MtrStation', 'MtrLine', 'MtrDistrict', 'MtrLandState', 'MtrBuildingState', 'MtrRight', 'MtrDelivery', 'MtrAccount', 'MtrTag', 'MtrDirection', 'MtrLoad', 'MtrLandCategory', 'MtrUrbanPlan', 'MtrBuildingCondition', 'MtrStructure', 'MtrNew', 'MtrManagement', 'MtrExistence', 'MtrStatus', 'MtrRestriction', 'MtrRecommend', 'MtrDelete');
	//public $uses = null;
	
	//コンポーネントの設定
	public $components = array(/*'Common', 'Security' => array('validatePost' => false)*/);
	
	//ページネーション設定
	/*public $paginate = array(
		'Article' => array(
			'order' => array(
				'id' => 'DESC',
			),
			'conditions' => array(
				'Flag.delete' => '0',
			),
			'limit' => 20,
		),
	);*/
	
	/**
	 * beforeFilterコールバック
	 */
	public function beforeFilter() {
		
		//ログインなしでアクセス可能なページをアクション名で列挙
		//$this->Auth->allow('');
	}
	
	/**
	 * beforeRenderコールバック
	 */
	public function beforeRender() {
		
		$this->set('categoryList', $this->MtrCategory->find('list'));
		//$this->set('roomTypeList', $this->PeculiarPoint->MtrRoomType->find('list'));
		$this->set('roomTypeList', $this->MtrRoomType->find('list'));
		$this->set('prefList', $this->MtrPref->find('list'));
		
		/*while ($row = $this->Article->getCityList()) {
			pr($row);
		}*/
		
		//findではなくArticleモデルからメソッドを使用
		$this->set('cityList', $this->Article->getCityList());
		
		//$this->Article->MtrPref->find('list');
		//$this->set('trafficList', $this->Article->getStationList());
		
		//MtrDistrictモデルを直接使用
		$this->set('districtList', $this->MtrDistrict->find('list'));
		$this->set('landStateList', $this->MtrLandState->find('list'));
		$this->set('buildingStateList', $this->MtrBuildingState->find('list'));
		$this->set('rightsList', $this->MtrRight->find('list'));
		$this->set('deliveryList', $this->MtrDelivery->find('list'));
		$this->set('accountList', $this->MtrAccount->find('list'));
		$this->set('tagList', $this->MtrTag->find('list'));
		//
		$this->set('directionList', $this->MtrDirection->find('list'));
		$this->set('roadList', $this->MtrLoad->find('list'));
		
		$this->set('landCategoryList', $this->MtrLandCategory->find('list'));
		$this->set('urbanPlanList', $this->MtrUrbanPlan->find('list'));
		$this->set('buildingConditionList', $this->MtrBuildingCondition->find('list'));
		
		$this->set('structureList', $this->MtrStructure->find('list'));
		
		$this->set('newList', $this->MtrNew->find('list'));
		
		$this->set('managementList', $this->MtrManagement->find('list'));
		$this->set('existenceList', $this->MtrExistence->find('list'));
		
		$this->set('statusList', $this->MtrStatus->find('list'));
		$this->set('restrictionList', $this->MtrRestriction->find('list'));
		$this->set('recommendList', $this->MtrRecommend->find('list'));
		$this->set('deleteList', $this->MtrDelete->find('list'));
		
	}
	
	
	/**
	 * 画像のアップロード
	 */
	protected function _fileUpload($id) {
		foreach (array('m' => 'main', 'p' => 'plan', 'o' => 'other') as $catKey => $catValue){
			foreach ($_FILES['data']['tmp_name']['Photo'][$catValue] as $key => $val) {
				if ($res = move_uploaded_file($_FILES['data']['tmp_name']['Photo'][$catValue][$key], PHOTO_DIR_YEAR . DS . $id . DS . $this->Util->getUploadImgName($catKey))) {
					if ($res) {
						echo '成功';
					} else {
						echo '失敗';
					}
				}
				usleep(100000);//0.1秒
			}
		}
	}
	
	/**
	 * ダッシュボード
	 */
	public function index() {
		
		//pr($this->Article->find('all'));
		//pr($this->Article->findByTestQuery());
		
		/*if($this->request->isPost() || $this->request->isPut()) {
			pr($this->Article->find('all'));
		}*/
	}
	
	/**
	 * 物件一覧
	 */
	public function lists() {
		
		//$this->Article->find('all');
		
		//ページネーション機能でデータを入手し、リスト作成
		//$articlesData = $this->paginate();
		//$this->set(compact('articlesData'));
		
		//検索かリセットを判断、どちらでもなくセッション情報があれば読み込む
		if ($this->request->isPost() && @$this->request->data['_onreset']) {
			$this->Session->delete('Condition');
			$this->request->data = array();
		} elseif ($this->request->isPost() && @$this->request->data['_onsearch']) {
			$this->Session->write('Condition', $this->request->data);
		} elseif ($this->Session->check('Condition')) {
			$this->request->data = $this->Session->read('Condition');
		}
		
		//検索条件の設定
		if ($this->request->data) {
			
			if ($this->request->data['Search']['category']) {
				$conditions[] = 'Article.category = "' . $this->request->data['Search']['category'] . '"';
			}
			
			if ($this->request->data['Search']['city']) {
				$conditions[] = 'Article.city = "' . $this->request->data['Search']['city'] . '"';
			}
			
			if ($this->request->data['Search']['status'] === '0') {
				$conditions[] = 'Flag.status = 0';
			} elseif ($this->request->data['Search']['status'] === '1') {
				$conditions[] = 'Flag.status = 1';
			}
			
			if ($this->request->data['Search']['price']) {
				$price = preg_replace('/[^0-9]/', '', $this->request->data['Search']['price']);//数字以外を取り除く
				$conditions[] = 'Article.price = "' . $price . '"';
			}
			
		}
		
		//SQL文
		$this->paginate = array(
			'fields' => array('Article.*', 'PeculiarPoint.*', 'PmCompany.*', 'ResistationTime.*', 'Flag.*'),
			'conditions' => array(
				//'Flag.status' => 1,
				'Flag.delete' => 0,
			),
			'order' => array('ResistationTime.modified' => 'DESC'),
			'limit' => 30,
		);
		
		if ($this->paginate(@$conditions)) {
			$this->set('articlesData', $this->paginate(@$conditions));
		} else {
			$this->Session->setFlash('登録データがありません', 'default', array('class' => 'submitError'));
		}
		
		//$this->set('articlesData', $this->paginate(@$conditions));
	}
	
	/**
	 * 個別新規登録(初期登録)
	 */
	public function add() {
		
		//フォーム入力があった場合には保存処理。そうでない場合は初期値の準備
		if ($this->request->isPost() || $this->request->isPut()) {
			$ts = $this->Util->getTimeStamp();			
			$this->request->data['Article']['id'] = 
			$this->request->data['PeculiarPoint']['id'] = 
			$this->request->data['PmCompany']['id'] = 
			$this->request->data['ResistationTime']['id'] = 
			$this->request->data['Flag']['id'] = $ts;
			
			if ($this->Article->saveAll($this->request->data)) {
				$this->Util->createDirectory($ts);//画像用ディレクトリを作成
				$this->Session->setFlash('物件情報を保存しました', 'default', array('class' => 'submitSuccess'));
				$this->redirect(array('action' => 'edit', $ts));
			} else {
				$this->Session->setFlash('登録内容に誤りがあります', 'default', array('class' => 'submitError'));
				$this->set('validationErrors', $this->Article->validationErrors);
			}
		}
		
		//旧)add()アクションでedit()アクションを流用
		//addはeditと同じ処理(idは無指定)
		//return $this->edit();
	}
	
	/**
	 * 変更登録
	 */
	public function edit($id = null) {
		
		//フォーム入力があった場合には保存処理。そうでない場合は初期値の準備
		if ($this->request->isPost() || $this->request->isPut()) {
			
			//画像の登録
			$photo_arr = array(
				'main' => array('init' => 'm', 'limit' => 1),
				'plan' => array('init' => 'p', 'limit' => 1),
				'other' => array('init' => 'o', 'limit' => 10),
			);
			// 登録済み画像の枚数をチェック
			foreach ($photo_arr as $cat => $limit){
				//echo count($_FILES['data']['tmp_name']['Photo'][$cat]);
				if (!empty($_FILES['data']['tmp_name']['Photo'][$cat][0])) {
					
					if ($dir = opendir($this->Util->getRegistedPhotoPath($id))) {
						$i = 0;
						while (($file = readdir($dir)) !== false) {
							//echo $photo_arr[$cat]['init'];
							if (preg_match('/^'.$photo_arr[$cat]['init'].'/', $file)) {
								$i++;
								//echo '合致';
							}
						}
					
						if ($cat == 'main') {
							if ($i >= $photo_arr[$cat]['limit']) {
								$this->uploadErrors['main'] = 'メイン画像は既に登録されています。登録済み画像の削除をお願いします。';
							}
						} elseif ($cat == 'plan') {
							if ($i >= $photo_arr[$cat]['limit']) {
								$this->uploadErrors['plan'] = '間取り図画像は既に登録されています。登録済み画像の削除をお願いします。';
							}
						} elseif ($cat == 'other') {
							if ($i+count($_FILES['data']['tmp_name']['Photo'][$cat]) > $photo_arr[$cat]['limit']) {
								$this->uploadErrors['other'] = '物件画像の上限は'.$photo_arr[$cat]['limit'].'枚までです。登録済み画像の削除をお願いします。';
							}
						}
					
					}
				}/* else {
					$_FILESに値がない
				}*/
			}
			
			/*function _fileUpload($id) {
				foreach (array('m' => 'main', 'p' => 'plan', 'o' => 'other') as $catKey => $catValue){
					foreach ($_FILES['data']['tmp_name']['Photo'][$catValue] as $key => $val) {
						if ($res = move_uploaded_file($_FILES['data']['tmp_name']['Photo'][$catValue][$key], PHOTO_DIR_YEAR . DS . $id . DS . $this->Util->getUploadImgName($catKey))) {
							if ($res) {
								echo '成功';
							} else {
								echo '失敗';
							}
						}
						usleep(100000);//0.1秒
					}
				}
			}*/
			
			//配列で取得した沿線をシリアライズ化
			$this->request->data['Article']['traffic'] = serialize(@$this->request->data['Article']['traffic']);
			$this->request->data['Article']['tag'] = serialize(@$this->request->data['Article']['tag']);
			$this->request->data['PeculiarPoint']['k_old'] = serialize(@$this->request->data['PeculiarPoint']['k_old']);
			$this->request->data['PeculiarPoint']['m_old'] = serialize(@$this->request->data['PeculiarPoint']['m_old']);
			
			if ($this->Article->saveAll($this->request->data) && !isset($this->uploadErrors)) {
				$this->_fileUpload($id);//画像の保存
				$this->Session->setFlash('物件情報を保存しました', 'default', array('class' => 'submitSuccess'));
				$this->redirect(array('action' => 'lists'));
			} else {
				$this->Session->setFlash('登録内容に誤りがあります', 'default', array('class' => 'submitError'));
				$this->set('validationErrors', $this->Article->validationErrors);
				$this->set('uploadErrors', $this->uploadErrors);
			}
			
		} else {
			//初回読み込み時(サブミットがない)に登録情報を読み込む
			if ($id !== null) {
				$this->request->data = $this->Article->findById($id);
				if (empty($this->request->data)) {
					$this->Session->setFlash('物件情報が見つかりませんでした', 'default', array('class' => 'submitError'));
					$this->redirect(array('action' => 'lists'));
				}
			}
		}
		
		//addもeditもedit.ctpを表示する(明示)
		$this->render('edit');
	}
	
	/**
	 * 新規登録(CSV)確認
	 */
	public function uploadcsv() {
		
		if ($this->request->is('post')) {
			
			if (@$this->request->data['_toadd']) {
			
			//アップしたCSVファイルの内容を配列へ展開
			if (($handle = fopen("files/data.csv", "r")) !== false) {
				//while (($row = fgetcsv($handle, 0, ",")) !== false) {
				while (($row = $this->Util->fGetCsvReg($handle, 0, ',')) !== false) {
					array_walk($row, function(&$val, $key){
						$val = $this->Util->sjisToUtf8($val);
					}, $row);
					
					//配列へ
					$res_arr[] = $row;
					
				}
				fclose($handle);
			}
			
			//配列の先頭要素を削除
			array_shift($res_arr);
			
			//登録
			foreach ($res_arr as $key => $val) {
				
				echo '読み込み！';
				
				if (empty($val[2])) {
					//return false;
					continue;
				}
				
				$ts = $this->Util->getTimeStamp();
				$this->request->data['Article']['id'] = 
				$this->request->data['PeculiarPoint']['id'] = 
				$this->request->data['PmCompany']['id'] = 
				$this->request->data['ResistationTime']['id'] = 
				$this->request->data['Flag']['id'] = $ts;
				
				$this->request->data[$this->Article->alias]['category'] = (int) $val[2];
				$this->request->data[$this->Article->alias]['name'] = !empty($val[18]) ? $val[18] : '--';//バリデーション回避のため値を指定
				$this->request->data[$this->Article->alias]['price'] = $val[46];
				$this->request->data[$this->Article->alias]['pref'] = $val[14];
				$this->request->data[$this->Article->alias]['city'] = $val[15];
				$this->request->data[$this->Article->alias]['town'] = $val[16];
				$this->request->data[$this->Article->alias]['address'] = $val[17];
				$this->request->data[$this->Article->alias]['traffic'] = (empty($val[22]) || empty($val[23]) || empty($val[24])) ? 'N;' : serialize(array($val[22] . ','  . $val[23] . ','  . $val[24]));
				$this->request->data[$this->Article->alias]['bus'] = $val[26];
				$this->request->data[$this->Article->alias]['bus_station'] = $val[28];
				$this->request->data[$this->Article->alias]['district1'] = !empty($val[82]) ? $val[82] : 13;//値がなければ無指定(13)
				$this->request->data[$this->Article->alias]['district2'] = !empty($val[83]) ? $val[83] : 13;//値がなければ無指定(13)
				$this->request->data[$this->Article->alias]['state'] = !empty($val[35]) ? $val[35] : 0;//値がなければ無指定(0)
				$this->request->data[$this->Article->alias]['rights'] = !empty($val[88]) ? $val[88] : 0;//値がなければ無指定(0)
				$this->request->data[$this->Article->alias]['delivery'] = !empty($val[37]) ? $val[37] : 0;//値がなければ無指定(0)
				$this->request->data[$this->Article->alias]['account'] = !empty($val[42]) ? $val[42] : 0;//値がなければ無指定(0)
				
				$this->request->data['PmCompany']['name'] = $val[4];
				$this->request->data['PmCompany']['tel'] = $val[5];
				
				if ($val[2] == 1) {//土地
					$this->request->data['PeculiarPoint']['t_site'] = $val[52];
					$this->request->data['PeculiarPoint']['t_lot'] = $val[67];
					$this->request->data['PeculiarPoint']['t_site_coverage1'] = $val[85];
					$this->request->data['PeculiarPoint']['t_floorarea_ratio1'] = $val[86];
					$this->request->data['PeculiarPoint']['t_setback'] = $val[64];
					$this->request->data['PeculiarPoint']['t_road_category1'] =  !empty($val[111]) ? $val[111] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['t_road_direction1'] =  !empty($val[114]) ? $val[114] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['t_road_length1'] = $val[112];
					$this->request->data['PeculiarPoint']['t_road_width1'] = $val[115];
					$this->request->data['PeculiarPoint']['t_road_category2'] =  !empty($val[116]) ? $val[116] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['t_road_direction2'] =  !empty($val[119]) ? $val[119] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['t_road_length2'] = $val[117];
					$this->request->data['PeculiarPoint']['t_road_width2'] = $val[120];
					$this->request->data['PeculiarPoint']['t_road_category3'] =  !empty($val[121]) ? $val[121] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['t_road_direction3'] =  !empty($val[124]) ? $val[124] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['t_road_length3'] = $val[122];
					$this->request->data['PeculiarPoint']['t_road_width3'] = $val[125];
					$this->request->data['PeculiarPoint']['t_road_category4'] =  !empty($val[126]) ? $val[126] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['t_road_direction4'] =  !empty($val[129]) ? $val[129] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['t_road_length4'] = $val[127];
					$this->request->data['PeculiarPoint']['t_road_width4'] = $val[130];
					$this->request->data['PeculiarPoint']['t_land_category'] =  !empty($val[79]) ? $val[79] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['t_urban_plan'] =  !empty($val[81]) ? $val[81] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['t_building_condition'] =  !empty($val[95]) ? $val[95] : 0;//値がなければ無指定(0)
					
				} elseif ($val[2] == 2) {//土地
					$this->request->data['PeculiarPoint']['k_extent'] = $val[56];
					$this->request->data['PeculiarPoint']['k_site'] = $val[52];
					$this->request->data['PeculiarPoint']['k_room_num'] = $val[133];
					$this->request->data['PeculiarPoint']['k_room_type'] =  !empty($val[132]) ? $val[132] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['k_old'] = serialize(array('year' => substr($val[178], 0, 4), 'month' => substr($val[178], 4, 2)));
					$this->request->data['PeculiarPoint']['k_structure'] = !empty($val[172]) ? $val[172] : 0;//値がなければ無指定(0);
					$this->request->data['PeculiarPoint']['k_building'] = $val[175];
					$this->request->data['PeculiarPoint']['k_lot'] = $val[67];
					$this->request->data['PeculiarPoint']['k_site_coverage1'] = $val[85];
					$this->request->data['PeculiarPoint']['k_floorarea_ratio1'] = $val[86];
					$this->request->data['PeculiarPoint']['k_setback'] = $val[64];
					$this->request->data['PeculiarPoint']['k_road_category1'] =  !empty($val[111]) ? $val[111] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['k_road_direction1'] =  !empty($val[114]) ? $val[114] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['k_road_length1'] = $val[112];
					$this->request->data['PeculiarPoint']['k_road_width1'] = $val[115];
					$this->request->data['PeculiarPoint']['k_road_category2'] =  !empty($val[116]) ? $val[116] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['k_road_direction2'] =  !empty($val[119]) ? $val[119] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['k_road_length2'] = $val[117];
					$this->request->data['PeculiarPoint']['k_road_width2'] = $val[120];
					$this->request->data['PeculiarPoint']['k_road_category3'] =  !empty($val[121]) ? $val[121] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['k_road_direction3'] =  !empty($val[124]) ? $val[124] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['k_road_length3'] = $val[122];
					$this->request->data['PeculiarPoint']['K_road_width3'] = $val[125];
					$this->request->data['PeculiarPoint']['k_road_category4'] =  !empty($val[126]) ? $val[126] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['k_road_direction4'] =  !empty($val[129]) ? $val[129] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['k_road_length4'] = $val[127];
					$this->request->data['PeculiarPoint']['k_road_width4'] = $val[130];
					$this->request->data['PeculiarPoint']['k_land_category'] =  !empty($val[79]) ? $val[79] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['k_urban_plan'] =  !empty($val[81]) ? $val[81] : 0;//値がなければ無指定(0)
					
				} elseif ($val[2] == 3) {//マンション
					$this->request->data['PeculiarPoint']['m_extent'] = $val[57];
					$this->request->data['PeculiarPoint']['m_extent_bal'] = $val[60];
					$this->request->data['PeculiarPoint']['m_management_cost'] = $val[101];
					$this->request->data['PeculiarPoint']['m_repair_cost'] = $val[103];
					$this->request->data['PeculiarPoint']['m_room_num'] = $val[133];
					$this->request->data['PeculiarPoint']['m_room_type'] =  !empty($val[132]) ? $val[132] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['m_old'] = serialize(array('year' => substr($val[178], 0, 4), 'month' => substr($val[178], 4, 2)));
					$this->request->data['PeculiarPoint']['m_structure'] = !empty($val[172]) ? $val[172] : 0;//値がなければ無指定(0);
					$this->request->data['PeculiarPoint']['m_building'] = $val[175];
					$this->request->data['PeculiarPoint']['m_floor'] = $val[177];
					$this->request->data['PeculiarPoint']['m_rooms'] = $val[179];
					$this->request->data['PeculiarPoint']['m_window'] = $val[182];
					$this->request->data['PeculiarPoint']['m_management'] = !empty($val[98]) ? $val[98] : 0;//値がなければ無指定(0)
					$this->request->data['PeculiarPoint']['m_parking'] =  !empty($val[165]) ? $val[165] : 0;//値がなければ無指定(0)
				}
				
				/*pr($this->request->data);
				exit;*/
				
				if ($this->Article->saveAll($this->request->data)) {
					$this->Util->createDirectory($ts);//画像用ディレクトリを作成
					usleep(1000000);//1秒
				}
			}
			
			$this->Session->setFlash('物件情報を保存しました');
			$this->redirect(array('action' => 'lists'));

		} elseif ($this->request->data['_tocheck']) {
				if ($this->Util->checkUploadedCsv($_FILES)) {
					move_uploaded_file($_FILES['data']['tmp_name']['Article']['csvfile'], "files/data.csv");
					$this->render('addcsv');
				} else {
					$this->Session->setFlash('ファイルの添付がないか、形式に誤りがあります');
				}
			}
			
		}
	
	}
	
	/**
	 * 新規登録(CSV)処理
	 */
	public function addcsv() {
		
		
	}
	
	/**
	 * 物件情報の削除
	 */
	public function delete($id){
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		/*if ($this->Post->delete($id)) {
			$this->Session->setFlash('削除しました');
			$this->redirect(array('action'=>'index'));
		}*/
		
		if ($this->request->is('ajax')) {
			
			$this->request->data['Article']['id'] = $id;
			$this->request->data['Flag']['id'] = $id;
			$this->request->data['Flag']['delete'] = 1;
			
			if ($this->Article->saveAll($this->request->data)) {
				$this->autoRender = 'false';
				$this->autoLayout = 'false';
				$response = array(
					'id' => $id,
				);
				
				$this->header('Content-Type: application/json');
				echo json_encode($response);
				exit;
			}
		}
		$this->redirect(array('action'=>'lists'));
		
	}
	
	/**
	 * 物件情報の表示/非表示切り替え
	 */
	public function change_indication(){
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		/*pr($_POST);
		exit;*/
		
		if ($this->request->is('ajax')) {
			
			$this->request->data['Article']['id'] = 
			$this->request->data['Flag']['id'] = $_POST['id'];
			$this->request->data['Flag']['status'] = ($_POST['status']) ? 0 : 1;//表示中であれば非表示フラグ0、非表示中であれば表示フラグ1をセット
			
			if ($this->Article->saveAll($this->request->data)) {
				$this->autoRender = 'false';
				$this->autoLayout = 'false';
				$response = array(
					'id' => $_POST['id'],
					'status' => ($_POST['status']) ? 0 : 1,
					'status_icon' => ($_POST['status']) ? 'fa fa-close fa-1x fa-fw fc-r' : 'fa fa-check-circle-o fa-1x fa-fw fc-g',
					'status_text' => ($_POST['status']) ? '非表示' : '表示中',
				);
				
				$this->header('Content-Type: application/json');
				echo json_encode($response);
				exit;
			}
		}
	}
	
	/**
	 * 画像の削除
	 */
	public function delete_photo(){
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if ($this->request->is('ajax')) {
			
			if ($this->Util->ckechFileExistsAndDelete($_POST['aid'], $_POST['pid']) === true) {
				
				$this->autoRender = 'false';
				$this->autoLayout = 'false';
				$response = array(
					'pid' => $_POST['pid'],
				);
				
				$this->header('Content-Type: application/json');
				echo json_encode($response);
				
			}
			exit;
		}
		$this->redirect(array('action'=>'lists'));
		
	}
	
	/**
	 * 駅データの取得
	 */
	public function get_station_list(){
		
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if ($this->request->is('ajax')) {
			$this->autoRender = 'false';
			$this->autoLayout = 'false';
			
			$result = $this->Article->getStationList();
			
			for ($i=0; $i < count($result); $i++) {
				$stationList[$i] = $result[$i]['MtrStation']['station_name'];
			}
			
			//pr($stationList);
						
			/*array(
				//'pid' => $_POST['pid'],
				'test' => 'テスト'//$arr,
			);*/
			
			$this->header('Content-Type: application/json');
			//$this->header('Content-Type: application/x-javascript; charset=utf-8');
			echo json_encode($stationList);
			//echo $stationList;
		}
		exit;
	}
	
	/**
	 * 路線データの取得
	 */
	public function get_line_list(){
		
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if ($this->request->is('ajax')) {
			$this->autoRender = 'false';
			$this->autoLayout = 'false';
			
			$result = $this->Article->getLineList($_POST['station_name']);
			
			//pr($result);
			
			for ($i=0; $i < count($result); $i++) {
				$lineList[$i] = $result[$i]['MtrLine']['line_name'];
			}
			
			$this->header('Content-Type: application/json');
			echo json_encode($lineList);
		}
		exit;
	}
	
}
