<?php
App::uses('CakeEmail', 'Network/Email');

class ContactsController extends AppController {
	
	//public $name = 'Contacts';
	
	/**
	 * 利用するモデルの設定
	 */
	public $uses = array('Contact', 'MtrPref');
	
	/**
	 * 利用するコンポーネントの設定
	 */
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
		
		//ブラックホールメソッド
		$this->Security->blackHoleCallback = 'blackhole';
		
		//HTTPS通信ではない場合に実行するメソッド
		$this->Security->blackHoleCallback = 'forceSecure';
		$this->Security->requireSecure();//全てのアクションに適用
		//$this->Security->requireSecure(array('login', 'logout'));//login, logoutアクションにのみ適用
		
		//配列を読み込む
		$this->set('kindList', $this->kindList = array('業務についてのお問合せ' => '業務についてのお問合せ', 'その他お問合せ' => 'その他お問合せ'));
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
			$this->flash('不正な動作がありました', '/contacts/', 3);
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
			if ($this->Contact->saveAll($this->request->data, array('validate' => 'only'))) {				
				$this->render('confirm');//問題がなければ確認画面を呼び出す
			} else {
				$this->set('validationErrors', $this->Contact->validationErrors);
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
				
				$this->request->data = json_decode($this->request->data['Contact']['postData'], true);
				$this->render('index');
			} elseif (@$this->request->data['_tosend']) {
				
				$this->request->data = json_decode($this->request->data['Contact']['postData'], true);
				
				//送信用データへ整形
				$this->request->data['Contact']['kind'] = @implode(' / ', $this->request->data['Contact']['kind']);
				$this->request->data['Contact']['pref_str'] = $this->prefList[$this->request->data['Contact']['pref']];
				
				#S-FITへの返信
				$email = new CakeEmail('contact');
				//$email->transport('Debug');
				$email
				->from($this->request->data['Contact']['mail'])
				->to('hanbai@sfit.co.jp')
				//->Cc('xxx@sfit.co.jp')
				->bcc('form@sfit.co.jp')
				->template('contact', 'default')
				->viewVars($this->request->data['Contact']);
				
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
