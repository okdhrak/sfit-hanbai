<?php
class MtrPref extends AppModel {
	
	public $primaryKey = 'name';//selectタグ内value属性に文字列を挿入したいのでidでななくnameを指定
	public $displayField = 'name';
}
