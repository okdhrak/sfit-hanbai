<?php
$this->assign('description', '物件のお問合せ｜');
$this->assign('keywords', '物件のお問合せ,');
$this->assign('title', '物件のお問合せ｜');
?>

<?php
//コンバージョンタグの読み込み
$this->start('tag-thanks');
echo $this->element('modules/adtag/thanks');
$this->end();
?>

<section>
	<div id="mainVisual" class="br1 mb-50">
		<h1>お問合せ<br>ありがとうございました。</h1>
	</div><!-- /#mainVisual -->
</section>

<section id="form">
	<div id="formIner">
		<div class="complete_txt">
			<p class="complete_txt_01">お問合わせいただき、<br>ありがとうございました。<br>担当から追ってご連絡させていただきます。</p>
			<p class="complete_txt_01">株式会社S-FIT 不動産開発事業部</p>
			<p class="complete_txt_01">〒106-6014<br>東京都港区六本木1-6-1 泉ガーデンタワー14F</p>
			<p class="complete_txt_01 mb-00"><a href="tel:03-5797-7019">TEL 03-5797-7019</a><br><a href="mailto:hanbai@sfit.co.jp">hanbai@sfit.co.jp</a></p>
			<p class="backtop"><a href="/sp/">TOPページへ戻る</a></p>
		</div>
	</div><!-- /#formIner -->
</section><!-- /#form -->
