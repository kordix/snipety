@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-12">
            <h2>Edytuj snippet</h2>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <form action="/update/{{$question->id}}" method="post">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <label for="pytanie">Pytanie    (id {{$question->id}})</label>
                    <textarea  class="form-control" name="question" style="font-size:20px;height:100px">{{$question->question}}</textarea>
                    <label for="answer">Answer</label>
                    <textarea class="form-control" name="answer" style="font-size:12px;height:200px">{{$question->answer}}</textarea>
                    <label for="channelname">Kategoria:</label>

                    <select name="channel" value={{$question->channel}} id="">{{$question->channel}}
                        @foreach($channels as $channel)
                            @if($channel->id==$question->channel)
                            <option value="{{$channel->id}}" selected="selected">{{$channel->channelname}}</option>
                            @else
                            <option value="{{$channel->id}}">{{$channel->channelname}}</option>
                            @endif
                @endforeach

                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary" style="margin-top:5px">Edytuj</button>
                </form>
                <a href="{{URL::to('/questions/show/'.$question->id)}}"><button class="btn btn-default" style="margin-top:5px">Przejdź</button></a>
            </div>
        </div>
    </div>

@endsection
