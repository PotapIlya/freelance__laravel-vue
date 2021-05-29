<?php


namespace App\Services\User\Index;


use App\Models\Users\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Options
{

    public function uploadImage(array $array, string $disk = 'public') : bool
    {
        $authId = Auth::id();
        $path = Storage::disk($disk)->put($authId, $array['image']);
        $update = User::findOrFail($authId)->update([
            'image' => $path,
        ]);

        return $update;
    }

    public function updatePassword(array $array) : array
    {
        $user = Auth::user();

        if ( $array['oldPassword'] === $array['password'] )
        {
            return ['errors' => 'старый и новый пароль совпадают'];
        }

        if (Hash::check($array['oldPassword'], $user->password ))
        {
            $update = User::findOrFail( $user->id )->update([
                'password' => bcrypt($array['password'])
            ]);
            return $update;
        }
        else
        {
            return ['errors' => 'Старый пароль не верный'];
        }
    }

}
