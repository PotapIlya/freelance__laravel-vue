<?php

namespace App\Http\Controllers\User\Index;

use App\Http\Controllers\Controller;
use App\Http\Controllers\User\BaseUserController;
use App\Models\Admin\Users\User;
use App\Services\User\Index\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class OptionsController extends BaseUserController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param Request $request
     * @param Options $options
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadImage(Request $request, Options $options) : Redirect
    {
        if ( $options->uploadImage($request->all()) )
        {
            return redirect()->back();
        } else{
            abort(500);
        }
    }


    /**
     * @param Request $request
     * @param Options $options
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request, Options $options)
    {
        if ($options->updatePassword($request->all())['errors'])
        {
            return redirect()->back()->withErrors(['errors' => $options->updatePassword($request->all())['errors']]);
        } else{
            return redirect()->back();
        }
    }

}
