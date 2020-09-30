<?php
class SiteAuthHelper extends AppHelper {
	
	public function getAuthStatus(){
		if (!isset($_SESSION['Auth']['User'])) {
			return $this->Html->link('ログイン', array('controller' => 'users', 'action' => 'login'));
		} else {
			return $_SESSION['Auth']['User']['role'] . ' | ' . $this->Html->link('ログアウト', array('controller' => 'users', 'action' => 'logout'), array(), 'ログアウトしますか？');
		}
		//return $result;
	}
}
