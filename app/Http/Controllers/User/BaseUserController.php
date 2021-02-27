<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseUserController extends Controller
{
    const DISK = 'public';
	public function __construct()
	{
//		parent::__construct();

		$this->middleware('auth');;

	}
}
