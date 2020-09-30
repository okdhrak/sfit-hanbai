<?php
//ユーザ定義定数
//呼び出し方: echo FOOBAR;
//define('PHOTO_DIR', ROOT . DS . 'photo');
//define('PHOTO_DIR_YEAR', ROOT . DS . 'photo' . DS . date('Y', time()));

define('PHOTO_DIR', ROOT . DS . 'app' . DS . 'webroot' . DS . 'photo');
define('PHOTO_DIR_YEAR', ROOT . DS . 'app' . DS . 'webroot' . DS . 'photo' . DS . date('Y', time()));

define('IMAGE_PATH', FULL_BASE_URL . '/photo/');

