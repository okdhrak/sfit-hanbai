<?php
//profile
$this->assign('description', '会社概要｜');
$this->assign('keywords', '会社概要,');
$this->assign('title', '会社概要｜');
?>

<section>
	<div id="mainVisual" class="profile_h mb-40">
		<h1>会社概要</h1>
	</div>
</section>

<section id="profile">
	<div id="profileIner">
		<h2><?php echo $this->Html->image('content_images/profile-logo.png', array('alt' => '株式会社S-FIT エスフィット')); ?></h2>
		
		<table class="table_profile" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<th>商　号</th>
					<td>株式会社S-FIT [エスフィット] 英語表記 S-FIT CO.,LTD.</td>
				</tr>
				<tr>
					<th>屋　号</th>
					<td>S-FIT不動産販売</td>
				</tr>
				<tr>
					<th>所在地</th>
					<td>〒106-6014 東京都港区六本木1-6-1 泉ガーデンタワー14F(本社)</td>
				</tr>
				<tr>
					<th>免　許</th>
					<td>国土交通大臣(3) 第7352号<br>一級建築士事務所 東京都知事登録 第55878号</td>
				</tr>
				<tr>
					<th>所属団体</th>
					<td>(社)全日本不動産協会 / (社)東京都不動産関連業協会 / (社)不動産保証協会</td>
				</tr>
				<tr>
					<th>TEL</th>
					<td>03-5797-7030(代)</td>
				</tr>
				<tr>
					<th>FAX</th>
					<td>03-5797-7031</td>
				</tr>
				<tr>
					<th>E-MAIL</th>
					<td><?php echo $this->Html->link('info@sfit.co.jp', 'mailto:info@sfit.co.jp', array('escape' => false)); ?></td>
				</tr>
				<tr>
					<th>URL</th>
					<td><?php echo $this->Html->link('http://www.sfit.co.jp', 'http://www.sfit.co.jp', array('target' => '_blank', 'escape' => false)); ?></td>
				</tr>
				<tr>
					<th>設　立</th>
					<td>2003年6月19日</td>
				</tr>
				<tr>
					<th>事業内容</th>
					<td>不動産賃貸仲介事業・プロパティマネジメント事業・不動産売買仲介事業・介護賃貸事業・リノベーション事業・海外投資家向け事業</td>
				</tr>
				<tr>
					<th>事業所</th>
					<td>東京・神奈川・大阪・千葉・愛知・福岡</td>
				</tr>
				<tr>
					<th>資本金</th>
					<td>1億2750万円</td>
				</tr>
				<tr>
					<th>グループ会社</th>
					<td>株式会社S-FITパートナーズ / 株式会社S-FITケア / 喜飛特不動產股份有限公司(台湾)</td>
				</tr>
				<tr>
					<th>代表者</th>
					<td>代表取締役社長 紫原 友規</td>
				</tr>
			</tbody>
		</table>
		
	</div><!-- /#profile -->
</section><!-- /#profileIner -->
