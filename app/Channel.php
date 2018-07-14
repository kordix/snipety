<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;

class Channel extends Model
{
    protected $fillable = ['channelname'];

    public function questions()
    {
        return $this->hasMany(Question::class, 'channel');
    }
}
