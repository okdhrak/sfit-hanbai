<?php
/*
サーチ
 */
?>

<p class="minihead"><?php echo $this->Html->image('search_txt_04.png', array('alt' => 'CATEGORY')); ?></p>
<?php echo $this->Form->create('Search', array('name' => 'tosearch', 'novalidate' => true, 'action' => '/result', 'inputDefaults' => array('label' => false, 'div' => false, 'error' => false))); ?>
	<div id="asideSearch" class="main_unit01 clrFix">
		<div class="clrFix">
			<div class="condSelet main_condSelet clrFix first">
				<p class="main_cat_btn"><span id="btnSrc01" class="btnSrc"><?php echo $this->Html->image('search_btn_01_a.png', array('alt' => '戸建', 'class' => 'first')); ?></span></p>
				<p class="main_cat_select">
					<label for="as01" class="asLabel"><?php echo $this->Form->input('kdt_n', array('type' => 'checkbox', 'id' => 'as01'/*, 'checked' => true*/)); ?>新築</label><br>
					<label for="as02" class="asLabel"><?php echo $this->Form->input('kdt_o', array('type' => 'checkbox', 'id' => 'as02'/*, 'checked' => true*/)); ?>中古</label>
				</p>
			</div>

			<div class="condSelet main_condSelet clrFix">
				<p class="main_cat_btn"><span id="btnSrc02" class="btnSrc"><?php echo $this->Html->image('search_btn_02_off.png', array('alt' => '土地')); ?></span></p>
				<p class="main_cat_select">
					<label for="as03" class="asLabel"><?php echo $this->Form->input('tc_a', array('type' => 'checkbox', 'id' => 'as03')); ?>建築条件あり</label><br>
					<label for="as04" class="asLabel"><?php echo $this->Form->input('tc_n', array('type' => 'checkbox', 'id' => 'as04')); ?>建築条件なし</label>
				</p>
			</div>

			<div class="condSelet main_condSelet clrFix last">
				<p class="main_cat_btn"><span id="btnSrc03" class="btnSrc"><?php echo $this->Html->image('search_btn_03_off.png', array('alt' => 'マンション')); ?></span></p>
				<p class="main_cat_select">
					<label for="as05" class="asLabel"><?php echo $this->Form->input('mns_n', array('type' => 'checkbox', 'id' => 'as05')); ?>新築</label><br>
					<label for="as06" class="asLabel"><?php echo $this->Form->input('mns_o', array('type' => 'checkbox', 'id' => 'as06')); ?>中古</label>
				</p>
			</div>
			
		</div>
		<p class="multiply"><?php echo $this->Html->image('search_back_01.png', array('alt' => 'multiply')); ?></p>
	</div>

	<div class="main_unit02">
		<p class="minihead"><?php echo $this->Html->image('search_txt_05.png', array('alt' => 'area')); ?></p>
		<p class="main_unit_select">
			<?php echo $this->Form->input('area', array('type' => 'select', 'options' => $this->SiteUtil->modifyAreaArr($areaList), 'empty' => '住所を選択する', 'class' => '', 'id' => 'asAdr'));?>
		</p>
		<p class="main_unit_select mb-00">
			<?php echo $this->Form->input('line', array('type' => 'select', 'options' => $this->SiteUtil->modifyLineArr($lineList), 'empty' => '路線を選択する', 'class' => '', 'id' => 'asLine'));?>
		</p>
		<p class="station" id="stationLink">
			<a href="/sp/searches/station/">＋駅を指定する</a>
			<?php echo $this->Form->input('stations', array('type' => 'hidden')); ?>
		</p>
		<!--<p class="station" id="stationLink">
		<a href="/sp/stations.html">＋駅を指定する</a>
		</p>-->
		<?php echo (@$this->request->data['Search']['line'] && @$this->request->data['Search']['stations']) ? $this->SiteUtil->getSelectedStations(@$this->request->data['Search']['stations']) : NULL; ?>
	</div>

	<div class="main_unit03">
		<p class="minihead"><?php echo $this->Html->image('search_txt_06.png', array('alt' => 'budget')); ?></p>
		<p class="main_unit_select">
			<?php echo $this->Form->input('budget', array('type' => 'select', 'options' => $budgetList, 'empty' => '予算を選択する', 'class' => '', 'id' => 'asBudget')); ?>
		</p>
	</div>

	<div class="main_unit04">
		<p><input class="btnOpa" type="image" name="" src="/sp/img/search_btn_04.png" alt="検索"></p>
	</div>
	
	<p class="equal"><?php echo $this->Html->image('search_back_02.png', array('alt' => 'equal')); ?></p>
<?php echo $this->Form->end(); ?>
