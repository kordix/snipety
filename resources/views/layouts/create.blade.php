@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-12">
            <h2>Dodaj quizet</h2>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <form action="/questions/store" method="post">
                    {{csrf_field()}}
                    <label for="pytanie">Pytanie</label>
                    <textarea  class="form-control" name="question" style="font-size:20px;height:100px"></textarea>
                    <label for="answer">Answer</label>
                    <textarea class="form-control" name="answer" style="font-size:12px;height:200px"></textarea>
                    <label for="answer">Channel</label>
                    <select name="channel" id="">
                        @foreach($channels as $channel )
                        <option value="{{$channel->id}}">{{$channel->id}}  {{$channel->channelname}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary" style="margin-top:5px">Dodaj</button>
                </form>
            </div>
        <div class="col md-5">

        </div>
        </div>
    </div>

@endsection
