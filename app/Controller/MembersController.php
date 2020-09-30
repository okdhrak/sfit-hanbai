<?php
App::uses('CakeEmail', 'Network/Email');

class MembersController extends AppController {

	//利用するモデルの設定
	public $uses = array('Member', 'MtrPref');
	
	//コンポーネントの設定
	public $components = array(
		'Security' => array(
			'validatePost' => false,
			'unlockedActions' => array('index', 'login', 'edit', 'done'),
		),
		'Auth',
		/*'Auth' => array(
			'loginAction' => array(
				'controller' => 'members',
				'action' => 'login',
				//'plugin' => '',
			),
			'authError' => 'ログインに失敗しました',
			'authenticate' => array(
				'all' => array(
					'fields' => array(
						'mail' => 'mail',
						'password' => 'password',
					),
				),
				'Form',
			),
		),*/
		'Session',
	);
	
	//ページネーション設定
	//public $paginate = array();
	
	/**
	 * beforeFilterコールバック
	 */
	public function beforeFilter() {
		
		//すべてのアクションが認証なしでアクセス可能
		$this->Auth->allow();
		
		//ブラックホールメソッドを命名
		$this->Security->blackHoleCallback = 'blackhole';
		
		//HTTPS通信ではない場合に実行するメソッド
		$this->Security->blackHoleCallback = 'forceSecure';
		$this->Security->requireSecure();//全てのアクションに適用
		//$this->Security->requireSecure(array('login', 'logout'));//login, logoutアクションにのみ適用
		
		//配列を読み込む
		$this->set('kindList', $this->kindList = array(
			'新築戸建て' => '新築戸建て',
			'中古戸建て' => '中古戸建て',
			'新築マンション' => '新築マンション',
			'中古マンション' => '中古マンション',
			'土地' => '土地',
		));
		$this->set('priceStartList', $this->priceStartList = array(
			500 => '500万円以上',
			1000 => '1,000万円以上',
			1500 => '1,500万円以上',
			2000 => '2,000万円以上',
			2500 => '2,500万円以上',
			3000 => '3,000万円以上',
			3500 => '3,500万円以上',
			4000 => '4,000万円以上',
			4500 => '4,500万円以上',
			5000 => '5,000万円以上',
			5500 => '5,500万円以上',
			6000 => '6,000万円以上',
			6500 => '6,500万円以上',
			7000 => '7,000万円以上',
			7500 => '7,500万円以上',
			8000 => '8,000万円以上',
			9000 => '9,000万円以上',
			10000 => '1億円以上',
		));
		$this->set('priceEndList', $this->priceEndList = array(
			500 => '500万円未満',
			1000 => '1,000万円未満',
			1500 => '1,500万円未満',
			2000 => '2,000万円未満',
			2500 => '2,500万円未満',
			3000 => '3,000万円未満',
			3500 => '3,500万円未満',
			4000 => '4,000万円未満',
			4500 => '4,500万円未満',
			5000 => '5,000万円未満',
			5500 => '5,500万円未満',
			6000 => '6,000万円未満',
			6500 => '6,500万円未満',
			7000 => '7,000万円未満',
			7500 => '7,500万円未満',
			8000 => '8,000万円未満',
			9000 => '9,000万円未満',
			10000 => '1億円未満',
		));
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
			$this->flash('不正な動作がありました', '/members/', 3);
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
		$this->redirect(array('action' => 'login'));
	}
	
	/**
	 * login
	 */
	public function login() {
		
		//フォームに入力があった場合にログイン処理後ダッシュボードへ
		if ($this->request->isPost()) {
			
			if ($data = $this->Member->find('first', array('conditions' => array('mail =' => $this->request->data['Member']['mail'], 'password =' => AuthComponent::password($this->request->data['Member']['password']), 'agreement =' => 1)))) {
				//セッションを保存
				$this->Session->write('Auth', $data);
				//$this->redirect($this->referer());
				$this->redirect('/');
			} else {
				$this->Session->setFlash('ID・パスワードの入力内容に誤りがあります', 'default', array('class' => 'loginError'));
			}
			
			/*if ($this->Auth->login()) {
				$this->redirect('/');
			} else {
				$this->Session->setFlash('ID、パスワードの入力内容に誤りがあります');
			}*/
		}
	}
	
	/**
	 * logout
	 */
	public function logout() {
		$this->Session->delete('Auth');
		$this->redirect($this->referer());
	}
	
