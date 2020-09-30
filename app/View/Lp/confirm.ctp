<?php
$this->assign('description', '家を買おうと思ったら、六本木 泉ガーデンタワー 14階 S-FIT不動産販売までご相談ください！！相談カウンターでお待ちしています。');
$this->assign('keywords', '戸建,土地,中古,マンション,不動産,販売,売買,仲介,港区,渋谷,目黒,世田谷,S-FIT');
$this->assign('title', '家を買おうと思ったらご相談ください！！｜六本木 泉ガーデンタワー 14階 S-FIT不動産販売');
?>

<div id="wrapper">
	
	<header>
		<div class="content">
			<h1><?php echo $this->Html->Image('lp/consultation/logo.png', array('alt' => '泉ガーデンタワー14階 不動産購入相談カウンター')); ?></h1>
			<p class="btn">&nbsp;</p>
		</div>
	</header>
	
	<main role="main" class="pt-85">
		
		<section id="form" class="form column">
			
			<p class="notice">入力内容に誤りがないかご確認ください</p>
			
			<?php echo $this->Form->create('Lp', array('name' => 'tosend', 'novalidate' => true, 'url' => '/lp/confirm/#form', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
			
				<table class="table-inquery" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<th>来場の予約・お問合せ<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span><br><span class="cap02">※複数選択可</span></th>
							<td><?php echo @implode(' / ', $this->request->data['Lp']['book']); ?></td>
						</tr>
						<tr>
							<th>予約のお時間<br><span class="cap02">※お時間をご記入ください</span></th>
							<td><?php echo ($this->request->data['Lp']['book_m']) ? h($this->request->data['Lp']['book_m'] . '月 ') : NULL; ?><?php echo ($this->request->data['Lp']['book_d']) ? h($this->request->data['Lp']['book_d'] . '日 ') : NULL; ?><?php echo ($this->request->data['Lp']['book_t']) ? h($this->request->data['Lp']['book_t'] . '頃') : NULL; ?></td>
						</tr>
					</tbody>
				</table>
				
				<h3>お客様の情報</h3>
				<table class="table-inquery mb-30" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<th>お名前<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
							<td><?php echo h($this->request->data['Lp']['name']); ?></td>
						</tr>
						<tr>
							<th>ふりがな<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
							<td><?php echo h($this->request->data['Lp']['kana']); ?></td>
						</tr>
						<tr>
							<th>ご連絡先<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span><br><span class="cap02">※お電話番号もしくはメールアドレス</span></th>
							<td><?php echo h($this->request->data['Lp']['contact']); ?></td>
						</tr>
					</tbody>
				</table>
				
				<h3>アンケート<span>※ご記入いただくと、ご来店の際、ご相談がスムーズになります。</span></h3>
				<table class="table-inquery mb-30" cellspacing="0" cellpadding="0">
					<tbody>
						<tr>
							<th>お探しの物件種別<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span><br><span class="cap02">※複数選択可</span></th>
							<td><?php echo @implode(' / ', $this->request->data['Lp']['kind']); ?></td>
						</tr>
						<tr>
							<th>お探しのエリア</th>
							<td><?php echo h($this->request->data['Lp']['area']); ?></td>
						</tr>
						<tr>
							<th>その他、ご要望がございましたらご記入ください</th>
							<td><?php echo nl2br(h($this->request->data['Lp']['comment'])); ?></td>
						</tr>
					</tbody>
				</table>
				
				<?php echo $this->Form->input('postData', array('type' => 'hidden', 'value' => json_encode($this->request->data))); ?>
	
				<p class="form_btn"><input type="submit" name="_toback" class="confirm_btn" id="form_back" value="戻って内容を修正する"><input type="submit" name="_tosend" class="confirm_btn" id="form_send" value="この内容で送信する"></p>
			
			<?php echo $this->Form->end(); ?>
			
		</section>
		
	</main>
	
	<footer>
		<div class="content">
			<p class="license">国土交通大臣(3) 第7352号　一級建築士事務所 東京都知事登録 第55878号<?php //echo $this->Html->Image('lp/consultation/footer_license.png', array('alt' => '国土交通大臣(2) 第7352号 一級建築士事務所 東京都知事登録 第55878号')); ?></p>
			<p class="logo"><?php echo $this->Html->Image('lp/consultation/footer_logo.png', array('alt' => 'S-FIT不動産販売')); ?></p>
		</div>
	</footer>
	
</div>


