<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Article', 'Topic', 'MtrCategory', 'MtrTag');
	
	//コンポーネントの設定
	public $components = array('Session');
	
	public function beforeFilter() {
		//AppController内でもbeforeFilter()を有効にする
		parent::beforeFilter();
		
		//URLがhttps://だったらhttp://にリダイレクト
		if (env('HTTPS')) {
            $this->_unforceSSL();
        }
	}
	
	public function beforeRender() {
		$this->set('categoryList', $this->MtrCategory->find('list'));
		$this->set('tagList', $this->MtrTag->find('list'));
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
		
		//検索条件を引き継ぐ
		if ($this->request->isPost()) {
			$this->Session->write('Condition', $this->request->data);
		} elseif ($this->Session->check('Condition')) {
			$this->request->data = $this->Session->read('Condition');
		}
		
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
		$this->layout = 'index';
		
		//トピックス一覧を読み込みViewへ渡す
		$this->set('topicsData', $this->Topic->find('all', array(
			'fields' => array('date', 'comment', 'link', 'tb'),
			'conditions' => array('delete' => 0, 'indication' => 0),
			'order' => array('id DESC'),
			)
		));
		
		//おすすめ物件一覧を読み込みViewへ渡す
		$allArt = $this->Article->find('all', array(
			'fields' => array('Article.*'),
			'conditions' => array('Flag.status' => 1, 'Flag.restriction' => 0, 'Flag.recommend' => 1, 'Flag.delete' => 0),
			//'order' => 'rand()',
			)
		);
		
		$this->set('artData', $this->Util->getShuffledArt($allArt));
	}
}
