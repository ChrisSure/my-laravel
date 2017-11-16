<div class="row">
	@if($category->isNotEmpty())
	<ul>
	    <? $traverse = function ($categories, $prefix = '&nbsp;&nbsp;') use (&$traverse) { ?>
			<? foreach ($categories as $category): ?>
				<li style="list-style-type: none;">
					<?=PHP_EOL.$prefix; ?><a href="{{ route('category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
				</li>
				<? $traverse($category->children, $prefix.'&nbsp;&nbsp;&nbsp;&nbsp;');?>
			<? endforeach; ?>
		<? }; ?>
		<? $traverse($category);?>
		@else
			<p>Немає категорій</p>
		@endif
	</ul>
</div>