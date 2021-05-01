<?php

namespace App\Http\Controllers\User\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\BaseUserController;
use App\Models\Admin\Users\User;
use App\Models\User\Portfolio\UserPortfolio;
use App\Services\User\Portfolio\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends BaseUserController
{


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user =  User::with('portfolio')->findOrFail(Auth::id());
        return view('groups.user.pages.portfolio.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * @param Request $request
     * @param Image $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Image $image)
    {
        if ( $image->add($request->all()) )
        {
            return redirect()->back();
        } else{
            abort(500);
        }
    }


    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $item = UserPortfolio::with('user', 'comments.user')->findOrFail($id);

        return view('groups.user.pages.portfolio.show', compact('item', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * @param int $id
     * @param Image $image
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id, Image $image)
    {
        if ( $image->delete($id) )
        {
            return redirect()->back();
        } else{
            abort(500);
        }
    }
}
