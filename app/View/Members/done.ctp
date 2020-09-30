<?php
$this->assign('description', '会員登録｜');
$this->assign('keywords', '会員登録,');
$this->assign('title', '会員登録｜');
?>

<?php
//コンバージョンタグの読み込み
$this->start('tag-thanks');
echo $this->element('modules/adtag/thanks');
$this->end();
?>

<section id="visualTc2">
	<div id="visualTc2Inr" class="mv-complete">
		<h1>仮登録を受け付けました。</h1>
	</div>
</section><!-- /#visualTc2 -->

<section id="form">
	<div id="formIner">
		<div class="complete-text">
		<p>仮登録を受け付けました。<br>まだ、本登録は完了していません。<br>ご入力いただいたメールアドレスへ本登録のご案内をお送りしましたので、<br>本登録手続きを行ってください。</p>
		<p class="backtop"><a href="/">TOPページへ戻る</a></p>
		</div>
	</div>
</section><!-- /#form -->
