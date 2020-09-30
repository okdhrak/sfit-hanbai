<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {
	
	//使用するヘルパーを読み込み
	public $helpers = array('Html');
	
	
	public function getRegistedPhotoPath($id) {
		return PHOTO_DIR . DS . date('Y', $id) . DS . $id;
	}
	
	public function getImagePath($id) {
		return IMAGE_PATH . date('Y', $id) . '/' . $id . '/';
	}
	
	//ファイル名の拡張子を取り除く
	public function getImageId($filename) {
		return preg_replace('/(.+)(\.[^.]+$)/', '$1', $filename);
	}
	
	public function checkCategory($filename, $category) {
		//$result = preg_match("/^$category/", $filename);
		return preg_match("/^$category/", $filename);
	}
	
	/**
	 * 数値のフォーマットを金額へ変換
	 *
	 * @param string $value
	 * @return string 変換後の金額表示
	 */
	public function numberFormat($value, $type=0) {
		if ($value == ''){
			return null;
		}
		$value = number_format((integer)$value, 0, ".", ",");
		$value .= ($type) ? '円' : '';
		return $value;
	}
	
}
