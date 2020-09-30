<?php
class RenovationsController extends AppController {
	
	public $html = '';
	
	//スマホのみ
	public $layout = 'searches';
	
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
		
		//pr($ward);
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
		
		//表示順
		if (isset($this->request->params['named']['price'])) {
			$sort = ($this->request->params['named']['price'] == 'desc') ? ' ORDER BY Article.price DESC ' : ' ORDER BY Article.price ASC ';
		} elseif($this->Session->check('sort')) {
			$sort = $this->Session->read('sort');
		} else {
			$sort = ' ORDER BY ResistationTime.modified DESC ';
		}
		
		$condition = ' AND Article.category = 3 AND Article.city = "' . $ward_ja . '" AND Article.tag LIKE "%\"' . 7 . '\"%"';
		
		//条件をセッションで持ちまわる
		$this->Session->write('condition', $condition);
		$this->Session->write('sort', $sort);
		
		//ビューに値を渡す
		$this->set('ward', $ward);
		$this->set('ward_ja', $ward_ja);
		$this->set('articlesData', $this->Article->getMore(0, $condition, $sort));
		$this->set('articlesCount', $this->Article->getCount($condition));
	}
}
