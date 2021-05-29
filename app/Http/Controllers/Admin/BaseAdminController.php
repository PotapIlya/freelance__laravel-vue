<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseAdminController extends Controller
{
	public function __construct()
	{
//		parent::__construct();

		$this->middleware('auth');
//		$this->middleware('admin');

	}
}
