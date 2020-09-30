<?php
$this->assign('description', '物件のお問合せ｜');
$this->assign('keywords', '物件のお問合せ,');
$this->assign('title', '物件のお問合せ｜');

//pr($_POST);
//pr($this->request->data);
?>

<section id="visualTc2">
	<div id="visualTc2Inr" class="br3">
		<h1>お問合せ</h1>
		<p>お問合せページです。<br>各項目ご入力の上、確認ページへとお進みください。<br>必須項目は必ずご入力お願いします。<br>「個人情報の取り扱いについて」にご同意の上、「同意して確認画面へ進む」ボタンを押してください。</p>
	</div><!-- /#visualTc2Iner -->
</section><!-- /#visualTc2 -->

<section id="form">
<div id="formIner">
<?php echo $this->Form->create('Property', array('name' => 'tosend', 'novalidate' => true, 'action' => '/confirm', 'inputDefaults' => array('label' => false, 'div' => false))); ?>

	<h2>お問い合わせする物件をご確認ください</h2>
	<div id="propertywrapper">
		<div class="property clrFix">
			<div class="cat">
				<h2 class="<?php echo h('cat0' . $this->request->data['Property']['d_category']); ?>"><?php echo h($categoryList[$this->request->data['Property']['d_category']]); ?>
				<?php echo $this->Form->input('d_category', array('type' => 'hidden', 'value' => $this->request->data['Property']['d_category'])); ?></h2>
			</div>
			<div class="price">
				<p><span>価格</span><?php echo h($this->request->data['Property']['d_price']); ?>
				<?php echo $this->Form->input('d_price', array('type' => 'hidden', 'value' => $this->request->data['Property']['d_price'])); ?></p>
			</div>
			<div class="ac-ad">
				<p class="access"><?php echo h($this->request->data['Property']['d_traffic']); ?>
				<?php echo $this->Form->input('d_traffic', array('type' => 'hidden', 'value' => $this->request->data['Property']['d_traffic'])); ?></p>
				<p class="address"><?php echo h($this->request->data['Property']['d_address']); ?>
				<?php echo $this->Form->input('d_address', array('type' => 'hidden', 'value' => $this->request->data['Property']['d_address'])); ?></p>
			</div>
		</div>
	</div><!-- /#propertywrapper -->
	
	<h2>お客様の情報</h2>
	<table class="table-inquery mb-30" cellspacing="0" cellpadding="0">
		<tbody>
			<tr>
				<th>お問合せ内容<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo @implode(' / ', $this->request->data['Property']['kind']); ?></td>
			</tr>
			<tr>
				<th>お問合せ内容を<br>ご記入ください</th>
				<td><?php echo nl2br(h($this->request->data['Property']['comment'])); ?></td>
			</tr>
			<tr>
				<th>お名前<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Property']['name']); ?></td>
			</tr>
			<tr>
				<th>ふりがな<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Property']['kana']); ?></td>
			</tr>
			<tr>
				<th>メールアドレス<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Property']['mail']); ?></td>
			</tr>
			<tr>
				<th>電話番号<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Property']['tel']); ?></td>
			</tr>
			<tr>
				<th>都道府県<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($prefList[$this->request->data['Property']['pref']]); ?></td>
			</tr>
			<tr>
				<th>市区群町名・番地<span class="i"><img src="/img/form_images/requisite.jpg" alt="必須"></span></th>
				<td><?php echo h($this->request->data['Property']['address']); ?></td>
			</tr>
		</tbody>
	</table>
	
	<?php echo $this->Form->input('postData', array('type' => 'hidden', 'value' => json_encode($this->request->data))); ?>
	
	<p class="form_btn"><input type="submit" name="_toback" class="confirm_btn" id="form_back" value="戻って内容を修正する"><input type="submit" name="_tosend" class="confirm_btn" id="form_send" value="この内容で送信する"></p>
<?php echo $this->Form->end(); ?>
</div><!-- /#formIner -->
</section><!-- /#form -->