<?php
define('PHOTO_DIR', ROOT . DS . 'app' . DS . 'webroot' . DS . 'photo');
define('PHOTO_DIR_YEAR', ROOT . DS . 'app' . DS . 'webroot' . DS . 'photo' . DS . date('Y', time()));

define('IMAGE_PATH', FULL_BASE_URL . '/photo/');
//フォント
define('FONT_DIR', WWW_ROOT . DS . 'files' . DS . 'font' . DS);
//お塩
define('SECURITY_SALT', 'thisissalt');
