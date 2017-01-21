<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
}
