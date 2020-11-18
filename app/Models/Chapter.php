<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function storyName()
    {
        return $this->belongsTo(Story::class,'story_id');
    }
}
