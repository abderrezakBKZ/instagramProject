<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $guarded = [];

//    public function profileImage () {
//        $imagePath = ($this->image)?-> $this->image: 'profile/';
//}

    public function profileImage () {
        $imagePath =  ($this->image)? $this->image : 'profile/9M6aXL0J4gwi8Lt6tanmGKVqx1eDtk3eOO66KPZk.jpg';
        return '/storage/'.$imagePath ;
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function followers () {
        return $this->belongsToMany(User::class);
    }
}
