<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\zbignieww as fdas;
use App\Channel;

class questionController extends Controller
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

    public function getId($id)
    {
        dd($id);
    }

    public function next($id)
    {
        $id++;
        $question = Question::find($id);
        // dd($question);
        return view('index', compact('question'));
    }

    public function create()
    {
        $channels = Channel::all();
        return view('layouts.create', compact('channels'));
    }

    public function edit($id)
    {
        $question = Question::find($id);
        $channels = Channel::all();
        return view('layouts.edit', compact('question', 'channels'));
    }


    public function store(Request $request)
    {
        $question = question::create([
            'question' => request('question'),
            'answer' => request('answer'),
            'channel' => request('channel')
        ]);

        return back();
    }

    public function updatecounter(Request $request, $id)
    {
        $zbigniew=Question::find($id);

        Question::find($id)->update([
            'counter'=>request('updatecounter')
        ]);
        return(back());
    }

    public function update(Request $request, $id)
    {
        Question::find($id)->update([
            'answer'=>request('answer'),
            'question'=>request('question'),
            'channel'=>request('channel')
        ]);
        return(back());
    }

    public function list()
    {
        $questions = Question::all()->sortBy('channel');
        // $questions = 'siemano';
        return view('list', compact('questions'));
    }

    public function listchannel(Channel $channel)
    {
        $questions = $channel->questions()->get();
        // dd($questions);
        return view('list', compact('questions'));
    }

    public function indexcategories()
    {
        $categories = Channel::all();
        return view('categories', compact('categories'));
    }

    public function storecategory()
    {
        Channel::create([
            'channelname' => request('categoryname')
        ]);
        return (back());
    }
}
