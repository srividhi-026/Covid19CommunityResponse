<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

;

class RegisterController
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
        //$this->middleware('guest');
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
            'first_name'     => 'required|string',
            'last_name'      => 'required|string',
            'email'          => 'required|email|unique:users',
            'phone'          => 'required',
            'county'         => 'required|string',
            'over18'         => 'required',
            'privacy_policy' => 'required',
            'confidentiality'=> 'required'
        ]);

        $user = User::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'county'        => $request->county,
            'driving'       => $request->driving == 'on' ? 1 : 0,
            'contact_email' => $request->contact_email == 'on' ? 1 : 0
        ]);

        if ($user) {
            Session::flash('message', 'Thank you for registering and giving your support!');

            // send acknowledgement to registered users.
            $email_data = array(
                template_item('user', $user->first_name),
            );

            $email_details = array(
                'subject'       => 'Thanks for signing up',
                'from_email'    => 'info@covidcommunityresponse.ie',
                'from_name'     => '',
                'to_email'      => $user->email,
                'template_name' => 'ccr_register',
                'template_data' => $email_data,
            );

            send_mandrill_email($email_details);

            // send notification to CCR-19 team
            $email_data = array(
                template_item('user', $user->first_name. ' '. $user->last_name),
                template_item('location', $user->county)
            );

            $email_details = array(
                'subject'       => 'New user registration',
                'from_email'    => 'info@covidcommunityresponse.ie',
                'from_name'     => 'CCR-19',
                'to_email'      => 'info@covidcommunityresponse.ie',
                'template_name' => 'ccr_register_notify',
                'template_data' => $email_data,
            );

            send_mandrill_email($email_details);

            $response = redirect('register');
        }
        else {
            $request->flash('error', 'There was an error saving your details, please try again.');

            $response = redirect('register')->withInput();
        }

        return $response;
    }
}
