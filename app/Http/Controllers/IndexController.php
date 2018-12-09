<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\zbignieww as fdas;
use App\Channel;

class IndexController extends Controller
{
    public function show($id)
    {
        $id;
        $question = Question::find($id);
        $channel = $question->channel;
        // dd($channel);
        $next = Question::where('counter', '<', 10)->where('channel', '=', $channel)->where('id', '>', $id) ->min('id');

        // dd($question);
        // $next = Question::where('id', '>', $id)->where('counter', '<', 0)->min('id');

        return view('index', compact('question', 'next'));
    }

    public function start()
    {
        // $ile = Setting::find(1)->counterset;
        $next = Question::where('counter', '<', 2)->min('id');
        return redirect()->route('show', ['id'=>$next])->with('autofocus', true);
    }

    public function startchannel(Channel $channel)
    {
        // dd($channel);
        $next = Question::where('counter', '<', 2)->where('channel', '=', $channel->id)->min('id');
        return redirect()->route('show', ['id'=>$next])->with('autofocus', true);
    }
}
