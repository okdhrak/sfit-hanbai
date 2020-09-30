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
?>

<section>
	<div id="mainVisual" class="br1 mb-50">
		<h1>お問合せ<br />ありがとうございました。</h1>
	</div><!-- /#mainVisual -->
</section>

<section id="form">
	<div id="formIner">
		<div class="complete_txt">
			<p class="complete_txt_01">お問合わせいただき、<br>ありがとうございました。<br>担当から追ってご連絡させていただきます。</p>
			<p class="complete_txt_01">株式会社S-FIT 不動産開発事業部</p>
			<p class="complete_txt_01">〒106-6014<br>東京都港区六本木1-6-1<br>泉ガーデンタワー14F</p>
			<p class="complete_txt_01"><a href="tel:03-5797-7019">TEL 03-5797-7019</a><br />
			<a href="mailto:hanbai@sfit.co.jp">hanbai@sfit.co.jp</a></p>
			<p class="complete_txt_01 mb-00"><?php echo $this->Html->link('TOPページへ戻る', '/', array('escape' => false)); ?></p>
		</div>
	</div><!-- /#formIner -->
</section><!-- /#form -->
