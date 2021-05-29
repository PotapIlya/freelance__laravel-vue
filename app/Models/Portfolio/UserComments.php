<?php

namespace App\Models\Portfolio;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComments extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
