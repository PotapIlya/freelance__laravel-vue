<?php

namespace App\Models\Project;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function parent()
    {
        return $this->hasMany(Category::class, 'id', 'parent_id');
    }
    public function child()
	{
		return $this->hasMany(Category::class, 'parent_id', 'id');
	}

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_category', 'category_id', 'user_id');
    }

	public static function getAll()
    {
        return Category::with('child')
            ->where('parent_id', 0)
            ->get();
    }
}
