<?php
/**
 * This is email configuration file.
 *
 * Use it to configure email transports of Cake.
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
 * @since         CakePHP(tm) v 2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 *
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *		Mail 		- Send using PHP mail function
 *		Smtp		- Send using SMTP
 *		Debug		- Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email. Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 *
 */
class EmailConfig {

	public $default = array(
		'transport' => 'Mail',
		'charset' => 'ISO-2022-JP',//utf-8
		'from' => 'example@sfit.co.jp',
		'subject' => 'これはテストメールです',
		//'headerCharset' => 'utf-8',
		'emailFormat' => 'text',
		//'template' => 'default',
	);
	
	public $contact = array(
		'transport' => 'Mail',
		'emailFormat' => 'text',
		'headerCharset' => 'utf-8',
		'charset' => 'ISO-2022-JP',
		'from' => 'hanbai@sfit.co.jp',
		'subject' => '【S-FIT不動産販売 -お問合せ-】',
	);
	
	public $member = array(
		'transport' => 'Mail',
		'emailFormat' => 'text',
		'headerCharset' => 'utf-8',
		'charset' => 'ISO-2022-JP',
		//'from' => 'hanbai@sfit.co.jp',
		'subject' => '【S-FIT不動産販売 -会員登録-】',
	);
	
	/*public $member_response = array(
		'transport' => 'Mail',
		'emailFormat' => 'text',
		'headerCharset' => 'utf-8',
		'charset' => 'ISO-2022-JP',
		'from' => 'hanbai@sfit.co.jp',
		'X-Mailer' => 'Mailer',//
		'additionalParameters' => '-f haibai@sfit.co.jp',//
		'subject' => '【S-FIT 不動産販売】ご登録ありがとうございます',
	);*/
	public $member_response = array(
		'transport' => 'Smtp',
		'from' => array('hanbai@sfit.co.jp' => 'S-FIT不動産販売'),
		'host' => 'sfit.co.jp',
		'port' => 25,
		'timeout' => 30,
		'username' => 'hanbai',
		'password' => '5kwhkkrq',
		'client' => null,
		'log' => true,
		'charset' => 'ISO-2022-JP',
		'headerCharset' => 'utf-8',
		'emailFormat' => 'text',
		'subject' => '【S-FIT 不動産販売】ご登録ありがとうございます',
	);
	
	/*public $member_getpass = array(
		'transport' => 'Mail',
		'emailFormat' => 'text',
		'headerCharset' => 'utf-8',
		'charset' => 'ISO-2022-JP',
		'from' => 'hanbai@sfit.co.jp',
		'subject' => '【S-FIT 不動産販売】パスワード再発行手続きのお知らせ',
	);*/
	public $member_getpass = array(
		'transport' => 'Smtp',
		'from' => array('hanbai@sfit.co.jp' => 'S-FIT不動産販売'),
		'host' => 'sfit.co.jp',
		'port' => 25,
		'timeout' => 30,
		'username' => 'hanbai',
		'password' => '5kwhkkrq',
		'client' => null,
		'log' => true,
		'charset' => 'ISO-2022-JP',
		'headerCharset' => 'utf-8',
		'emailFormat' => 'text',
		'subject' => '【S-FIT 不動産販売】パスワード再発行手続きのお知らせ',
	);
	
	/*public $member_getpass_fin = array(
		'transport' => 'Mail',
		'emailFormat' => 'text',
		'headerCharset' => 'utf-8',
		'charset' => 'ISO-2022-JP',
		'from' => 'hanbai@sfit.co.jp',
		'subject' => '【S-FIT 不動産販売】パスワード再発行のお知らせ',
	);*/
	public $member_getpass_fin = array(
		'transport' => 'Smtp',
		'from' => array('hanbai@sfit.co.jp' => 'S-FIT不動産販売'),
		'host' => 'sfit.co.jp',
		'port' => 25,
		'timeout' => 30,
		'username' => 'hanbai',
		'password' => '5kwhkkrq',
		'client' => null,
		'log' => true,
		'charset' => 'ISO-2022-JP',
		'headerCharset' => 'utf-8',
		'emailFormat' => 'text',
		'subject' => '【S-FIT 不動産販売】パスワード再発行のお知らせ',
	);
	
	public $property = array(
		'transport' => 'Mail',
		'emailFormat' => 'text',
		'headerCharset' => 'utf-8',
		'charset' => 'ISO-2022-JP',
		'from' => 'hanbai@sfit.co.jp',
		'subject' => '【S-FIT不動産販売 -物件のお問合せ-】',
	);
	
	public $appraise = array(
		'transport' => 'Mail',
		'emailFormat' => 'text',
		'headerCharset' => 'utf-8',
		'charset' => 'ISO-2022-JP',
		'from' => 'hanbai@sfit.co.jp',
		'subject' => '【S-FIT不動産販売 -ご売却・ご相談、審査のお申込み-】',
	);
	
	public $request = array(
		'transport' => 'Mail',
		'emailFormat' => 'text',
		'headerCharset' => 'utf-8',
		'charset' => 'ISO-2022-JP',
		'from' => 'hanbai@sfit.co.jp',
		'subject' => '【S-FIT不動産販売 -物件のリクエスト-】',
	);
	public $lp_consultation = array(
		'transport' => 'Mail',
		'emailFormat' => 'text',
		'headerCharset' => 'utf-8',
		'charset' => 'ISO-2022-JP',
		'from' => 'someone@example.ne.jp',
		'subject' => '【S-FIT不動産販売 -相談会予約・お問合せ-】',
	);
	

	public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('site@localhost' => 'My Site'),
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => false,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $fast = array(
		'from' => 'you@localhost',
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => null,
		'replyTo' => null,
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => null,
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'Smtp',
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

}
