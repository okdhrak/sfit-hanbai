<?php
$this->assign('description', '不動産を売却するときにかかる税金｜');
$this->assign('keywords', '不動産を売却するときにかかる税金,');
$this->assign('title', '不動産を売却するときにかかる税金｜');
?>

<section id="mainVisualTc">
	<div id="mainVisualTcInr" class="mainVisualTcTaxBg">
		<h1>不動産を売却するときにかかる税金</h1>
	</div>
</section><!-- /#mainVisualTc -->

<div id="bread">
	<ul>
		<li><a href="/">home</a></li>
		<li class="current">不動産を売却するときにかかる税金</li>
	</ul>
</div><!-- /#bread -->

<div id="content">
	<div id="contentInr">
		<main id="main">
			<div id="mainInr" class="tax">
				<h2 class="sub-title mb-10">不動産を売却するときの税金を把握しましょう。</h2>
				<p class="mb-30">不動産を売却して得た利益を譲渡所得といいます。譲渡所得に対しては、他の所得と分離して所得税と住民税が課税されます。なお、譲渡所得がマイナスの場合には課税されることはありません。</p>
				
				<article>
					<h3><span>長期譲渡所得と短期譲渡所得の区分</span></h3>
					<p>土地建物の譲渡所得は、長期譲渡所得と短期譲渡所得に分類され、税額もそれぞれに分けて計算されます。</p>
					<p class="calc" style="text-align: left; padding-left:40px;">長期譲渡所得<br>譲渡した年の1月1日現在で所有期間が5年を超えるもの。<br class="mb-10">短期譲渡所得<br>譲渡した年の1月1日現在で所有期間が5年以下のもの。</p>
					<table border="0" cellpadding="0" cellspacing="0" summary="新築住宅を取得した場合" class="mb-20">
						<caption style="font-weight: bold;">所有期間…譲渡した年の1月1日現在で何年が経過しているかで求めます。</caption>
						<tr>
							<th width="">平成22年</th>
							<th width="">平成23年</th>
							<th width="">平成24年</th>
							<th width="">平成25年</th>
							<th width="">平成26年</th>
							<th width="">平成27年</th>
							<th width="105px">平成28年</th>
						</tr>
						<tr height="220">
							<td valign="top"><?php echo $this->Html->image('tax_selling/term.png', array('alt' => '譲渡所得所有期間', 'style' => 'position: absolute; top: 80px; right: 0;')); ?></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					</table>
					<span class="note">平成22年10月1日に購入した資産を平成27年11月1日に譲渡した場合、11月1日で満5年を超えても、譲渡した平成27年の1月1日で5年を超えなければ長期譲渡所得となりません。平成28年1月1日以降に譲渡した場合に長期譲渡所得となります。</span>
				</article>
				
				<article>
					<h3><span>譲渡所得の計算</span></h3>
					<p class="calc">譲渡所得 ＝ 譲渡収入金額<sup>※1</sup>－（取得費<sup>※2</sup> ＋ 譲渡費用<sup>※3</sup>）</p>
					<p>※1：土地・建物の譲渡代金、固定資産税・都市計画税の精算金<br class="mb-10">※2：取得費<br>取得費とは、譲渡した土地や建物などの資産の取得に要した費用です。購入代金のほか、購入時に要した仲介手数料や登録免許税などの税金、登記費用、土地建物の購入資金の借入利子のうち、その土地建物を実際に使用開始する日までの期間に対応する部分の利子、取得後に支出した改良費、設備費などが含まれます。<br>なお、建物の取得費は、所有期間中の減価償却費相当額※を差し引いて計算します。<br class="mb-10">※減価償却費相当額とは、資産価値が利用や時間の経過に伴って減少することに応じて、一定の方法によって減価償却分を算出するものです。<br>取得費が分からない場合には、売買代金の5%を取得費（概算取得費）とすることができます。<br class="mb-10">※3：譲渡費用<br>譲渡費用は、土地建物を売却するために要した費用で、売却のための仲介手数料や登録免許税とその費用※、売買契約書に貼付した印紙税などが含まれます。※譲渡する物件の抵当権抹消費用は含まれません。</p>
					<p class="calc">課税譲渡所得 ＝ 譲渡所得 －（特別控除<sup>※4</sup>）</p>
					<p>※4：居住用の3,000万円特別控除の特例等</p>
				</article>
				
				<article>
					<h3><span>不動産を譲渡したときの特例</span></h3>
					<p>不動産を譲渡したときには、譲渡所得税や住民税がかかりますが、マイホーム（居住用の住宅）を売却した場合には、税金を軽減する様々な特例があります。<br>各特例の諸条件に関しては、<?php echo $this->Html->link('国税庁のサイト', 'https://www.nta.go.jp/', array('target' => '_blank', 'style' => 'text-decoration:underline;')); ?>でご確認ください。</p>
					<p><span class="bold">●3,000万円特別控除</span>居住用住宅を譲渡した場合に、譲渡所得から特別控除として最大3,000万円を差し引くことができるという特例です。</p>
					<p><span class="bold">●10年超所有軽減税率の特例</span>10年超所有している住居を譲渡する場合で、所定の要件を満たすものについては、長期譲渡所得に対する税率が軽減されます。</p>
					<p><span class="bold">●特定居住用財産の買換え特例</span>（適用期限は平成29年12月31日まで）住居を買い換える際、売却した住居について譲渡益が発生した場合に、一定の要件のもと、譲渡益に対する課税を将来に繰り延べることができる特例です。</p>
					<p><span class="bold">●特定居住用財産の譲渡損失の損益通算及び繰越控除</span>5年を超えて保有する居住用財産を売却した際に、住宅ローンが残っており、かつ売却損が出た場合、この売却損を一定の限度でその年の他の所得から差し引くことができ、その年に差し引きしきれなかった金額については翌年以降3年間繰り越して控除できるという制度です。</p>
					<p><span class="bold">●居住用財産の買換え等の場合の譲渡損失の損益通算及び繰越控除の特例</span>5年を超えて保有する居住用財産を売却して所定の住宅に買い換えた際に、売却損が出た場合、この売却損をその年の他の所得と損益通算でき、損益通算しても赤字となった金額については翌年以降3年間繰り越して所得から控除できる制度です。</p>
				</article>
				
			</div><!-- /#mainInr -->
		</main><!-- /#main -->
		
		<aside id="aside">
			<div id="asideInr">
				<?php echo $this->element('modules/pop_count', array()); ?>
				<?php echo $this->element('modules/search', array()); ?>
				<?php echo $this->element('modules/member', array()); ?>
				<?php echo $this->element('modules/banner', array()); ?>
				<?php echo $this->element('modules/button', array()); ?>
				<?php echo $this->element('modules/share', array()); ?>
			</div><!-- /#asideInr -->
		</aside><!-- /#aside -->
	</div><!-- /#contentInr -->
</div><!-- /#content -->
