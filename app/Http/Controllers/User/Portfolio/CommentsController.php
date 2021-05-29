<?php

namespace App\Http\Controllers\User\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\BaseUserController;
use App\Models\Portfolio\UserComments;
use App\Services\User\Portfolio\Comments;
use Illuminate\Http\Request;


class CommentsController extends BaseUserController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store(Request $request, int $portfolio_id, Comments $comments)
    {
       if ( $comments->store($request->all(), $portfolio_id) )
       {
            return redirect()->back();
        } else {
           abort(500);
       }
    }

}
