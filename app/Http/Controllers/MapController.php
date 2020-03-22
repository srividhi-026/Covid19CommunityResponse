<?php

namespace App\Http\Controllers;

use App\User;
use Faker\Factory as Faker;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct () {
        //$this->middleware('guest');
    }

    /**
     * Populate the DB with fake user and map data for testing.
     */
    public function create_fake_user_and_map_db_data () {
        //  Create fake points.
        $faker = Faker::create();
        $faker->seed(mt_rand(0, 1000000));

        for($i = 0; $i < 10000; $i++) {
            User::create([
                    'first_name'    => $faker->name,
                    'last_name'     => $faker->name,
                    'email'         => $faker->email,
                    'phone'         => $faker->phoneNumber,
                    'lat'           => $faker->latitude,
                    'lng'           => $faker->longitude,
                    'status'        => 1,
                    'county'        => $faker->country,
                    'driving'       => 1,
                    'contact_email' => 1

            ]);
        }
    }

    /**
     * Gets the user data from the DB and generate JSON for the cluster map.
     *
     * @param Request $request
     * @return string
     */
    public function get_map_data (Request $request) {
        $users = User::all();

        $map_data = '{"type": "FeatureCollection","crs": { "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } },
                      "features": [';

        $count = count($users);
        $counter = 1;

        foreach ($users as $user) {
            $driving = $user->driving == 1 ? 'Yes' : 'No';
            $status = $user->status == 0 ? 'I\'m in need of help!' : 'I\'m offering my help' ;

            // weed out any users with invalid lat lng coords.
            if(is_numeric($user->lat) && is_numeric($user->lng)) {

                $map_data .= '{"type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [ ' . $user->lng . ', ' . $user->lat . ', 0.0 ]
                         },
                         "properties": {
                                "id": ' . $user->id . ',
                                "mag": 2.3,
                                "phone": "' . $user->phone . '",
                                "name": "' . $user->first_name . '",
                                "driving": "' . $driving . '",
                                "status": "' . $status . '"
                            }
                      }';

                if ($count != $counter) {
                    $map_data .= ',';
                }
            }

            $counter++;
        }

        $map_data .= ']}';

        return $map_data;
    }
    
    
    public function get_3d_printer_map_data (Request $request) {
        $users = User::all();

        $map_data = '{"type": "FeatureCollection","crs": { "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } },
                      "features": [';

        $count = count($users);
        $counter = 1;

        foreach ($users as $user) {
            $printerDetails = \App\PrinterDetails::where('user_id',$user->id)->first();
                    
            // weed out any users with invalid lat lng coords. and make sure they have a 3d printer
            if(is_numeric($user->lat) && is_numeric($user->lng) && $printerDetails) {

                $map_data .= '{"type": "Feature",
                        "geometry": {
                            "type": "Point",
                            "coordinates": [ ' . $user->lng . ', ' . $user->lat . ', 0.0 ]
                         },
                         "properties": {
                                "id": ' . $user->id . ',
                                "mag": 2.3,
                                "phone": "' . $user->phone . '",
                                "name": "' . $user->first_name . '",
                                "3D printer make": "' . $printerDetails->make . '",
                                "3D printer model": "' . $printerDetails->model . '",
                                "3D printer material": "' . $printerDetails->material . '",
                                "Other 3D printer notes": "' . $printerDetails->notes . '"
                            }
                      }';

                if ($count != $counter) {
                    $map_data .= ',';
                }
            }

            $counter++;
        }

        $map_data .= ']}';

        return $map_data;
    }

}
