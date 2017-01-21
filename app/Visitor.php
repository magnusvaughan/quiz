<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
