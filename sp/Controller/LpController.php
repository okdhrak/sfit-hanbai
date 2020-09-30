<?php
App::uses('CakeEmail', 'Network/Email');

class LpController extends AppController {
	
	//コントローラー
	//public $name = 'Lp';

	//モデル
	public $uses = array('Lp', 'MtrPref');
	
	//コンポーネント
	public $components = array(
		'Security' => array(
			'validatePost' => false,
			'unlockedActions' => array('done'),
		),
		'Session',
	);
	
	public function beforeFilter() {
		
		//AppController内でもbeforeFilter()を有効にする
		parent::beforeFilter();
		
		//レイアウトをindex.ctpに指定
		$this->layout = 'lp_consultation';
		
		//配列定義
		$this->set('monthList', $this->monthList = array(
			'1' => 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12,
		));
		$this->set('dayList', $this->dayList = array(
			'1' => 1, 2, 3, 4, 5, 6, 7, 8, 9, 10,11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31,
		));
		$this->set('bookList', $this->bookList = array(
			'相談窓口の予約' => '相談窓口の予約',
			'その他のお問合せ' => 'その他のお問合せ',
		));
		$this->set('kindList', $this->kindList = array(
			'新築戸建て' => '新築戸建て',
			'新築マンション' => '新築マンション',
			'土地' => '土地',
			'中古戸建て' => '中古戸建て',
			'中古マンション' => '中古マンション',
			'その他(売却など)' => 'その他(売却など)',
		));
		$this->set('prefList', $this->prefList = $this->MtrPref->find('list'));
		
		//ブラックホールメソッドを命名
		$this->Security->blackHoleCallback = 'blackhole';
		
		//HTTPS通信ではない場合に実行するメソッド
		$this->Security->blackHoleCallback = 'forceSecure';
		$this->Security->requireSecure();//全てのアクションに適用
		//$this->Security->requireSecure(array('login', 'logout'));//login, logoutアクションにのみ適用
		
	}
	
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
	 * consultation
	 */
	public function consultation() {
		
		if ($this->request->isPost() || $this->request->isPut()) {
			
			//バリデーション処理
			if ($this->Lp->saveAll($this->request->data, array('validate' => 'only'))) {				
				$this->render('confirm');//問題がなければ確認画面を呼び出す
			} else {
				$this->set('validationErrors', $this->Lp->validationErrors);
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
				$this->request->data = json_decode($this->request->data['Lp']['postData'], true);
				$this->render('consultation');
			} elseif (@$this->request->data['_tosend']) {
				
				//受け取ったデータを配列へ
				$this->request->data = json_decode($this->request->data['Lp']['postData'], true);
				
				//送信用データへ整形
				$this->request->data['Lp']['book'] = @implode(' / ', $this->request->data['Lp']['book']);
				$this->request->data['Lp']['kind'] = @implode(' / ', $this->request->data['Lp']['kind']);
				
				//メールヘッダーの判断
				$mailHeaderFrom = $this->Util->getMailHeaderFrom($this->request->data['Lp']['contact']);
				
				//送信処理
				$email = new CakeEmail('lp_consultation');
				//$email->transport('Debug');
				$email
				->from($mailHeaderFrom)
				->to('hanbai@sfit.co.jp')
				//->Cc('xxx@sfit.co.jp')
				->bcc('form@sfit.co.jp')
				->template('lp_consultation', 'default')
				->viewVars($this->request->data['Lp']);
				
				if ($messages = $email->send()) {
					$this->redirect(array('action' => 'done'));
					//$this->set('messages', $messages);
				} else {
					//$this->Session->setFlash('送信に失敗しました');
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
