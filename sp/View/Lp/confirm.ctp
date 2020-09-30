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
		
		<section id="form" class="mt-30">
			<div id="formIner">
			
			<p class="notice">入力内容に誤りがないかご確認ください</p>
			
			<?php echo $this->Form->create('Lp', array('name' => 'tocheck', 'novalidate' => true, 'url' => '/lp/confirm/#form', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
				
				<div class="form_box">
					<div class="form_box_01">
						<div class="form_txt_01"><span class="sq">■</span>お名前<span class="i">[必須]</span><span class="caption">※複数選択可</span></div>
						<div class="form_input_01"><?php echo @implode(' / ', $this->request->data['Lp']['book']); ?></div>
					</div>
					<div class="form_box_01">
						<div class="form_txt_01"><span class="sq">■</span>予約のお時間<span class="caption">※予約の場合、お時間を記入ください</span></div>
						<div class="form_input_01"><?php echo ($this->request->data['Lp']['book_m']) ? h($this->request->data['Lp']['book_m'] . '月 ') : NULL; ?><?php echo ($this->request->data['Lp']['book_d']) ? h($this->request->data['Lp']['book_d'] . '日 ') : NULL; ?><?php echo ($this->request->data['Lp']['book_t']) ? h($this->request->data['Lp']['book_t'] . '頃') : NULL; ?></div>
					</div>
				</div>
				
				<h3>お客様の情報</h3>
				<div class="form_box">
					<div class="form_box_01">
						<div class="form_txt_01"><span class="sq">■</span>お名前<span class="i">[必須]</span></div>
						<div class="form_input_01"><?php echo h($this->request->data['Lp']['name']); ?></div>
					</div>
					
					<div class="form_box_01">
						<div class="form_txt_01"><span class="sq">■</span>ふりがな<span class="i">[必須]</span></div>
						<div class="form_input_01"><?php echo h($this->request->data['Lp']['kana']); ?></div>
					</div>
					<div class="form_box_01">
						<div class="form_txt_01"><span class="sq">■</span>ご連絡先<span class="i">[必須]</span><span class="caption">※電話番号またはメールアドレスをご記入ください</span></div>
						<div class="form_input_01"><?php echo h($this->request->data['Lp']['contact']); ?></div>
					</div>
					
				</div>
				
				<h3>アンケート<span>※ご記入いただくと、ご来店の際、ご相談がスムーズになります。</span></h3>
				<div class="form_box">
					<div class="form_box_01">
						<div class="form_txt_01"><span class="sq">■</span>お名前<span class="i">[必須]</span><span class="caption">※複数選択可</span></div>
						<div class="form_input_01"><?php echo @implode(' / ', $this->request->data['Lp']['kind']); ?></div>
					</div>
					<div class="form_box_01">
						<div class="form_txt_01"><span class="sq">■</span>お探しのエリア</div>
						<div class="form_input_01"><?php echo h($this->request->data['Lp']['area']); ?></div>
					</div>
					<div class="form_box_01">
						<div class="form_txt_01"><span class="sq">■</span>その他、ご希望の条件等</div>
						<div class="form_input_01"><?php echo nl2br(h($this->request->data['Lp']['comment'])); ?></div>
					</div>
				</div>
				
				<?php echo $this->Form->input('postData', array('type' => 'hidden', 'value' => json_encode($this->request->data))); ?>
	
				<p class="form_btn mb-20"><input type="submit" name="_toback" class="confirm_btn" id="form_back" value="戻って内容を修正する"/></p>
				<p class="form_btn"><input type="submit" name="_tosend" class="confirm_btn" id="form_send" value="この内容で送信する"/></p>
			
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


