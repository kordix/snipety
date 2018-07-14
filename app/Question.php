<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Channel;

class Question extends Model
{
    protected $guarded=[];

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel');
    }
}
