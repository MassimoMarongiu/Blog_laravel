<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $with =['user:id,name,image','comments.user:id,name,image'];

    protected $withCount = ['likes'];

    protected $fillable = [
        'user_id',
        'content',
        'likes',
    ];
    public function comments()
    {
        //relazione con molti
        return $this->hasMany(Comment::class);
    }
    public function user(){
        //relazione con solo uno
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class,'message_like')->withTimestamps();
    }

    // scope è una query che applica una quesry alle preesistenti query
    public function scopeSearch($query,$search=''){
        $query->where('content', 'like', '%' . $search . '%');
    }
}
