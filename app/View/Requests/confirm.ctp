<?php
$this->assign('description', '物件のリクエスト｜');
$this->assign('keywords', '物件のリクエスト,');
$this->assign('title', '物件のリクエスト｜');

//pr($_POST);
//pr($this->request->data);
?>

<section id="visualTc2">
	<div id="visualTc2Inr" class="br3">
		<h1>物件のリクエスト</h1>
		<p>物件のリクエストページです。<br>各項目ご入力の上、確認ページへとお進みください。<br>必須項目は必ずご入力お願いします。<br>「個人情報の取り扱いについて」にご同意の上、「同意して確認画面へ進む」ボタンを押してください。</p>
	</div><!-- /#visualTc2Iner -->
</section><!-- /#visualTc2 -->

<section id="form">
<div id="formIner">
<?php echo $this->Form->create('Request', array('name' => 'tosend', 'novalidate' => true, 'action' => '/confirm', 'inputDefaults' => array('label' => false, 'div' => false))); ?>

	<h2>ご要望の物件について</h2>
	<table class="table-inquery mb-30" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>ご希望の物件種別<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo @implode(' / ', $this->request->data['Request']['m_kind']); ?></td>
			</tr>
			<tr>
				<th>ご希望の住所<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Request']['m_address']); ?></td>
			</tr>
			<tr>
				<th>ご希望の路線<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Request']['m_line']); ?></td>
			</tr>
			<tr>
				<th>建物(専有)面積</th>
				<td><?php echo ($this->request->data['Request']['m_extent']) ? h($this->request->data['Request']['m_extent'] . $this->request->data['Request']['m_extent_unit']) : NULL; ?></td>
			</tr>
			<tr>
				<th>土地面積</th>
				<td><?php echo ($this->request->data['Request']['m_site']) ? h($this->request->data['Request']['m_site'] . $this->request->data['Request']['m_site_unit']) : NULL; ?></td>
			</tr>
			<tr>
				<th>間取り</th>
				<td><?php echo @implode('、', $this->request->data['Request']['m_type']); ?></td>
			</tr>
			<tr>
				<th>ご希望価格</th>
				<td><?php echo ($this->request->data['Request']['m_price']) ? h($this->SiteUtil->priceFormat($this->request->data['Request']['m_price'])).'万円位' : NULL; ?></td>
			</tr>
			<tr>
				<th>お買い替え</th>
				<td><?php echo ($this->request->data['Request']['m_replacing']) ? h($this->request->data['Request']['m_replacing']) : NULL; ?></td>
			</tr>
			<tr>
				<th>購入希望時期</th>
				<td><?php echo ($this->request->data['Request']['m_period']) ? h($this->request->data['Request']['m_period']) : NULL; ?></td>
			</tr>
			<tr>
				<th>お問合せ内容を<br>ご記入ください</th>
				<td><?php echo ($this->request->data['Request']['m_comment']) ? nl2br(h($this->request->data['Request']['m_comment'])) : NULL; ?></td>
			</tr>
			
		</tbody>
	</table>
	
	<h2>お客様の情報</h2>
	<table class="table-inquery mb-30" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>お名前<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Request']['name']); ?></td>
			</tr>
			<tr>
				<th>ふりがな<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Request']['kana']); ?></td>
			</tr>
			<tr>
				<th>メールアドレス<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Request']['mail']); ?></td>
			</tr>
			<tr>
				<th>電話番号<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Request']['tel']); ?></td>
			</tr>
			<tr>
				<th>都道府県<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($prefList[$this->request->data['Request']['pref']]); ?></td>
			</tr>
			<tr>
				<th>市区群町名・番地<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Request']['address']); ?></td>
			</tr>
		</tbody>
	</table>
	
	<?php echo $this->Form->input('postData', array('type' => 'hidden', 'value' => json_encode($this->request->data))); ?>
	
	<p class="form_btn"><input type="submit" name="_toback" class="confirm_btn" id="form_back" value="戻って内容を修正する"><input type="submit" name="_tosend" class="confirm_btn" id="form_send" value="この内容で送信する"></p>
<?php echo $this->Form->end(); ?>
</div><!-- /#formIner -->
</section><!-- /#form -->