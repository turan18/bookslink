<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedBook extends Model
{
    use HasFactory;

    protected $with = ['book_info','user_info','shared_with'];

    public function book_info(){
        return $this->belongsTo(Book::class,'book_id');
    }
    public function user_info(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function shared_with(){
        return $this->belongsTo(User::class,'shared_with_user_id');
    }

}
