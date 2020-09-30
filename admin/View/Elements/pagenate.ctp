<?php
//pagenate
?>
<div class="paginateLinks">
	<p class="count">
		<?php
		echo $this->Paginator->counter(array('format' => '%count%件中 '));
		echo $this->Paginator->counter(array('format' => '{:start}～{:end}件を表示 '));
		echo $this->Paginator->counter(array('format' => '({:page}/{:pages})'));
		?>
	</p>
	<p class="pages">
		<?php echo ($this->Paginator->hasPrev()) ? $this->Paginator->prev('前へ') : NULL; ?>
		<?php echo $this->Paginator->numbers(array('separator' => '&nbsp;')); ?>
		<?php echo ($this->Paginator->hasNext()) ? $this->Paginator->next('次へ') : NULL; ?>
	</p>
</div>
