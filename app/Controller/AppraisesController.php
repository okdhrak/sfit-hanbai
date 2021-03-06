<?php
App::uses('CakeEmail', 'Network/Email');

class AppraisesController extends AppController {

	//利用するモデルの設定
	public $uses = array('Appraise', 'MtrPref');
	
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
		
		//ブラックホールメソッド
		$this->Security->blackHoleCallback = 'blackhole';
		
		//HTTPS通信ではない場合に実行するメソッド
		$this->Security->blackHoleCallback = 'forceSecure';
		$this->Security->requireSecure();//全てのアクションに適用
		//$this->Security->requireSecure(array('login', 'logout'));//login, logoutアクションにのみ適用
		
		//配列を読み込む
		$this->set('kindList', $this->kindList = array('マンション' => 'マンション', '一戸建て' => '一戸建て', '土地' => '土地', 'その他' => 'その他'));
		$this->set('unitList', $this->kindList = array('m2' => 'm2', '坪' => '坪'));
		$this->set('typeList', $this->typeList = array('1R/1K' => '1R/1K', '1DK/1LDK' => '1DK/1LDK', '2K/2DK/2LDK' => '2K/2DK/2LDK', '3K/3DK/3LDK' => '3K/3DK/3LDK', '4K/4DK/4LDK' => '4K/4DK/4LDK', 'その他' => 'その他'));
		$this->set('existencesList', $this->existencesList = array('あり' => 'あり', 'なし' => 'なし'));
		$this->set('periodList', $this->periodList = array('なるべく早く' => 'なるべく早く', '半年以内' => '半年以内', '1年以内' => '1年以内', '特に急がない' => '特に急がない'));
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
			if ($this->Appraise->saveAll($this->request->data, array('validate' => 'only'))) {				
				$this->render('confirm');//問題がなければ確認画面を呼び出す
			} else {
				$this->set('validationErrors', $this->Appraise->validationErrors);
				//$this->Session->setFlash('入力内容に誤りがあります'));
			}
		}
	}
	
	/**
	 * confirm
	 */
	public function confirm() {
		
		if ($this->request->isPost() || $this->request->isPut()) {
			
			if (@$this->request->data['_toback']) {
				$this->request->data = json_decode($this->request->data['Appraise']['postData'], true);
				$this->render('index');
			} elseif (@$this->request->data['_tosend']) {
				
				$this->request->data = json_decode($this->request->data['Appraise']['postData'], true);
				
				//送信用データへ整形
				$this->request->data['Appraise']['m_kind'] = @implode(' / ', $this->request->data['Appraise']['m_kind']);
				$this->request->data['Appraise']['m_pref_str'] = $this->prefList[$this->request->data['Appraise']['m_pref']];
				$this->request->data['Appraise']['m_type'] = @implode('、', $this->request->data['Appraise']['m_type']);
				$this->request->data['Appraise']['pref_str'] = $this->prefList[$this->request->data['Appraise']['pref']];
				
				#S-FITへの返信
				$email = new CakeEmail('appraise');
				//$email->transport('Debug');
				$email
				->from($this->request->data['Appraise']['mail'])
				->to('hanbai@sfit.co.jp')
				//->Cc('xxx@sfit.co.jp')
				->bcc('form@sfit.co.jp')
				->template('appraise', 'default')
				->viewVars($this->request->data['Appraise']);
				
				if ($messages = $email->send()) {
					$this->redirect(array('action' => 'done'));
					//$this->set('messages', $messages);
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
