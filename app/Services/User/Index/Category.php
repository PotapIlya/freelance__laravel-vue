<?php

namespace App\Services\User\Index;

use Illuminate\Support\Facades\Auth;

class Category
{

    /**
     * @param array $array
     */
    public function add(array $array)
    {

//        dd(
////
//
////
//        );
        return Auth::user()->categories()->attach( json_decode($array['params'], true) );
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