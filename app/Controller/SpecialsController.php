<?php
App::uses('AppController', 'Controller');

class SpecialsController extends AppController {

	//コントローラ
	public $name = 'Specials';
	
	//モデル
	//public $uses = array('');
	
	public function beforeFilter() {
		
		//AppController内でもbeforeFilter()を有効にする
		parent::beforeFilter();
		
		//URLがhttps://だったらhttp://にリダイレクト
		if (env('HTTPS')) {
			$this->_unforceSSL();
    	}
	}
	
	public function beforeRender() {
	}
	
	/**
	 * Securityコンポーネント、強制HTTPメソッド
	 */
	public function _unforceSSL() {
        $this->redirect('http://' . env('SERVER_NAME') . $this->here);
    }
	
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
	
	/**
	 * index
	 */
	public function index() {
		
		//レイアウトをindex.ctpに指定
		//$this->layout = 'index';
	}
	
}
