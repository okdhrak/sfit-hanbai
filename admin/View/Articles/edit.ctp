<?php
$this->assign('description', '');
$this->assign('keywords', '');
$this->assign('title', '物件管理(変更登録)');
?>
<h2><i class="fa fa-pencil-square-o fa-1x fa-fw"></i>物件管理</h2>

<div class="content articles-edit">
	<div class="column">
		<h3><i class="fa fa-caret-square-o-right fa-1x fa-fw"></i>編集登録</h3>
		<p>物件情報の編集登録を行います。</p>
	</div>
	
	<?php echo $this->Form->create('Article', array('novalidate' => true, 'enctype' => 'multipart/form-data', 'inputDefaults' => array('label' => false, 'div' => false))); ?>
		
		<?php echo empty($this->request->data['Article']['id']) ? null : $this->Form->input('id', array('type' => 'hidden')); ?>
		<?php echo empty($this->request->data['Article']['id']) ? null : $this->Form->input('PeculiarPoint.id', array('type' => 'hidden')); ?>
		<?php echo empty($this->request->data['Article']['id']) ? null : $this->Form->input('PmCompany.id', array('type' => 'hidden')); ?>
		<?php echo empty($this->request->data['Article']['id']) ? null : $this->Form->input('ResistationTime.id', array('type' => 'hidden')); ?>
		<?php echo empty($this->request->data['Article']['id']) ? null : $this->Form->input('Flag.id', array('type' => 'hidden')); ?>
		<?php echo empty($this->request->data['Article']['category']) ? null : $this->Form->input('Article.category', array('type' => 'hidden')); ?>
		
		<ul class="tab clearfix">
			<li class="select">基本情報</li>
			<li>種別情報</li>
			<li>管理会社情報</li>
			<li>フラグ情報</li>
			<li>画像情報</li>
		</ul>
		
		<table border="0" cellpadding="0" cellspacing="0" class="form-wrap mb20">
			<tr>
				<th>ID</th>
				<td><?php echo h($this->data['Article']['id']); ?></td>
			</tr>
			<tr>
				<th>物件種別</th>
				<td><?php echo h($categoryList[$this->data['Article']['category']]); ?></td>
			</tr>
		</table>
	
		<table border="0" cellpadding="0" cellspacing="0" class="form-wrap list">
			<tr>
				<th>管理番号<i class="fa fa-exclamation-triangle fa-fw"></i></th>
				<td><?php echo $this->Form->input('mid', array('type' => 'text', /*'label' => false,*//*array('text' => '管理番号'), */'class' => 'mode-disabled')); ?></td>
			</tr>
			<tr>
				<th>物件名<i class="fa fa-exclamation-triangle fa-fw"></i></th>
				<td><?php echo $this->Form->input('name', array('type' => 'text')); ?></td>
			</tr>
			<tr>
				<th>価格<i class="fa fa-exclamation-triangle fa-fw"></i></th>
				<td><?php echo $this->Form->input('price', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' 円')); ?></td>
			</tr>
			<tr>
				<th>交通</th>
				<td>
					<select name="data[Article][traffic][]" id="traffic" style="float:left;" multiple="multiple">
						<?php
						$traffic = unserialize($this->request->data['Article']['traffic']);
						if (empty($traffic)):
							$traffic = array();
						endif;
						
						foreach ($traffic as $key => $val):
							echo '<option value=' . $val . ' selected="selected">' . $val . '</option>';
						endforeach;
						?>
					</select>
					
					<div style="float:left; width:50%; margin-left:20px;">
						<?php echo $this->Form->input('station', array('type' => 'text', 'id' => 'station', 'class' => 'mb5', 'before' => '最寄駅:', 'after' => '<br>')); ?>
						<?php echo $this->Form->input('line', array('type' => 'select', 'id' => 'line', 'class' => 'mb5', 'empty' => '最寄り駅を入力してください', 'before' => '沿　線:', 'after' => '<br>')); ?>
						<?php echo $this->Form->input('walk', array('type' => 'text', 'id' => 'walk', 'class' => 'mb5 mode-disabled', 'before' => '徒　歩:', 'after' => ' 分<br>')); ?>
						
						<div style="margin-top:10px;">
							<input type="button" id="toTraffic" value="追加する">
							<input type="button" id="trafficClear" value="クリア">
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<th>交通(バス)</th>
				<td><?php echo $this->Form->input('bus', array('type' => 'textarea')); ?></td>
			</tr>
			<tr>
				<th>都道府県<i class="fa fa-exclamation-triangle fa-fw"></i></th>
				<td><?php echo $this->Form->input('pref', array('type' => 'select', 'options' => $prefList/*, 'selected' => empty($this->request->data['Article']['pref']) ? '東京都' : $this->request->data['Article']['pref']*/, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>市区町村<i class="fa fa-exclamation-triangle fa-fw"></i></th>
				<td><?php echo $this->Form->input('city', array('type' => 'select', 'options' => $cityList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>物件所在地(町域・丁目)<i class="fa fa-exclamation-triangle fa-fw"></i></th>
				<td><?php echo $this->Form->input('town', array('type' => 'text')); ?></td>
			</tr>
			<tr>
				<th>物件所在地(番地)</th>
				<td><?php echo $this->Form->input('address', array('type' => 'text')); ?></td>
			</tr>
			<tr>
				<th>用途地域①</th>
				<td><?php echo $this->Form->input('district1', array('type' => 'select', 'options' => $districtList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>用途地域②</th>
				<td><?php echo $this->Form->input('district2', array('type' => 'select', 'options' => $districtList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>設備等</th>
				<td><?php echo $this->Form->input('facilities', array('type' => 'textarea')); ?></td>
			</tr>
			<tr>
				<th>備考</th>
				<td><?php echo $this->Form->input('etc', array('type' => 'textarea')); ?></td>
			</tr>
			<tr>
				<th>現況</th>
				<td><?php echo $this->Form->input('state', array('type' => 'select', 'options' => ($this->data['Article']['category'] == 1) ? $landStateList : $buildingStateList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>敷地の権利形態</th>
				<td><?php echo $this->Form->input('rights', array('type' => 'select', 'options' => $rightsList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>引渡し時期</th>
				<td><?php echo $this->Form->input('delivery', array('type' => 'select', 'options' => $deliveryList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>引渡し日(詳細)</th>
				<td><?php echo $this->Form->input('delivery_etc', array('type' => 'text')); ?></td>
			</tr>
			<tr>
				<th>建築確認番号</th>
				<td><?php echo $this->Form->input('building_confirmation', array('type' => 'text')); ?></td>
			</tr>
			<tr>
				<th>開発許可番号</th>
				<td><?php echo $this->Form->input('development_permit', array('type' => 'text')); ?></td>
			</tr>
			<tr>
				<th>取引態様</th>
				<td><?php echo $this->Form->input('account', array('type' => 'select', 'options' => $accountList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>セールスポイント</th>
				<td><?php echo $this->Form->input('sells_point', array('type' => 'textarea')); ?></td>
			</tr>
			<tr>
				<th>タグ</th>
				<td><?php $this->request->data['Article']['tag'] = unserialize($this->request->data['Article']['tag']); ?>
				<?php echo $this->Form->input('tag', array('type' => 'select', 'multiple'=> 'checkbox', 'options' => $tagList, 'class' => 'cb-style')); ?></td>
			</tr>
			
		</table>
		
		<table border="0" cellpadding="0" cellspacing="0" class="form-wrap list" style="display:none;">
		<?php if ($this->request->data['Article']['category'] === '1'): ?>
			<tr>
				<th>土地面積</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_site', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' ㎡')); ?></td>
			</tr>
			<tr>
				<th>総区画数</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_lot', array('type' => 'text', 'class' => 'mode-disabled')); ?></td>
			</tr>
			<tr>
				<th>建ぺい率①</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_site_coverage1', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' %')); ?></td>
			</tr>
			<tr>
				<th>容積率①</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_floorarea_ratio1', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' %')); ?></td>
			</tr>
			<tr>
				<th>建ぺい率②</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_site_coverage2', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' %')); ?></td>
			</tr>
			<tr>
				<th>容積率②</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_floorarea_ratio2', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' %')); ?></td>
			</tr>
			<tr>
				<th>セットバック</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_setback', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' ㎡')); ?></td>
			</tr>
			<tr>
				<th>接道種別①</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_category1', array('type' => 'select', 'options' => $roadList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道方位①</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_direction1', array('type' => 'select', 'options' => $directionList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道接面①</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_length1', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>接道幅員①</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_width1', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>接道種別②</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_category2', array('type' => 'select', 'options' => $roadList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道方位②</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_direction2', array('type' => 'select', 'options' => $directionList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道接面②</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_length2', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>接道幅員②</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_width2', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>接道種別③</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_category3', array('type' => 'select', 'options' => $roadList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道方位③</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_direction3', array('type' => 'select', 'options' => $directionList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道接面③</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_length3', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>接道幅員③</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_width3', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>接道種別④</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_category4', array('type' => 'select', 'options' => $roadList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道方位④</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_direction4', array('type' => 'select', 'options' => $directionList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道接面④</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_length4', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>接道幅員④</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_road_width4', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>地目</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_land_category', array('type' => 'select', 'options' => $landCategoryList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>都市計画</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_urban_plan', array('type' => 'select', 'options' => $urbanPlanList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>建築条件の有無</th>
				<td><?php echo $this->Form->input('PeculiarPoint.t_building_condition', array('type' => 'select', 'options' => $buildingConditionList, 'empty' => '選択してください')); ?></td>
			</tr>
		
		<?php elseif ($this->request->data['Article']['category'] === '2'): ?>
			<tr>
				<th>面積</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_extent', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' ㎡')); ?></td>
			</tr>
			<tr>
				<th>土地面積</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_site', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' ㎡')); ?></td>
			</tr>
			<tr>
				<th>間取り(部屋数)</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_room_num', array('type' => 'text', 'class' => 'mode-disabled')); ?></td>
			</tr>
			<tr>
				<th>間取り(タイプ)</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_room_type', array('type' => 'select', 'options' => $roomTypeList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>築年月</th>
				<td><?php $this->request->data['PeculiarPoint']['k_old'] = unserialize(@$this->request->data['PeculiarPoint']['k_old']); ?>
					<?php
						echo $this->Form->input('PeculiarPoint.k_old', array(
							'type' => 'date',
							//'label' => array('text' => '築年月'),
							'dateFormat' => 'YM',
							'monthNames' => false,
							'empty' => '選択してください',
							'minYear' => date('Y') -60,
							'maxYear' => date('Y') +1,
						));
					?>
				</td>
			</tr>
			<tr>
				<th>建物構造</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_structure', array('type' => 'select', 'options' => $structureList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>建物階数</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_building', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' 階')); ?></td>
			</tr>
			<tr>
				<th>総区画数</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_lot', array('type' => 'text', 'class' => 'mode-disabled')); ?></td>
			</tr>
			<tr>
				<th>建ぺい率①</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_site_coverage1', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' %')); ?></td>
			</tr>
			<tr>
				<th>容積率①</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_floorarea_ratio1', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' %')); ?></td>
			</tr>
			<tr>
				<th>建ぺい率②</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_site_coverage2', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' %')); ?></td>
			</tr>
			<tr>
				<th>容積率②</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_floorarea_ratio2', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' %')); ?></td>
			</tr>
			<tr>
				<th>セットバック</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_setback', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' ㎡')); ?></td>
			</tr>
			<tr>
				<th>接道種別①</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_category1', array('type' => 'select', 'options' => $roadList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道方位①</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_direction1', array('type' => 'select', 'options' => $directionList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道接面①</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_length1', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>接道幅員①</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_width1', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>接道種別②</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_category2', array('type' => 'select', 'options' => $roadList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道方位②</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_direction2', array('type' => 'select', 'options' => $directionList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道接面②</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_length2', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>接道幅員②</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_width2', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>接道種別③</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_category3', array('type' => 'select', 'options' => $roadList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道方位③</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_direction3', array('type' => 'select', 'options' => $directionList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道接面③</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_length3', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>接道幅員③</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_width3', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>接道種別④</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_category4', array('type' => 'select', 'options' => $roadList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道方位④</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_direction4', array('type' => 'select', 'options' => $directionList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>接道接面④</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_length4', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>接道幅員④</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_road_width4', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>地目</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_land_category', array('type' => 'select', 'options' => $landCategoryList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>都市計画</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_urban_plan', array('type' => 'select', 'options' => $urbanPlanList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>新築</th>
				<td><?php echo $this->Form->input('PeculiarPoint.k_new', array('type' => 'select', 'options' => $newList, 'empty' => '選択してください')); ?></td>
			</tr>
			
		<?php elseif ($this->request->data['Article']['category'] === '3'): ?>
			<tr>
				<th>面積(建物専有部)</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_extent', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>バルコニー面積</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_extent_bal', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' m')); ?></td>
			</tr>
			<tr>
				<th>管理費</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_management_cost', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' 円')); ?></td>
			</tr>
			<tr>
				<th>修繕積立金</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_repair_cost', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' 円')); ?></td>
			</tr>
			<tr>
				<th>間取り(部屋数)</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_room_num', array('type' => 'text', 'class' => 'mode-disabled')); ?></td>
			</tr>
			<tr>
				<th>間取り(タイプ)</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_room_type', array('type' => 'select', 'options' => $roomTypeList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>築年月</th>
				<td>
				<?php $this->request->data['PeculiarPoint']['m_old'] = unserialize(@$this->request->data['PeculiarPoint']['m_old']); ?>
				<?php
					echo $this->Form->input('PeculiarPoint.m_old', array(
						'type' => 'date',
						//'label' => array('text' => '築年月'),
						'dateFormat' => 'YM',
						'monthNames' => false,
						'empty' => '選択してください',
						'minYear' => date('Y') -60,
						'maxYear' => date('Y') +1,
					));
				?>
				</td>
			</tr>
			<tr>
				<th>建物構造</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_structure', array('type' => 'select', 'options' => $structureList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>建物階数</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_building', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' 階建て')); ?></td>
			</tr>
			<tr>
				<th>所在階</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_floor', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' 階')); ?></td>
			</tr>
			<tr>
				<th>総戸数</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_rooms', array('type' => 'text', 'class' => 'mode-disabled', 'after' => ' 戸')); ?></td>
			</tr>
			<tr>
				<th>窓の向き</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_window', array('type' => 'select', 'options' => $directionList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>部屋外設備</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_outside_facilities', array('type' => 'textarea')); ?></td>
			</tr>
			<tr>
				<th>管理形態</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_management', array('type' => 'select', 'options' => $managementList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>駐車場</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_parking', array('type' => 'select', 'options' => $existenceList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>駐輪場</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_bicycle_parking', array('type' => 'select', 'options' => $existenceList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>バイク置き場</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_bike_parking', array('type' => 'select', 'options' => $existenceList, 'empty' => '選択してください')); ?></td>
			</tr>
			<tr>
				<th>新築</th>
				<td><?php echo $this->Form->input('PeculiarPoint.m_new', array('type' => 'select', 'options' => $newList, 'empty' => '選択してください')); ?></td>
			</tr>
			
		<?php else: ?>
			<p>その他のカテゴリー</p>
		<?php endif; ?>
		</table>
		
		<table border="0" cellpadding="0" cellspacing="0" class="form-wrap list" style="display:none;">
			<tr>
				<th>会社名</th>
				<td><?php echo $this->Form->input('PmCompany.name', array('type' => 'text')); ?></td>
			</tr>
			<tr>
				<th>電話番号</th>
				<td><?php echo $this->Form->input('PmCompany.tel', array('type' => 'text', 'class' => 'mode-disabled')); ?></td>
			</tr>
		</table>
		
		<table border="0" cellpadding="0" cellspacing="0" class="form-wrap list" style="display:none;">
			<tr>
				<th>状態フラグ</th>
				<td><?php echo $this->Form->input('Flag.status', array('legend' => false, 'type' => 'radio', 'value' => $this->request->data['Flag']['status'], 'options' => $statusList)); ?></td>
			</tr>
			<tr>
				<th>公開フラグ</th>
				<td><?php echo $this->Form->input('Flag.restriction', array('legend' => false, 'type' => 'radio', 'value' => $this->request->data['Flag']['restriction'], 'options' => $restrictionList)); ?></td>
			</tr>
			<tr>
				<th>おすすめフラグ</th>
				<td><?php echo $this->Form->input('Flag.recommend', array('legend' => false, 'type' => 'radio', 'value' => $this->request->data['Flag']['recommend'], 'options' => $recommendList)); ?></td>
			</tr>
			<tr>
				<th>削除フラグ</th>
				<td><?php echo $this->Form->input('Flag.delete', array('legend' => false, 'type' => 'radio', 'value' => $this->request->data['Flag']['delete'], 'options' => $deleteList)); ?></td>
			</tr>
			
		</table>
		
		<table border="0" cellpadding="0" cellspacing="0" class="form-wrap list" style="display:none;">
			<div id="loading"></div>
			<?php //echo $this->Form->input('Photo.files.', array('type' => 'file', 'id' => 'files', 'multiple', 'class' => 'fileUpload test')); ?>
			<tr>
				<th>メイン画像</th>
				<td>
					<p class="st"><i class="fa fa-camera-retro"></i>1枚のみ登録可能(登録済みの画像があれば、登録前に削除を行ってください)</p>
					<?php if (@$uploadErrors['main']) { echo '<p class="error">※' . @$uploadErrors['main'] . '</p>'; } ?>
					<?php echo $this->SiteUtil->printRegistedPhoto($this->data['Article']['id'], 'm'); ?>
					<div class="wgt-fileupload-col">
					<?php echo $this->Form->input('Photo.main.', array('type' => 'file', 'id' => 'main', 'label' => false, /*'multiple', */'class' => 'fileUpload')); ?>
					<output id="list-main"></output>
					</div>
				</td>
			</tr>
			<tr>
				<th>間取図画像</th>
				<td>
					<p class="st"><i class="fa fa-camera-retro"></i>1枚のみ登録可能(登録済みの画像があれば、登録前に削除を行ってください)</p>
					<?php if (@$uploadErrors['plan']) { echo '<p class="error">※' . @$uploadErrors['plan'] . '</p>'; } ?>
					<?php echo $this->SiteUtil->printRegistedPhoto($this->data['Article']['id'], 'p'); ?>
					<div class="wgt-fileupload-col">
					<?php echo $this->Form->input('Photo.plan.', array('type' => 'file', 'id' => 'plan', 'label' => false, /*'multiple', */'class' => 'fileUpload')); ?>
					<output id="list-plan"></output>
					</div>
				</td>
			</tr>
			<tr>
				<th>その他の写真</th>
				<td>
				<p class="st"><i class="fa fa-camera-retro"></i>10枚まで登録可能(登録済みの画像が10枚を超える場合は、登録前に削除を行ってください)</p>
				<?php if (@$uploadErrors['other']) { echo '<p class="error">※' . @$uploadErrors['other'] . '</p>'; } ?>
				<?php echo $this->SiteUtil->printRegistedPhoto($this->data['Article']['id'], 'o'); ?>
				<div class="wgt-fileupload-col">
				<?php echo $this->Form->input('Photo.other.', array('type' => 'file', 'id' => 'other', 'label' => false, 'multiple', 'class' => 'fileUpload')); ?>
				<output id="list-other"></output>
				</div>
				</td>
			</tr>
			
		</table>
		
		<table border="0" cellpadding="0" cellspacing="0" class="form-wrap" style="border-top:none;">
			<tr>
				<td colspan="2" style="border-top:none; background:#f2f2f2;"><?php echo $this->Form->submit(empty($this->data['Article']['id']) ? '　追加　' : '　編集　'); ?></td>
			</tr>
		</table>
		
	<?php echo $this->Form->end(); ?>
	
</div>

