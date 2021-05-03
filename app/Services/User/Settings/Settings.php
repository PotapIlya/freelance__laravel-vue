<?php

namespace App\Services\User\Settings;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Settings
{

    public function update(array $array, string $disk = 'public')
    {
        $user = Auth::user();
        if (isset($array['image']))
        {
            if (is_null($user->image))
            {
                $user->image = Storage::disk($disk)->put($user->id,  $array['image']);
            } else{
                if (Storage::disk($disk)->delete($user->image)){
                    $user->image = Storage::disk($disk)->put($user->id,  $array['image']);
                } else{
                    return 'no delete message';
                }
            }

        }

        $user->first_name = $array['first_name'];
        $user->last_name = $array['last_name'];
        $user->email = $array['email'];
        return $user->save();
    }

}