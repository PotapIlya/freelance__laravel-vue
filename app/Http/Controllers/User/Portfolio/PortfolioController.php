<?php

namespace App\Http\Controllers\User\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\BaseUserController;
use App\Models\Admin\Users\User;
use App\Models\User\Portfolio\UserPortfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;

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
        $user =  User::with('portfolio')->find(Auth::id());
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $path = Storage::disk(self::DISK)->put(Auth::id(),  $request->file('image'));;
        $create = UserPortfolio::create([
            'user_id' => Auth::id(),
            'path' => $path,
        ]);

        if ( $create )
        {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function destroy($id)
    {
        $item = UserPortfolio::findOrFail($id);
        if ($item->user_id === Auth::id())
        {
            if ($item->delete() && Storage::disk(self::DISK)->delete($item->path))
            {
                return redirect()->back();
            }
        } else{
             abort(500);
        }
    }
}
