@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">Pytanie</div><div class="col-md-1">Channel</div><div class="col-md-1">Id</div><div class="col-md-2"></div>
    </div>
@foreach($questions as $question)

    <div class="row">
<div class="col-md-5"><a style="color:black" href="/questions/show/{{$question->id}}">{{$question->question}}</a></div>
<div class="col-md-1">{{$question->channel}}</div>
<div class="col-md-1">{{$question->id}}</div>

<div class="col-md-2"><a href="/edit/{{$question->id}}">Edytuj</a></div>
</div>
@endforeach
@endsection

{{-- {{$questions}} --}}
</div>
