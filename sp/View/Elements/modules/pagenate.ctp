<?php
/*
タグ
 */
?>

<section>
	<div id="display" class="clrFix">
		<div class="figure">
			<!--<p>物件数<span>51</span>件中<br>1〜10件を表示</p>-->
			<p>物件数<span><?php echo $count; ?></span>件
			<?php /*
				echo $this->Paginator->counter(array('format' => "物件数<span>%count%</span>件中&nbsp;"));
				echo $this->Paginator->counter(array('format' => "{:start}～{:end}件を表示"));
			*/ ?></p>
		</div>
		<div class="species">
			<select name="species-change" class="select-box" onChange="location.href=value">
				<option value="#">物件の並び替え</option>
				<option value="<?php echo h($here); ?>price:asc">価格が低い順</option>
				<option value="<?php echo h($here); ?>price:desc">価格が高い順</option>
			</select>
		</div>
	</div>
</section>
