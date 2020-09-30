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
	public $components = array('Security' => array('validatePost' => false/*, 'unlockedActions' => array('index')*/), /*'Common', 'ContactForm'*/);
	
	/**
	 * beforeFilterコールバック
	 */
	public function beforeFilter() {
		
		//ブラックホールメソッドを命名
		$this->Security->blackHoleCallback = 'blackhole';
		
		//HTTPS通信ではない場合に実行するメソッド
		$this->Security->blackHoleCallback = 'forceSecure';
		$this->Security->requireSecure();//全てのアクションに適用
		//$this->Security->requireSecure(array('login', 'logout'));//login, logoutアクションにのみ適用
		
		//配列を読み込む
		$this->set('kindList', $this->kindList = array('業務についてのお問い合わせ' => '業務についてのお問い合わせ', 'その他お問い合わせ' => 'その他お問い合わせ'));
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
			
			if (@$this->request->data['_toback']) {
				$this->request->data = json_decode($this->request->data['Contact']['postData'], true);
				$this->render('index');
			} elseif (@$this->request->data['_tosend']) {
				
				$postData = json_decode($this->request->data['Contact']['postData'], true);
				
				//送信用データへ整形
				$postData['Contact']['kind'] = @implode(' / ', $postData['Contact']['kind']);
				$postData['Contact']['pref'] = $this->prefList[$postData['Contact']['pref']];
				
				$email = new CakeEmail('contact');
				//$email->transport('Debug');
				$email
				->from($postData['Contact']['mail'])
				->to('hanbai@sfit.co.jp')
				//->Cc('xxx@sfit.co.jp')
				->bcc('form@sfit.co.jp')
				->template('contact', 'default')
				->viewVars($postData['Contact']);
				
				/*$email->attachments(array(
					APP . '/webroot/img/kv_btn_01_on.png', APP . '/webroot/img/aside_bg_01.png',
				));*/
				
				if ($messages = $email->send()) {
					$this->redirect(array('action' => 'done'));
					$this->set('messages', $messages);
				} else {
					$this->Session->setFlash('送信に失敗しました');
				}
				
			} else {
				
				//確認、バリデーション処理
				if ($this->Contact->saveAll($this->request->data, array('validate' => 'only'))) {
					//値を変換し代入
					//$this->request->data['Contact']['kind'] = @implode(' / ', $this->request->data['Contact']['kind']);
					//$this->request->data['Contact']['pref'] = $this->prefList[$this->request->data['Contact']['pref']];
					
					//入力データに問題がなければ入力内容の確認画面を呼び出す
					$this->render('confirm');
				} else {
					$this->set('validationErrors', $this->Contact->validationErrors);
					//$this->Session->setFlash('入力内容に誤りがあります'));
				}
			}
			
		}
	}
	
	/**
	 * done
	 */
	public function done() {
	}
}
