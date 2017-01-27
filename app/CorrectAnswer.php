<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorrectAnswer extends Model
{

    protected $fillable = ['question_id', 'answer_id'];


    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
