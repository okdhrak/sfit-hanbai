<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/searches', array('controller' => 'searches', 'action' => 'result'));
	Router::connect('/profile', array('controller' => 'pages', 'action' => 'display', 'profile'));
	Router::connect('/privacypolicy', array('controller' => 'pages', 'action' => 'display', 'privacypolicy'));
	Router::connect('/satisfaction', array('controller' => 'pages', 'action' => 'display', 'satisfaction'));
	Router::connect('/step', array('controller' => 'pages', 'action' => 'display', 'step'));
	Router::connect('/tax_buying', array('controller' => 'pages', 'action' => 'display', 'tax_buying'));
	Router::connect('/tax_selling', array('controller' => 'pages', 'action' => 'display', 'tax_selling'));
	
	
	Router::connect('/:controller/:id', array('action' => 'index', 'method' => 'GET'), array('id' => '[0-9]+'));
	
	//Router::connect('/specials/kyodo3', array('controller' => 'specials', 'action' => 'display', 'kyodo3'));
	Router::connect('/specials/*', array('controller' => 'specials', 'action' => 'display'));//アクションを動的に実行
	
	Router::connect('/renovations/*', array('controller' => 'renovations', 'action' => 'result'));//URLのパラメータよりエリア情報を取得

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
