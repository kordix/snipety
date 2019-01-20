<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Setting;
use App\zbignieww as fdas;
use App\Channel;

class questionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    public function delete(Question $question)
    {
        $counternum = Setting::find(1)->counternum;
        $next = Question::where('counter', '<', $counternum)->where('id', '>', $question->id) ->min('id');
        $question->delete();
        return redirect()->route('show', $next);
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
        session()->flash('message', 'dodano quizet');
        return back();
    }

    public function updatecounter(Request $request, $id)
    {
        Question::find($id)->update([
            'counter'=>request('updatecounter')
        ]);
        return(back());
    }

    public function updatecounterset(Request $request, $id)
    {
        Setting::find(1)->update([
            'counternum'=>request('counter')
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
        session()->flash('message', 'zedytowano');
        return(back());
    }

    public function list()
    {
        // $questions = Question::all()->sortBy('channel');
        $questions = Question::orderBy('channel')->get();

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
