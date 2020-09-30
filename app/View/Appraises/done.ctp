<?php
$this->assign('description', 'ご売却・ご相談、審査のお申込み｜');
$this->assign('keywords', 'ご売却・ご相談、審査のお申込み,');
$this->assign('title', 'ご売却・ご相談、審査のお申込み｜');
?>

<?php
//コンバージョンタグの読み込み
$this->start('tag-thanks');
echo $this->element('modules/adtag/thanks');
$this->end();
?>

<section id="visualTc2">
	<div id="visualTc2Inr" class="mv-complete">
		<h1>お問合わせありがとうございました。</h1>
	</div><!-- /#visualTc2Iner -->
</section><!-- /#visualTc2 -->

<section id="form">
	<div id="formIner">
		<div class="complete-text">
			<p>お問合わせありがとうございました。<br>担当から追ってご連絡させていただきます。</p>
			<p class="form-comp-ad">株式会社S-FIT 不動産開発事業部<br>〒106-6014 東京都港区六本木1-6-1 泉ガーデンタワー14F<br>TEL 03-5797-7019 | FAX 03-5797-7019 | <a href="mailto:hanbai@sfit.co.jp">hanbai@sfit.co.jp</a></p>
			<p class="backtop"><a href="/">TOPページへ戻る</a></p>
		</div>
	</div><!-- /#formIner -->
</section><!-- /#form -->

