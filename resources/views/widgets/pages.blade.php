<div class="links" style="text-align: center;">
	@if($pages->isNotEmpty())
	    @foreach($pages as $value)
	        <a href="{{ route('pages', ['slug' => $value->slug]) }}">{{ $value->name }}</a>
	    @endforeach
	@else
		<p>Немає сторінок</p>
	@endif
</div>