<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */


//    protected $with = ['followers','following','favorite_books','shared_books'];

    protected $fillable = [
        'username',
        'email',
        'password',
        'about_me'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    # Eloquent mutator that receives password and hashes it
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function favorite_books(){
        return $this->hasMany(FavoritedBook::class);
    }

    public function shared_books(){
        return $this->hasMany(SharedBook::class);
    }

    public function followers(){
//        return $this->hasMany(Follow::class);
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'user_follower_id');

    }

    public function following(){
/*        return $this->hasMany(Follow::class,'user_follower_id');*/
        return $this->belongsToMany(User::class, 'follows', 'user_follower_id', 'user_id');

    }


}
