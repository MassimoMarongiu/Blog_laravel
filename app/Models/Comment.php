<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // protected $with =['user:id,name,image','comments.user:id,name,image'];

    protected $fillable = [
        'user_id',
        'content',
    ];
    public function user(){
        //relazione con solo uno
        return $this->belongsTo(User::class);
    }
}
