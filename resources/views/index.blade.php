@extends('_master')

@section('content')
	@foreach($blogs as $blog)
		<div class="new">
			<div id="contain">
                            <div id="flavor">{{$blog->flavor}}</div>
                            <div id="size">{{$blog->size}}</div>
                        </div>
			<div id="comments">{{$blog->comments}} </div>
		</div>
	@endforeach
@stop