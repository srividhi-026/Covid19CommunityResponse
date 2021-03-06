<?php

namespace App\Http\Controllers;

use App\User;
use App\Agent;
use App\AgentShift;
use App\PrinterDetails;
use App\PPEDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    public function show ($page) {
        return view('auth_forms.register')->with([
            'page' => $page
        ]);
    }

    public function do_register (Request $request) {
        $request->validate([
            'first_name'               => 'required|string',
            'last_name'                => 'required|string',
            'email'                    => 'required|email',
            'phone'                    => 'required',
            'lat'                      => 'required|regex:/^-?\d{1,2}\.\d{6,}$/',
            'lng'                      => 'required|regex:/^-?\d{1,2}\.\d{6,}$/',
            'county'                   => 'required|string',
            'privacy_policy'           => 'required',
            'confidentiality'          => 'required',
            'over18'                   => 'required_if:volunteer,on',
            'printer_make'             => 'required_if:printer,on',
            'printer_model'            => 'required_if:printer,on',
            'printer_material'         => 'required_if:printer,on',
            'ppe_supplies_description' => 'required_if:ppe,on',
            'volume'                   => 'required_if:ppe,on',
            'eircode'                  => 'required_if:ppe,on',
            'availability_times'       => 'required_if:ppe,on'
        ]);


        // If there's a user with the email in $request->email then update that
        // If no matching model exists, create one.
        $user =  User::updateOrCreate(
            ['email' => $request->email],
            [
                'first_name'    => $request->first_name,
                'last_name'     => $request->last_name,
                'email'         => $request->email,
                'phone'         => $request->phone,
                'lat'           => $request->lat,
                'lng'           => $request->lng,
                'status'        => 1,
                'county'        => $request->county,
                'driving'       => $request->driving == 'on' ? 1 : 0,
                'contact_email' => $request->contact_email == 'on' ? 1 : 0,
                'group'         => $request->group == 'on' ? 1 : 0,
                'printer'       => $request->printer == 'on' ? 1 : 0,
                'ppe'           => $request->ppe == 'on' ? 1 : 0
            ]
        );

        if($request->printer === 'on'){
            PrinterDetails::create([
                'user_id'  => $user->id,
                'make'     => $request->printer_make,
                'model'    => $request->printer_model,
                'material' => $request->printer_material,
                'notes'    => $request->printer_notes ? $request->printer_notes : '',
            ]);
        }

        if($request->ppe === 'on'){
            PPEDetails::create([
                'user_id'                  => $user->id,
                'ppe_supplies_description' => $request->ppe_supplies_description,
                'volume'                   => $request->volume,
                'eircode'                  => $request->eircode,
                'availability_times'       => $request->availability_times,
            ]);
        }

        if ($user) {
            Session::flash('message', 'Thank you for registering and giving your support!');

            if($request->ppe === 'on'){
                // send notification to CCR-19 team
                $email_data = array(
                    template_item('user', $user->first_name. ' '. $user->last_name),
                    template_item('location', $user->county),
                    template_item('phone', $user->phone),
                    template_item('desc', $request->ppe_supplies_description ? $request->ppe_supplies_description : 'No description provided'),
                    template_item('volume', $request->volume ? $request->volume : '0'),
                    template_item('eircode', $request->eircode ? $request->eircode : 'no eircode'),
                    template_item('time', $request->availability_times ? $request->availability_times : '0')
                );

                $ccr_email_details = array(
                    'subject'       => 'PPE Donation - CCR19',
                    'from_email'    => $user->email,
                    'reply_to'      => $user->email,
                    'from_name'     => 'CovidCommunityResponse',
                    'to_email'      => 'ppe@covidcommunityresponse.ie',
                    'template_name' => 'ccr_register_notify',
                    'template_data' => $email_data,
                );

                send_mandrill_email($ccr_email_details);
            }

            $response = redirect('map');
        }
        else {
            $request->flash('error', 'There was an error saving your details, please try again.');

            $response = redirect('register')->withInput();
        }

        return $response;
    }

    public function agent_register (Request $request) {
        $request->validate([
            'first_name'             => 'required|string',
            'last_name'              => 'required|string',
            'address'                => 'required|string',
            'phone'                  => 'required|min:10',
            'email'                  => 'required|email|unique:agents,email',
            'data_protection_policy' => 'required',
            'privacy_policy'         => 'required',
            'confidentiality'        => 'required',
            'checklist'              => 'required',
            'gdpr'                   => 'required'
        ]);

        $agent = Agent::create([
            'first_name'                => $request->first_name,
            'last_name'                 => $request->last_name,
            'address'                   => $request->address,
            'phone'                     => $request->phone,
            'email'                     => $request->email,
            'confidentiality_agreement' => $request->confidentiality == 'on' ? 1 : 0,
            'cyber_security'            => $request->checklist == 'on' ? 1 : 0,
            'data_protection'           => $request->data_protection_policy == 'on' ? 1 : 0,
            'privacy_policy'            => $request->privacy_policy == 'on' ? 1 : 0,
            'gdpr'                      => $request->gdpr == 'on' ? 1 : 0
        ]);

        $agent_shift = AgentShift::create([
            'agent_id'            => $agent->id,
            'monday_morning'      => $request->monday == 'mon_morning' ? 1 : 0,
            'monday_afternoon'    => $request->monday == 'mon_afternoon' ? 1 : 0,
            'monday_evening'      => $request->monday == 'mon_evening' ? 1 : 0,
            'tuesday_morning'     => $request->tuesday == 'tues_morning' ? 1 : 0,
            'tuesday_afternoon'   => $request->tuesday == 'tues_afternoon' ? 1 : 0,
            'tuesday_evening'     => $request->tuesday == 'tues_evening' ? 1 : 0,
            'wednesday_morning'   => $request->wednesday == 'wed_morning' ? 1 : 0,
            'wednesday_afternoon' => $request->wednesday == 'wed_afternoon' ? 1 : 0,
            'wednesday_evening'   => $request->wednesday == 'wed_evening' ? 1 : 0,
            'thursday_morning'    => $request->thursday == 'thurs_morning' ? 1 : 0,
            'thursday_afternoon'  => $request->thursday == 'thurs_afternoon' ? 1 : 0,
            'thursday_evening'    => $request->thursday == 'thurs_evening' ? 1 : 0,
            'friday_morning'      => $request->friday == 'fri_morning' ? 1 : 0,
            'friday_afternoon'    => $request->friday == 'fri_afternoon' ? 1 : 0,
            'friday_evening'      => $request->friday == 'fri_evening' ? 1 : 0,
            'saturday_morning'    => $request->saturday == 'sat_morning' ? 1 : 0,
            'saturday_afternoon'  => $request->saturday == 'sat_afternoon' ? 1 : 0,
            'saturday_evening'    => $request->saturday == 'sat_evening' ? 1 : 0,
            'sunday_morning'      => $request->sunday == 'sun_morning' ? 1 : 0,
            'sunday_afternoon'    => $request->sunday == 'sun_afternoon' ? 1 : 0,
            'sunday_evening'      => $request->sunday == 'sun_evening' ? 1 : 0
        ]);

        if ($agent) {

            // // send notification to CCR-19 team
            // $email_data = array(
            //     template_item('user', $agent->first_name. ' '. $agent->last_name),
            //     template_item('location', $agent->address)
            // );

            // $email_details = array(
            //     'subject'       => 'New Agent registration',
            //     'from_email'    => 'info@covidcommunityresponse.ie',
            //     'from_name'     => 'CCR-19',
            //     'to_email'      => 'covid19ire@gmail.com',
            //     'template_name' => 'ccr_register_notify',
            //     'template_data' => $email_data,
            // );

            // send_mandrill_email($email_details);

            Session::flash('message', 'Thank you for registering and giving your support!');

            $response = redirect('agent_register');
        }
        else {
            $request->flash('error', 'There was an error saving your details, please try again.');

            $response = redirect('register')->withInput();
        }

        return $response;
    }
}
