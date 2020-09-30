<?php
/*
物件検索(2カラムページ)
 */
?>
<section id="asideSearch">
<?php echo $this->Form->create('Search', array('name' => 'tosearch', 'novalidate' => true, 'action' => '/result', 'inputDefaults' => array('label' => false, 'div' => false, 'error' => false))); ?>
	<div class="unit01">
		<p><img src="/img/aside_txt_01.png" alt="良い家を探す"></p>
	</div>
	<div class="unit02">
		<div class="title clrFix">
			<p class="left minihead"><img src="/img/aside_txt_02.png" alt="CATEGORY"></p>
			<p class="right minihead"><img src="/img/aside_txt_03.png" alt="CONDITON"></p>
		</div>
		<div class="condSelet clrFix first">
			<p class="left"><span id="btnSrc01" class="btnSrc"><img src="/img/aside_btn_01_a.png" alt="戸建" class="first"></span></p>
			<p class="right">
				<label for="as01" class="asLabel"><?php echo $this->Form->input('kdt_n', array('type' => 'checkbox', 'id' => 'as01'/*, 'checked' => true*/)); ?>新築</label><br>
				<label for="as02" class="asLabel"><?php echo $this->Form->input('kdt_o', array('type' => 'checkbox', 'id' => 'as02'/*, 'checked' => true*/)); ?>中古</label>
			</p>
		</div>
		<div class="condSelet clrFix">
			<p class="left"><span id="btnSrc02" class="btnSrc"><img src="/img/aside_btn_02_off.png" alt="土地"></span></p>
			<p class="right">
				<label for="as03" class="asLabel"><?php echo $this->Form->input('tc_a', array('type' => 'checkbox', 'id' => 'as03')); ?>建築条件あり</label><br>
				<label for="as04" class="asLabel"><?php echo $this->Form->input('tc_n', array('type' => 'checkbox', 'id' => 'as04')); ?>建築条件なし</label>
			</p>
		</div>
		<div class="condSelet clrFix last">
			<p class="left"><span id="btnSrc03" class="btnSrc"><img src="/img/aside_btn_03_off.png" alt="マンション"></span></p>
			<p class="right">
				<label for="as05" class="asLabel"><?php echo $this->Form->input('mns_n', array('type' => 'checkbox', 'id' => 'as05')); ?>新築</label><br>
				<label for="as06" class="asLabel"><?php echo $this->Form->input('mns_o', array('type' => 'checkbox', 'id' => 'as06')); ?>中古</label>
			</p>
		</div>
	</div>
	<div class="unit03">
		<p class="minihead"><img src="/img/aside_txt_04.png" alt="AREA"></p>
		<p><?php echo $this->Form->input('area', array('type' => 'select', 'options' => $this->SiteUtil->modifyAreaArr($areaList), 'empty' => '住所を選択する', 'class' => '', 'id' => 'asAdr'));?></p>
		<p><?php echo $this->Form->input('line', array('type' => 'select', 'options' => $this->SiteUtil->modifyLineArr($lineList), 'empty' => '路線を選択する', 'class' => '', 'id' => 'asLine'));?></p>
		<p class="station" id="stationLink">
			<a href="/searches/station/">＋駅を指定する</a>
			<?php echo $this->Form->input('stations', array('type' => 'hidden')); ?>
		</p>
		<?php echo (@$this->request->data['Search']['line'] && @$this->request->data['Search']['stations']) ? $this->SiteUtil->getSelectedStations(@$this->request->data['Search']['stations']) : NULL; ?>
		<!--<div class="unit04">
			<p class="minihead"><img src="/img/aside_txt_14.png" alt="指定駅"></p>
			<ul>
				<li>東京</li>
				<li>有楽町</li>
				<li>新橋</li>
			</ul>
		</div>-->
	</div>
	<div class="unit05">
		<p class="minihead"><img src="/img/aside_txt_05.png" alt="BUDGET"></p>
		<p><?php echo $this->Form->input('budget', array('type' => 'select', 'options' => $budgetList, 'empty' => '予算を選択する', 'class' => '', 'id' => 'asBudget')); ?></p>
	</div>
	<div class="unit06">
		<p><input class="btnOpa" type="image" name="" src="/img/aside_btn_04.png" alt="検索"></p>
	</div>
<?php echo $this->Form->end(); ?>
</section><!-- /#asideSearch -->
