<?php
$this->assign('description', 'お問合せ｜');
$this->assign('keywords', 'お問合せ,');
$this->assign('title', 'お問合せ｜');
?>

<?php
//コンバージョンタグの読み込み
$this->start('tag-thanks');
echo $this->element('modules/adtag/thanks');
$this->end();

//$this->Blocks->set('tag-thanks', $this->element('modules/banner'));
?>

<section id="visualTc2">
	<div id="visualTc2Inr" class="mv-complete">
		<h1>お問合せありがとうございました。</h1>
	</div><!-- /#visualTc2Iner -->
</section><!-- /#visualTc2 -->

<section id="form">
<div id="formIner">
	<div class="complete-text">
		<p>お問合せありがとうございました。<br>担当から追ってご連絡させていただきます。</p>
		<p class="form-comp-ad">株式会社S-FIT 不動産開発事業部<br>〒106-6014 東京都港区六本木1-6-1 泉ガーデンタワー14F<br>TEL 03-5797-7019 | FAX 03-5797-7019 | <a href="mailto:hanbai@sfit.co.jp">hanbai@sfit.co.jp</a></p>
		<p class="backtop"><a href="/">TOPページへ戻る</a></p>
	</div>
</div><!-- /#formIner -->
</section><!-- /#form -->