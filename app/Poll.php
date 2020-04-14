<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = [
        'question', 'image1','image2','image3','image4', 'winner', 'name'
    ];

    public function vote()
    {
        return $this->hasOne(vote::class);
    }
}
