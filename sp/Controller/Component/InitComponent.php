<?php
class InitComponent extends Component {
	
	public function __construct() {
		/*$this->_controller = $collection->getController();
		parent::__construct($collection, $settings);*/
		
		//$result = setcookie('test_val1', 'abc', NULL, '/searches/result/', NULL, false, true);
		
		//USER_AGENTの判別
		$agent = $_SERVER['HTTP_USER_AGENT'];
		//$uri = $_SERVER['REQUEST_URI'];
		
		//if ((strpos($agent, 'iPhone') !== false && strpos($agent, 'iPad') === false) || strpos($agent, 'iPod') !== false || strpos($agent, 'Android') !== false) {
		if (strpos($agent, 'iPhone') !== false || strpos($agent, 'iPad') !== false || strpos($agent, 'iPod') !== false || strpos($agent, 'Android') !== false) {
			return false;
		} else {
			header('Location: http://' . env('SERVER_NAME'));
			exit;
		}
		
	}
	
	public function initialize(Controller $controller) {
		//$this->Controller = $controller;
		//$this->Controller->set('var', '値');
	}
	
	public function startup(Controller $controller) {
		//$this->Flag = ClassRegistry::init('Flag');
		//$this->Controller->set('testtest', $this->getRestrictedArtNum());
	}
	
}
?>
