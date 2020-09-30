<?php
App::uses('CakeEmail', 'Network/Email');

class PropertiesController extends AppController {

	//利用するモデルの設定
	public $uses = array('Property', 'MtrCategory', 'MtrPref');
	
	//コンポーネントの設定
	public $components = array(
		'Security' => array(
			'validatePost' => false,
			'unlockedActions' => array('index', 'done'),
		),
		'Session',
	);
	
	/**
	 * beforeFilterコールバック
	 */
	public function beforeFilter() {
		
		//認証なしでアクセス可能
		//$this->Auth->allow();
		
		//ブラックホールメソッドを命名
		$this->Security->blackHoleCallback = 'blackhole';
		
		//HTTPS通信ではない場合に実行するメソッド
		$this->Security->blackHoleCallback = 'forceSecure';
		$this->Security->requireSecure();//全てのアクションに適用
		//$this->Security->requireSecure(array('login', 'logout'));//login, logoutアクションにのみ適用
		
		//配列を読み込む
		$this->set('kindList', $this->kindList = array('現地を見たい・案内してほしい' => '現地を見たい・案内してほしい', '物件の情報がほしい' => '物件の情報がほしい', '販売状況を知りたい' => '販売状況を知りたい', '資料・間取図が欲しい' => '資料・間取図が欲しい', '購入に関して相談したい' => '購入に関して相談したい', 'その他' => 'その他'));
		$this->set('categoryList', $this->categoryList = $this->MtrCategory->find('list'));
		$this->set('prefList', $this->prefList = $this->MtrPref->find('list'));
	}
	
	/**
	 * beforeRenderコールバック
	 */
	public function beforeRender() {
	}
	
	/**
	 * Securityコンポーネント、ブラックホールメソッド
	 */
	public function blackhole($type) {
		if ($type === 'csrf') {
			//throw new NotFoundException();
			$this->flash('不正な動作がありました', '/properties/', 3);
		}
	}
	
	/**
	 * Securityコンポーネント、強制HTTPSメソッド
	 */
	public function forceSecure() {
		$this->redirect('https://' . env('SERVER_NAME') . $this->here);
	}
	
	/**
	 * index
	 */
	public function index() {
		
		if ($this->request->isPost() || $this->request->isPut()) {
			
			//バリデーション処理
			if ($this->Property->saveAll($this->request->data, array('validate' => 'only'))) {				
				$this->render('confirm');//問題がなければ確認画面を呼び出す
			} else {
				$this->set('validationErrors', $this->Property->validationErrors);
				//$this->Session->setFlash('入力内容に誤りがあります'));
			}
		} else {
			//表示用物件データをセットする
			if ($res = $this->Property->getArtInfo($this->request->params['id'])) {
				$this->request->data['Property']['d_mid'] = $res[0]['articles']['mid'];
				$this->request->data['Property']['d_name'] = $res[0]['articles']['name'];
				$this->request->data['Property']['d_category'] = $res[0]['articles']['category'];
				$this->request->data['Property']['d_price'] = $this->Util->numberFormat($res[0]['articles']['price'], 1);
				$this->request->data['Property']['d_traffic'] = $this->Util->getTrafficArr($res[0]['articles']['traffic']);
				$this->request->data['Property']['d_address'] = $res[0]['articles']['pref'].$res[0]['articles']['city'];
			} else {
				//$this->Session->setFlash('物件情報が見つかりませんでした');
			}
		}
	}
	
	/**
	 * confirm
	 */
	public function confirm() {
		
		if ($this->request->isPost() || $this->request->isPut()) {
			
			if (@$this->request->data['_toback']) {
				$this->request->data = json_decode($this->request->data['Property']['postData'], true);
				$this->render('index');
			} elseif (@$this->request->data['_tosend']) {
				
				$this->request->data = json_decode($this->request->data['Property']['postData'], true);
				
				//送信用データへ整形
				$this->request->data['Property']['kind'] = @implode(' / ', $this->request->data['Property']['kind']);
				$this->request->data['Property']['pref_str'] = $this->prefList[$this->request->data['Property']['pref']];
				
				#S-FITへの返信
				$email = new CakeEmail('property');
				//$email->transport('Debug');
				$email
				->from($this->request->data['Property']['mail'])
				->to('hanbai@sfit.co.jp')
				//->Cc('xxx@sfit.co.jp')
				->bcc('form@sfit.co.jp')
				->template('property', 'default')
				->viewVars($this->request->data['Property']);
				
				if ($messages = $email->send()) {
					$this->redirect(array('action' => 'done'));
					$this->set('messages', $messages);
				} else {
					//$this->Session->setFlash('送信に失敗しました');
				}
				
				//サンキューページへリダイレクト
				$this->redirect(array('action' => 'done'));
			}
		}
	}
	
	/**
	 * done
	 */
	public function done() {
	}
	
}
