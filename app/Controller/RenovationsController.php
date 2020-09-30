<?php
class RenovationsController extends AppController {
	
	//利用するモデルの設定
	public $uses = array(
		'Article',
		'MtrCategory',
		'MtrRoomType',
		'MtrTag',
	);
	
	//コンポーネントの設定
	public $components = array('Session');
	
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
		$this->set('categoryList', $this->MtrCategory->find('list'));
		$this->set('roomTypeList', $this->MtrRoomType->find('list'));
		$this->set('tagList', $this->MtrTag->find('list'));
	}
	
	/**
	 * index
	 */
	public function index() {
		//echo 'インデックス';
	}
	
	/**
	 * result
	 */
	public function result($ward = NULL) {
		
		//pr($test);
		//pr($this->params);
		
		//URLパラメータからエリアを取得、特定エリアの指定がなければエラーを投げる
		switch ($ward) {
			case 'minato':
				$ward_ja = '港区';
				break;
			case 'meguro':
				$ward_ja = '目黒区';
				break;
			case 'setagaya':
				$ward_ja = '世田谷区';
				break;
			case 'shibuya':
				$ward_ja = '渋谷区';
				break;
			default:
				throw new MethodNotAllowedException();
		}
		
		//検索件数の指定
		if (@$this->request->params['named']['limit']) {
			$this->Session->write('Limit', $this->request->params['named']['limit']);
		}
		if ($this->Session->check('Limit')) {
			$limit = $this->Session->read('Limit');
		} else {
			$limit = 10;
		}
		
		//検索条件を定義(リノベーション物件)
		$conditions[] = 'Article.tag LIKE "%\"' . 7 . '\"%"';
		
		//ベースSQL文
		$this->paginate = array(
			'fields' => array('Article.*', 'PeculiarPoint.*', 'ResistationTime.*', 'Flag.*'),
			'conditions' => array(
				'Article.city' => $ward_ja,
				'Article.category' => 3,
				'Flag.status' => 1,
				'Flag.delete' => 0,
			),
			'order' => array('ResistationTime.modified' => 'DESC'),
			'limit' => @$limit,
		);
		
		//pr(@$conditions);
		$this->set('ward', $ward);
		$this->set('ward_ja', $ward_ja);
		$this->set('articlesData', $this->paginate($conditions));
	}
}
