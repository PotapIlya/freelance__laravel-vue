<?php

namespace App\Models\Projects;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function responses()
    {
        return $this->hasMany(Response::class, 'project_id', 'id');
    }
}
