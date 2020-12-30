<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Product;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('home.index');
	}

	public function initial()
	{
		if (Role::where('name', '=', 'admin')->exists()) {
 			return redirect()->route('admin.users.index');
		}

		Role::create(['name' => 'admin']);
		Permission::create(['name' => 'users_manage']);
		$role = Role::orderby('created_at', 'desc')->first();
		$permission = Permission::orderby('created_at', 'desc')->first();
		$role->givePermissionTo($permission);

		return redirect()->route('home.index');
	}
}
