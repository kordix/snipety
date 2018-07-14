@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-md-12" >
    <div class="panel panel-default col-md-5" style="margin-right:5px;height:150px">
        <div class="panel-body" style="font-size:18px">{!! nl2br($question->question)!!}</div>
    </div>

<div class="panel panel-default col-md-6">
    <div id="answer" class="hidden">
        <div class="panel-body" style="font-size:20px"><pre class="language-javascript"><code contenteditable class='language-javascript no-whitespace-normalization' >{!! nl2br($question->answer) !!}</code></pre></div>
</div>
<button id="button" class="btn btn-default">Pokaż/schowaj</button>
</div>

    </div>
    {{-- <div class="col-md-5" id="dupa">

    <pre id="pre"  style="height:300px;font-size:18px"><code contenteditable id="code"  class='language-javascript' >asdf</code></pre>
    </div> --}}
    <div class="col-md-5">
    <textarea id="edytor">{!! html_entity_decode($question->answer) !!}</textarea>
    </div>

<br>

</div>
<br>
<div class="container">
<div class="col-md-5" style="display:flex; justify-content:space-around">
    <div class="form-group">
        {{ csrf_field() }}
        {{-- <a href="/questions/show/{{$question->id+1}}"><button type="submit" class="btn btn-success">Next</button></a> --}}
        <a href="{{route('show', $next)}}"><button type="submit" class="btn btn-success">Next</button></a>


    </div>

    <form action="{{route('delete', $question->id)}}" method="post">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <button class="btn btn-danger">Wywal</button>
    </form>
    <div class="form-group">
    <a href="{{route('edit', $question->id)}}"><button    class="btn btn-info">Edytuj</button></a>
    </div>

</div>
<div class="form-group">
<div class="col-md-2">Counter: {{$question->counter}}

<form action="{{route('updatecounter', $question->id)}}" method="post">
    {{csrf_field()}}
    {{method_field('patch')}}
    <input class="form-control" type="number" name="updatecounter" value="{{$question->counter}}">
    <button class="btn btn-sm btn-default" style="margin-top:10px">update counter</button>

</form>

</div>
</div>


</div>





@endsection


@section('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/script.js"></script>

@endsection
