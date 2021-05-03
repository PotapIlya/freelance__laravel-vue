<?php

namespace App\Http\Controllers\User\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\BaseUserController;
use App\Http\Requests\User\Portfolio\AddRequest;
use App\Models\Admin\Users\User;
use App\Models\User\Portfolio\UserPortfolio;
use App\Services\User\Portfolio\Portfolio;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('groups.user.pages.portfolio.create');
    }


    /**
     * @param Request $request
     * @param Portfolio $portfolio
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddRequest $request, Portfolio $portfolio)
    {

        if ( $portfolio->add($request->all()) )
        {
            return redirect()->back()->with(['success' => 'success']);
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
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('groups.user.pages.portfolio.edit', [
            'item' => UserPortfolio::findOrFail($id),
            'id' => $id
        ]);
    }


    /**
     * @param Request $request
     * @param int $id
     * @param Portfolio $portfolio
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id, Portfolio $portfolio)
    {
        if ( $portfolio->update($request->all(), $id) )
        {
            return redirect()->back()->with(['success' => 'success']);
        } else{
            abort(500);
        }
    }


    /**
     * @param int $id
     * @param Portfolio $portfolio
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id, Portfolio $portfolio)
    {
        if ( $portfolio->delete($id) )
        {
            return redirect()->back()->with(['success' => 'success']);
        } else{
            abort(500);
        }
    }
}
