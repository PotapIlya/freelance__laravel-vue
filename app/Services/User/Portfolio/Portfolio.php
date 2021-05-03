<?php


namespace App\Services\User\Portfolio;


use App\Models\User\Portfolio\UserPortfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Portfolio
{

    /**
     * @param array $array
     * @param string $disk
     * @return object
     */
    public function add(array $array, string $disk = 'public') : object
    {
        $authId = Auth::id();

        $path = Storage::disk($disk)->put($authId,  $array['image']);
        $create = UserPortfolio::create([
            'user_id' => $authId,
            'title' => $array['title'],
            'path' => $path,
            'text' => $array['text'],
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

    public function update(array $array, int $id, string $disk = 'public')
    {
        $item = UserPortfolio::findOrFail( $id );
        if (isset($array['image']))
        {
            if (Storage::disk($disk)->delete($item->path)){
                $item->path = Storage::disk($disk)->put(Auth::id(),  $array['image']);
            } else{
                return 'no delete message';
            }
        }

        $item->title = $array['title'];
        $item->text = $array['text'];
        return $item->save();
    }

}