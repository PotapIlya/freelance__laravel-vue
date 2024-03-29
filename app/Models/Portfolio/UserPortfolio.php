<?php

namespace App\Models\Portfolio;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPortfolio extends Model
{
    use HasFactory;


    protected $guarded = ['id'];


    public function user()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(UserComments::class, 'portfolio_id', 'id');
    }

}
