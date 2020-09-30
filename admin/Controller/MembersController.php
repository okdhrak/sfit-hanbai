<?php
class MembersController extends AppController {

	//利用するモデルの設定
	public $uses = array('Member');
	
	/**
	 * beforeFilterコールバック
	 */
	public function beforeFilter() {
		
		//ログインなしでアクセス可能なページをアクション名で列挙
		//$this->Auth->allow('index');
	}
	
	/**
	 * index
	 */
	public function index() {
		
	}
	
	/**
	 * 会員一覧
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
			$this->set('membersData', $this->paginate());
		} else {
			$this->Session->setFlash('登録データがありません', 'default', array('class' => 'submitError'));
		}
	}
	
	/**
	 * 登録内容の確認
	 */
	public function view($id = null) {
		if ($id !== null) {//パラメータが存在する
			
			$this->set('memberData', $bool = $this->Member->findById($id));
			
			//$this->request->data = $this->Member->findById($id);
			if (!$bool) {
				$this->Session->setFlash('会員の登録情報が見つかりませんでした', 'default', array('class' => 'submitError'));
				$this->redirect(array('action' => 'lists'));
			}
		} else {//パラメータが存在しない
			$this->redirect(array('action' => 'lists'));
		}
	}
	
	/**
	 * 削除
	 */
	public function delete($id){
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if ($this->request->is('ajax')) {
			
			$this->request->data['Member']['id'] = $id;
			$this->request->data['Member']['delete'] = 1;
			
			if ($this->Member->saveAll($this->request->data)) {
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
