<?php
$this->assign('description', '家を買おうと思ったら、六本木 泉ガーデンタワー 14階 S-FIT不動産販売までご相談ください！！相談カウンターでお待ちしています。');
$this->assign('keywords', '戸建,土地,中古,マンション,不動産,販売,売買,仲介,港区,渋谷,目黒,世田谷,S-FIT');
$this->assign('title', '家を買おうと思ったらご相談ください！！｜六本木 泉ガーデンタワー 14階 S-FIT不動産販売');
?>

<?php
//コンバージョンタグの読み込み
$this->start('tag-thanks');
echo $this->element('modules/adtag/thanks');
$this->end();
?>

<div id="wrapper">
	
	<header>
		<div class="content">
			<h1><?php echo $this->Html->Image('lp/consultation/logo.png', array('alt' => '泉ガーデンタワー14階 不動産購入相談カウンター')); ?></h1>
			<p class="btn">&nbsp;</p>
		</div>
	</header>
	
	<main role="main" class="pt-85">
		
		<section id="form" class="pt-100">
			<div id="formIner">
				<div class="complete-text">
					<p>お問合せありがとうございました。<br>担当から追ってご連絡させていただきます。</p>
					<p class="form-comp-ad">株式会社S-FIT 不動産開発事業部<br>〒106-6014 東京都港区六本木1-6-1 泉ガーデンタワー14F<br>TEL 03-5797-7019 | FAX 03-5797-7019 | <?php echo $this->Html->link('hanbai@sfit.co.jp', 'mailto:hanbai@sfit.co.jp', array('escape' => false)); ?></p>
					<p class="backtop"><?php echo $this->Html->link('TOPページへ戻る', '/', array('escape' => false)); ?></p>
				</div>
			</div>
		</section>
		
	</main>
	
	<footer>
		<div class="content">
			<p class="license">国土交通大臣(3) 第7352号　一級建築士事務所 東京都知事登録 第55878号<?php //echo $this->Html->Image('lp/consultation/footer_license.png', array('alt' => '国土交通大臣(2) 第7352号 一級建築士事務所 東京都知事登録 第55878号')); ?></p>
			<p class="logo"><?php echo $this->Html->Image('lp/consultation/footer_logo.png', array('alt' => 'S-FIT不動産販売')); ?></p>
		</div>
	</footer>
	
</div>


