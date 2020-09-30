<?php
/*
物件一覧ページ絞込み
 */
?>
<div class="pagenavi">
	<div class="top clrFix">
		<div class="figure">
			<p><?php
				echo $this->Paginator->counter(array('format' => "物件数<span>%count%</span>件中&nbsp;"));
				echo $this->Paginator->counter(array('format' => "{:start}～{:end}件を表示"));
			?></p>
		</div>
		<div class="species">
			<select name="species-change" class="select-box" onChange="location.href=value">
				<option value="#">物件の並び替え</option>
				<option value="<?php echo h($here); ?>sort:price/direction:asc">価格が低い順</option>
				<option value="<?php echo h($here); ?>sort:price/direction:desc">価格が高い順</option>
			</select>
		</div>
		<div class="number">
			<select name="number-change" class="select-box" onChange="location.href=value">
				<option value="#">表示件数の変更</option>
				<option value="<?php echo h($here); ?>limit:10">10件を表示</option>
				<option value="<?php echo h($here); ?>limit:20">20件を表示</option>
				<option value="<?php echo h($here); ?>limit:50">50件を表示</option>
			</select>
		</div>
	</div>
	
	<div class="paginateLinks">
		<?php echo ($this->Paginator->hasPrev()) ? $this->Paginator->prev('前ページ') : NULL; ?>
		<?php echo ($this->Paginator->hasNext()) ? $this->Paginator->next('次ページ') : NULL; ?>
		<?php echo $this->Paginator->numbers(array('separator' => '&nbsp;&nbsp;&nbsp;', 'before' => '<div class="links">', 'after' => '</div>'/*, 'first' => 1, 'last' => 1, 'ellipsis' => '...'*/, 'modulus' => 6)); ?>
		
		
	</div>
	
</div><!-- /.pagenavi -->
