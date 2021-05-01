<?php


namespace App\Services\User\Portfolio;


use App\Models\User\Portfolio\UserComments;
use Illuminate\Support\Facades\Auth;

class Comments
{

    /**
     * @param array $array
     * @param int $portfolio_id
     * @return object
     */
    public function store(array $array, int $portfolio_id) : object
    {
        $create = UserComments::create([
            'user_id' => Auth::id(),
            'portfolio_id' => $portfolio_id,
            'text' => $array['text'],
        ]);

        return $create;
    }

}