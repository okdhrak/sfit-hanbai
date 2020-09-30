<?php
class ApiController extends AppController {

	//利用するモデルの設定
	public $uses = array('Api');
	
	//コンポーネントの設定
	public $components = array('Session');
	
	/**
	 * beforeFilterコールバック
	 */
	public function beforeFilter() {
	}
	
	/**
	 * beforeRenderコールバック
	 */
	public function beforeRender() {
	}
	
	/**
	 * get_postcode
	 */
	public function get_postcode() {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if ($this->request->is('ajax')) {
			$this->autoRender = false;
			$this->autoLayout = false;
			
			if ($this->request->data['pcode1'] && $this->request->data['pcode2']) {
				$pcode = $this->request->data['pcode1'] . '-' . $this->request->data['pcode2'];
				$response = $this->Api->getPostCode($pcode);
				
				$this->header('Content-Type: application/json');
				echo json_encode($response);
			} else {
				return false;
			}
			
		}
		exit;
	}
	
}
