<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Faker\Factory as Faker;

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
            'lat'            => 'required',
            'lng'            => 'required',
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
            'lat'           => $request->lat,
            'lng'           => $request->lng,
            'status'        => 1,
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

    public function get_map_data (Request $request) {
//  Create fake points.
//        $faker = Faker::create();
//        $faker->seed(mt_rand(0, 1000000));
//

//        for($i = 0; $i < 10000; $i++) {
//            User::create([
//
//                    'first_name'    => $faker->name,
//                    'last_name'     => $faker->name,
//                    'email'         => $faker->email,
//                    'phone'         => $faker->phoneNumber,
//                    'lat'           => $faker->latitude,
//                    'lng'           => $faker->longitude,
//                    'status'        => 1,
//                    'county'        => $faker->country,
//                    'driving'       => 1,
//                    'contact_email' => 1
//
//            ]);
//        }

        $users = User::all();

        $map_data = '{"type": "FeatureCollection","crs": { "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } },
                      "features": [';

        $count = count($users);
        $counter = 1;

        foreach ($users as $user) {
            $driving = $user->driving == 1 ? 'Yes' : 'No';
            $status = $user->status == 1 ? 'I\'m in need of help!' : 'I\'m offering my help' ;

            $map_data .= '{"type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [ ' . $user->lng . ', ' . $user->lat . ', 0.0 ]
                         },
                         "properties": {
                                "id": ' . $user->id . ',
                                "mag": 2.3,
                                "phone": "' . $user->phone . '",
                                "name": "' . $user->first_name . ' ' . $user->last_name . '",
                                "driving": "' . $driving . '",
                                "status": "' . $status . '"
                            }
                      }';

            if ($count != $counter) {
                $map_data .= ',';
            }

            $counter++;
        }

        $map_data .= ']}';

        return $map_data;

    }
}
