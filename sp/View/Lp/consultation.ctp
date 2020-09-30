<?php
$this->assign('description', '家を買おうと思ったら、六本木 泉ガーデンタワー 14階 S-FIT不動産販売までご相談ください！！相談カウンターでお待ちしています。');
$this->assign('keywords', '戸建,土地,中古,マンション,不動産,販売,売買,仲介,港区,渋谷,目黒,世田谷,S-FIT');
$this->assign('title', '家を買おうと思ったらご相談ください！！｜六本木 泉ガーデンタワー 14階 S-FIT不動産販売');
?>

<div id="wrapper">
	
	<header>
		<div class="content">
			<h1><?php echo $this->Html->Image('lp/consultation/logo.png', array('alt' => '泉ガーデンタワー14階 不動産購入相談カウンター')); ?></h1>
		</div>
	</header>
	
	<main role="main">
		<section class="content">
			<div class="mv">
				<p><?php echo $this->Html->Image('lp/consultation/mv.png', array('alt' => 'S-FIT不動産販売 不動産購入相談カウンター')); ?></p>
				<div class="wrap">
					<p class="btn"><?php echo $this->Html->link($this->Html->image('lp/consultation/btn_contact.png', array('alt' => 'ご予約はコチラから')), '#form', array('escape' => false)); ?></p>
					<p class="txt">些細な疑問にもお答えいたします。</p>
				</div>
			</div>
			<div class="headline">
				<h3><?php echo $this->Html->Image('lp/consultation/headline_title.png', array('alt' => 'どんな疑問もお答えします！')); ?></h3>
				<ul class="column">
					<li>
						<h3><?php echo $this->Html->Image('lp/consultation/headline_li_img01.png', array('alt' => '売買仲介の経験豊富なスタッフが様々な疑問にお答えします。')); ?></h3>
						<p>不動産売買仲介の業界でも経験値の高いスタッフばかりです。知識も豊富ですのでいろいろとご相談ください。</p>
					</li>
					<li>
						<h3><?php echo $this->Html->Image('lp/consultation/headline_li_img02.png', array('alt' => '市場に出回らない物件情報も豊富です！')); ?></h3>
						<p>売買市場に出回らない土地・物件情報も数多く取扱っています。お客様のご希望を教えてください。</p>
					</li>
					<li>
						<h3><?php echo $this->Html->Image('lp/consultation/headline_li_img03.png', array('alt' => 'S-FITの総合力を活かして他社にはできないご提案')); ?></h3>
						<p>リノベーションや新築の設計、コーディネイトもできるのがS-FIT。ワンストップでご提案いたします。</p>
					</li>
				</ul>
			</div>
			
			<div class="contact column">
				<p class="btn-form"><?php echo $this->Html->link($this->Html->image('lp/consultation/btn_reserve.png', array('alt' => 'ご予約はコチラから')), '#form', array('escape' => false)); ?></p>
				<p class="btn-tel"><?php echo $this->Html->link($this->Html->image('lp/consultation/btn_reserve_tel.png', array('alt' => '電話でのご予約')), 'tel:03-5797-7019', array('escape' => false)); ?></p>
			</div>
			
			<div class="staff column">
				<p class="txt">土地/ 戸建/ マンション全てのご提案が可能です。<br>不動産選びのポイントから、住宅ローン、業界の裏話まで(笑)<br>親切/ 丁寧をモットーに明確なご説明をさせて頂きます。<br>わからない事がございましたら、何でも御相談くださいませ。<br>お待ちしております。</p>
			</div>
			
			<div class="customer column">
				<h3><?php echo $this->Html->Image('lp/consultation/customer_title.png', array('alt' => 'ご利用いただいたお客様の声')); ?></h3>
				<ul>
					<li>
						<p class="img"><?php echo $this->Html->image('lp/consultation/customer_li_icon01.png', array('alt' => 'Yさん20代女性')); ?></p>
						<p class="txt"><span>Yさん 20代女性</span>オフィスが近いので、お昼休みにおじゃましました。自分の年収から購入できる金額の目安などが聞けて良かったです。</p>
					</li>
					<li>
						<p class="img"><?php echo $this->Html->image('lp/consultation/customer_li_icon02.png', array('alt' => 'Oさん30代男性')); ?></p>
						<p class="txt"><span>Oさん 30代男性</span>中古マンションを探していました。オフィスが近く、仕事終わりに相談にのってくれて助かりました。</p>
					</li>
					<li>
						<p class="img"><?php echo $this->Html->image('lp/consultation/customer_li_icon03.png', array('alt' => 'Dさん40代女性')); ?></p>
						<p class="txt"><span>Dさん 40代女性</span>所有しているワンルームマンションの売却の相談に伺いました。不動産管理もしている会社だったので、売却せず賃貸する相談ができました。</p>
					</li>
				</ul>
			</div>
			
			<div class="qanda column">
				<h3><?php echo $this->Html->Image('lp/consultation/qanda_title.png', array('alt' => 'よくあるご質問')); ?></h3>
				<ul>
					<li>
						<p class="question">相談するメリットは何ですか？</p>
						<p class="answer">通常の不動産仲介は、気に入った物件を問合せてから、契約・ローンのお話などを決めていくのが一般的です。相談窓口にお越しいただければ、お客様のライフスタイルや、ローン返済のことなども含めてご相談いただけます。</p>
					</li>
					<li>
						<p class="question">無理やり奨められることはないですか？</p>
						<p class="answer">お客様のライフスタイル（居住地、家族構成、年収等）をお伺いし、資金計画を含め、お話をお伺いいたしますので、無理なお勧めはいたしません。場合によっては、「買わないほうがいい」とアドバイスさせていただくこともございます。</p>
					</li>
					<li>
						<p class="question">いつでも相談できますか？</p>
						<p class="answer">弊社は六本木一町目の泉ガーデンタワー14 階にございます。泉ガーデンタワーや近辺にお勤めの方でしたら、お昼休みや終業後にでもお気軽にお越しください。また担当が不在の場合もございますので、事前にご予約頂ますようにお願い致します。</p>
					</li>
					<li>
						<p class="question">購入以外でもご相談できますか？</p>
						<p class="answer">可能でございます。弊社・S-FIT は総合不動産企業として、賃貸仲介から新築建設、管理まで幅広く事業をしております。お手持ちの物件の売却や不動産運営などのご相談もお気軽にお伺いください。</p>
					</li>
				</ul>
			</div>
			
			<div class="contact column">
				<p class="btn-form"><?php echo $this->Html->link($this->Html->image('lp/consultation/btn_reserve.png', array('alt' => 'ご予約はコチラから')), '#form', array('escape' => false)); ?></p>
				<p class="btn-tel"><?php echo $this->Html->link($this->Html->image('lp/consultation/btn_reserve_tel.png', array('alt' => '電話でのご予約')), 'tel:03-5797-7019', array('escape' => false)); ?></p>
			</div>
			
		</section>
		
		<section class="info column">
			<h3 class="mb-40"><?php echo $this->Html->Image('lp/consultation/info_title.png', array('alt' => '')); ?></h3>
			<p><?php echo $this->Html->link($this->Html->image('lp/consultation/btn_search.png', array('alt' => 'S-FIT不動産販売で物件を探す')), '/', array('target' => '_blank', 'escape' => false)); ?></p>
			<div class="contact">
				<p class="title">来場のご予約・お問合せ</p>
				<p class="tel"><?php echo $this->Html->link($this->Html->image('lp/consultation/btn_tel.png', array('alt' => '電話でのご予約')), 'tel:03-5797-7019', array('target' => '_blank', 'escape' => false)); ?></p>
			</div>
		</section>
		
		<section id="form">
			<div id="formIner">
			
			<?php echo $this->Form->create('Lp', array('name' => 'tocheck', 'novalidate' => true, 'url' => '/lp/consultation/#form', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
			
				<?php if (isset($validationErrors)): ?>
				<div class="missing">
					<ul>
						<?php foreach ($validationErrors as $val): ?>
						<li>■<?php echo h($val[0]); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
				
				<div class="form_box">
					<div class="form_box_01 <?php echo (isset($validationErrors['book'])) ? 'error' : ''; ?>">
						<div class="form_txt_01"><span class="sq">■</span>お名前<span class="i">[必須]</span><span class="caption">※複数選択可</span></div>
						<div class="form_input_01"><?php echo $this->Form->input('book', array('type' => 'select', 'multiple'=> 'checkbox', 'label' => false, 'class' => 'cb-style265', 'options' => $bookList)); ?></div>
					</div>
					<div class="form_box_01">
						<div class="form_txt_01"><span class="sq">■</span>予約のお時間<span class="caption">※予約の場合、お時間を記入ください</span></div>
						<div class="form_input_01"><?php echo $this->Form->input('book_m', array('type' => 'select', 'label' => false, 'class' => 'select-box', 'options' => $monthList, 'empty' => '選択してください', 'after' => ' 月')); ?><?php echo $this->Form->input('book_d', array('type' => 'select', 'label' => false, 'class' => 'select-box', 'options' => $dayList, 'empty' => '選択してください', 'after' => ' 日')); ?><?php echo $this->Form->input('book_t', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '午後2時30分', 'after' => ' 頃')); ?></div>
					</div>
				</div>
				
				<h3>お客様の情報</h3>
				<div class="form_box">
					<div class="form_box_01 <?php echo (isset($validationErrors['name'])) ? 'error' : ''; ?>">
						<div class="form_txt_01"><span class="sq">■</span>お名前<span class="i">[必須]</span></div>
						<div class="form_input_01"><?php echo $this->Form->input('name', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) 山田 太郎')); ?></div>
					</div>
					
					<div class="form_box_01 <?php echo (isset($validationErrors['kana'])) ? 'error' : ''; ?>">
						<div class="form_txt_01"><span class="sq">■</span>ふりがな<span class="i">[必須]</span></div>
						<div class="form_input_01"><?php echo $this->Form->input('kana', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) やまだ たろう')); ?></div>
					</div>
					<div class="form_box_01 <?php echo (isset($validationErrors['contact'])) ? 'error' : ''; ?>">
						<div class="form_txt_01"><span class="sq">■</span>ご連絡先<span class="i">[必須]</span><span class="caption">※電話番号またはメールアドレスをご記入ください</span></div>
						<div class="form_input_01"><?php echo $this->Form->input('contact', array('type' => 'text', 'label' => false, 'class' => 'inp01 mode-disabled', 'placeholder' => '例) 03-0000-0000 または example@sfit.co.jp')); ?></div>
					</div>
					
				</div>
				
				<h3>アンケート<span>※ご記入いただくと、ご来店の際、ご相談がスムーズになります。</span></h3>
				<div class="form_box">
					<div class="form_box_01 <?php echo (isset($validationErrors['kind'])) ? 'error' : ''; ?>">
						<div class="form_txt_01"><span class="sq">■</span>お名前<span class="i">[必須]</span><span class="caption">※複数選択可</span></div>
						<div class="form_input_01"><?php echo $this->Form->input('kind', array('type' => 'select', 'multiple'=> 'checkbox', 'label' => false, 'class' => 'cb-style265', 'options' => $kindList)); ?></div>
					</div>
					<div class="form_box_01">
						<div class="form_txt_01"><span class="sq">■</span>お探しのエリア</div>
						<div class="form_input_01"><?php echo $this->Form->input('area', array('type' => 'text', 'label' => false, 'class' => 'inp01', 'placeholder' => '例) 港区六本木')); ?></div>
					</div>
					<div class="form_box_01">
						<div class="form_txt_01"><span class="sq">■</span>その他、ご希望の条件等</div>
						<div class="form_input_01"><?php echo $this->Form->input('comment', array('type' => 'textarea', 'label' => false, 'class' => 'textarea01', 'placeholder' => '例) ご自由にご記入ください')); ?></div>
					</div>
				</div>
				
				<p class="form_privecy">弊社個人情報の取扱いにつきましては<br><?php echo $this->Html->link('こちらのページ', array('controller' => 'pages', 'action' => 'display', 'privacypolicy'), array('target' => '_blank', 'escape' => false)); ?>をご確認ください。<br>記載内容に同意して頂ける方は<br>次へお進みください。</p>
	<p class="form_btn"><a href="javascript:;" onclick="javascript:tocheck.submit();">個人情報保護方針を了承のうえ<br><span>入力内容を確認する</span></a></p>
			
			<?php echo $this->Form->end(); ?>
			
			</div>
		</section>
		
	</main>
	
	<footer>
		<div class="content">
			<p class="license">国土交通大臣(3) 第7352号 一級建築士事務所 東京都知事登録 第55878号<?php //echo $this->Html->Image('lp/consultation/footer_license.png', array('alt' => '国土交通大臣(2) 第7352号 一級建築士事務所 東京都知事登録 第55878号')); ?></p>
			<p class="logo"><?php echo $this->Html->Image('lp/consultation/footer_logo.png', array('alt' => 'S-FIT不動産販売')); ?></p>
		</div>
	</footer>
	
</div>