	/**
	 * edit
	 */
	public function edit() {
		
		if ($this->request->isPost() || $this->request->isPut()) {
			
			//バリデーション処理
			if ($this->Member->saveAll($this->request->data, array('validate' => 'only'))) {				
				$this->render('confirm');//問題がなければ確認画面を呼び出す
			} else {
				$this->set('validationErrors', $this->Member->validationErrors);
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
				$this->request->data = json_decode($this->request->data['Member']['postData'], true);
				$this->render('edit');
			} elseif (@$this->request->data['_tosend']) {
				
				$this->request->data = json_decode($this->request->data['Member']['postData'], true);
				
				//保存用データへ整形
				$this->request->data['Member']['id'] = $this->Util->getTimeStamp();
				$this->request->data['Member']['kind'] = (!empty($this->request->data['Member']['kind'])) ? implode(' / ', $this->request->data['Member']['kind']) : '';
				$this->request->data['Member']['pref'] = $this->prefList[$this->request->data['Member']['pref']];
				$this->request->data['Member']['price'] = '';
				$this->request->data['Member']['price'] .= ($this->request->data['Member']['price_start']) ? $this->priceStartList[$this->request->data['Member']['price_start']] : '';
				$this->request->data['Member']['price'] .= ($this->request->data['Member']['price_start'] || $this->request->data['Member']['price_end']) ? '～' : '';
				$this->request->data['Member']['price'] .= ($this->request->data['Member']['price_end']) ? $this->priceEndList[$this->request->data['Member']['price_end']] : '';
				
				#お客様への自動返信
				$rps_mail = new CakeEmail('member_response');
				//$rps_mail->transport('Debug');
				$rps_mail
				//->from($postData['Member']['mail'])
				->to($this->request->data['Member']['mail'])
				//->Cc('form@sfit.co.jp')
				->template('member_response', '')
				->viewVars(
					array(
						'name' => $this->request->data['Member']['name'],
						'mail' => $this->request->data['Member']['mail'],
						'base_url' => FULL_BASE_URL,
						'param' => $this->request->data['Member']['id'] . '/' . md5($this->request->data['Member']['mail'] . $this->request->data['Member']['id'] . SECURITY_SALT),
					)
				);
				
				if ($messages = $rps_mail->send()) {
					$this->Member->saveAll($this->request->data);
					//$this->redirect(array('action' => 'done'));
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
	
	/**
	 * regist(パスワード発行)
	 */
	public function regist($ts, $param) {
		if ($data = $this->Member->find('first', array('fields' => array('id', 'name', 'kana', 'mail', 'tel', 'pref', 'address', 'kind', 'price', 'area', 'etc', 'agreement'), 'conditions' => array('id =' => $ts, 'id >' => time() - (60 * 60 * 24))))) {
			//pr($data);
			if ((md5($data['Member']['mail'] . $data['Member']['id'] . SECURITY_SALT) == $param) && ($data['Member']['agreement'] == 0)) {
				
				$data['Member']['agreement'] = 1;
				//$data['Member']['pref'] = $data['Member']['pref'];
				
				#S-FITへメールの送信
				$email = new CakeEmail('member');
				//$email->transport('Debug');
				$email
				->from($data['Member']['mail'])
				//->to('okada@sfit.co.jp')
				->to('hanbai@sfit.co.jp')
				//->Cc('xxx@sfit.co.jp')
				->bcc('form@sfit.co.jp')
				->template('member', 'default')
				->viewVars($data['Member']);
				
				if ($messages = $email->send()) {
					if ($this->Member->save($data, false)) {
						$this->Session->setFlash('会員登録が完了いたしました。ID・パスワードをご入力いただきログインしてください', 'default', array('class' => 'loginInfo'));
						$this->redirect(array('action' => 'login'));
					}
				} else {
					//$this->Session->setFlash('送信に失敗しました');
				}
			} else {
				//エラー処理
			}
		} else {
			//エラー表示処理
		}
		exit;
	}
	
	/**
	 * reregist(パスワード再発行)
	 */
	public function reregist($id, $ts, $param) {
		if ($data = $this->Member->find('first', array('fields' => array('id', 'name', 'mail', 'agreement'), 'conditions' => array('id =' => $id, 'agreement =' => 1)))) {
			if ((md5($data['Member']['mail'] . $data['Member']['id'] . SECURITY_SALT) == $param) && ($ts > time() - (60 * 60 * 24))) {
				
				//生成したパスワードを更新データへ挿入
				$data['Member']['password'] = $this->Util->createPassword();
				
				#お客様へパスワードを送信
				$mail = new CakeEmail('member_getpass_fin');
				//$mail->transport('Debug');
				$mail
				//->from($postData['Member']['mail'])
				->to($data['Member']['mail'])
				//->Cc('form@sfit.co.jp')
				->template('member_getpass_fin', '')
				->viewVars(
					array(
						'name' => $data['Member']['name'],
						'password' => $data['Member']['password'],
						'login_url' => FULL_BASE_URL . '/members/login',
					)
				);
				
				if ($this->Member->save($data, false)) {
					if ($messages = $mail->send()) {
						$this->Session->setFlash('ご登録いただいているメールアドレスへ再発行パスワードをお送りしました', 'default', array('class' => 'loginInfo'));
						$this->redirect(array('action' => 'login'));
					}
				}
			} else {
				//エラー処理
			}
		} else {
			//エラー表示処理
		}
		exit;
	}
	
	/**
	 * getpass
	 */
	public function getpass() {
		
		if ($this->request->isPost()) {
			
			if ($data = $this->Member->find('first', array('conditions' => array('mail =' => $this->request->data['Member']['mail'], 'agreement =' => 1)))) {
				//セッションを保存
				//pr($data);
				//exit;
				
				//送信用データへ整形
				$data['Member']['ts'] = $this->Util->getTimeStamp();
				
				#お客様への自動返信
				$mail = new CakeEmail('member_getpass');
				//$mail->transport('Debug');
				$mail
				//->from($postData['Member']['mail'])
				->to($data['Member']['mail'])
				//->Cc('form@sfit.co.jp')
				->template('member_getpass', '')
				->viewVars(
					array(
						'name' => $data['Member']['name'],
						//'mail' => $this->request->data['Member']['mail'],
						'base_url' => FULL_BASE_URL . '/members/reregist',
						'param' => $data['Member']['id'] . '/' . $data['Member']['ts'] . '/' . md5($data['Member']['mail'] . $data['Member']['id'] . SECURITY_SALT),
					)
				);
				
				if ($messages = $mail->send()) {
					$this->redirect('/members/getpass_done');
				} else {
					//$this->Session->setFlash('送信に失敗しました');
				}
				
			} else {
				$this->Session->setFlash('ご入力いただいたメールアドレスは登録されておりません', 'default', array('class' => 'loginError'));
			}
		}
	}
	
	/**
	 * getpass_done
	 */
	public function getpass_done() {
	}
	
}
