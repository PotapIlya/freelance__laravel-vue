<?php

namespace App\Models\Admin\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function child()
	{
		return $this->hasMany(Category::class, 'parent_id', 'id');
	}

	public static function getAll()
    {
        return Category::with('child')
            ->where('parent_id', 0)
            ->get();
    }
}
