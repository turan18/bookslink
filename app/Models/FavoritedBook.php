<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritedBook extends Model
{
    use HasFactory;

    protected $with = ['info'];

    public function info(){
        return $this->belongsTo(Book::class,'book_id');
    }

}
