<?php

namespace App\Models\Admin\Users;

use App\Models\Admin\Project\Category;
use App\Models\Admin\Users\Role;
use App\Models\User\Portfolio\UserPortfolio;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//    ];

	protected $guarded = ['id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
	{
		return $this->hasOne(Role::class, 'id', 'role_id');
	}

    /**
     * @return bool
     */
	public function isAdmin()
	{
		return $this->role()->where('name', 'admin')->exists();
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'user_category', 'user_id', 'category_id');
    }

    public function portfolio()
    {
        return $this->hasMany(UserPortfolio::class, 'user_id', 'id');
    }


}
