<?php

namespace App\Services\User\Index;

use Illuminate\Support\Facades\Auth;

class Category
{

    /**
     * @param int $id
     * @return mixed
     */
    public function add(int $id)
    {
        return Auth::user()->categories()->attach( $id );
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return Auth::user()->categories()->detach( $id );
    }


}