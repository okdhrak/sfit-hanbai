<?php
class TopicsController extends AppController {

	//利用するモデルの設定
	public $uses = array('Topic', 'MtrIndication');
	
	//コンポーネントの設定
	public $components = array();
	
	//ページネーション設定
	/*public $paginate = array(
		'Topic' => array(
			'order' => array(
				'id' => 'DESC',
			),
			'conditions' => array(
				'delete' => '0',
			),
			'limit' => 10,
		),
	);*/
	
	/**
	 * beforeFilterコールバック
	 */
	public function beforeFilter() {
		
		//ログインなしでアクセス可能なページをアクション名で列挙
		//$this->Auth->allow('index');
	}
	
	/**
	 * beforeRenderコールバック
	 */
	public function beforeRender() {
		
		$this->set('indicationList', $this->MtrIndication->find('list'));
	}
	
	/**
	 * index
	 */
	public function index() {
	}
	
	/**
	 * トピックス一覧
	 */
	public function lists() {
		
		//SQL文
		$this->paginate = array(
			'conditions' => array(
				'delete' => 0,
			),
			'order' => array('id' => 'DESC'),
			'limit' => 30,
		);
		
		if ($this->paginate()) {
			$this->set('topicsData', $this->paginate());
		} else {
			$this->Session->setFlash('登録データがありません', 'default', array('class' => 'submitError'));
		}
	}
	
	/**
	 * add
	 */
	public function add() {
		
		//addはeditと同じ処理(idは無指定)
		return $this->edit();
	}
	
	/**
	 * edit
	 */
	public function edit($id = null) {
		
		//フォーム入力があった場合には保存処理。そうでない場合は初期値の準備
		if ($this->request->isPost() || $this->request->isPut()) {
			
			if (empty($id)) {
				$ts = $this->Util->getTimeStamp();
				$this->request->data['Topic']['id'] = $ts;
			} else {
				$this->request->data['Topic']['id'] = $id;
			}
			
			//配列で取得した沿線をシリアライズ化
			$this->request->data['Topic']['date'] = serialize(@$this->request->data['Topic']['date']);
			
			if ($this->Topic->saveAll($this->request->data)) {
				$this->Session->setFlash('物件情報を保存しました', 'default', array('class' => 'submitSuccess'));
				$this->redirect(array('action' => 'lists', $ts));
			} else {
				$this->set('validationErrors', $this->Topic->validationErrors);
			}
		} else {
			//初回読み込み時(サブミットがない)に登録情報を読み込む
			if ($id !== null) {//編集登録
				$this->request->data = $this->Topic->findById($id);
				if (empty($this->request->data)) {
					$this->Session->setFlash('トピックスの登録情報が見つかりませんでした', 'default', array('class' => 'submitError'));
					$this->redirect(array('action' => 'lists'));
				}
			} else {//新規登録
				//年月日の初期値をセット
				$this->request->data['Topic']['date']['year'] = empty($this->request->data['Topic']['date']['year']) ? date('Y') : NULL;
				$this->request->data['Topic']['date']['month'] = empty($this->request->data['Topic']['date']['month']) ? date('m') : NULL;
				$this->request->data['Topic']['date']['day'] = empty($this->request->data['Topic']['date']['day']) ? date('d') : NULL;
				
				//配列で取得した沿線をシリアライズ化
				$this->request->data['Topic']['date'] = serialize(@$this->request->data['Topic']['date']);
			}
		}
		
		//addもeditもedit.ctpを表示する(明示)
		$this->render('edit');
	}
	
	/**
	 * 削除
	 */
	public function delete($id){
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if ($this->request->is('ajax')) {
			
			$this->request->data['Topic']['id'] = $id;
			$this->request->data['Topic']['delete'] = 1;
			
			if ($this->Topic->saveAll($this->request->data)) {
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
	
}
