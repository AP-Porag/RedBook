<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'story_tags');
    }

}
