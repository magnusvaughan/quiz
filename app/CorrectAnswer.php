<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorrectAnswer extends Model
{
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
