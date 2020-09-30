<?php
/*
物件検索(トップページ)
 */

//pr($_POST);
//pr($artNum);
?>
<div id="content">
<div id="mainSearch" class="clrFix">

<h2 id="h2_pls" class="clrFix">
<span id="pleasure_01"><img src="/img/search_txt_01.png" alt="PLEASURE IN MY HOME"></span>
<span id="pleasure_02"><img src="/img/search_txt_02.png" alt="良い家を探す"></span>
</h2>

<div id="mainSearchInr" class="clrFix">
<?php echo $this->Form->create('Search', array('name' => 'tosearch', 'novalidate' => true, 'action' => '/result', 'inputDefaults' => array('label' => false, 'div' => false, 'error' => false))); ?>
	<div class="main_unit01">
		<div class="main_title clrFix">
			<p class="main_left minihead"><img src="/img/search_txt_02-03.png" alt="CATEGORY"></p>
			<p class="main_right minihead"><img src="/img/search_txt_04.png" alt="CNDITION"></p>
		</div>
		<div class="condSelet main_condSelet clrFix first">
			<p class="main_left"><span id="btnSrc01" class="btnSrc"><img src="/img/search_btn_01_a.png" alt="戸建"></span></p>
			<p class="main_right">
				<label for="as01" class="asLabel"><?php echo $this->Form->input('kdt_n', array('type' => 'checkbox', 'id' => 'as01', 'checked' => true)); ?>新築</label><br>
				<label for="as02" class="asLabel"><?php echo $this->Form->input('kdt_o', array('type' => 'checkbox', 'id' => 'as02', 'checked' => true)); ?>中古</label>
			</p>
		</div>
		<div class="condSelet main_condSelet clrFix">
			<p class="main_left"><span id="btnSrc02" class="btnSrc"><img src="/img/search_btn_02_off.png" alt="土地"></span></p>
			<p class="main_right">
				<label for="as03" class="asLabel"><?php echo $this->Form->input('tc_a', array('type' => 'checkbox', 'id' => 'as03')); ?>建築条件あり</label><br>
				<label for="as04" class="asLabel"><?php echo $this->Form->input('tc_n', array('type' => 'checkbox', 'id' => 'as04')); ?>建築条件なし</label>
			</p>
		</div>
		<div class="condSelet main_condSelet clrFix last">
			<p class="main_left"><span id="btnSrc03" class="btnSrc"><img src="/img/search_btn_03_off.png" alt="マンション"></span></p>
			<p class="main_right">
				<label for="as05" class="asLabel"><?php echo $this->Form->input('mns_n', array('type' => 'checkbox', 'id' => 'as05')); ?>新築</label><br>
				<label for="as06" class="asLabel"><?php echo $this->Form->input('mns_o', array('type' => 'checkbox', 'id' => 'as06')); ?>中古</label>
			</p>
		</div>
	</div>
	
	<div class="main_unit02">
		<p class="minihead"><img src="/img/search_txt_05.png" alt="AREA"></p>
		<p><?php echo $this->Form->input('area', array('type' => 'select', 'options' => $this->SiteUtil->modifyAreaArr($areaList), 'empty' => '住所を選択する', 'class' => '', 'id' => 'asAdr'));?></p>
		<p><?php echo $this->Form->input('line', array('type' => 'select', 'options' => $this->SiteUtil->modifyLineArr($lineList), 'empty' => '路線を選択する', 'class' => '', 'id' => 'asLine'));?></p>
		<p class="station" id="stationLink">
			<a href="">＋駅を指定する</a>
			<?php echo $this->Form->input('stations', array('type' => 'hidden')); ?>
		</p>
		<div class="main_unit03">
			<p class="minihead"><img src="/img/search_txt_06.png" alt="BUDGET"></p>
			<p><?php echo $this->Form->input('budget', array('type' => 'select', 'options' => $budgetList, 'empty' => '予算を選択する', 'class' => '', 'id' => 'asBudget')); ?></p>
		</div>
	</div>
	
	<div class="main_unit04">
		<p class="minihead"><img src="/img/search_txt_07.png" alt="SEARCH"></p>
		<p><input class="btnOpa" type="image" name="" src="/img/search_btn_04.png" alt="検索"></p>
	</div>
<?php echo $this->Form->end(); ?>

<p class="minihead"><img src="/img/search_txt_08.png" alt="MEMBER"></p>
<?php echo $this->element('modules/main_search_member', array()); ?>
</div>

</div><!-- /#mainSearch -->
</div><!-- /#content -->