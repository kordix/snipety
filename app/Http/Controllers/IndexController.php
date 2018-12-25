<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Setting;

use App\zbignieww as fdas;
use App\Channel;

class IndexController extends Controller
{
    public function show($id)
    {
        $id;
        $question = Question::find($id);
        $channel = $question->channel;
        $counternum = Setting::find(1)->counternum;
        // dd($channel);
        //->where('channel', '=', $channel)
        $next = Question::where('counter', '<', $counternum)->where('id', '>', $id) ->min('id');
        $prev = Question::where('counter', '<', $counternum)->where('id', '<', $id) ->max('id');


        return view('index', compact('question', 'next', 'prev'));
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

    public function listzdania()
    {
        $currentlanguage = $this->currentlanguage;
        $rows = Question::where('language', '=', $currentlanguage)->where('zdanie', '=', 1)->get();
        return view('layouts.list', compact('rows', 'currentlanguage'));
    }
}
