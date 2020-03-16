<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as both
    | validation and creation.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct () {
        $this->middleware('guest');
    }

    /**
     * Show the register page.
     *
     * @return mixed
     */
    public function show () {
        return view('register');
    }

    public function do_register (Request $request) {
        $request->validate([
            'agenda_id' => 'required|int',
            'text'      => 'required|string',
            'position'  => 'required|int'
        ]);


    }
}
