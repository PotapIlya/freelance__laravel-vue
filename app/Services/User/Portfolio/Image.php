<?php


namespace App\Services\User\Portfolio;


use App\Models\User\Portfolio\UserPortfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Image
{

    /**
     * @param array $array
     * @param string $disk
     * @return object
     */
    public function add(array $array, string $disk = 'public') : object
    {
        $authId = Auth::id();

        $path = Storage::disk($disk)->put($authId,  $array['image']);;
        $create = UserPortfolio::create([
            'user_id' => $authId,
            'path' => $path,
        ]);

        return $create;
    }

    /**
     * @param int $id
     * @param string $disk
     * @return bool
     */
    public function delete(int $id, string $disk = 'public') : bool
    {
        $item = UserPortfolio::findOrFail($id);
        if ($item->user_id === Auth::id())
        {
            return $item->delete() && Storage::disk($disk)->delete($item->path);
        } else{
            return false;
        }
    }

}