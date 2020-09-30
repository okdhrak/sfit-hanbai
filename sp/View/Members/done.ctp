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

<section>
	<div id="mainVisual" class="br1 mb-50">
		<h1>ありがとうございます。<br>仮登録を受け付けました。</h1>
	</div>
</section>

<section id="form">
	<div id="formIner">
		<div class="complete_txt">
			<p class="complete_txt_01">仮登録を受け付けました。<br>まだ、本登録は完了していません。<br>ご入力いただいたメールアドレスへ本登録のご案内をお送りしましたので<br>本登録手続きを行ってください。</p>
			<p class="complete_txt_01 mb-00"><?php echo $this->Html->link('TOPページへ戻る', '/', array('escape' => false)); ?></p>
		</div>
	</div><!-- /#formIner -->
</section><!-- /#form -->
