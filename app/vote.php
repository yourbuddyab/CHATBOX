<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
}
