<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = [
        'user_id','category_id','type_id','name','slug','thumbnail','story'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
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
